<?php
function connectToDB(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jambe";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
    if(!$connection)
        die("La conexión falló: " . mysqli_connect_error());
    return $connection;
}

function closeDB($connection){
    mysqli_close($connection);
}

function insertVisitor($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connectToDB();
    $statement = mysqli_prepare($connection,"
    insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
    values (?, ?, ?, ?, ?);
    ");
    $statement->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();

    $statement = mysqli_prepare($connection,"
    insert into visitante_gradoestudios values ((select idVisitante from visitante order by idVisitante desc limit 1), ?, current_date());
    ");
    $statement->bind_param("i", $gradoEstudios);
    $statement->execute();

    $statement = mysqli_prepare($connection,"
    insert into entrada (idVisitante) values ((select idVisitante from visitante order by idVisitante desc limit 1));
    ");
    $statement->execute();
    closeDB($connection);

}

function queryVisitor($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connectToDB();
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', genero as 'Género', g.nombre as 'Grado de estudios' 
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g 
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre = ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    ");
    $statement->bind_param("isssssi", $idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    closeDB($connection);
    return $result;
}



function buildTableData($result){
    $table = "";
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        $table .= "<thead>";
        for($i = 0; $i < $fieldNumber; $i++){
            $table .= "<td>".mysqli_fetch_field_direct($result, $i)->name."</td>";
        }
        $table .= "</thead><tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $table .= "<tr>";
            foreach($row as $data){
                $table .= "<td>$data</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody>";
    }else{
        echo "<thead><td>No hay resultados</td></thead>";
    }
    return $table;
}