<?php
require 'includes/db.php';
require 'includes/header.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Fetch all lessons from the database
$stmt = $conn->query("SELECT * FROM lessons");
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <section class="lessons-hero">
        <h2>Explore STEM Lessons</h2>
        <p>Choose a lesson to start learning. Each lesson includes interactive content, quizzes, and real-world applications.</p>
    </section>

    <section class="lessons-list">
        <?php if (count($lessons) > 0): ?>
            <?php foreach ($lessons as $lesson): ?>
                <div class="lesson-card">
                    <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
                    <p><?php echo htmlspecialchars($lesson['description']); ?></p>
                    <a href="lesson.php?id=<?php echo $lesson['id']; ?>" class="cta-button">View Lesson</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No lessons available at the moment. Please check back later.</p>
        <?php endif; ?>
    </section>
</div>

<?php
require 'includes/footer.php';
?>