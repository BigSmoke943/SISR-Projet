<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
$req = $bdd->query("SELECT nom, prenom FROM users ");
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
<form class="box" action="../traitement/tdel.php" method="post">
    <h1 class="box-title">Supprimer le compte d'un membre</h1>     
                        <select class="box-input" name="users" required>
                        <?php
                            echo "<option></option>\n";
                            while($row = $req->fetch(PDO::FETCH_NUM))
                            {
                                echo "<option>" . $row[0] ." ". $row[1] . "</option>\n";
                            }
                        ?>
                        </select>

                            <br>
            <input type="submit" name="submit" value="Supprimer" class="box-button" />
</form>
</body>
</html>
<?php
}
else {
    header("location: ../erreur/connexion.html");;
}
    ?>