<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $lesson_id = $_POST['lesson_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO forums (user_id, lesson_id, message) VALUES (:user_id, :lesson_id, :message)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':lesson_id', $lesson_id);
    $stmt->bindParam(':message', $message);
    $stmt->execute();
}

$stmt = $conn->query("SELECT users.username, forums.message, forums.created_at FROM forums JOIN users ON forums.user_id = users.id ORDER BY forums.created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($messages as $message) {
    echo "<p><strong>{$message['username']}</strong> ({$message['created_at']}): {$message['message']}</p>";
}
?>

<form method="POST" action="forum.php">
    <input type="hidden" name="lesson_id" value="1"> <!-- Replace with dynamic lesson ID -->
    <textarea name="message" placeholder="Your message" required></textarea>
    <button type="submit">Post Message</button>
</form>