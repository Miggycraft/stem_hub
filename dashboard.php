<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

if ($role === 'student') {
    echo "<h1>Welcome, Student!</h1>";
    echo "<a href='lessons.php'>View Lessons</a>";
} else {
    echo "<h1>Welcome, Educator!</h1>";
    echo "<a href='progress.php'>View Student Progress</a>";
}
