<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO plants (name, species, sunlight, watering, pet_friendly, height_cm)
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['name'],
        $_POST['species'],
        $_POST['sunlight'],
        $_POST['watering'],
        isset($_POST['pet_friendly']) ? 1 : 0,
        $_POST['height_cm']
    ]);
    header("Location: index.php");
    exit;
}
include 'includes/header.php';
?>

<h2>Ajouter une plante</h2>
<form method="post">
    <input name="name" placeholder="Nom" required><br>
    <input name="species" placeholder="Espèce" required><br>
    <input name="sunlight" placeholder="Exposition" required><br>
    <input name="watering" placeholder="Fréquence d'arrosage" required><br>
    <label><input type="checkbox" name="pet_friendly"> Amie des animaux</label><br>
    <input type="number" name="height_cm" placeholder="Hauteur (cm)" required><br>
    <button type="submit">Enregistrer</button>
</form>

<?php include 'includes/footer.php'; ?>
