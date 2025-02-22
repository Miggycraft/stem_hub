<?php
require 'includes/db.php';
require 'includes/header.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get the lesson ID from the URL
if (!isset($_GET['lesson_id'])) {
    header("Location: lessons.php");
    exit();
}

$lesson_id = $_GET['lesson_id'];

// Fetch the lesson details from the database
$stmt = $conn->prepare("SELECT title FROM lessons WHERE id = :lesson_id");
$stmt->bindParam(':lesson_id', $lesson_id);
$stmt->execute();
$lesson = $stmt->fetch(PDO::FETCH_ASSOC);

// If the lesson doesn't exist, redirect to the lessons page
if (!$lesson) {
    header("Location: lessons.php");
    exit();
}

// Fetch all quizzes for the lesson
$stmt = $conn->prepare("SELECT * FROM quizzes WHERE lesson_id = :lesson_id");
$stmt->bindParam(':lesson_id', $lesson_id);
$stmt->execute();
$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <section class="quiz-hero">
        <h2>Quizzes for <?php echo htmlspecialchars($lesson['title']); ?></h2>
        <p>Test your knowledge by answering the following questions.</p>
    </section>

    <section class="quiz-list">
        <form method="POST" action="controllers/quiz.php">
            <input type="hidden" name="lesson_id" value="<?php echo $lesson_id; ?>">
            <?php if (count($quizzes) > 0): ?>
                <?php foreach ($quizzes as $quiz): ?>
                    <div class="quiz-card">
                        <h3><?php echo htmlspecialchars($quiz['question']); ?></h3>
                        <div class="quiz-options">
                            <label>
                                <input type="radio" name="answer[<?php echo $quiz['id']; ?>]" value="A" required>
                                <?php echo htmlspecialchars($quiz['option_a']); ?>
                            </label>
                            <label>
                                <input type="radio" name="answer[<?php echo $quiz['id']; ?>]" value="B" required>
                                <?php echo htmlspecialchars($quiz['option_b']); ?>
                            </label>
                            <label>
                                <input type="radio" name="answer[<?php echo $quiz['id']; ?>]" value="C" required>
                                <?php echo htmlspecialchars($quiz['option_c']); ?>
                            </label>
                            <label>
                                <input type="radio" name="answer[<?php echo $quiz['id']; ?>]" value="D" required>
                                <?php echo htmlspecialchars($quiz['option_d']); ?>
                            </label>
                        </div>
                        <input type="hidden" name="quiz_id[<?php echo $quiz['id']; ?>]" value="<?php echo $quiz['id']; ?>">
                    </div>
                <?php endforeach; ?>
                <br>
                <button type="submit" class="cta-button">Submit Answers</button>
            <?php else: ?>
                <p>No quizzes available for this lesson.</p>
            <?php endif; ?>
        </form>
    </section>
</div>

<?php
require 'includes/footer.php';
?>