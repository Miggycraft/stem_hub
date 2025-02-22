<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $lesson_id = $_POST['lesson_id'];
    $quiz_id = $_POST['quiz_id'];
    $answer = $_POST['answer'];

    $stmt = $conn->prepare("SELECT correct_answer FROM quizzes WHERE id = :quiz_id");
    $stmt->bindParam(':quiz_id', $quiz_id);
    $stmt->execute();
    $quiz = $stmt->fetch(PDO::FETCH_ASSOC);

    $score = ($answer === $quiz['correct_answer']) ? 1 : 0;

    $stmt = $conn->prepare("INSERT INTO progress (user_id, lesson_id, quiz_id, score) VALUES (:user_id, :lesson_id, :quiz_id, :score)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':lesson_id', $lesson_id);
    $stmt->bindParam(':quiz_id', $quiz_id);
    $stmt->bindParam(':score', $score);
    $stmt->execute();

    echo "Quiz submitted! <a href='lessons.php'>Back to Lessons</a>";
}
