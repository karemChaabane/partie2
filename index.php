<?php
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <div class="container">
        
        <h2>Liste des Étudiants</h2>
        <a href="ajouter.php">Ajouter</a>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Classe</th>
                <th>note1</th>
                <th>note2</th>
                <th>note3</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM etudiants");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['nom']) . "</td>
                    <td>" . htmlspecialchars($row['prenom']) . "</td>
                    <td>" . htmlspecialchars($row['email']) . "</td>
                    <td>" . htmlspecialchars($row['classe']) . "</td>
                    <td>" . htmlspecialchars($row['note1']) . "</td>
                    <td>" . htmlspecialchars($row['note2']) . "</td>
                    <td>" . htmlspecialchars($row['note3']) . "</td>
                    <td>
                        <a href='modifier.php?id=" . $row['id'] . "'>Modifier</a> |
                        <a href='supprimer.php?id=" . $row['id'] . "'>Supprimer</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
