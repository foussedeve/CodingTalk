<?php

namespace Graph\Controllers;

use Graph\Models\User;
use Graph\Models\Message;
use Graph\Classes\FormValidate;
use Graph\Classes\ImageUpload;
use Graph\Classes\MailSender;
use Graph\Classes\Validator;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Validation;


class UserController extends Controller
{



  /**
   * use to activate user account and render activate view
   * @param $taken string
   * @return void
   */
  public function activeAccount($token = null)
  {
    $user = new User();
    $em = require_once "../config/bootstrap.php";
    $userRepo=$em->getRepository(User::class);
    try {
      if ((isset($token) && !empty($token))) {
        $user = $userRepo->findOneBy(["token" => $token]);
        if ($user) {
          $this->render("user/activate");
        } else {
          header(HTTP_REDIRECT);
        }
      } else {

        if ((isset($_POST["email"]) && FormValidate::isEmail($_POST["email"]))) {
          $user = $userRepo->findOneBy(["email" => $_POST["email"], "activate" => 0]);
          if ($user) {
            $user->setActivate(1)
            ->setToken(NULL);
            $em->persist($user);
            $em->flush($user);
          
            $_SESSION["mgs"] = "Bonjour ! " . $user->getUsername();
            $_SESSION["user"] = $user->toSession();

            header(HTTP_REDIRECT . "/membres/@" . $user->getUsername());
          } else {
            $_SESSION["mgs"] = "Vous n'avez pas encore de compte. Créer le donc !";
            header(HTTP_REDIRECT);
          }
        } else {
          $_SESSION["mgs"] = "Email invalide ............";

          header("Location:" . $_SERVER["HTTP_REFERER"]);
        }
      }
    } catch (\Throwable $th) {


      $_SESSION["mgs"] = "Le server est indisponible, veuillez contacter le webmaster";

      header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
  }
  /**
   * use to create user account if data are validate
   *@return void
   */
  public function singUpUser()
  {
    $em = require_once "../config/bootstrap.php";

    $formData = [];
    // Data validator
    $fromValidate = new FormValidate();
    extract($_POST);
    $errors = $fromValidate->isValideFrom($email, $password, $username);

    if (empty($errors)) {
   
      // verify if email or username are in database
      $users = User::findUsersBy($email, $username, $em);

      if (count($users) == 0) {
        // insert new user in database
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $token = strtr(password_hash($email . $passwordHash . $username, PASSWORD_BCRYPT), ["." => "e5dSn9"]);
        $user = new User();
        $user = $user->setEmail($email)
          ->setPassword($passwordHash)
          ->setUsername($username)
          ->setToken($token)
          ->setActivate(0);
        $em->persist($user);
        $em->flush();
// send mail account validation email to user
        $mail = new MailSender();
        $result = $mail->inscriptionMail($em, $user);
        $formData["succes"] = true;
// traiment after email sended
        if ($result) {
          $formData["succes"] = true;
          $formData["action"] = "Insciption réussie! Veuillez vérifié vos mails afin de valider votre inscription.";
        } else {
          $formData["succes"] = false;
          $formData["errors"] = ["Echec" => "Insciption échoué ! Impossible de vous envoyez l'e-mail de validation de votre compte, veuillez reessayez ou contactez l'administrateur."];
        }
      } else {
//  Data are using by another user
        $errors = [];

        foreach ($users as $user) {

          foreach ($user as $key => $value) {
            if ($value == $email) {
              $errors[$key] = "L'addresse email est déjà utilisé par un autre utilisateur.";
            } elseif ($value == $username) {
              $errors[$key] = "Nom d'utilisateur est déjà pris.Veuillez entrer un autre.";
            }
          }
        }

        $formData["succes"] = false;
        $formData["errors"] = $errors;;
      }
    } else {
      // form data are invalide
      $formData["succes"] = false;
      $formData["errors"] = $errors;

      ////echo json_encode($errors);
    }
    http_response_code(200);
    echo json_encode($formData);
    //}
  }

  /**
   * use to login user 
   *@return user User
   *@return void
   */
  public function logUser()
  {

    $em = require_once "../config/bootstrap.php";
    $userRepo = $em->getRepository(User::class);
    extract($_POST);
    try {
      $user = $userRepo->findOneBy(["email" => $email]);
      if ($user) {

        if (password_verify($password, $user->getPassword()) && $user->getActivate()) {

          $_SESSION["mgs"] = "Bonjour " . $user->getUsername();
          $_SESSION["user"] = $user->toSession();
          header(HTTP_REDIRECT . "/membres/@" . $data["username"]);
        } else {

          $_SESSION["mgs"] = "Email ou mot de passe n'est pas bons invalide";
          header(HTTP_REDIRECT);
        }
      } else {
        $_SESSION["mgs"] = "Email ou mot de passe invalide";
        header(HTTP_REDIRECT);
      }
    } catch (\Throwable $th) {

      $_SESSION["mgs"] = "Impossible de contacter le server";
      header(HTTP_REDIRECT);
    }
  }


  /**
   * send emailto change password
   * @return void
   */
  public function passwordForget()
  {
    $em = require_once "../config/bootstrap.php";
    $userRepo = $em->getRepository(User::class);

    if (isset($_SESSION["user"]["username"]) && !empty($_SESSION["user"]["username"])) {
      header(HTTP_REDIRECT . "/membres/@" . $_SESSION["user"]["username"]);
    }

    // request traiment where it get
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $this->render("user/password_forget");
    } else {
      extract($_POST);
      if (isset($email) && FormValidate::isEmail($email)) {
       
        try {

          $user = $userRepo->findOneBy(["email" => $email, "activate" => 1]);         
          if ($user) {
            $token=strtr( password_hash($user->getEmail(),PASSWORD_BCRYPT), ["." =>"e5dSn9"]);
            $user->setToken($token);  
            $em->persist($user);
            $em->flush();
// send password reset email
            $mail=new MailSender();          
            $response=$mail->passwordResetMail($em,$user);
            
            if ($response) {
              $_SESSION["mgs"] = "Votre a bien été pris en compte, veuillez véfifier votre boîte e-mail.";
            } else {
              $_SESSION["mgs"] = "Impossible vous envoyez l'e-mail de réinitialisation de mot de passe, veuillez contacter l'administrateur du site.";
            }
          } else {
            $_SESSION["mgs"] = "Votre e-mail est invalide, veuillez saisir un adresse e-mail valide.";
          }
        } catch (\Throwable $th) {
          $_SESSION["mgs"] = "Indisponible de traiter votre demande le server est indisponible, veuillez contacter l'administrateur du site.";
        }
      } else {
        $_SESSION["mgs"] = "L'addresse que vous avez entrez est invalide,veuillez saisir un adresse e-mail valide.";
      }

      //dump($_POST,$_SERVER);
      header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
  }

  /**
   * to change password
   * @param $token string
   * @return void
   */
  public function changePassword($token = null)
  {
    if (isset($_SESSION["user"]["username"]) && !empty($_SESSION["user"]["username"])) {
      header(HTTP_REDIRECT . "/membres/@" . $_SESSION["user"]["username"]);
    }
    $em = require_once "../config/bootstrap.php";
    $userRepo = $em->getRepository(User::class);
    // verify token alidate
    if ($token) {
      $_SESSION["token"] = $token;
      try {
        $user = $userRepo->findBy(["token" => $token]);
      } catch (\Throwable $th) {
        $_SESSION["mgs"] = "Server indisponible, contacter l'administrateur du site";
        header("Location:" . $_SERVER["HTTP_REFERER"]);
      }
    }
    // traiment request
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
      if ($user) {
        $this->render("user/password_change");
      } else {
        header(HTTP_REDIRECT);
      }
    } else {
      extract($_POST);
      if (isset($password) && FormValidate::isAphaNumDash($password)) {
        $user = $userRepo->findOneBy(["token" => $_SESSION["token"]]);
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $user->setPassword($passwordHash);
        $user->setToken(null);
        $em->persist($user);
        $em->flush();
        unset($_SESSION["token"]);


        // redirect user after change password 
        $data = [
          "id" => $user->getId(),
          "firstname" => $user->getFirstname(),
          "lastname" => $user->getLastname(),
          "email" => $user->getEmail(),
          "image" => $user->getImage(),
          "username" => $user->getUsername()
        ];
        $_SESSION["user"] = $data;
        $_SESSION["mgs"] = "Votre mot de passe à été modifié avec succès ";

        header(HTTP_REDIRECT . "/membres/@" . $data["username"]);
      } else {
        $_SESSION["mgs"] = "Mot de passe invalide,Il doit comporter les lettres, des chiffres et des tirets ";
        header("Location:" . $_SERVER["HTTP_REFERER"]);
      }
    }
  }
  /**
   * profil updated
   * @param $username string
   * @return void
   */
  public function updatedProfil($username)
  {
    $em = require_once "../config/bootstrap.php";
    $userRepo = $em->getRepository(User::class);


    if (isset($_SESSION["user"]["username"]) && $username == $_SESSION["user"]["username"]) {
      $val = Validator::validate($_POST);
      if (!$val) {
        try {
          $user = $userRepo->findOneBy(["username" => $username]);
          foreach ($_POST as $key => $value) {

            $method = "set" . ucfirst($key);
            if (method_exists($user, $method)) {
              // set username
              if (($key == "username" && $userRepo->findOneBy(["username" => $value])) && $value != $_SESSION["user"]["username"]) {
                $_SESSION["mgs"] = "Nom d'utilisateur Déjà pris, veuillez en choisir un autre.";
                header("Location:" . $_SERVER["HTTP_REFERER"]);
                break;
              } //set email
              elseif ($value != $_SESSION["user"]["email"] &&  ($key == "email" && $userRepo->findOneBy(["email" => $value]))) {
                $_SESSION["mgs"] = "Adresse e-mail déjà pris, veuillez utiliser un autre.";
                header("Location:" . $_SERVER["HTTP_REFERER"]);
                break;
              } // set password
              elseif ($key == "password") {
                $userPass = $userRepo->findOneBy(["username" => $username]);
                if (password_verify($_POST["older-password"], $userPass->getPassword())) {
                  $passwordHash = password_hash($value, PASSWORD_BCRYPT);
                  $user->$method($passwordHash);
                } else {
                  $_SESSION["mgs"] = "Mot de passe invalide, veuillez saisir le bon mot de passe.";
                  header("Location:" . $_SERVER["HTTP_REFERER"]);
                  break;
                }
              } else {
                $user->$method($value);
              }
            }
            $_SESSION["mgs"] = "Votre profil a bien été mis à jour.";
          };

          $em->persist($user);
          $em->flush();
          $data = [
            "id" => $user->getId(),
            "firstname" => $user->getFirstname(),
            "lastname" => $user->getLastname(),
            "email" => $user->getEmail(),
            "image" => $user->getImage(),
            "username" => $user->getUsername()
          ];
          $_SESSION["user"] = $data;
        } catch (\Throwable $th) {
          $_SESSION["mgs"] = "Server indisponible, contacter l'administrateur du site";
        }
      } else {
        $_SESSION["mgs"] = "Les données entrées sont invalide";
      }
    } else {
      //unset($_SESSION["user"]);
      $_SESSION["mgs"] = "Nom d'utilisateur invalide";
    }
    header("Location:" . $_SERVER["HTTP_REFERER"]);
  }

