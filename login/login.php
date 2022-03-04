
<!DOCTYPE html>
<html>
<head>
  <title>Connexion</title>
	<link rel="stylesheet" href="../index.css" />
	<header class="navbar">
       <nav class="navbar">
          <ul class="navbar-menu">
            <a class="lien" href="../index.php">Acceuil</a>
            <a style="float:right" class="lien" href="register.php">Inscription</a></li>
            <a style="float:right" class="lien" href="login.php">Connexions</a>
          </ul>
       </nav>
      </header>
</head>
<body>

<form class="box" action="../traitement/tlogin.php" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" required name="nom" placeholder="Nom">
<input type="text" class="box-input" required name="prenom" placeholder="Prénom">
<input type="submit" value="Connexion " name="valider" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
</form>

</body>
</html>