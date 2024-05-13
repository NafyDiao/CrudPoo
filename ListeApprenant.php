<?php
include_once 'connexion.php';
include_once 'Apprenant.php';

$apprenant = new Apprenant($conn);
$ListeApprenant = $apprenant->ListeApprenant();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Apprenants</title>
</head>
<body>
    <h1>Liste des Apprenants</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($ListeApprenant as $apprenant) { ?>
            <tr>
                <td><?php echo $apprenant['id']; ?></td>
                <td><?php echo $apprenant['nom']; ?></td>
                <td><?php echo $apprenant['prenom']; ?></td>
                <td><?php echo $apprenant['age']; ?></td>
                <td>
                    <a href="ModifierApprenant.php?id=<?php echo $apprenant['id']; ?>">Modifier</a>
                    <a href="SupprimerApprenant.php?id=<?php echo $apprenant['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="AjouterApprenant.php">Ajouter un Apprenant</a>
</body>
</html>
