<?php
//stored procedure initialization
$ocon = connection();
if(
    !mysqli_query($ocon, "drop procedure if exists pQueryWords")
    || !mysqli_query($ocon, "
                                    create procedure 
                                    pQueryWords(
                                        in pword varchar(25)
                                        )
                                    begin
                                        select word from ajaxwords where word like pword;
                                    end
                                    "
                    )
    )
    echo "error al cargar procedimientos";
disconnect($ocon);
//end of stored procedure initialization

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
    $statement = mysqli_prepare($connection, "call pQueryWords(?)");
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