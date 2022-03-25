<?php   
session_start();
if($_SESSION['role'] == 'admin' )
{ ?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../index.css" />
	<header class="navbar">
       <nav class="navbar">
          <ul class="navbar-menu">
            <a class="lien" href="../index.php">Acceuil</a>
			<a style="float:right" href="../logout.php">Déconnexion</a>
			<a style="float:right" href="index.php">Mon espace</a>
			<a style="float:right" href="add_user.php">Add user</a>
			<a style="float:right" href="update_user.php">Update user</a>
			<a style="float:right" href="del_user.php">Delete user</a>
          </ul>
       </nav>
      </header>

	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue !</h1>
		<p>C'est votre espace admin.</p>

		<p> <?php echo ' ' .$_SESSION['nom']. ' ' .$_SESSION['prenom']; ?> </p>
		</div>
		</div>
		<body>

		<form class="box" action="../traitement/tage.php" method="post" name="login">
			<h1 class="box-title">Recherche d'utilisateur par tranche d'age</h1>
				<input type="number" class="box-input" required name="min" placeholder="Exemple: 18">
				<input type="number" class="box-input" required name="max" placeholder="Exemple: 25">
				<input type="submit" value="Rechercher " name="valider" class="box-button">
		</form>
		<form class="box" action="../traitement/tpays.php" method="post" name="login">
				<h1 class="box-title">Recherche d'utilisateur par pays</h1>
				<input type="radio" name="pays" value="France" /> <label for="france">France</label>
        <input type="radio" name="pays" value="Autre" /> <label for="autre">Autre</label>
				<input type="submit" value="Rechercher " name="valider2" class="box-button">
		</form>
	</body>
</html>
<?php }
?>