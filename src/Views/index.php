<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/index.css">
    <title>Le Tontata club</title>
</head>

<body>
    <div class="main">
        
        <div class="main-content">
            <div class="login-head">


                <h1>Codingtalk</h1>
                <p>Un lieu pour partager le savoir et mieux comprendre le développement web</p>
            </div>
            <div id="errors">
                <?php

                if (isset($_SESSION["mgs"])) {
                    echo formatMgs($_SESSION["mgs"], "warning");
                    unset($_SESSION["mgs"]);
                }

                ?>
            </div>
            <div class="login-content">

                <div class="login-items">
                    <div class="loader">
                        <div><strong>Inscription en cours ...</strong>
                            <img src="/img/loader.gif" alt="loader">
                        </div>
                    </div>


                    <div class="social-sign" id="social-sign">

                        <button type="button" class="btn btn-sign">Continuer avec Google</button>


                        <button type="button" class="btn btn-sign ">Continuer avec Facebook</button>


                        <button type="button" id="email-sign" class="btn btn-sign">S'inscrire avec votre addresse e-mail</button>

                        <p>
                            En continuant, vous reconnaissez avoir accepté les Conditions d'utilisation et la Politiques de Confidentialistée de Codingtalk
                        </p>
                    </div>
                    <form action="/inscription" method="post" id="form-sign">
                        <div class="form-group">
                            <label for="uername" class="form-label">Nom d'utilisteur</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="email" name="email">

                        </div>
                        <div class="form-group">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <span style="display:none;color:white;">Mot de passe incorrecte</span>
                        </div>

                        <div class="bnt-submit">

                            <button type="submit" id="btn" class="btn btn-outline-success">S'inscrire</button>
                        </div>

                    </form>

                </div>

                <div class="login-items">
                    <form action="/login" method="post">
                        <div class="form-group form-box ">
                            Se connecter
                        </div>
                        <div class="form-group">
                            <label for="InputEmail1" class="form-label">Adresse email</label>
                            <input type="email" class="form-control" id="InputEmail1" name="email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>

                        <div class="form-group">
                            <a href="/connexion/mot-de-passe-oublie">Mot de passe oublié ?</a>

                            <button type="submit" class="btn btn-outline-success">Connexion</button>
                        </div>

                    </form>
                </div>
            </div>
            <footer>
                <div class="footer-links">
                    <a href="#">à propos</a>
                    <a href="#"> confidentialistées</a>
                    <a href="#">conditions</a>
                    <a href="#">contact</a>
                    <a href="#">Facebook</a>
                    <a href="#">codingtalk 2022</a>
                </div>
            </footer>
        </div>
    </div>
    <script src="/js/jquery3.6.0.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>