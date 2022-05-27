<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/all_forums.css">
    <title>Liste des forums</title>
    <?php   ?>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ;
$active="forums";
 
     require_once VIEW_PATH."Partials/forums_nav.php";
    
?>
<main class="main-forums">
  
    <section class="forums-container">

      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="/forum/<?=$forum->sluger()."/".$forum->getTopics()->last()->getid()."-".$forum->getTopics()->last()->sluger()?>">
        <div class="forum-body">
  <h4>Dernier message :</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="">
        <div class="forum-body">
  <h4>Dernier message :</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="">
        <div class="forum-body">
  <h4>Dernier message :</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="/forum/<?=$forum->sluger()."/".$forum->getTopics()->last()->getid()."-".$forum->getTopics()->last()->sluger()?>">
        <div class="forum-body">
  <h4>Dernier message</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="">
        <div class="forum-body">
  <h4>Dernier message</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
      <?php foreach ($forums as $forum) :?>
        <article class="forum-card">
      <a href="/forum/<?=$forum->sluger()."-".$forum->getId()?>">
      <div class="forum-header">
             <img src="<?= $forum->getImage()?>" alt="" class="forum-img rounded-circle">
             <div>
             <h4 class="forum-tilte"><?= $forum->getTitle()?></h4>
             <p class="forum-description"><?= $forum->getDescription()?> </p>
             </div>
         </div>        
      </a>
      <hr>
        <a href="">
        <div class="forum-body">
  <h4>Dernier message</h4>
  <p><?= ucfirst($forum->getTopics()->last()->getTitle())?></p>
         </div> 
        </a>
       </article>
       
      <?php  endforeach ; ?>
  
      
    </section>
</main>
</body>
</html>