<?php
require 'includes/header.php';
?>

<div class="container">
    <section class="hero">
        <h2>Welcome to the STEM Learning Hub</h2>
        <p>Your one-stop platform for interactive STEM learning. Explore lessons, take quizzes, and collaborate with peers to enhance your skills.</p>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="register.php" class="cta-button">Get Started</a>
        <?php else: ?>
            <a href="lessons.php" class="cta-button">Continue Learning</a>
        <?php endif; ?>
    </section>

    <section class="features">
        <h3>Why Choose STEM Learning Hub?</h3>
        <div class="feature-list">
            <div class="feature-item">
                <h4>Interactive Lessons</h4>
                <p>Engage with videos, simulations, and real-world applications.</p>
            </div>
            <div class="feature-item">
                <h4>Personalized Learning</h4>
                <p>Learn at your own pace with adaptive learning paths.</p>
            </div>
            <div class="feature-item">
                <h4>Collaborative Forums</h4>
                <p>Discuss ideas and solve problems with peers and educators.</p>
            </div>
        </div>
    </section>
</div>

<?php
require 'includes/footer.php';
?>