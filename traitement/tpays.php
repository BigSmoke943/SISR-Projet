<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}
$pays = $_POST['pays'];

$req = $bdd->query("SELECT * FROM users WHERE pays='$pays'");

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
            <a style="float:right" href="../admin/index.php">Mon espace</a>
            <a style="float:right" href="../admin/add_user.php">Add user</a>
            <a style="float:right" href="../admin/update_user.php">Update user</a>
            <a style="float:right" href="../admin/del_user.php">Delete user</a>
          </ul>
       </nav>
      </header>

    </head>
    <body>
<form class="box" action="../admin/index.php" method="post">
    <h1 class="box-title">Resultat recherche d'utilisateurs par pays</h1>     
                        <select class="box-input" name="users">
                        <?php
                            echo "<option disabled selected> Liste des utilisateurs </option>\n";
                            while($row = $req->fetch(PDO::FETCH_NUM))
                            {
                                echo "<option >" . $row[1] ." ". $row[2] ." ". $row[3] . " Ans". "</option>\n";
                            }
                        ?>
                        </select>

                            <br>
            <input type="submit" name="submit" value="Retour en arrière" class="box-button" />
</form>
</body>
</html>
<?php
}
else {
    header("location: ../erreur/connexion.html");;
}
    ?>
