<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/password_forget.css">
   
   
    <title>Document</title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ?>
<?php

if (isset($_SESSION["mgs"])) {
    echo formatMgs($_SESSION["mgs"], "warning");
    unset($_SESSION["mgs"]);
}

?>
<main class="set-password">


   <div class="password-form">
   <h1>Vous avez oublié votre mot de passe ?</h1>
    <p>Entrez votre adresse e-mail ci-dessous et nous vous enverrons la marche à suivre.</br>
Si vous ne voyez pas notre e-mail, regardez dans votre dossier Spam.</p>
<form action="" method="post">
    <input type="email" name="email" id="email" placeholder="E-mail">
    <input type="submit" value="Envoyer ma demande">
</form>
   </div>
   <div class="password-img">
       <img src="/img/2022_01115901.png" alt="image">
   </div>
</main>


<script src="/js/jquery3.6.0.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
</body>