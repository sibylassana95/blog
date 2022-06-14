<?php
//Fonction qui recupere tous les articles
function getArticles()
{
    require('config/connect.php');
    $req= $bdd->prepare('SELECT id,title,date FROM articles ORDER BY id DESC');
  $req->execute();
    $data= $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}
//Fonction qui recupere un article
function getArticle($id)
{
    require('config/connect.php');
    $req= $bdd->prepare('SELECT * FROM articles WHERE id= ?');
  $req->execute(array($id));
    if($req->rowCount()==1)
    {
        $data=$req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else
        header('Location:index.php');
        $req->closeCursor();
}
//Fontion qui ajoute un commentaire
function addComment($articleid,$author,$comment)
{
 require('config/connect.php');
    $req= $bdd->prepare('INSERT INTO comments(articleid,author,comment,date)VALUES(?,?,?,NOW())');   
     $req->execute(array($articleid,$author,$comment));
    $req->closeCursor();
}
//Fonction qui recupere les commentaires
function getComments($id)
{
    require('config/connect.php');
    $req= $bdd->prepare('SELECT * FROM comments WHERE articleid = ?');
  $req->execute(array($id));
    $data= $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor(); 
}