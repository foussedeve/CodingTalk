<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="/css/main.css">
  
    <link rel="stylesheet" href="/css/profil_css.css">
    
    

    <title>Document</title>
</head>

<body>


    <!-- 
    <h1>page d'acceuil du site</h1>
    <p>
        
    </p>
  
    <?php dump($_SESSION) ?> -->

  <?php require_once VIEW_PATH."Partials/header.php" ?>
  <?php
        if (isset($_SESSION["mgs"])) {
            echo formatMgs($_SESSION["mgs"], "infos");
            unset($_SESSION["mgs"]);
        }

        ?>
 
    <main class="profil-main ">
        <section class="profil-picture ">
            <div class="profil-img">
                <img src="<?=$_SESSION["user"]["image"]?"/".$_SESSION["user"]["image"]:"/img/logo.jpg"?>" class="rounded-circle">
                <i class="fa fa-camera" id="picture-upload"></i>
                <h4 class="profil-username">Kaboré Fousseni</h4>
            </div>
            <div class="profil-icons">
                <a href="#" id="resources"> <i class="fas fa-camera"> </i><span>Ressource</span></a>
                <a href="/membres/profil/<?= $_SESSION["user"]["username"]?>"> <i class="fas fa-camera"></i> <span>Modifier profil</span></a>
            </div>
        </section>
        <section class="profil-infos">
            <div class="profil-intro">
                <ul>
                    <li><i class="fas fa-camera"></i><span>Kaboré Fousseni</span></li>
                    <li><i class="fas fa-camera"></i><span>Kaboré Fousseni</span></li>
                    <li><i class="fas fa-camera"></i><span>Kaboré Fousseni</span></li>
                    <li><i class="fas fa-camera"></i><span>Kaboré Fousseni</span></li>
                </ul>
            </div>
            <div class="profil-layout">
                <div class="user-actions">
                    <div>
                        <img src="/img/logo.jpg" class="rounded-circle">
                        
                        <a href=""><span>Nouveau projet </span></a>
                    </div>
                    <hr>
                    <div class="user-actions-links">
                        <a href="#"> <i class="fas fa-camera"></i><span>Essai</span></a>
                        <a href="#"> <i class="fas fa-camera"></i><span>Dernier sujet</span></a>
                    </div>
                </div>
                <div class="user-projects">
                    <div>
                        <span>Mes Projets</span>
                        <span><a href="/membres/<?= $_SESSION["user"]["username"]?>/projets"><i class="fas fa-camera"></i></a></span>
                    </div>
                    <hr>
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th> Titre</th>
                                <th>Description</th>
                                <th>Avancée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Conception de site web</td>
                                <td>Un site web pas comme les autres avec de super fonctionnalité</td>
                                <td>20% <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                            <tr>
                                <td>Conception de site web</td>
                                <td>Un site web pas comme les autres avec de super fonctionnalité</td>
                                <td>20% <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                            <tr>
                                <td>Conception de site web</td>
                                <td>Un site web pas comme les autres avec de super fonctionnalité</td>
                                <td>20% <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="user-projects">
                    <div>
                        <span>Mes resources</span>
                        <span><a href="/membres/<?= $_SESSION["user"]["username"]?>/ressources" title="ressources"><i class="fas fa-camera"></i></a></span>
                    </div>
                    <hr>
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th>Description</th>
                                <th>Lien</th>
                                <th>Source(site)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Un site web pas comme les autres avec de super fonctionnalité</td>
                                <td>Conception de site web</td>
                                <td>Openclassrooms <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                            <tr>
                                <td>Un site web pas comme les autres avec de super fonctionnalité
                                    Un site web pas comme les autres avec de super fonctionnalité
                                </td>
                                <td>Conception de site web</td>
                                <td>Openclassrooms Openclassrooms Openclassrooms <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                            <tr>
                                <td>Un site web pas comme les autres avec de super fonctionnalité</td>
                                <td>Conception de site web</td>
                                <td>Openclassrooms <a href="#"> <i class="fas fa-camera"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <section class="profil-others">
            <div class="user-bio">
                <h4>Ma Biographie</h4>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Aspernatur, ex sapiente! Ab laudantium tempore cupiditate?
                Atque, necessitatibus saepe quis quo
                officiis sit ratione minima distinctio eaque at dolor, tenetur harum?
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Aspernatur, ex sapiente! Ab laudantium tempore cupiditate?
                Atque, necessitatibus saepe quis quo
                officiis sit ratione minima distinctio eaque at dolor, tenetur harum?
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Aspernatur, ex sapiente! Ab laudantium tempore cupiditate?
                Atque, necessitatibus saepe quis quo
                officiis sit ratione minima distinctio eaque at dolor, tenetur harum?

            </div>
            <div class="user-account">
                <h4>Infos compte</h4>
                <span>Date de création:</span>
                <span>Dernière connexion:</span>
            </div>
        </section>
        <div class="picture-upload profil-form">
            
            <form action="/membres/uploader-file" method="post" enctype="multipart/form-data" class="profil-form-content">
            <span>&times;</span>
                <h4>Mettre à jour la photo de profil</h4>
                <hr>
                <input type="file" name="picture" id="">
                <input type="submit" value="Modifier">
            </form>
        </div>
        <div class="resources-form profil-form">
            <form action="" method="post" class="profil-form-content">
            <span>&times;</span>
                <h4>Ajouter une ressource</h4>
                <hr>
                <div>
                    <label for="description">Description</label>
                    <input type="text" name="description" id=" description" class="form-control" >
                </div>
                <div>
                    <label for="link">Lien</label>
                    <input type="text" name="link" id="link" class="form-control">
                </div>
                <div>
                    <label for="source">Source</label>
                    <input type="text" name="source" id="source" class="form-control">

                </div>
                <div>
                    <label for="status">Status</label>
                    <select name="status" id="status">
                        <option value="public">Public</option>
                        <option value="private">Privé</option>
                    </select>
                </div>
                <input type="submit" value="Ajouter">
            </form>
        </div>
       
    </main>
    <script src="/js/jquery3.6.0.js"></script>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/app.js"></script>
</body>

</html>