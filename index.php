<?php include 'config.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Liste des plantes</h2>
<a href="create.php">Ajouter une nouvelle plante</a>
<ul>
<?php
$stmt = $pdo->query("SELECT id, name FROM plants");
while ($row = $stmt->fetch()) {
    echo "<li><a href='detail.php?id={$row['id']}'>" . htmlspecialchars($row['name']) . "</a></li>";
}
?>
</ul>

<?php include 'includes/footer.php'; ?>
