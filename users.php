<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<h1>Список пользователей</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Имя пользователя</th>
        <th>Действия</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td>
            <a href="edit_user.php?id=<?php echo $user['id']; ?>">Редактировать</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
