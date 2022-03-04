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
$req = $bdd->query("SELECT * FROM users ");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Supprimer</title>
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

<form class="box" action="../traitement/tdel.php" method="post" name="login">
<h1 class="box-title">Supprimer le compte d'un utilisateur</h1>
<select class="box-input" name="users">
                        <?php
                            
                            while($row = $req->fetch(PDO::FETCH_NUM))
                            {
                                echo "<option disabled selected>" . $row[1] ." ". $row[2] . "</option>\n";
                            }
                            echo "<option disabled selected>Liste d'utilisateurs</option>";
                        ?>
                        </select>
<input type="text" class="box-input" required name="nom" placeholder="Nom">
<input type="text" class="box-input" required name="prenom" placeholder="Prénom">
<input type="submit" value="Supprimer " name="valider" class="box-button">
</form>
</body>
</html>
<?php
}
else {
    header("location: ../erreur/connexion.html");;
}
    ?>