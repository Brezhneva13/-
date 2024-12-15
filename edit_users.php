<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $username = $_POST['username'];
    // Добавьте другие поля по необходимости

    $stmt = $pdo->prepare("UPDATE users SET username = :username WHERE id = :id");
    $stmt->execute(['username' => $username, 'id' => $id]);

    header("Location: users.php");
    exit();
}

// Получение данных пользователя для редактирования
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <button type="submit">Сохранить</button>
</form>
