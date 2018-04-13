<?php
function connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "lab";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connection)
        die("La conexión falló: " . mysqli_connect_error());
    return $connection;
}

function disconnect($connection){
    mysqli_close($connection);
}


function postWord($word){
    if($word == "" || $word == null)
        return;
    $lword = htmlspecialchars($word);
    $connection = connection();
    $statement = mysqli_prepare($connection, "
        insert into word (word) values(?)
    ");
    $statement->bind_param("s", $lword);
    $statement->execute();
    disconnect($connection);
}

function getWords(){
    $connection = connection();
    $statement = mysqli_prepare($connection, "
        select * from word
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return toMatrix($result);
}

function getWordById($id){
    if(!is_numeric($id) || $id == null)
        return array(array(0, 0));
    $connection = connection();
    $statement = mysqli_prepare($connection, "
        select * from word where id = ?
    ");
    $statement->bind_param("i", $id);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return toMatrix($result);
}

function deleteWordById($id){
    if(!is_numeric($id) || $id == null)
        return;
    $id = htmlspecialchars($id);
    $connection = connection();
    $statement = mysqli_prepare($connection, "
        delete from word where id = ?
    ");
    $statement->bind_param("i", $id);
    $statement->execute();
    disconnect($connection);
}

function toMatrix($result){
    $objects = array();
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($objects, array($row["id"], $row["word"]));
        }
    }
    return $objects;
}
