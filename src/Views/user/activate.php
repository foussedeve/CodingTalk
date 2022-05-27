<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">  
    <link rel="stylesheet" href="/css/activate.css">

    <title>Document</title>
</head>

<body>

    <div class="activate-form">
        <p>
            <?php
            if (isset($_SESSION["mgs"])) {
                echo formatMgs($_SESSION["mgs"], "infos");
                unset($_SESSION["mgs"]);
            }

            ?>
        </p>
        <form action="/activation" method="post" class="active-cpt ">
            <h1>Activez votre<br />compte</h1>
            <p>Entrez votre adresse e-mail pour activer votre compte.</p>

            <div class="input-content">

                <input type="email" class="" name="email" id="email" placeholder="Adresse Email">
                <button type="submit" class="btn  ">Activer</button>

            </div>

            <a href="">Confidentialités<i class="bi bi-lock-fill"></i></a>
        </form>
    </div>


</body>

</html>