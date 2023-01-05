<?php
// leggo i dati dal DATABASE
$todoList = file_get_contents("../todo.json");
$todoList = json_decode($todoList, true);

// devo recuperare l'indice dell'elemento 
// che ha come id quello ricevuto tramite $_POST["todoId"]
$index;

foreach ($todoList as $i => $todo) {
    // per ogni elemento della lista, controllo se il suo id
    // corrisponde a quello del todo.
    // Se si, mi salvo l'indice corrente.  
    if ($todo["id"] === $_POST["todoId"]) {
    $index = $i;
    }
};

// Se lo "status" del todo è uguale a false, allora lo imposto a true
// Altrimenti lo imposto a false
// per permettere lo switch true/false del testo barrato per la task completata
if ($todoList[$index]["status"] === false) {
    $todoList[$index]["status"] = true;
} else {
    $todoList[$index]["status"] = false;
};

/* $todoList[$index]["status"] = true; */

// riconverto l'array in json
$todoJson = json_encode($todoList, JSON_PRETTY_PRINT);

// salvo il json nel database / file
file_put_contents("../todo.json", $todoJson);

header("Content-Type: application/json");

echo json_encode($todoList[$index]);

?>