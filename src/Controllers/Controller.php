<?php

namespace Graph\Controllers;

use Graph\Classes\ImageUpload;

class Controller
{
  public function showIndex()
  { 
    if(isset($_SESSION["user"]["username"])&& !empty($_SESSION["user"]["username"])){
      header(HTTP_REDIRECT . "/membres/@" .$_SESSION["user"]["username"]);
     }
    $this->render("index");
  }

  public function showHome($username)
  {
    
    
     if (isset($_SESSION["user"]["username"])&& $_SESSION["user"]["username"] == $username) {
      $this->render("user/profil", [
        "username" => $username
      ]);
    } else {

      $_SESSION["mgs"]="vous devez être connecté pour acceder à cette page";
      header(HTTP_REDIRECT);
    } 
  }
/**
 * Disconnecting user
 * @return void
 */
public function disconnexion(){
 unset($_SESSION["user"]);
 $_SESSION["mgs"]="Vous être maintenant déconnecter !";
  header(HTTP_REDIRECT);
}


  /**
   * this methode is use to render view
   * @param $filePath string
   * @param $data array ["data"=>$data]
   */
  public function render($filePath, $data = array())
  {
    extract($data);
    require VIEW_PATH . $filePath . ".php";
  }



  /**
   * 
   */
  public function file(){
  /*  $bat=[];
   foreach($_FILES as $val){
      $bat[]=$val["tmp_name"];
      /* foreach($val as $v){
       
        $bat[]=$v;
      } */
      $uplod=new ImageUpload("img/files");
   $res=$uplod->uploadMany([$_FILES["file"]["tmp_name"]],"png",450); 
   }
  /*  echo json_encode($bat);
   ;
   exit();  */ 
   
   /**
    * @return void
    */
    public function auth(){
      if(!isset($_SESSION["user"])){
        $_SESSION["mgs"]="Veuillez vous connecter afin poster un nouveau sujet.";
        header(HTTP_REDIRECT);
        exit();
      }
    }
    /**
     * @return entityManager
     */
    public function em(){
      return $em=require_once "../config/bootstrap.php";
    }

  }

