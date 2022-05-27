<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/profil_header.css">  
    <link rel="stylesheet" href="/css/profil_updated.css">
   
    <title>Document</title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ?>

<?php require_once VIEW_PATH."Partials/profil_header.php" ?>
<?php if (isset($_SESSION["mgs"])) {
            echo formatMgs($_SESSION["mgs"], "infos");
            unset($_SESSION["mgs"]);
        }

        ?>
<main class="updated-container">
    <div class="part-one">
 
   <img src="<?=$_SESSION["user"]["image"]?"/".$_SESSION["user"]["image"]:"/img/logo.jpg"?>" class="rounded-circle">
  
       
            <form action="" method="post">
                <label for="username">Votre Pseudo</label>
                <input type="text" name="username" id="username" value="<?= $_SESSION["user"]["username"]?? ""?>">
                <label for="bio">Biographie</label>
                <textarea name="bio" id="bio" cols="30" rows="10"><?= $_SESSION["user"]["bio"]?? ""?></textarea>
            <input type="submit" value="Envoyer">
</form>
           
    </div>
    <div class="part-two">
        <h4>À propos de moi</h4>
        <form action="" method="post">
            <div class="form-input">
               <div>
               <label for="firstname">Nom</label>
                <input type="text" name="firstname" id="firstname" value="<?= $_SESSION["user"]["firstname"]?? ""?>">
               </div>
               <div>
               <label for="lastname">Prénoms</label>
                <input type="text" name="lastname" id="lastname" value="<?= $_SESSION["user"]["lastname"]?? ""?>">
               </div>
            </div>
            <div class="form-input">
                <div>
                <label for="gender">Sexe</label>
                <select name="gender" id="gender">
                    <option value="M">M</option>
                    <option value="F"<?= $_SESSION["user"]["username"]=="F" ? "selected":null ?>>F</option>
                </select>
                </div>
                <div>
                    <label for="birthday">Date de naissance</label>
                    <input type="date" name="birthday" id="birthday" value="Jour/Mois/Année" >
                </div>
            </div>
            <div class="form-input">
                <div>
                    <label for="github">Github</label>
                    <input type="text" name="github" id="github" value="<?= $_SESSION["user"]["github"]?? ""?>">
                </div>
                <div>
                    <label for="facebook">Facebook</label>
                    <input type="text" name="facebook" id="facebook" value="<?= $_SESSION["user"]["facebook"]?? ""?>">
                </div>
                <div>
                    <label for="linkedin">LinkedIn</label>
                    <input type="text" name="linkedin" id="linkedin" value="<?= $_SESSION["user"]["linkedin"]?? ""?>">
                </div>
            </div>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</main>
<script src="/js/jquery3.6.0.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>