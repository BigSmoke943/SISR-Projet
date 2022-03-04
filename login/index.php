<?php   
session_start();
if(isset($_SESSION['id']))
{
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Accueil</title>
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
		<div class="sucess">
		<h1>Bienvenue !</h1>
		<p>C'est votre espace perso : <?php    
    echo ' ' .$_SESSION['nom']. ' ' .$_SESSION['role']; ?> </p>
		</div>
	</body>
</html>
<?php
}
else {
    header("location: ../erreur/erreur.html");;
}
    ?>