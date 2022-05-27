<nav class="forums-nav">
     <div>
     <a href="/forums"   class="<?= isset($active)&&$active=="forums"?"active-section" :null?>">Liste des forums</a>
     <a href=""  class="<?= isset($active)&&$active=="intervention"?"active-section" :null?>">Mes Interventions</a>
     <a href="" class="<?= isset($active)&&$active=="subject"?"active-section" :null?>">Sujets suivis</a>
     </div>
     <form action="" method="post">
       <input type="search" name="search" id="" placeholder="Rechercher sur le forum" >
       <input type="submit" value="res">
     </form>
   </nav>