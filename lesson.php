<?php
require 'includes/db.php';
require 'includes/header.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the lesson ID from the URL
if (!isset($_GET['id'])) {
    header("Location: lessons.php");
    exit();
}

$lesson_id = $_GET['id'];

// Fetch the lesson details from the database
$stmt = $conn->prepare("SELECT * FROM lessons WHERE id = :lesson_id");
$stmt->bindParam(':lesson_id', $lesson_id);
$stmt->execute();
$lesson = $stmt->fetch(PDO::FETCH_ASSOC);

// If the lesson doesn't exist, redirect to the lessons page
if (!$lesson) {
    header("Location: lessons.php");
    exit();
}

?>

<div class="container">
    <section class="lesson-hero">
        <h2><?php echo htmlspecialchars($lesson['title']); ?></h2>
        <p><?php echo htmlspecialchars($lesson['description']); ?></p>
    </section>

    <section class="lesson-content">
        <div class="lesson-video">
            <?php if (!empty($lesson['video_url'])): ?>
                <iframe src="<?php echo htmlspecialchars($lesson['video_url']); ?>" frameborder="0" allowfullscreen></iframe>
            <?php else: ?>
                <p>No video available for this lesson.</p>
            <?php endif; ?>
        </div>
        <div class="lesson-text">
            <h3>Lesson Content</h3>
            <p><?php echo nl2br(htmlspecialchars($lesson['content'])); ?></p>
        </div>
    </section>

    <section class="lesson-actions">
        <a href="quiz.php?lesson_id=<?php echo $lesson['id']; ?>" class="cta-button">Take Quiz</a>
    </section>
</div>

<?php
require 'includes/footer.php';
?>