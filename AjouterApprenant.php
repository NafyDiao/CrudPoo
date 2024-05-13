<?php
include_once 'connexion.php';
include_once 'Apprenant.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apprenant = new Apprenant($conn);
    $apprenant->AjouterApprenant($_POST['nom'], $_POST['prenom'], $_POST['age']);
    header("Location: ListeApprenant.php");
    exit();
}
?>

<h1>Ajouter un apprenant</h1>
<form method="post">
    Nom: <input type="text" name="nom"><br>
    Prénom: <input type="text" name="prenom"><br>
    Age: <input type="number" name="age"><br>
    <input type="submit" value="Ajouter">
</form>
