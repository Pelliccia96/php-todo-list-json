<?php

if (empty($_POST["todoId"])) {
    http_response_code(400);
    exit("Id non trovato");
};

$todoList = file_get_contents("../todo.json");
$todoList = json_decode($todoList, true);

$index;

foreach($todoList as $i => $todo){
    if($todo["id"] === $_POST["todoId"]){
        $index = $i;
    }
};

array_splice($todoList, $index, 1);

$todoJson = json_encode($todoList, JSON_PRETTY_PRINT);
file_put_contents("../todo.json", $todoJson);

?>