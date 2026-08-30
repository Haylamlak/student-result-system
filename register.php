<?php
require_once 'config/db.php';
include 'includes/header.php';

$msg = '';
$msgClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($fullName) && !empty($email) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$fullName, $email, $hashedPassword]);
            $msg = "Registration successful! <a href='login.php'>Login here</a>";
            $msgClass = "success";
        } catch (PDOException $e) {
            $msg = "Error: Email is already registered.";
            $msgClass = "alert";
        }
    } else {
        $msg = "All fields are required.";
        $msgClass = "alert";
    }
}
?>

<main class="container">
    <div class="form-container">
        <h2>Create an Account</h2>
        <?php if ($msg): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form action="register.php" method="POST" id="registerForm">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="full_name" required>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>