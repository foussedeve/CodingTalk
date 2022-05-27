<?php 
namespace Graph\Models;
class Model{
/**
 * @var $entityManager instance of doctrine entityManger
 */
protected $entityManager;
protected $repository;


public function __construct(){
      if (!$this->entityManager) {
        $this->entityManager =require "../config/bootstrap.php" ;
    }  
   
      
   
 
}


/**
 * return entityManager repository of class who are entity
 */
protected function getRepo(){ 

    return $this->entityManager->getRepository(get_class($this));
  }

    
    
}