<?php
require 'includes/db.php';

$lesson_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM lessons WHERE id = :id");
$stmt->bindParam(':id', $lesson_id);
$stmt->execute();
$lesson = $stmt->fetch(PDO::FETCH_ASSOC);

echo "<h1>{$lesson['title']}</h1>";
echo "<p>{$lesson['content']}</p>";
echo "<video src='{$lesson['video_url']}' controls></video>";

$quiz_stmt = $conn->prepare("SELECT * FROM quizzes WHERE lesson_id = :lesson_id");
$quiz_stmt->bindParam(':lesson_id', $lesson_id);
$quiz_stmt->execute();
$quizzes = $quiz_stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($quizzes as $quiz) {
    echo "<h3>{$quiz['question']}</h3>";
    echo "<form method='POST' action='quiz.php'>";
    echo "<input type='radio' name='answer' value='A'> {$quiz['option_a']}<br>";
    echo "<input type='radio' name='answer' value='B'> {$quiz['option_b']}<br>";
    echo "<input type='radio' name='answer' value='C'> {$quiz['option_c']}<br>";
    echo "<input type='radio' name='answer' value='D'> {$quiz['option_d']}<br>";
    echo "<input type='hidden' name='quiz_id' value='{$quiz['id']}'>";
    echo "<input type='hidden' name='lesson_id' value='{$lesson_id}'>";
    echo "<button type='submit'>Submit Answer</button>";
    echo "</form>";
}
