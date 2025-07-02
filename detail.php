<?php
include 'config.php';
include 'includes/header.php';

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM plants WHERE id = ?");
    $stmt->execute([$id]);
    $plant = $stmt->fetch();

    if ($plant) {
        echo "<h2>" . htmlspecialchars($plant['name']) . "</h2>";
        echo "<p>Espèce : " . htmlspecialchars($plant['species']) . "</p>";
        echo "<p>Exposition : " . htmlspecialchars($plant['sunlight']) . "</p>";
        echo "<p>Arrosage : " . htmlspecialchars($plant['watering']) . "</p>";
        echo "<p>Hauteur : " . $plant['height_cm'] . " cm</p>";
        echo "<p>Amie des animaux : " . ($plant['pet_friendly'] ? "Oui" : "Non") . "</p>";
        echo "<a href='edit.php?id={$plant['id']}'>Modifier</a> | ";
        echo "<a href='delete.php?id={$plant['id']}'>Supprimer</a>";
    } else {
        echo "<p>Plante non trouvée.</p>";
    }
}

include 'includes/footer.php';
?>
