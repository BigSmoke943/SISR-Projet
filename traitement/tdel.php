<?php
$delai=1;
$url= "Gestion.php";

    	    // on essaye de se connecter à la base de donnée
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
	 	die('Erreur : ' . $e->getMessage());
		}


if (isset($_POST['nom']) AND isset($_POST['prenom'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];

	$req = $bdd->query("SELECT * FROM users WHERE nom='$nom' AND prenom='$prenom' ");
	$donnee = $req->fetch();

	$id = $donnee['id'];

		$req = $bdd->prepare("DELETE FROM users WHERE id=:id");
		$req->execute(array('id' => $donnee['id']));
				echo "Suppression réussie, vous allez être redirigé.";
		header("Refresh: $delai; url=../admin");
}
?>