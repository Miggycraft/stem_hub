<?php
require 'includes/db.php';
require 'includes/header.php';
require 'controllers/register.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - STEM Learning Hub</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="auth-container">
        <div class="auth-box">
            <h2>Register</h2>
            <form method="POST" action="register.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="role" required>
                    <option value="student">Student</option>
                    <option value="educator">Educator</option>
                </select>
                <button type="submit" class="auth-button">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>

</html>

<?php
require 'includes/footer.php';
