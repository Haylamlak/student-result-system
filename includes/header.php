<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result Management System</title>
    <link rel="stylesheet" href="/student-result-system/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/student-result-system/index.php">Home</a></li>
                <li><a href="/student-result-system/pages/about.php">About</a></li>
                <li><a href="/student-result-system/pages/services.php">Services</a></li>
                <li><a href="/student-result-system/pages/contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/student-result-system/pages/dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="/student-result-system/pages/register.php">Register</a></li>
                    <li><a href="/student-result-system/pages/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>