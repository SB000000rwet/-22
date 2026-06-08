<?php
session_start();

// Ініціалізація спроб
if (!isset($_SESSION["attempts"])) {
    $_SESSION["attempts"] = 0;
}

$error = "";

// Обробка форми
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = $_POST["login"] ?? "";
    $password = $_POST["password"] ?? "";

    // Правильні дані
    $correctLogin = "admin";
    $correctPassword = "1234";

    // Перевірка входу
    if ($login === $correctLogin && $password === $correctPassword) {

        $_SESSION["user"] = $login;
        $_SESSION["attempts"] = 0;

        header("Location: secure.php");
        exit;

    } else {

        $_SESSION["attempts"]++;

        $error = "❌ Невірний логін або пароль. Спроба: " . $_SESSION["attempts"];

        // Блокування після 3 спроб
        if ($_SESSION["attempts"] >= 3) {

            setcookie("blocked", "1", time() + 300); // 5 хвилин
            $_SESSION["attempts"] = 0;

            header("Location: blocked.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>

<h2>Вхід у систему</h2>

<form method="POST">
    <input type="text" name="login" placeholder="Логін"><br><br>
    <input type="password" name="password" placeholder="Пароль"><br><br>
    <button type="submit">Увійти</button>
</form>

<p style="color:red;">
    <?= $error ?>
</p>

</body>
</html>