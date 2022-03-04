<!DOCTYPE html>
<html>
<head>
    <title>Incription</title>
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
<form class="box" action="../traitement/tregister.php" method="post">
    <h1 class="box-title">S'inscrire</h1>
	<input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Prénom" required />
    <input type="number" class="box-input" name="age" placeholder="Âge" required />
    <label for=""></label>
            <select class="box-input" name="metier" required>
                <option value="" disabled selected>Metier</option>
                    <option value="pdg">PDG</option>
                    <option value="cadre">Cadre</option>
                    <option value="fonctionnaire">Fonctionnaire</option>
                    <option value="ouvrier">Ouvrier</option> 
            </select>

            <label for=""> Pays : </label>
            <input type="radio" required name="pays" value="france">France</input>
            <input type="radio" required name="pays" value="autre">Autre</input>


    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
</body>
</html>
