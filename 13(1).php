<?php

header("Content-Type: application/json; charset=UTF-8");

$file = "tasks.json";

// Завантаження задач
function loadTasks($file) {
    return json_decode(file_get_contents($file), true);
}

// Збереження задач
function saveTasks($file, $data) {
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Отримати ID з URL (наприклад /tasks/2)
function getIdFromUrl() {
    $url = explode("/", trim($_SERVER["REQUEST_URI"], "/"));
    return isset($url[1]) ? (int)$url[1] : null;
}

$method = $_SERVER["REQUEST_METHOD"];
$tasks = loadTasks($file);
$id = getIdFromUrl();


if ($method === "GET" && $id === null) {
    echo json_encode($tasks);
    exit;
}


if ($method === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data["task"])) {
        echo json_encode(["error" => "Task is required"]);
        exit;
    }

    $newTask = [
        "id" => end($tasks)["id"] + 1,
        "task" => $data["task"],
        "completed" => false
    ];

    $tasks[] = $newTask;
    saveTasks($file, $tasks);

    echo json_encode($newTask);
    exit;
}


if ($method === "PUT" && $id !== null) {

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($tasks as &$task) {

        if ($task["id"] === $id) {

            if (isset($data["task"])) {
                $task["task"] = $data["task"];
            }

            if (isset($data["completed"])) {
                $task["completed"] = (bool)$data["completed"];
            }

            saveTasks($file, $tasks);

            echo json_encode($task);
            exit;
        }
    }

    echo json_encode(["error" => "Task not found"]);
    exit;
}


if ($method === "DELETE" && $id !== null) {

    foreach ($tasks as $index => $task) {

        if ($task["id"] === $id) {

            array_splice($tasks, $index, 1);
            saveTasks($file, $tasks);

            echo json_encode(["message" => "Task deleted"]);
            exit;
        }
    }

    echo json_encode(["error" => "Task not found"]);
    exit;
}

echo json_encode(["error" => "Invalid request"]);