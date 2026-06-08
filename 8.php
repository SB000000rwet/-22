<?php

$product1 = 250;
$product2 = 180;
$product3 = 120;

$totalPrice = $product1 + $product2 + $product3;

echo "<h3>1. Загальна вартість покупки</h3>";
echo "Товар 1: $product1 грн <br>";
echo "Товар 2: $product2 грн <br>";
echo "Товар 3: $product3 грн <br>";
echo "Загальна вартість: $totalPrice грн <br><br>";

$movies = [
    "Interstellar",
    "Inception",
    "Avatar",
    "The Matrix",
    "Titanic"
];

echo "<h3>2. Улюблені фільми</h3>";

foreach ($movies as $movie) {
    echo $movie . "<br>";
}

echo "<br>";

$user = [
    "login" => "admin",
    "password" => "12345",
    "email" => "admin@gmail.com"
];

echo "<h3>3. Дані користувача</h3>";

echo "Логін: " . $user["login"] . "<br>";
echo "Пароль: " . $user["password"] . "<br>";
echo "Email: " . $user["email"] . "<br><br>";

echo "<h3>4. Розрахунок знижки</h3>";

if ($totalPrice > 500) {

    $discount = $totalPrice * 0.10;

    $finalPrice = $totalPrice - $discount;

    echo "Знижка: $discount грн <br>";
    echo "Сума до сплати: $finalPrice грн <br>";

} else {

    echo "Знижка не надається.<br>";
    echo "Сума до сплати: $totalPrice грн <br>";
}

echo "<br>";

$correctLogin = "admin";
$correctPassword = "12345";

$inputLogin = "admin";
$inputPassword = "12345";

echo "<h3>5. Перевірка авторизації</h3>";

if (
    $inputLogin === $correctLogin &&
    $inputPassword === $correctPassword
) {
    echo "Авторизація успішна!";
} else {
    echo "Невірний логін або пароль!";
}

?>