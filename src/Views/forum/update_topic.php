<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/topic.css">
    <title>Forum-modification du topic</title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ?>
 <main class="main-topic">
     <aside class="topic-aside"></aside>
     <section class="topic-container">
         <h1>formulaire de modification de topic</h1>

      



         
     <form action="forum/symfony/1" method="post">
<?php


if (isset($_SESSION["errors"])) {
   
    echo formatArrayMgs($_SESSION["errors"], "warning");
    unset($_SESSION["errors"]);
}

?>

    <input type="hidden" name="token" value=<?=$token?>>
     <div class="form-group">
     <label for="title">Titre</label>
    <input type="text" name="title" id="title" class="form-control" value="sssss">
     </div>
 
     <div class="form-group">
         <label for="descript">Sous-titre</label>
         <input type="text" name="description" id="" class="form-control" value="ssss">
     </div>
     <div class="form-group">
         <label for="tags">tag(s)séparés par une virgules (exemple:php,symfony,web)</label>
         <input type="text" name="tags" id="tags" class="form-control" value="s">
     </div>
     <div class="form-group">
         <label for="content">Texte</label>
         <textarea name="content" id="content" cols="30" rows="10" class="form-control" >dddd</textarea>
     </div>
     <input type="submit" value="Modifier">
</form>
    
     </section>


 </main>
    
</body>
</html>