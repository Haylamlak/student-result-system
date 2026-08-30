<?php
require_once 'config/db.php';
include 'includes/header.php';

$msg = '';
$msgClass = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $message])) {
            $msg = "Message sent successfully!";
            $msgClass = "success";
        } else {
            $msg = "Failed to send message.";
            $msgClass = "alert";
        }
    } else {
        $msg = "Please fill in all fields.";
        $msgClass = "alert";
    }
}
?>

<main class="container">
    <div class="form-container">
        <h2>Contact Support</h2>
        <?php if ($msg): ?>
            <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
        <?php endif; ?>
        <form action="contact.php" method="POST" id="contactForm">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Message</label>
                <textarea name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn">Send Message</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>