<?php

$categories = [
    [
        "name" => "Техніка",
        "children" => [
            [
                "name" => "Комп’ютери",
                "children" => [
                    [
                        "name" => "Ноутбуки",
                        "children" => []
                    ],
                    [
                        "name" => "ПК",
                        "children" => []
                    ]
                ]
            ],
            [
                "name" => "Смартфони",
                "children" => []
            ]
        ]
    ],
    [
        "name" => "Одяг",
        "children" => [
            [
                "name" => "Чоловічий",
                "children" => []
            ],
            [
                "name" => "Жіночий",
                "children" => []
            ]
        ]
    ]
];

function logNode($node)
{
    echo "Перевірка категорії: " . $node["name"] . "<br>";
}

function findCategory($tree, $name, $callback)
{
    foreach ($tree as $node) {

        $callback($node);

         if (
            mb_strtolower($node["name"]) ===
            mb_strtolower($name)
        ) {
            return $node;
        }

        if (!empty($node["children"])) {

            $result = findCategory(
                $node["children"],
                $name,
                $callback
            );

            if ($result !== null) {
                return $result;
            }
        }
    }

    return null;
}

$resultMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $searchName = trim($_POST["category"]);

    echo "<h3>Лог пошуку:</h3>";

    $result = findCategory(
        $categories,
        $searchName,
        "logNode"
    );

    if ($result) {
        $resultMessage =
            "Категорію знайдено: " .
            $result["name"];
    } else {
        $resultMessage =
            "Категорію не знайдено.";
    }
}

?>

<!DOCTYPE html>
<html lang="uk">
<head>
<meta charset="UTF-8">
<title>Пошук категорії</title>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 30px;
    }

    input {
        padding: 8px;
        width: 250px;
    }

    button {
        padding: 8px 15px;
    }

    .result {
        margin-top: 20px;
        font-weight: bold;
        color: blue;
    }
</style>

</head>
<body>

<h2>Пошук категорії</h2>

<form method="POST">

    <input
        type="text"
        name="category"
        placeholder="Введіть назву категорії"
        required
    >

    <button type="submit">
        Знайти
    </button>

</form>

<div class="result">
    <?php echo $resultMessage; ?>
</div>

</body>
</html>