<?php
session_start();
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$age=$_POST['age'];
$metier=$_POST['metier'];
$pays=$_POST['pays'];

$req = $bdd->prepare('INSERT INTO users(nom, prenom, age, metier, pays) VALUES(:nom, :prenom, :age, :metier, :pays)');
$req->execute(array(
'nom' => $nom,
'prenom'=> $prenom,
'age' => $age,
'metier'=> $metier,
'pays'=> $pays
));
echo 'Vous vous ete bien inscrit !';
header("Refresh:2; url=../login/login.php");
?>

