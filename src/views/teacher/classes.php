<?php
global $pdo;

// Fetch teacher's assigned classes
$stmt = $pdo->prepare("SELECT class_name FROM classes WHERE teacher_id = :teacher_id");
$stmt->execute(['teacher_id' => $_SESSION['user_id']]);
$classes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h1>Your Classes</h1>";
echo "<ul>";
foreach ($classes as $class) {
    echo "<li>{$class['class_name']}</li>";
}
echo "</ul>";
?>
