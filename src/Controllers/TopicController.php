<?php

namespace Graph\Controllers;

use DateTime;
use Graph\Classes\Validator;
use Graph\Models\Forum;
use Graph\Models\Topic;
use Graph\Models\User;

class TopicController extends Controller
{


    /**
     * Create new topic
     * 
     * @param int $$forumId
     * @return void
     */


    public function createTopic($forumId)
    {
 
        $this->auth();
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
        $em = $this->em();
        $userRepo = $em->getRepository(User::class);
        $forumRepo = $em->getRepository(Forum::class);
       try {
        $user = $userRepo->findOneBy(["id" => $_SESSION["user"]["id"]]);
        $forum = $forumRepo->findOneBy(["id" => $forumId]);
       } catch (\Throwable $th) {
         
       }
        if (!$forum) {
            $_SESSION["errors"][] = "Ce forum d'esxiste pas";
            header("Location:" . $_SERVER["HTTP_REFERER"]);
            exit();
        }
        extract($_POST);

        $topic = new Topic();
        $topic->setTitle($title)
            ->setContent($content)
            ->setDescription($description)
            ->setClose(false)
            ->setCreatedAt("20-05-2022")
            ->setTags(explode(",", trim($tags)));
        $forum->addTopic($topic);
        $user->addTopic($topic);
        $em->persist($user);
        $em->persist($forum);
        $em->persist($topic);
        $em->flush();
        unset($_SESSION["token"]);
        $_SESSION["mgs"] = "Votre sujet a bien étét public, Vous obtiendrai très bientôt une solution.";
        $location=$forum->sluger()."/".$topic->getId()."-".$topic->sluger();
        
        
       header(HTTP_REDIRECT."/forum/". $location);
        exit();
      
    }


    /**
     * Topic updated
     * @param int $id
     * @return void 
     */
    public function updateTopic($id){
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
        $em = $this->em();
        $topicRepo = $em->getRepository(Topic::class);
      try {
        $topic=$topicRepo->findOneBy(["id"=>$id]);
      } catch (\Throwable $th) {
          
      }
        if(!$topic){ 
            $_SESSION["errors"][] = "Ce topic d'esxiste pas";     
            header("Location:" . $_SERVER["HTTP_REFERER"]);
            exit();
        }
        extract($_POST);
        $topic->setTitle($title)
        ->setContent($content)
        ->setDescription($description)
        ->setClose(false)
        ->setTags(explode(",", trim($tags)));
  
    $em->persist($topic);
    $em->flush();

    $_SESSION["mgs"] = "Vos modifiaction ont bien été prises en compte .";
    unset($_SESSION["token"]);
    header(HTTP_REDIRECT . $$topic->forumId()->getTitle . "/" . $topic->getTitle());
    exit();
    }

    /**
     * close topic
     * @param int $id
     * @return void
     */
    public function closeTopic($id){
        $em = $this->em();
        $topicRepo = $em->getRepository(Topic::class);
        try {
            $topic=$topicRepo->findOneBy(["id"=>$id]);
        } catch (\Throwable $th) {
            
        }
        $topic->setClose(true);
    $em->persist($topic);
    $em->flush();
    $_SESSION["mgs"] = "Votre sujet est resolu .";
  
    header(HTTP_REDIRECT . $$topic->forumId()->getTitle . "/" . $topic->getTitle());
    }
}
