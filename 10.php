<?php

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $login = trim($_POST["login"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if (!preg_match("/^[a-zA-Z0-9]+$/", $login)) {
        $message = "❌ Логін може містити тільки літери та цифри!";
    }

    elseif ($password !== $confirmPassword) {
        $message = "❌ Паролі не збігаються!";
    }

    elseif (!filter_var($login, FILTER_SANITIZE_STRING)) {
        $message = "❌ Некоректний логін!";
    }

    else {
        $message = "✅ Реєстрація успішна!";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Реєстрація користувача</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 40px;
        background: #f4f4f4;
    }

    .form-box {
        background: white;
        padding: 20px;
        width: 300px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    input {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
    }

    button {
        width: 100%;
        padding: 10px;
        cursor: pointer;
        background: #007bff;
        color: white;
        border: none;
    }

    .message {
        margin-top: 15px;
        font-weight: bold;
    }
</style>

</head>
<body>

<div class="form-box">

<h2>Реєстрація</h2>

<form method="POST">

    <input
        type="text"
        name="login"
        placeholder="Логін"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Пароль"
        required
    >

    <input
        type="password"
        name="confirm_password"
        placeholder="Підтвердіть пароль"
        required
    >

    <button type="submit">
        Зареєструватися
    </button>

</form>

<div class="message">
    <?php echo $message; ?>
</div>

</div>

</body>
</html>