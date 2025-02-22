<?php
require 'includes/db.php';

$stmt = $conn->query("SELECT * FROM lessons");
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($lessons as $lesson) {
    echo "<h2>{$lesson['title']}</h2>";
    echo "<p>{$lesson['description']}</p>";
    echo "<a href='lesson.php?id={$lesson['id']}'>View Lesson</a>";
}
