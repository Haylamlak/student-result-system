

 <?php
$host = "localhost";
$user = "YOUR_DB_USER";
$pass = "YOUR_DB_PASSWORD";
$dbname = "student_db";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>


