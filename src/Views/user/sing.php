<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <h1> Formulaire d'incription</h1>
    <form action="inscription" method="post">
       <div class="form-group">
           <label for="username"> Votre Pseudo :</label>
          <input type="text" name="username" id="username" class="form-control">
       </div>
       <div class="form-group">
           <label for="email"> Votre Email :</label>
           <input type="email" name="email" id="email" class="form-control">
       </div>
       <div class="form-group">
           <label for="passwod">Mot de passe :</label>
           <input type="password" name="password" id="password" class="form-control">
       </div>
       <div class="form-group">
           <label for="passconirmf">Confirmation de mot de passe :</label>
           <input type="password" name="" id="" class="form-control">
       </div>
       <button type="submit" class="btn">S'inscrire</button>
    </form>
</body>
</html>