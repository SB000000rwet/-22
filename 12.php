<?php
session_start();

// Якщо користувач авторизований → secure
if (isset($_SESSION["user"])) {
    header("Location: secure.php");
    exit;
}

// Якщо заблокований через cookie → blocked
if (isset($_COOKIE["blocked"])) {
    header("Location: blocked.php");
    exit;
}

// Інакше → login
header("Location: login.php");
exit;