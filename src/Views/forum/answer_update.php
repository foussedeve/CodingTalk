<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/forum/topic.css">
    <title>Forum-Symfony solution aux sujets</title>
</head>
<body>
<?php require_once VIEW_PATH."Partials/header.php" ?>
 <main class="main-topic">
     <aside class="topic-aside"></aside>
     <section class="topic-container">

         <form action="/topic/answer/5-5" method="post" class="answer-form">
             <h1>formulaire de reponse modification de reponse </h1>
         <?php  if (isset($_SESSION["errors"])) {
   
   echo formatArrayMgs($_SESSION["errors"], "warning");
   unset($_SESSION["errors"]);
}

?>
             <div class="forl-group">
                 <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
             </div>
             <input type="hidden" name="token" value=<?=$token?>>
             <input type="submit" value="Envoyez">
         </form>



     </section>


 </main>
    
</body>
</html>