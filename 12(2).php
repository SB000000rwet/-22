<?php
session_start();

// Захист сторінки
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Secure</title>
</head>
<body>

<h2>Вітаємо, <?= $_SESSION["user"] ?>!</h2>

<p>Ви успішно увійшли в систему.</p>

<form action="logout.php" method="POST">
    <button type="submit">Вийти</button>
</form>

</body>
</html>