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

<form action="/changer-mot-de-passe" method="post">
    <label for="password">Nouveau mot de passe</label>
    <input type="password" name="password" id="password">
    <label for="password_confird">Confimer votre nouveau mot de passe</label>
    <input type="password" name="password_confird" id="password_confird">
    <input type="submit" value="Reinitialiser">
</form>

</main>


<script src="/js/jquery3.6.0.js"></script>
<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/js/app.js"></script>
</body>