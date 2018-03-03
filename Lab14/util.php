<?php
function connectToDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tienda";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connection)
        die("La conexión falló: " . mysqli_connect_error());
    return $connection;
}

function closeDB($connection){
    mysqli_close($connection);
}

function executeQuery($query){
    $connection = connectToDB();
    $result = mysqli_query($connection, $query);
    closeDB($connection);
    return $result;
}

function outputTable($result, $headers){
    if(mysqli_num_rows($result)>0){
        echo "<br><table border='2'><thead>";
        foreach($headers as $element){
            echo "<td>$element</td>";
        }
        echo "</thead><tbody>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            foreach($row as $col){
                echo "<td>$col</td>";
            }
            echo "</tr>";
        }
        echo "</tbody></table><br>";
    }
}