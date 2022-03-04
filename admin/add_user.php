<?php   
session_start();
if($_SESSION['role'] == 'admin' )
{

try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
$req = $bdd->query("SELECT metier FROM users ");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add User</title>
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

<form class="box" action="../traitement/tadd.php" method="post">
    <h1 class="box-title">Add user</h1>
	<input type="text" class="box-input" name="nom" placeholder="Nom" required />
    <input type="text" class="box-input" name="prenom" placeholder="Prénom" required />
    <input type="number" class="box-input" name="age" placeholder="Âge" required />
    <select class="box-input" name="type" >
			<option value="" disabled selected>Type de compte</option>
			<option value="admin">Admin</option>
			<option value="user">User</option>
	</select>
    <select class="box-input" name="metier" required>
    	<option value="" disabled selected>Metier</option>
            <?php
                while($row = $req->fetch(PDO::FETCH_NUM))
                    {
                        echo "<option>" . $row[0] . "</option>";
                    }
            ?>
	</select>
    <label for=""> Pays : </label>
    <input type="radio" required name="pays" value="france">France</input>
    <input type="radio" required name="pays" value="autre">Autre</input>


    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
</body>
<?php
}
else {
    header("location: ../erreur/connexion.html");;
}
    ?>

