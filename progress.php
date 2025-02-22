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

?>

<div class="container">
    <section class="progress-hero">
        <h2>Progress Tracking</h2>
        <p>View your learning progress and performance.</p>
    </section>

    <section class="progress-content">
        <?php if ($role === 'educator'): ?>
            <!-- Educator View: All Students' Progress -->
            <h3>All Students' Progress</h3>
            <?php
            $stmt = $conn->query("
                SELECT users.username, lessons.title AS lesson_title, quizzes.question AS quiz_question, progress.score, progress.completed_at 
                FROM progress 
                JOIN users ON progress.user_id = users.id 
                JOIN lessons ON progress.lesson_id = lessons.id 
                JOIN quizzes ON progress.quiz_id = quizzes.id 
                ORDER BY progress.completed_at DESC
            ");
            $progress = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($progress) > 0): ?>
                <table class="progress-table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Lesson</th>
                            <th>Quiz Question</th>
                            <th>Result</th>
                            <th>Completed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($progress as $record): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($record['username']); ?></td>
                                <td><?php echo htmlspecialchars($record['lesson_title']); ?></td>
                                <td><?php echo htmlspecialchars($record['quiz_question']); ?></td>
                                <td style="color: <?php echo $record['score'] ? 'green' : 'red'; ?>;"><?php echo $record['score'] ? 'Correct' : 'Wrong'; ?></td>
                                <td><?php echo htmlspecialchars($record['completed_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No progress records found.</p>
            <?php endif; ?>
        <?php else: ?>
            <!-- Student View: Own Progress -->
            <h3>Your Progress</h3>
            <?php
            $stmt = $conn->prepare("
                SELECT lessons.title AS lesson_title, quizzes.question AS quiz_question, progress.score, progress.completed_at 
                FROM progress 
                JOIN lessons ON progress.lesson_id = lessons.id 
                JOIN quizzes ON progress.quiz_id = quizzes.id 
                WHERE progress.user_id = :user_id 
                ORDER BY progress.completed_at DESC
            ");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $progress = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($progress) > 0): ?>
                <table class="progress-table">
                    <thead>
                        <tr>
                            <th>Lesson</th>
                            <th>Quiz Question</th>
                            <th>Result</th>
                            <th>Completed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($progress as $record): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($record['lesson_title']); ?></td>
                                <td><?php echo htmlspecialchars($record['quiz_question']); ?></td>
                                <td style="color: <?php echo $record['score'] ? 'green' : 'red'; ?>;"><?php echo $record['score'] ? 'Correct' : 'Wrong'; ?></td>
                                <td><?php echo htmlspecialchars($record['completed_at']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>You have not completed any quizzes yet.</p>
            <?php endif; ?>
        <?php endif; ?>
    </section>
</div>

<?php
require 'includes/footer.php';
?>