<?php
session_start();
require 'includes/db.php';

if ($_SESSION['role'] !== 'educator') {
    header("Location: dashboard.php");
    exit();
}

$stmt = $conn->query("SELECT users.username, lessons.title, progress.score FROM progress JOIN users ON progress.user_id = users.id JOIN lessons ON progress.lesson_id = lessons.id");
$progress = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($progress as $record) {
    echo "<p>{$record['username']} scored {$record['score']} on {$record['title']}</p>";
}
