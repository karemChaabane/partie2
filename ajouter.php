<?php
include 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $classe = $_POST['classe'];
    $note1 = $_POST['note1'];
    $note2 = $_POST['note2'];
    $note3 = $_POST['note3'];

    $stmt = $conn->prepare("INSERT INTO etudiants (nom, prenom, email, classe, note1, note2, note3) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssddd", $nom, $prenom, $email, $classe, $note1, $note2, $note3);

    if ($stmt->execute()) {
        echo "Étudiant ajouté avec succès ! <a href='index.php'>Retour à la liste</a>";
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Étudiant</title>

</head>
<body>
    <h1>Ajouter un Étudiant</h1>
    <form method="POST">
        <label>Nom : </label><input type="text" name="nom" required><br>
        <label>Prénom : </label><input type="text" name="prenom" required><br>
        <label>Email : </label><input type="email" name="email" required><br>
        <label>Classe : </label><input type="text" name="classe" required><br>
        <label>note1 : </label><input type="number" name="note1" required><br>
        <label>note2 : </label><input type="number" name="note2" required><br>
        <label>note3 : </label><input type="number" name="note3" required><br>

        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
