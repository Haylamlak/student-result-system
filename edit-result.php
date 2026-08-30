<?php
require_once 'config/db.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$msg = '';

// Handle Update Result
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courseCode = trim($_POST['course_code']);
    $courseName = trim($_POST['course_name']);
    $marks = (int)$_POST['marks'];
    $grade = trim($_POST['grade']);

    $stmt = $pdo->prepare("UPDATE results SET course_code = ?, course_name = ?, marks = ?, grade = ? WHERE id = ?");
    if ($stmt->execute([$courseCode, $courseName, $marks, $grade, $id])) {
        header("Location: dashboard.php");
        exit;
    } else {
        $msg = "Failed to update result.";
    }
}

// Fetch existing result data
$stmt = $pdo->prepare("SELECT r.*, u.full_name FROM results r JOIN users u ON r.student_id = u.id WHERE r.id = ?");
$stmt->execute([$id]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    header("Location: dashboard.php");
    exit;
}
?>

<main class="container">
    <div class="form-container" style="max-width: 600px; margin: 2rem auto;">
        <h2>Edit Student Result</h2>
        <p>Student: <strong><?php echo htmlspecialchars($result['full_name']); ?></strong></p>
        <br>
        <?php if ($msg): ?><div class="alert"><?php echo $msg; ?></div><?php endif; ?>

        <form action="edit-result.php?id=<?php echo $id; ?>" method="POST">
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" name="course_code" value="<?php echo htmlspecialchars($result['course_code']); ?>" required>
            </div>
            <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" value="<?php echo htmlspecialchars($result['course_name']); ?>" required>
            </div>
            <div class="form-group">
                <label>Marks</label>
                <input type="number" name="marks" min="0" max="100" value="<?php echo htmlspecialchars($result['marks']); ?>" required>
            </div>
            <div class="form-group">
                <label>Grade</label>
                <input type="text" name="grade" value="<?php echo htmlspecialchars($result['grade']); ?>" required>
            </div>
            <button type="submit" class="btn">Update Result</button>
            <a href="dashboard.php" class="btn" style="background: var(--text-muted); margin-top: 10px; display: block;">Cancel</a>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>