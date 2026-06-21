<?php
require 'db.php';

if (isset($_POST['submit'])) {
    $stmt = $pdo->prepare("INSERT INTO students (student_name, email, student_number, year_of_study, batch_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['student_name'], $_POST['email'], $_POST['student_number'], $_POST['year_of_study'], $_POST['batch_name']]);
    header("Location: index.php");
    exit();
}

if (isset($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM students WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header("Location: index.php");
    exit();
}
?>