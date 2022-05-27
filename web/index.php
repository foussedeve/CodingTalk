<?php
 if (!session_start()) {
       session_start();
} 
//session_destroy();

require "../vendor/autoload.php";

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
$rooter=new Graph\Classes\Router();
// Methods GET URLS
$rooter->routes("GET","/","Controller/showIndex")
       ->routes("GET","/deconnection","Controller/disconnexion")
       ->routes("GET","/membres/@[*:username]","Controller/showHome")
       ->routes("GET","/activation/[*:token]","UserController/activeAccount")
       ->routes("GET","/membres/profil/[*:username]","UserController/showProfilUpdated")
       ->routes("GET","/membres/[*:username]/parametres","UserController/showUserParams")
       ->routes("GET","/membres/[*:username]/projets","UserController/showUserProjects")
       ->routes("GET","/membres/[*:username]/ressources","UserController/showUserResources")
       ->routes("GET","/connexion/mot-de-passe-oublie","UserController/passwordForget")
       ->routes("GET","/changer-mot-de-passe/[*:token]","UserController/changePassword")
// Forum urls 
       ->routes("GET","/forums","FrontController/showForums")
       ->routes("GET","/forums/sujet/nouveau/forum=[i:id]","FrontController/showTopicForm")
       ->routes("GET","/forum/[*:slug]-[i:forumId]","FrontController/showOneForum")


       //->routes("GET","/forum/[*:forum_slug]/[i:topicId]/[*:topicSlug]","FrontController/showTopicUpdateForm")
       ->routes("GET","/forum/[*]/[i:topicId]-[*]","FrontController/showOneTopic")       
       //->routes("GET","/forum/[*:slug]/[i:id]","TopicController/closeTopic")        
       ->routes("POST","/forum/[*:slug]/[i:id]","TopicController/updateTopic")   
       ->routes("POST","/topic/post/[i:forumId]","TopicController/createTopic")
       ->routes("POST","/topic/answer/[i:topicId]-[i:forumId]","AnswerController/createAnswer") 
    
       

// METHODE POST URLS
       ->routes("POST","/inscription","UserController/singUpUser")
       ->routes("POST","/activation","UserController/activeAccount")
       ->routes("POST","/login","UserController/logUser")
       ->routes("POST","/connexion/mot-de-passe-oublie","UserController/passwordForget")
       ->routes("POST","/changer-mot-de-passe","UserController/changePassword")
       ->routes("POST","/membres/profil/[*:username]","UserController/updatedProfil")
       ->routes("POST","/membres/uploader-file","UserController/savePicture")
       ->routes("POST","/uploader-file","Controller/file")


;
       
$rooter->run("Graph\Controllers");

