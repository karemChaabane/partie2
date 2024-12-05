<?php
include 'connexion.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM etudiants WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Étudiant supprimé avec succès ! <a href='index.php'>Retour à la liste</a>";
} else {
    echo "Erreur : " . $stmt->error;
}
$stmt->close();
?>
