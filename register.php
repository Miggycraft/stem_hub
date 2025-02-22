<?php
require 'includes/db.php';
require 'includes/header.php';
require 'controllers/register.php';
?>

<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="role" required>
        <option value="student">Student</option>
        <option value="educator">Educator</option>
    </select>
    <button type="submit">Register</button>
</form>