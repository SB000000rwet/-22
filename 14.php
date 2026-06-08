<?php
session_start();

$correctLogin = "admin";
$correctPassword = "php123";

if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["login"])) {

    $login = $_POST["login"];
    $password = $_POST["password"];

    if ($login === $correctLogin && $password === $correctPassword) {
        $_SESSION["user"] = $login;
    } else {
        $message = "❌ Невірний логін або пароль";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Simple Login</title>
<style>
    body {
        font-family: Arial;
        margin: 40px;
    }

    .box {
        width: 300px;
        padding: 20px;
        border: 1px solid #ccc;
    }

    input {
        width: 100%;
        margin: 5px 0;
        padding: 8px;
    }

    button {
        padding: 8px;
        width: 100%;
        margin-top: 10px;
    }

    .error {
        color: red;
    }

    .success {
        color: green;
    }
</style>
</head>
<body>

<div class="box">

<?php if (!isset($_SESSION["user"])): ?>

    <h3>Вхід</h3>

    <form method="POST">

        <input type="text" name="login" placeholder="Логін" required>

        <input type="password" name="password" placeholder="Пароль" required>

        <button type="submit">Увійти</button>

    </form>

    <p class="error"><?= $message ?></p>

<?php else: ?>

    <h2 class="success">Вітаємо, <?= $_SESSION["user"] ?>!</h2>

    <p>Ваш IP: <?= $_SERVER["REMOTE_ADDR"] ?></p>

    <form method="POST">
        <button type="submit" name="logout">Вийти</button>
    </form>

<?php endif; ?>

</div>

</body>
</html>