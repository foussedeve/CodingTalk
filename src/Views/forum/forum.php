<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/forum.css">
    <title>Forum-<?=$forum->getTitle()?> Trouvez des solutions à vos problèmes en <?=$forum->getTitle()?> </title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ;
require_once VIEW_PATH."Partials/forums_nav.php" 
?>
 
<main class="main-forums">
    <aside class="forum-aside">
      <div class="new-topic">
          <a href="/forums/sujet/nouveau/forum=<?=$forum->getId()?>">+ Nouveau sujet</a>
      </div>
      <div class="forum-filter">
          <h4>Filtres</h4>
          <div>
              <a href="?resole=true" class="<?=isset($_GET["resole"])&&$_GET["resole"]=="true"?"active":null?>">Sujets résolus</a>
              <a href="?resole=false" class="<?=isset($_GET["resole"])&&$_GET["resole"]=="false"?"active":null?>">Sujets non résolus</a>
              <a href="?answer=0"class="<?=isset($_GET["answer"])?"active":null?>">Sujets sans réponses</a>
             <?php if(isset($_GET["resole"])||isset($_GET["answer"]))                   
              echo "<a href='/forum/".$forum->sluger()."-".$forum->getId()."'>Annuler filtre</a>";
             ?>
             
          </div>
      </div>
    </aside>
    <section class="forum-section">
        <h1><?= $forum->getTitle()?></h1>
        <div class=" pagination">
            <?php for($i=1;$i<=$pages;$i++):?>
                <a href="?page=<?=$i?>"><span class="<?=isset($_GET["page"])&&$i==(int)$_GET["page"]?"active":null?><?=!isset($_GET["page"])&&$i==1?"active":null?>"><?=$i?></span></a>
            <?php endfor;?>
        </div>
        <?php foreach($topics as $topic) :
            $user=$topic->getUserId();
            $answers=$topic->getAnswers();
            $tags=$topic->getTags();
            $lastMessage=$answers->last();                           
            ?>
  <div class="subject-card">
      <div class="subject-body">
          <div class="tags">
              <?php if(count($topic->getTags()))
              foreach($tags as $tag):?>
              <span><?= $tag?></span>
              <?php endforeach ?>
          </div>
          
          <a href="/forum/<?=$forum->sluger()."/".$topic->getid()."-".$topic->sluger()?>"><h1 class="title"><?=ucfirst($topic->getTitle())?></h1></a>
        <p>par <span class="autor"><?=ucfirst($user->getUsername())?></span></p>
      </div>
      <div class="subject-details">
          <div class="answers-count"><?=$answers->count()<=1?$answers->count()." Message":$answers->count()." Messages"?></div>
          <?php if($lastMessage):?>
          <div class="last-card"><?=$answers->last()?>
            <span>Dernier réponse</span>
            <span><?=$lastMessage->createAt()?></span>
            <span>par <?=$lastMessage->getUserId()->getUsername()?> </span>
        
        </div>
          <?php endif?>
      </div>
  </div>
  <?php endforeach;?>
    </section>
  

</main>   
</body>
</html>