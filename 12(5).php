<?php
session_start();

// Очистка сесії
session_unset();
session_destroy();

// (опційно) видалити cookie блокування
setcookie("blocked", "", time() - 3600);

header("Location: index.php");
exit;