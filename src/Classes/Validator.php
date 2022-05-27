<?php

namespace Graph\Classes;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Url;

use Symfony\Component\Validator\Validation;

class Validator
{

    /**
     * data validator
     *@param $data array like ,[key=>value]
     *
     */
    public static function validate($data)
    {
        $validator = Validation::createValidator();
        $errors = [];
        foreach ($data as $key => $value) {
            switch ($key) {
                    /**
                 * user properties validation
                 */
                case "email":
                    $val = $validator->validate($value, [new Email(), new NotBlank()]);
                    if (count($val)) {
                        $errors[$key] = "Votre adresse e-mail est invlaide,veuillez saisir un e-mail valide";
                    }
                    break;
                case "username":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new Length(["min" => 3]),
                            new NotBlank()
                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Nom d'utilisateur invalide";
                    }
                    break;

                case "firstname":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new Regex($pattern = "/^[a-z]*$/i"),

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Nom d'utilisateur invalide,uniquement des lettres";
                    }
                    break;
                case "lastname":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new Regex($pattern = "/^[a-z\s]*$/i")

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Nom d'utilisateur invalide,uniquement des lettres et des spaces";
                    }
                    break;
                case "github":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new url()

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Votre Github est invalide, il doit être un lien.";
                    }
                    break;
                case "facebook":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new url()

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Votre Facebook est invalide, il doit être un lien.";
                    }
                    break;
                case "linkedin":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new url()

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Votre LinkendIn est invalide, il doit être un lien.";
                    }
                    break;
                case "biography":
                    // contraints
                    $val = $validator->validate(
                        $value,

                        [
                            new Regex($pattern = "/^[a-z0-9\s'èçà]*$/i")

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Votre biographie doit comporter que des caractères alphanumeriques.";
                    }
                    break;
                    /**
                     * forum, project, resource,topicproperties validation
                     */
                case "title":
                    // contraints
                    $val = $validator->validate(
                        $value,
                        [
                            new Regex($pattern = "/^[a-z0-9\s']*$/i"),
                            new NotBlank()
                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Le titre doit comporter que lettres, des chiffres et des space.";
                    }
                    break;
                case "description":
                    // contraints
                    $val = $validator->validate(
                        $value,
                        [
                            new Regex($pattern = "/^[a-z0-9\s']*$/i"),

                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "La description ne doit comporter lettres, des chiffres et des space.";
                    }
                    break;


                case "tags":
                    // contraints
                    $val = $validator->validate(
                        $value,
                        [
                            new Regex($pattern = "/^([a-z0-9]*[,]*[a-z0-9]*)*$/i")
                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "tag(s)séparés par une virgules (exemple:php,symfony,web).";
                    }
                    break;
                case "content":
                    // contraints
                    $val = $validator->validate(
                        $value,
                        [

                            new NotBlank()
                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Le message ne doit pas être vide.";
                    }
                    break;
                case "link":
                    // contraints
                    $val = $validator->validate(
                        $value,
                        [

                            new NotBlank(),
                            new Url()
                        ]
                    );
                    if (count($val)) {
                        $errors[$key] = "Le message ne doit pas être vide.";
                    }
                    break;


                default:

                    break;
            }
        }
        return $errors;
    }
}
