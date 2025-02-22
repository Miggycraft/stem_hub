<?php
require 'includes/db.php';
require 'includes/header.php';
require 'controllers/login.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - STEM Learning Hub</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="auth-container">
        <div class="auth-box">
            <h2>Login</h2>
            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="auth-button">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Sign-Up</a></p>
        </div>
    </div>
</body>

</html>

<?php
require 'includes/footer.php';
