<?php
include_once 'connexion.php';
include_once 'Apprenant.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $apprenant = new Apprenant($conn);
    $apprenant->ModifierApprenant($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['age']);
    header("Location: ListeApprenant.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM apprenant WHERE id=?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $apprenant = $result->fetch_assoc();
}
?>

<h1>Modifier un apprenant</h1>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $apprenant['id']; ?>">
    Nom: <input type="text" name="nom" value="<?php echo $apprenant['nom']; ?>"><br>
    Prénom: <input type="text" name="prenom" value="<?php echo $apprenant['prenom']; ?>"><br>
    Age: <input type="number" name="age" value="<?php echo $apprenant['age']; ?>"><br>
    <input type="submit" value="Modifier">
</form>
