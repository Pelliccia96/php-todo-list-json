<?php

if (empty($_POST["name"])) {
    http_response_code(400);
    exit("Dati non validi");
};

$todo = file_get_contents("../todo.json");
$todo = json_decode($todo, true);
$newTodo = [
    "name" => $_POST["name"],
    "id" => uniqid(),
    "status" => false,
];
$todo[] = $newTodo;
$todoJson = json_encode($todo, JSON_PRETTY_PRINT);
file_put_contents("../todo.json", $todoJson);
header("Content-Type: application/json");
echo json_encode($newTodo);

?>
