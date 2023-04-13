<?php

//funzione per aggiungere todo
function addTodo($todo_list, $params){

    $todo = [ //generico todo
        'text' => $params['todo'],
        'done' => false
    ];

    $todo_list[] = $todo; //push to list in php. é un array associativo

    //salvare nuova todo nel nostro db

    file_put_contents(__DIR__.'/todo-list.json', json_encode($todo_list)); //salviamo stringa json

    return $todo_list;
}

//funzione delete todo

function deleteTodo($todo_list, $index){
    unset($todo_list[$index]);

    file_put_contents(__DIR__.'/todo-list.json', json_encode($todo_list)); //salviamo stringa json
    return $todo_list;
}

//funzione per modificare un todo

function editTodo($todo_list,$params){

    $index = $params['edit'];

    $todo_list[$index] = array(
        'text' => $params['text'],
        'done' => false 
        // sostituiamo in todo_list in posizione index con un nuovo array 
    ); 

    file_put_contents(__DIR__.'/todo-list.json', json_encode($todo_list)); //salviamo stringa json
    return $todo_list;
}