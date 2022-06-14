<?php
if(!isset($_GET['id'])OR !is_numeric($_GET['id']))
    header('Location:index.php');
else{
    extract($_GET);
    $id=strip_tags($id);
    require_once('config/fonction.php');
    if(!empty($_POST))
{
    extract($_POST);
        $errors=array();
        $author=strip_tags($author);
        $comment=strip_tags($comment);
        if(empty($author))
            array_push($errors,'Entrez un Pseudo');
         if(empty($comment))
            array_push($errors,'Entrez un Commentaire');
         if(count($errors)== 0)
         {
           $comment=addComment($id,$author,$comment);  
             $success='votre commentaire a ete publié';
             unset($author);
             unset($comment);
         }
    
}
    $article= getArticle($id);
    $comments=getComments($id);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $article->title ?></title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>

<body>
    <a href="index.php" class="btn btn-primary">Retour aux articles</a>
    <div class="container">
        <aside id="asside_gauche">
            <h1><?= $article->title ?> </h1>
            <time><?= $article->date ?></time>
            <h3><?= $article->content ?></h3>
            <hr />
        </aside>
        <?php 
   
    if(isset($success))
        echo $success;
            if(!empty($errors)):?>
        <?php foreach($errors as $error):?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-danger">
                    <?= $error?>
                </div>
            </div>
        </div>

        <?php endforeach;?>
        <?php endif;?>
        <div class="row">
            <div class="col-md-6">
                <form action="article.php?id=<?= $article->id ?>" method="POST">
                    <p><label for="author">Pseudo:</label></p>
                    <input type="text" name="author" id="author" value="<?php if(isset($author))echo $author ?> " class="form-control">
                    <p><label for="comment">Commentaire</label></p>
                    <p><textarea name="comment" id="comment" cols="30" rows="5" class="form-control"><?php if(isset($comment))echo $comment ?></textarea></p>
                    <button type="submit" class="btn btn-success">Envoyer</button>
                </form>
            </div>
        </div>
        <footer>
            <h2>Commentaire</h2>
            <?php foreach($comments as $com):?>
            <h3><?= $com->author ?></h3>
            <time><?= $com->date ?></time>
            <p><?= $com->comment ?></p>
            <?php endforeach;?>
        </footer>

    </div>


    <script src="bootstrap.js"></script>
</body>

</html>
