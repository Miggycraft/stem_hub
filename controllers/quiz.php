<?php
session_start();
require '../includes/db.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $lesson_id = $_POST['lesson_id'];
    $answers = $_POST['answer'];
    $quiz_ids = $_POST['quiz_id'];

    $total_score = 0;

    // Loop through each quiz question
    foreach ($quiz_ids as $quiz_id => $value) {
        $answer = $answers[$quiz_id];

        // Fetch the correct answer from the database
        $stmt = $conn->prepare("SELECT correct_answer FROM quizzes WHERE id = :quiz_id");
        $stmt->bindParam(':quiz_id', $quiz_id);
        $stmt->execute();
        $quiz = $stmt->fetch(PDO::FETCH_ASSOC);

        // Calculate the score for this question
        $score = ($answer === $quiz['correct_answer']) ? 1 : 0;
        $total_score += $score;

        // Insert the result into the progress table
        $stmt = $conn->prepare("INSERT INTO progress (user_id, lesson_id, quiz_id, score) VALUES (:user_id, :lesson_id, :quiz_id, :score)");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':lesson_id', $lesson_id);
        $stmt->bindParam(':quiz_id', $quiz_id);
        $stmt->bindParam(':score', $score);
        $stmt->execute();
    }

    // Display the result to the user
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Quiz Result</title>
        <link rel='stylesheet' href='../assets/styles.css'>
    </head>
    <body>
        <div class='container'>
            <section class='quiz-result'>
                <h2>Quiz Submitted Successfully!</h2>
                <p>Your score: <strong>$total_score/" . count($quiz_ids) . "</strong></p>
                <a href='../lessons.php' class='cta-button'>Back to Lessons</a>
            </section>
        </div>
    </body>
    </html>";
} else {
    // If the form was not submitted, redirect to the lessons page
    header("Location: ../lessons.php");
    exit();
}
