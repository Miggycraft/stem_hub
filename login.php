<?php
require 'includes/db.php';
require 'includes/header.php';
require 'controllers/login.php'
?>

<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>