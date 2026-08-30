<?php include 'includes/header.php'; ?>

<main class="container">
    <div class="hero">
        <h1>Student Result Management Portal</h1>
        <p>Streamlining academic performance tracking, results retrieval, and grade management securely online.</p>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <a href="login.php" class="btn" style="width: auto; padding: 0.8rem 2rem;">Access Result Portal</a>
        <?php else: ?>
            <a href="dashboard.php" class="btn" style="width: auto; padding: 0.8rem 2rem;">View Dashboard</a>
        <?php endif; ?>
    </div>
</main>

<?php include 'includes/footer.php'; ?>