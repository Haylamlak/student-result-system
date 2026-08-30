<?php
require_once 'config/db.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$userRole = $_SESSION['role'];
$msg = '';
$msgClass = 'success';

// Handle Add New Result
if ($userRole === 'admin' && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    $studentId = $_POST['student_id'];
    $courseCode = trim($_POST['course_code']);
    $courseName = trim($_POST['course_name']);
    $marks = (int)$_POST['marks'];
    $grade = trim($_POST['grade']);

    $stmt = $pdo->prepare("INSERT INTO results (student_id, course_code, course_name, marks, grade) VALUES (?, ?, ?, ?, ?)");
    if ($stmt->execute([$studentId, $courseCode, $courseName, $marks, $grade])) {
        $msg = "Result uploaded successfully!";
    }
}

// Handle Delete Result (Admin Only)
if ($userRole === 'admin' && isset($_GET['delete_id'])) {
    $deleteId = (int)$_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM results WHERE id = ?");
    if ($stmt->execute([$deleteId])) {
        $msg = "Result deleted successfully!";
        $msgClass = "alert";
    }
}
?>

<main class="container">
    <h1>Dashboard</h1>
    <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong> (Role: <?php echo ucfirst($userRole); ?>)</p>

    <?php if ($userRole === 'admin'): ?>
        <div class="form-container" style="max-width: 100%; margin: 2rem 0;">
            <h3>Add New Student Result</h3>
            <?php if ($msg): ?><div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div><?php endif; ?>
            <form action="dashboard.php" method="POST">
                <input type="hidden" name="action" value="add">
                <div class="form-group">
                    <label>Select Student</label>
                    <select name="student_id" required>
                        <?php
                        $students = $pdo->query("SELECT id, full_name FROM users WHERE role='student'")->fetchAll();
                        foreach ($students as $s) {
                            echo "<option value='{$s['id']}'>ID: {$s['id']} - {$s['full_name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Course Code</label>
                    <input type="text" name="course_code" placeholder="e.g. CoSc3091" required>
                </div>
                <div class="form-group">
                    <label>Course Name</label>
                    <input type="text" name="course_name" placeholder="e.g. Web Programming" required>
                </div>
                <div class="form-group">
                    <label>Marks</label>
                    <input type="number" name="marks" min="0" max="100" required>
                </div>
                <div class="form-group">
                    <label>Grade</label>
                    <input type="text" name="grade" placeholder="e.g. A" required>
                </div>
                <button type="submit" class="btn">Publish Result</button>
            </form>
        </div>
    <?php endif; ?>

    <h2 style="margin-top: 2rem;">Academic Results</h2>
    <?php
    if ($userRole === 'admin') {
        $stmt = $pdo->query("SELECT r.*, u.full_name FROM results r JOIN users u ON r.student_id = u.id");
    } else {
        $stmt = $pdo->prepare("SELECT * FROM results WHERE student_id = ?");
        $stmt->execute([$userId]);
    }
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php if (count($results) > 0): ?>
        <table>
            <thead>
                <tr>
                    <?php if ($userRole === 'admin'): ?><th>Student</th><?php endif; ?>
                    <th>Course Code</th>
                    <th>Course Name</th>
                    <th>Marks</th>
                    <th>Grade</th>
                    <?php if ($userRole === 'admin'): ?><th>Actions</th><?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <?php if ($userRole === 'admin'): ?><td><?php echo htmlspecialchars($row['full_name']); ?></td><?php endif; ?>
                        <td><?php echo htmlspecialchars($row['course_code']); ?></td>
                        <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['marks']); ?></td>
                        <td><strong><?php echo htmlspecialchars($row['grade']); ?></strong></td>
                        <?php if ($userRole === 'admin'): ?>
                         <td>
                            <div class="action-buttons">
                                <a href="edit-result.php?id=<?php echo $row['id']; ?>" class="btn-sm btn-edit">Edit</a>
                                <a href="dashboard.php?delete_id=<?php echo $row['id']; ?>" class="btn-sm btn-delete" onclick="return confirm('Are you sure you want to delete this result?');">Delete</a>
                            </div>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="margin-top: 1rem; color: var(--text-muted);">No academic records found.</p>
    <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>