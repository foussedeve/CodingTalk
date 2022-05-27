<?php 
namespace Graph\Classes;
use Graph\Models\User;
class MailSender{


/**
 *  send email after user register
 * @param $em entityManager
 * @return boolean
 */
public  function inscriptionMail($em,User $user){
    // format data form mail sender
       $data=[
           "token"=>"http://localhost:8000/activation/".$user->getToken(),
           "username"=>"Mr/Mlle ".ucfirst($user->getUsername()),
           "website"=>"Lamia",
           "websitelink"=>"http://Lamia.com",          
        ];
        $lattedir=implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"Mails"]);
        $imgdir=implode(DIRECTORY_SEPARATOR,[dirname(dirname(__DIR__)),"web","image"]);
        try { 
          
          $this->sendMail("contact@lamia.com",$user->getEmail(),$lattedir,"sign",$imgdir,$data);
      } catch (\Throwable $th) {
          $em->remove($user);
          $em->flush();
          return false;
      }
      return true;
   }


/**
 * send password reset email
 * @param $em entityManager
 * @param $user
 * @return boolean
 */
public function passwordResetMail($em,User $user){
 

      
    $data=[
        "token"=>"http://localhost:8000/changer-mot-de-passe/".$user->getToken(),
        "username"=>ucfirst($user->getUsername()),
        "website"=>"Lamia",
        "websitelink"=>"http://Lamia.com",
        
     ];
    
     $lattedir=implode(DIRECTORY_SEPARATOR,[dirname(__DIR__),"Mails"]);
    $imgdir=implode(DIRECTORY_SEPARATOR,[dirname(dirname(__DIR__)),"web","image"]);
   
   
    try { 
      
       $this->sendMail("contact@lamia.com",$user->getEmail(),$lattedir,"password",$imgdir,$data);
   } catch (\Throwable $th) {
        $user->setToken(null);
        $em->persist($this);
        $em->flush();
       return false;
   }
   return true;

}

/**
 * send mail with nette mail
 * @param $senderEmail string 
 * @param $destEmail string
 * @param $data array data to use in latte model array must key/value
 * @param $lattePath string directory where latte model is
 * @param $model string latte model name
 * @param $imgPath directory of image to use in latte model
 * @return bool
 */
public function sendMail($senderEmail,$destEmail,$lattePath,$model,$imgPath,$data=[]){
    $path=implode(DIRECTORY_SEPARATOR,[$lattePath,$model]);
    // created mail
     $latte = new \Latte\Engine;
     $mail=new \Nette\Mail\Message;
     $mail->setFrom($senderEmail)
	->addTo($destEmail)
	->setHtmlBody(
        $latte->renderToString($path.".latte", $data),
        $imgPath);
     
    // send mail with php mail sender
    $mailer = new \Nette\Mail\SendmailMailer;
    $mailer->send($mail);
    //$mailer->setSigner(new \Nette\Mail\DkimSigner($options));
   /*  $result=true;
    try {
        $mailer->send($mail);
    } catch (\Throwable $th) {
    $result=false;
    }
   
    return $result; */
        
}
}