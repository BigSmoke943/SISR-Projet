<?php 
session_start();
if(isset($_SESSION['id']))
{
$delai=3;
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
$nom2 = $_POST['nom'];
$prenom2 = $_POST['prenom'];
$age = $_POST['age'];
$metier = $_POST['metier'];
$pays = $_POST['pays'];

$req = $bdd->query("SELECT * FROM users WHERE nom='$nom' AND prenom='$prenom' ");
$donnee = $req->fetch();

$id = $donnee['id'];
	if (isset($donnee['nom']) AND isset($donnee['prenom'])) {

		$req = $bdd->prepare("UPDATE users SET nom=:nom, prenom=:prenom, age=:age, metier=:metier, pays=:pays WHERE id=:id");
		$req->execute(array('id' => $donnee['id'],
				'nom' => $nom2,
				'prenom' => $prenom2,
        		'age' => $age,
        		'metier' => $metier,
        		'pays' => $pays));


		echo "Mise à jour des données réussie, vous allez être redirigé.";
		header("Refresh: $delai; url=../login/login.php");
		}

}
?>