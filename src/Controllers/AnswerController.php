<?php 
 namespace Graph\Controllers;
 use Graph\Classes\Validator;
use Graph\Models\Answer;
use Graph\Models\Forum;
use Graph\Models\Topic;
 class AnswerController extends Controller{



  /**
   * create new answer
   * @param int $forumId
   * @param int $topicId
   * @return void
   */
  public function createAnswer($topicId,$forumId){
     
      
      ///$this->auth();
      if ($_SESSION["token"] != $_POST["token"]) {
        header(HTTP_REDIRECT);
        exit();
    }
    $errors = Validator::validate($_POST);
    if ($errors) {
        $_SESSION["errors"] = $errors;
        header("Location:" . $_SERVER["HTTP_REFERER"]);
        exit();
    }
    $em=$this->em();
    $topicRepo=$em->getRepository(Topic::class);
    $forumRepo=$em->getRepository(Forum::class);
   try {
    $topic=$topicRepo->findOneBy(["id"=>$topicId]);
    $forum=$forumRepo->findOneBy(["id"=>$forumId]);
   } catch (\Throwable $th) {
       die("probleme server");
   }
   extract($_POST);
   if(!$forum ||!$topic){
       die("forum inexistant");
  /*   $_SESSION["errors"] = $errors;
    header("Location:" . $_SERVER["HTTP_REFERER"]);
    exit(); */
   }
   $answer=new Answer();
   $answer->setContent($content)
   ->setCreatedAt(new \DateTime())
   ->setForumId($forum)
   ->setTopicId($topic);
   $em->persist($topic);
   $em->persist($forum);
   $em->persist($answer);
   $em->flush();



  }
 


 }