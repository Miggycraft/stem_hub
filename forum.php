<?php
require 'includes/db.php';
require 'includes/header.php';

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$selected_lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : '';

// Handle form submission for posting a new message
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lesson_id = $_POST['lesson_id'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO forums (user_id, lesson_id, message) VALUES (:user_id, :lesson_id, :message)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':lesson_id', $lesson_id);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    header("Location: forum.php?lesson_id=$lesson_id#message-list");
    exit();
}

// Fetch all lessons for the dropdown
$stmt = $conn->query("SELECT id, title FROM lessons");
$lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch forum messages for the selected lesson only
if ($selected_lesson_id) {
    $stmt = $conn->prepare("SELECT forums.id, users.username, lessons.title AS lesson_title, forums.message, forums.created_at 
        FROM forums 
        JOIN users ON forums.user_id = users.id 
        JOIN lessons ON forums.lesson_id = lessons.id 
        WHERE forums.lesson_id = :lesson_id 
        ORDER BY forums.created_at DESC");
    $stmt->bindParam(':lesson_id', $selected_lesson_id);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $messages = [];
}
?>

<div class="container">
    <section class="forum-hero">
        <h2>Discussion Forum</h2>
        <p>Join the conversation and collaborate with peers and educators.</p>
    </section>

    <section class="forum-content">
        <!-- Form to post a new message -->
        <div class="new-message">
            <h3>Post a New Message</h3>
            <form method="POST" action="forum.php?lesson_id=<?php echo htmlspecialchars($selected_lesson_id); ?>#message-list">
                <label for="lesson_id">Select Lesson:</label>
                <select name="lesson_id" id="lesson_id" required onchange="window.location.href='forum.php?lesson_id=' + this.value + '#message-list';">
                    <option value="" disabled selected>Select a lesson</option>
                    <?php foreach ($lessons as $lesson): ?>
                        <option value="<?php echo $lesson['id']; ?>" <?php echo ($lesson['id'] == $selected_lesson_id) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($lesson['title']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <label for="message">Your Message:</label>
                <textarea name="message" id="message" rows="4" required></textarea>
                <button type="submit" class="cta-button">Post Message</button>
            </form>
        </div>

        <!-- Display existing messages -->
        <div id="message-list" class="message-list">
            <h3>Recent Messages</h3>
            <?php if (count($messages) > 0): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="message-card">
                        <div class="message-header">
                            <span class="username"><?php echo htmlspecialchars($message['username']); ?></span>
                            <div class="timestamp-container">
                                <span class="timestamp"><?php echo htmlspecialchars($message['created_at']); ?></span>
                                <?php if ($role === 'educator'): ?>
                                    <form method="POST" action="controllers/delete_message.php" class="delete-form">
                                        <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="message-body">
                            <p><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No messages found for this lesson. Be the first to post!</p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php
require 'includes/footer.php';
?>