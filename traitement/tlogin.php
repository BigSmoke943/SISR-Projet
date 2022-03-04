<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
}
catch (Exception $e)
{
 die('Erreur : ' . $e->getMessage());
}

$nom = $_POST['nom'];
$prenom = ($_POST['prenom']);

if (!empty($nom) && !empty($prenom)) 
{
    $req = $bdd->prepare('SELECT id, role FROM users WHERE nom = :nom AND prenom = :prenom');
    $req->execute(array('nom' => $nom,'prenom' => $prenom, ));
    $resultat = $req->fetch();

    if (!$resultat) 
    {
        echo 'Vos identifiants sont incorrects !';
    }
    else 
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['role'] = $resultat['role'];
            if ($resultat['role'] == 'admin')
            {
                header("location: ../admin/index.php");
            }
            else
                header("location: ../login/index.php");
        
} else {
    echo 'Veuillez remplir tous les champs !';
}
?>