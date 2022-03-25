<?php
$delai=3;
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$age = $_POST['age'];
$metier = $_POST['metier'];
$pays = $_POST['pays'];

$req = $bdd->query("SELECT * FROM users WHERE nom='$nom' AND prenom='$prenom' ");
$donnee = $req->fetch();

$id = $donnee['id'];
	if (isset($donnee['nom']) AND isset($donnee['prenom'])) {


		// on mets à jour les informations de l'utilisateur dans la base de données

		$req = $bdd->prepare("UPDATE base SET nom=:nom, prenom=:prenom, age=:age, metier=:metier, pays=:pays WHERE ID=:ID");
		$req->execute(array('id' => $donnee['id'],
				'nom' => $nom,
				'prenom' => $prenom,
        		'age' => $age,
        		'metier' => $metier,
        		'pays' => $pays));


		echo "Mise à jour des données réussie, vous allez être redirigé.";
		header("Refresh: $delai; url=Gestion.php");
		}


else {
	header("location:Gestion_Modification_Traitement.php");
}


?>