  /**
   * uplaod and saveuser profil picture
   * @return void
   */
  public function savePicture()
  {
    $em = require_once "../config/bootstrap.php";
    $userRepo = $em->getRepository(User::class);
    if (isset($_FILES["picture"]) && !$_FILES["picture"]["error"]) {
      // dump($_FILES["picture"]);
      $picture = new ImageUpload("img/files");
      $directory = $picture->uploadOne($_FILES["picture"]["tmp_name"], "jpg", 400);
      if ($directory) {
        $user = $userRepo->findOneBy(["id" => $_SESSION["user"]["id"]]);
        $user->setImage($directory);
        $em->persist($user);
        $em->flush();
        $data = [
          "id" => $user->getId(),
          "firstname" => $user->getFirstname(),
          "lastname" => $user->getLastname(),
          "email" => $user->getEmail(),
          "image" => $user->getImage(),
          "username" => $user->getUsername()
        ];
        $_SESSION["user"] = $data;
      } else {
        $_SESSION["mgs"] = "Le fichier nest pas une image ou est trop en grande max:2M";
      }
    } else {
      $_SESSION["mgs"] = "Le fichier est endomagé ou n'est pas une image";
    }
    header("Location:" . $_SERVER["HTTP_REFERER"]);
  }


  /**
   * show page to upadate user profil infos
   * @param $username string
   * @return void
   */
  public function showProfilUpdated($username)
  {
    if (isset($_SESSION["user"]["username"]) && $username == $_SESSION["user"]["username"]) {
      $this->render("user/profil_updated", compact("username"));
    } else {
      header(HTTP_REDIRECT);
    }
  }
  /**
   * show page form user profil_parameters
   * @param $username string
   * @return void
   */
  public function showUserParams($username)
  {

    if (isset($_SESSION["user"]["username"]) && $username == $_SESSION["user"]["username"]) {
      $this->render("user/profil_parameters", compact("username"));
    } else {
      header(HTTP_REDIRECT);
    }
  }
  /**
   * show page form user projects
   * @param $username string
   * @return void
   */
  public function showUserProjects($username)
  {
    if (isset($_SESSION["user"]["username"]) && $username == $_SESSION["user"]["username"]) {
      $this->render("user/profil_projects", compact("username"));
    } else {
      header(HTTP_REDIRECT);
    }
  }
  /**
   * show page form user resources
   * @param $username string
   * @return void
   */
  public function showUserResources($username)
  {

    if (isset($_SESSION["user"]["username"]) && $username == $_SESSION["user"]["username"]) {
      $this->render("user/profil_resources", compact("username"));
    } else {
      header(HTTP_REDIRECT);
    }
  }
}
