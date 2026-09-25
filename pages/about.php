<?php include '../includes/header.php'; ?>

<main class="container">
    <div class="page-header">
        <h1>About the Developer & Project</h1>
        <p class="subtitle">Discover the background behind the Student Result Management System and its implementation.</p>
    </div>

    <!-- Developer Profile Card -->
    <div class="profile-card">
        <div class="profile-header">
            <h2>Developer Credentials</h2>
            <span class="badge badge-primary">Lead Developer</span>
        </div>
        <div class="profile-details">
            <p><strong>Full Name:</strong> Haylamlak Ayelgn Assefa</p>
            <p><strong>ID Number:</strong> 053/16</p>
            <p><strong>Department:</strong> Computer Science</p>
            <p><strong>Course:</strong> Web Programming (CoSc3091)</p>
        </div>
    </div>

    <!-- Personal Background & Statement -->
    <div class="about-section mt-3">
        <h3>Personal Background & Motivation</h3>
        <p>
            I am a Computer Science student with a strong ambition for building full-stack web applications and exploring modern cybersecurity practices. My technology background centers around modern web architectures, database management systems, and building robust, clean user interfaces.
        </p>
        <p class="mt-1">
            Driven by a desire to solve practical challenges in educational administration, I engineered this system to simplify grade distribution and improve data accuracy. My focus during development was to create a fast, secure, and intuitive web application adhering to industry best practices.
        </p>
    </div>

    <!-- Project Scope & Architecture -->
    <div class="about-section mt-3">
        <h3>Project Scope & Technical Highlights</h3>
        <ul class="styled-list">
            <li><strong>Frontend:</strong> Responsive layout constructed using HTML5, CSS3 CSS Variables, Flexbox, and JavaScript.</li>
            <li><strong>Backend Logic:</strong> Modular PHP scripts handling routing, input validation, and user session management.</li>
            <li><strong>Database Security:</strong> MariaDB/MySQL storage using PDO prepared statements to mitigate SQL injection risks.</li>
            <li><strong>Authentication:</strong> Secure password hashing via <code>PASSWORD_BCRYPT</code> algorithms.</li>
        </ul>
    </div>
</main>

<?php include '../includes/footer.php'; ?>