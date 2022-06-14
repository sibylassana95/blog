
<?php

$host='localhost';
$dbname='miniblog';
$username='root';
$password='siby';
    
try{
  $bdd=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);

}
catch(PDOException $e){
  die("impossible de se connecter à la base:" .$e->getMessage());
}

?>

