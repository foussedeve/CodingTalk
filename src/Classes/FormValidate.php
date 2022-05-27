<?php 
namespace Graph\Classes;
class FormValidate{
  private $errors=[];


/**
 * verify if form data are validate and not empty
 * @param $email string
 * @param $password string
 * @param $username string
 * @return array with errors
 */
public function isValideFrom($email,$password,$username){
     // Email validation
      if (empty($email)) {
          $this->errors["email"]="Veuillez bien renseigner votre address email.";
      }else {
        if (!self::isEmail($email)) {
            $this->errors["email"]="Addrees email invalide.";
        }
      }
    // passord validation
    if (empty($password)||strlen($password)<8) {
        $this->errors["password"]="Veuillez bien renseigner votre mot de passe,8 carartères minimum.";
    }else {
        if (!self::isAphaNumDash($password)) {
          $this->errors["password"]="Mot de passe invalide. Il doit comporter des lettres, des chiffres et des tirets";
      }
    }
    //username validation
    if (empty($username)||strlen($username)<3) {
        $this->errors["username"]="Veuillez bein renseigner votre nom d'utilisateur, 3 carartères minimum.";
    }else {
        if (!self::isAphaNum($username)) {
           $this->errors["usermane"]="Nom d'utilisateur invalide. Il doit comporter des lettres et des chiffres";
      }
    }

    return $this->errors;  
}
/**
 * verify if email as a pattern
 * @param $email string
 * @return bool 
 */
public static function isEmail($email){
   if (preg_match('/^[^\_\-\.]([a-z0-9\_\-\.]){1,25}\@([a-z0-9\_\-\.]){1,150}\.([a-z]){2,4}$/i',$email)) {
       return true;
   }
   return false;
}
/**
 * veriffy fi param is an aphanum
 * @param $data string 
 * @return bool
 */
public static function isAphaNum($data){
   if (preg_match('/^[^0-9]([a-z0-9])*$/i', $data)) {
      return true;
   }
   return false;
}
/**
 * veriffy fi param is an aphanum with space
 * @param $data string 
 * @return bool
 */
public static function isAphaSpace($data){
    if (preg_match('/^[^\s]([a-zîéèçêïë\s])*$/i', $data)) {
       return true;
    }
    return false;
 }
 /**
 * veriffy fi param is an aphanum with dashed and undercores
 * @param $data string 
 * @return bool
 */
public static function isAphaNumDash($data){
    if (preg_match('/^[^\s]([a-z0-9\.\-\_])*$/i', $data)) {
       return true;
    }
    return false;
 }
}