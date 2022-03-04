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
$type=$_POST['type'];

$req = $bdd->prepare('INSERT INTO users(nom, prenom, age, metier, pays, role) VALUES(:nom, :prenom, :age, :metier, :pays, :type)');
$req->execute(array(
'nom' => $nom,
'prenom'=> $prenom,
'age' => $age,
'metier'=> $metier,
'pays'=> $pays,
'type'=> $type
));
echo 'Vous vous ete bien inscrit !';
header("Refresh:2; url=../login/login.php");
?>


