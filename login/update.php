<?php
session_start();
if(isset($_SESSION['id']))
{
$delai=3;

    	    // on essaye de se connecter à la base de donnée
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

$req = $bdd->query("SELECT * FROM users WHERE nom='$nom' AND prenom='$prenom' ");
$donnee = $req->fetch();
}

if (isset($donnee['nom']) AND isset($donnee['prenom']))  {
?>
<!DOCTYPE html>
<html>
<head>
<title>Modification</title>
<link rel="stylesheet" href="../index.css" />
			<header class="navbar">
      			<nav class="navbar">
          			<ul class="navbar-menu">
            			<a class="lien" href="../index.php">Acceuil</a>
						<a style="float:right" href="../logout.php">Déconnexion</a>
						<a style="float:right" href="index.php">Mon espace</a>
						<a style="float:right" href="update.php">Update user</a>
						
					</ul>
       			</nav>
      		</header>
</head>
<body>
<form class="box" action="../traitement/tupdate.php" method="post">
    <h1 class="box-title">Modifier son compte</h1>
	<input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Prénom" required />
    <input type="number" class="box-input" name="age" placeholder="Âge" required />
    <label for=""> Métier : </label>
            <select name="metier" required>
            	<option value="" disabled selected>Metier</option>
                    <option value="pdg">PDG</option>
                    <option value="cadre">Cadre</option>
                    <option value="fonctionnaire">Fonctionnaire</option>
                    <option value="ouvrier">Ouvrier</option> 
            </select>

            <label for=""> Pays : </label>
            <input type="radio" required name="pays" value="france">France</input>
            <input type="radio" required name="pays" value="autre">Autre</input>

		<div class="sucess">
		<p>Vous modifier votre compte : <?php    
    echo ' ' .$_SESSION['nom']. ' ' .$_SESSION['prenom']; ?> </p>
		</div>
    <input type="submit" name="submit" value="Modifier" class="box-button" />
</form>
</body>
</html>

<?php
}
else {
    header("location: ../erreur/erreur.html");;
}
    ?>