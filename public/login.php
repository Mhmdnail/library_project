<?php
require_once "../config/db_config.php";
require_once "../controllers/UserController.php";

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UserController($conn);
    $error = $controller->login($_POST['username'], $_POST['password']);
}
?>

<form method="POST">
    <h2>Login Perpustakaan</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
</form>
