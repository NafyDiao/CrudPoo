<?php
include_once 'connexion.php';
include_once 'Apprenant.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $apprenant = new Apprenant($conn);
    $apprenant->SupprimerApprenant($_GET['id']);
    header("Location: ListeApprenant.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un Apprenant</title>
</head>
<body>
    <h1>Supprimer un Apprenant</h1>
    <p>Voulez-vous vraiment supprimer l'apprenant <?php echo $row['nom'] . ' ' . $row['prenom']; ?> ?</p>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Confirmer">
    </form>
</body>
</html>