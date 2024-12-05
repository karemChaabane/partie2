<?php
include 'connexion.php';

// Récupérer l'étudiant à modifier
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM etudiants WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$etudiant = $result->fetch_assoc();

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $classe = $_POST['classe'];
    $note1 = $_POST['note1'];
    $note2 = $_POST['note2'];
    $note3 = $_POST['note3'];

    // Préparer la requête de mise à jour
    $stmt = $conn->prepare("UPDATE etudiants SET nom = ?, prenom = ?, email = ?, classe = ?, note1 = ?, note2 = ?, note3 = ? WHERE id = ?");
    $stmt->bind_param("ssssdddi", $nom, $prenom, $email, $classe, $note1, $note2, $note3, $id);

    if ($stmt->execute()) {
        echo "Étudiant modifié avec succès ! <a href='index.php'>Retour à la liste</a>";
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
    <title>Modifier un Étudiant</title>

</head>
<body>
    <h1>Modifier un Étudiant</h1>
    <form method="POST">
        <label>Nom : </label><input type="text" name="nom" value="<?php echo htmlspecialchars($etudiant['nom']); ?>" required><br>
        <label>Prénom : </label><input type="text" name="prenom" value="<?php echo htmlspecialchars($etudiant['prenom']); ?>" required><br>
        <label>Email : </label><input type="email" name="email" value="<?php echo htmlspecialchars($etudiant['email']); ?>" required><br>
        <label>Classe : </label><input type="text" name="classe" value="<?php echo htmlspecialchars($etudiant['classe']); ?>" required><br>
        <label>note1 : </label><input type="number" step="0.01" name="note1" value="<?php echo $etudiant['note1']; ?>" required><br>
        <label>note2 : </label><input type="number" step="0.01" name="note2" value="<?php echo $etudiant['note2']; ?>" required><br>
        <label>note3 : </label><input type="number" step="0.01" name="note3" value="<?php echo $etudiant['note3']; ?>" required><br>

        <button type="submit">Modifier</button>
    </form>
</body>
</html>
