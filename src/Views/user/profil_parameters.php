<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/profil_header.css">
    <link rel="stylesheet" href="/css/profil_parameters.css">
   
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
<main class="profil-params">
     <div class="params-forms">
         <h4>Votre adresse e-mail</h4>
         <form action="/membres/profil/<?= $_SESSION["user"]["username"]?>" method="post">
        <label for="current-email">Adresse e-mail actuelle </label>
        <input type="text" name="" id="current-email" value="<?= $_SESSION["user"]["email"]?>" disabled>
        <label for="email"> Nouvel e-mail</label>
        <input type="email" name="email" id="email">
        <input type="submit" value="Envoyer">
         </form>
     </div>
     <div class="params-forms">
           <form action="/membres/profil/<?= $_SESSION["user"]["username"]?>" method="post">
           <h4>Changer votre mot de passe</h4>
         <label for="older-password">Ancien mot de passe</label>
         <input type="text" name="older-password" id="older-password">
        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" id="password">
        <label for="pasword_confirmd">Confirmer nouveau mot de passe</label>
        <input type="password" name="password_confirmd" id="password_confirmd">
        <input type="submit" value="Envoyer">    
           </form>
     </div>
     <div class="params-forms">
         <h4>Messages</h4>
         <form action="/membres/profil/<?= $_SESSION["user"]["username"]?>" method="post">
         <input type="checkbox" name="newsletter" id="newsletter" checked>
             <label for="newsletter" class="check-box">Recevoir des messages de Lamia</label>
             
             <input type="submit" value="Envoyer">
         </form>
     </div>
     <div class="account-delete">
         <h4>Suppimer votre compte</h4>
         <a href="#">Je veux supprimer mon compte.</a>
     </div>
</main>
<script src="/js/jquery3.6.0.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
</body>
</html>