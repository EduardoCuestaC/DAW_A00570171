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

function queryWords($searchValue){
    $searchValue .= "%";
    $connection = connection();
    $statement = mysqli_prepare($connection, "
        select word from ajaxwords where word like ?
    ");
    $statement->bind_param("s", $searchValue);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function toListItems($result){
    $items = "";
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $items .= "<li>".$row["word"]."</li>";
        }
    }
    return $items;
}

function hasRows($result){
    return mysqli_num_rows($result)>0;
}