<?php
require_once('config/fonction.php');

$articles = getArticles();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Mon Blog</title>
         
         <link rel="stylesheet"type="text/css" href="style.css">
         <link rel="stylesheet" type="text/css" href="bootstrap.css">
    </head>
    <body>
       <div class="container">
       <header>
            <h1 class="titre"> Mon blog </h1>
       </header>
 <aside id="asside_gauche">      
<?php foreach($articles as $article):?>
  <h2><?= $article->title ?></h2>
  <time><?= $article->date?></time>
  <br /> <br />
  <a href="article.php?id=<?=$article->id ?>" class="btn btn-primary">Lire la suite</a>
   <?php endforeach;?>
   </aside> 
   </div>
   <script src="bootstrap.js"></script>
    </body>
</html>