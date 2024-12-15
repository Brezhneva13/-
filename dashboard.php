<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Получение статистики
$stmt = $pdo->query("SELECT COUNT(*) AS total_users FROM users");
$total_users = $stmt->fetchColumn();

$stmt = $pdo->query("SELECT COUNT(*) AS total_requests FROM requests"); // Замените на вашу таблицу
$total_requests = $stmt->fetchColumn();
?>

<h1>Панель управления</h1>
<p>Количество пользователей: <?php echo $total_users; ?></p>
<p>Количество обращений: <?php echo $total_requests; ?></p>
