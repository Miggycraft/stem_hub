<?php
session_start();
require '../includes/db.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Ensure only educators can delete messages
if ($_SESSION['role'] !== 'educator') {
    header("Location: ../forum.php");
    exit();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message_id = $_POST['message_id'];

    // Delete the message from the database
    $stmt = $conn->prepare("DELETE FROM forums WHERE id = :message_id");
    $stmt->bindParam(':message_id', $message_id);
    $stmt->execute();
}

// Redirect back to the forum page
header("Location: ../forum.php");
exit();
?>