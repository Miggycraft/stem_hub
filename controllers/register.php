<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);

    // TODO add one for duplicate entry
    // TODO add error shits
    if ($stmt->execute()){
        session_start();
        $_SESSION['user_id'] = $conn->lastInsertId();
        $_SESSION['role'] = $role;
        header("Location: dashboard.php");
        exit();
    }
}