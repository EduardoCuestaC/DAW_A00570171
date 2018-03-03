<?php
function getNotes(){
    $query = "
    select id, username, content
    from Nota
    ";
    outputTable(executeQuery($query), array("número", "nombre de usuario", "contenido"));
}

function getNotesByUser($user){
    $query = "
        select content
        from Nota
        where username='$user'
    ";
    outputTable(executeQuery($query), array("contenido"));
}

function getNotesByID($id){
    $query = "
        select username, content
        from Nota
        where id='$id'
    ";
    outputTable(executeQuery($query), array("nombre de usuario", "contenido"));
}

function getAllNotesAndAuthors(){
    $query = "
        select content, nombre, apaterno, amaterno
        from Nota n, Usuario u
        where n.username = u.username
    ";
    outputTable(executeQuery($query), array("contenido", "nombre", "apellido paterno", "apellido materno"));
}