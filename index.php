<?php include 'includes/header.php'; ?>

<main class="container">
    <!-- Hero Section -->
    <div class="hero">
        <span class="hero-badge">Official Portal</span>
        <h1>Student Result Management System</h1>
        <p>A secure, responsive, and streamlined platform designed for academic performance tracking, grade administration, and instant result retrieval.</p>
        
        <div class="hero-buttons">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="pages/login.php" class="btn btn-primary">Access Result Portal</a> <br> <br>
                <a href="pages/about.php" class="btn btn-outline">Learn More</a>
            <?php else: ?>
                <a href="pages/dashboard.php" class="btn btn-primary">Go to Dashboard</a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Core Features Grid -->
    <section class="mt-3">
        <h2 class="section-title">Key Capabilities</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="card-icon">🔒</div>
                <h3>Role-Based Access</h3>
                <p>Distinct portals for Administrators to manage grades and Students to view personalized academic records securely.</p>
            </div>

            <div class="service-card">
                <div class="card-icon">⚡</div>
                <h3>Instant Result Retrieval</h3>
                <p>Students can quickly search, filter, and view their subject-wise grades and GPA performance in real time.</p>
            </div>

            <div class="service-card">
                <div class="card-icon">📊</div>
                <h3>Full Record CRUD</h3>
                <p>Administrators have complete control to Create, Read, Update, and Delete academic records with strict database validation.</p>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>