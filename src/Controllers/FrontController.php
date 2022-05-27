<?php

namespace Graph\Controllers;

use Graph\Classes\Validator;
use Graph\Models\Forum;
use Graph\Models\Topic;
use Graph\Models\User;

class FrontController extends Controller
{

    /**
     * show the list of all forums od website
     * @return void
     */
    public function showForums()
    {
        $forumRepo = $this->em()->getRepository(Forum::class);
        $forums = $forumRepo->findAll();
        $this->render("forum/all_forums", compact("forums"));
    }


    /**
     * use id of one forum to show all topic of these forum and give the possibility to create new topi
     * @param int $forumId
     * @param string
     * @return void
     */
    public function showOneForum(string $slug, int $forumId)
    {
        $forumRepo = $this->em()->getRepository(Forum::class);
        $forum = $forumRepo->findOneBy(["id" => $forumId]);
        $topics = $forum->getTopics()->toArray();
        rsort($topics);
        
      
        if(!isset($_GET["resole"])&&!isset($_GET["answer"])){
            $paginate = $this->topicPaginate($topics);
            $topics = $paginate[0];
            $pages = $paginate[1];
        }
        if(isset($_GET["resole"])||isset($_GET["answer"])){
            $topics=$this->filterTopics($topics);
            $pages=1;
        }
       
        $token = $_SESSION["token"] = password_hash(date("his"), PASSWORD_BCRYPT);
        $this->render("forum/forum", compact("token", "forum", "topics", "pages"));
    }

    /**
     * user topic id to show all answers of these topic and and give possibility to answer  
     * @param int $topicId
     * @return void
     */
    public function showOneTopic($topicId)
    {


        $em = $this->em();
        $topicRepo = $em->getRepository(Topic::class);
        
        try {
            $topic = $topicRepo->findOneBy(["id" => $topicId]);
            $forum=$topic->getForumId();
            $answers=$topic->getAnswers()->toArray();
            $autor=$topic->getUserId();
        } catch (\Throwable $th) {
            header(HTTP_REDIRECT . "/server-indisponible");
            exit();
        }
        $token = $_SESSION["token"] = password_hash(date("his"), PASSWORD_BCRYPT);
        $this->render("forum/one_topic", compact("topic","autor","answers" ,"forum","token"));
    }

    /**
     * show topic create forum
     * @param int $id
     * @return void
     */
    public function showTopicForm($forumId){
        $forumRepo = $this->em()->getRepository(Forum::class);
        $forum = $forumRepo->findOneBy(["id" => $forumId]);
        if(!$forum){
            $_SESSION["mgs"]="Ce forum n'existe pas.";
            header("Location:".$_SERVER["HTTP_REFERER"]);
            die();
        }
        $token = $_SESSION["token"] = password_hash(date("his"), PASSWORD_BCRYPT);
        $this->render("forum/Topic_create", compact("forum", "token"));

    }

    /**
     * show form to update topic
     * @param int $topicId
     * @return void
     */
    public function showTopicUpdateForm($topicId)
    {

        $em = $this->em();
        $topicRepo = $em->getRepository(Topic::class);
        try {
            $topic = $topicRepo->findOneBy(["title" => $topicId]);
        } catch (\Throwable $th) {
            header(HTTP_REDIRECT . "/server-indisponible");
            exit();
        }
        $token = $_SESSION["token"] = password_hash(date("his"), PASSWORD_BCRYPT);
        $this->render("forum/update_topic", compact("topic", "token"));
    }
    /**
     * show form to update answer
     * @param int $topicId
     * @param int  $answerId
     * @return void 
     */
    public function showAnswerUpdateForm($topicId, $answerId)
    {
        $em = $this->em();
        $topicRepo = $em->getRepository(Topic::class);
        $answerRepo = $em->getRepository(Answer::class);
        try {
            $topic = $topicRepo->findOneBy(["id" => $topicId]);
            $answer = $answerRepo->findOneBy(["topicId" => $topicId, "id" => $answerId]);
        } catch (\Throwable $th) {
            header(HTTP_REDIRECT . "/server-indisponible");
            exit();
        }
        if ($answer->getUserId()->getId() != $_SESSION["user"]["id"]) {

            $_SESSION["errors"][] = "Vous n'est pas l'auteur de cette reponse.";
            header("Location:" . $_SERVER["HTTP_REFERER"]);
            exit();
        }
        $token = $_SESSION["token"] = password_hash(date("his"), PASSWORD_BCRYPT);
        $this->render("forum/update_topic", compact("topic", "token"));
    }

    /**
     * topics pagination
     * @param array $topics
     * @return array
     */
    public function topicPaginate(array $topics)
    {
        $topicPerPage = 5;
        $pages = (int)ceil(count($topics) / $topicPerPage);
        if (!isset($_GET["page"])) {
            $p = 0;
            $topicsOffset = 0;
            $topicsLimit = $topicPerPage;
        } else {
            $p = (int)$_GET["page"];
            $topicsOffset = $topicPerPage * ($p - 1);
            $topicsLimit = $topicPerPage * $p;
        }
        $temp = [];
        for ($i = $topicsOffset; $i < $topicsLimit; $i++) {
            if (isset($topics[$i])) {
                $temp[] = $topics[$i];
            }
        }
        return [$temp, $pages];
    }

    /**
     * filter topics
     * @param array $topics
     * @return array
     */
    public function filterTopics($topics)
    {        $temp = [];
        if (isset($_GET["resole"])) {
            $filter = "getClose";
            $value = $_GET["resole"]=="false"?false:true;
            foreach ($topics as $topic) {
                if ($topic->$filter() == $value) {
                    $temp[] = $topic;
                }
            }
        } elseif (isset($_GET["answer"])) {
            $filter = "getAnswers";
            $value = 0;
            foreach ($topics as $topic) {
                if (count($topic->$filter()) == $value) {
                    $temp[] = $topic;
                }
            }
        }else{
            $temp=$topics;
        }
     return $temp;
       
    }
}
