<?php
require 'includes/db.php';
require 'includes/header.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];
$user_id = $_SESSION['user_id'];

// Fetch user details
$stmt = $conn->prepare("SELECT username FROM users WHERE id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
$username = $user['username'];

?>

<div class="container">
    <section class="dashboard-hero">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>You are logged in as a <strong><?php echo htmlspecialchars($role); ?></strong>.</p>
    </section>

    <section class="dashboard-content">
        <?php if ($role === 'student'): ?>
            <!-- Student Dashboard -->
            <div class="dashboard-card">
                <h3>Your Lessons</h3>
                <p>Continue your learning journey with interactive lessons and quizzes.</p>
                <a href="lessons.php" class="cta-button">View Lessons</a>
            </div>
            <div class="dashboard-card">
                <h3>Your Progress</h3>
                <p>Track your performance and see how far you've come.</p>
                <a href="progress.php" class="cta-button">View Progress</a>
            </div>
            <div class="dashboard-card">
                <h3>Join the Discussion</h3>
                <p>Collaborate with peers and educators in the forum.</p>
                <a href="forum.php" class="cta-button">Go to Forum</a>
            </div>
        <?php else: ?>
            <!-- Educator Dashboard -->
            <div class="dashboard-card">
                <h3>Student Progress</h3>
                <p>Monitor your students' performance and provide guidance.</p>
                <a href="progress.php" class="cta-button">View Progress</a>
            </div>
            <div class="dashboard-card">
                <h3>Manage Lessons</h3>
                <p>Create and update lessons to keep your students engaged.</p>
                <a href="lessons.php" class="cta-button">Manage Lessons</a>
            </div>
            <div class="dashboard-card">
                <h3>Engage in the Forum</h3>
                <p>Answer questions and guide discussions in the forum.</p>
                <a href="forum.php" class="cta-button">Go to Forum</a>
            </div>
        <?php endif; ?>
    </section>
</div>

<?php
require 'includes/footer.php';
?>