<?php
namespace Graph\Classes;
use Intervention\Image\ImageManager;


class ImageUpload{
      private $savePath;
      private $autorizeFiles;
      private $fileSize;
      private $errors;
      private $newFilePath=array();
      /**
       * Init class propeties
       * @param $savePath string directory where file will save
       * @param $authorizeFiles array file exention what we authorize
       * @param $fileSize limit of file size 
       * @return void
       */
      public function __construct($savePath,$autorizeFiles=array("image/jpg","image/jpeg","image/png","image/gif"),$fileSize=1024*1024*3){
             $this->savePath=$savePath;
             $this->autorizeFiles=$autorizeFiles;
             $this->fileSize=$fileSize;
           // var_dump($_SERVER);
      }

      /**
       *  save file 
       * @param $filePath string
       * @return string or null if size or extension is not correct
       */
      public function uploadOne($filePath,$format,$width){
            $imageManager=new ImageManager();
            $image=$imageManager->make($filePath);
            
            if ($image->filesize()>$this->fileSize OR !in_array($image->mime,$this->autorizeFiles) ) {
                  return null;
            }
            $newFilePath=$this->savePath."/".date("Y_mhis").".".$format;
            $image->resize($width, null, function($constraint){
                  $constraint->aspectRatio();
              })
                 ->save($newFilePath,100);
            return $newFilePath ;
      }

      /**
       * upload files 
       * @param $filePaths array
       * @param $format string
       * @param $width int
       * @return $this or null if size or extension is not correct
       */
      public function uploadMany(array $filePaths, $format, $width){
            $files=array();
        foreach($filePaths as $filePath){
            
            $imageManager=new ImageManager();
            $image=$imageManager->make($filePath);
           
            
            
            if ($image->filesize()>$this->fileSize OR !in_array($image->mime,$this->autorizeFiles) ) {
                  return null;
            }
            $newFilePath=$this->savePath."/".date("Y_mhis").".".$format;
            $image->resize($width, null, function($constraint){
                  $constraint->aspectRatio();
              })
             
            ->save($newFilePath,100);
            
             array_push($files,$newFilePath);
        }
        $this->newFilePath=$files;
        return $this;
      }
      /**
       * return new files path
       * @return $this->newFilePath string or array 
       */
      public function getFilePath(){
            return $this->newFilePath;
      }


}