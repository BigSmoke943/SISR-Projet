<?php
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
<?php   
session_start();
if($_SESSION['role'] == 'admin' )
{
    ?>
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
<form class="box" action="../traitement/tupdate.php" method="post" name="user">
    <h1 class="box-title">Modifier le compte d'un membre</h1>     
                        <select class="box-input" name="users" required>
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
            <input type="submit" name="submit" value="Modifier" class="box-button" />
</form>
</body>
</html>
<?php
}
else {
    header("location: ../erreur/connexion.html");;
}
    ?>