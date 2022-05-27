<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/topic-create.css">
    <title>Forum-<?=$forum->getTitle()?> Trouvez des solutions à vos problèmes en <?=$forum->getTitle()?> </title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ;
require_once VIEW_PATH."Partials/forums_nav.php" 
?>
 
<main class="main-forums">
    <aside class="forum-aside">
      <div class="topics-return">
          <a href="/forum/<?=$forum->sluger()?>-<?=$forum->getId()?>">Retour à la liste des sujets</a>
      </div>
     
       
    </aside>
    <section class="forum-section">
        <h1>Nouveau sujet</h1>
    <?php
//dump($forum,$forum->getTopics() ); ?>

<form action="/topic/post/<?=$forum->getId()?>" method="post">
<?php


if (isset($_SESSION["errors"])) {
   
    echo formatArrayMgs($_SESSION["errors"], "warning");
    unset($_SESSION["errors"]);
}

?>

    <input type="hidden" name="token" value=<?=$token?>>
     <div class="form-group">
     <label for="title">Titre <span>*</span></label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Titre de mon sujet" required>
     </div>
 
     <div class="form-group">
         <label for="descript">Sous-titre</label>
         <input type="text" name="description" id="" class="form-control">
     </div>
     <div class="form-group">
         <label for="tags">Tag(s)séparés par une virgules (exemple:php,symfony,web)</label>
         <input type="text" name="tags" id="tags" class="form-control">
     </div>
     <div class="form-group">
         <label for="content">Texte <span>*</span></label>
         <textarea name="content" id="content" cols="30" rows="10" class="form-control" ></textarea>
     </div>
     <input type="submit" value="Envoyer">
</form>
    </section>
  

</main>


    
</body>
</html>