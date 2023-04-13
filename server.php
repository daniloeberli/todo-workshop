<?php

require_once(__DIR__.'/functions.php');


//recupero contenuto file json
$database = file_get_contents(__DIR__.'/todo-list.json'); //string

// converto in array associativo
$todo_list = json_decode($database, true); //array


//eleborazione dati:

//gestione aggiunta todo

if(isset($_POST['add'])){
    //operazione add
    $todo_list = addTodo($todo_list, $_POST);
}

//gestione cancella todo

if(isset($_POST['delete'])){
    //operazione delete
    $todo_list = deleteTodo($todo_list, $_POST['delete']);
}

//gestione modifica dati

if(isset($_POST['edit'])){
    //operazione edit
    $todo_list = editTodo($todo_list, $_POST);
}

//restituire dati json (no text html)

header('Content-Type: application/json');

$result = json_encode($todo_list); //lo devo encodare in string per non avere arrori
echo $result;
?>
