<?php
$TRUTH  = "4 8 15 16 23 42";

function connection() {
    $connection = mysqli_connect("localhost","root","","exp");
    $connection->set_charset("utf8");
    return $connection;
}

function disconnect($connection) {
    mysqli_close($connection);
}

function insertEntrada($contenido){
    global $TRUTH;
    $mensaje = "SYSTEM FAILURE";
    if($contenido == $TRUTH)
        $mensaje = "SUCCESS";
    _insertEntrada($contenido, $mensaje);
}

function _insertEntrada($contenido, $mensaje){
    $connection = connection();
    $statement = mysqli_prepare($connection,"
        insert into entrada (contenido, mensaje) values(?, ?);
    ");
    $statement->bind_param("ss", $contenido, $mensaje);
    $statement->execute();
    disconnect($connection);
}

function getAll(){
    $connection = connection();
    $statement = mysqli_prepare($connection,"
        select contenido as 'Contenido', mensaje as 'Mensaje', fecha as 'Fecha y hora'
        from entrada
        order by fecha desc
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function getQuantity(){
    $connection = connection();
    $statement = mysqli_prepare($connection,"
        select mensaje as 'Mensaje', count(mensaje) as 'Cantidad'
        from entrada
        group by mensaje
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function getFailures(){
    $connection = connection();
    $statement = mysqli_prepare($connection,"
        select contenido as 'Contenido', time(fecha) as 'Hora'
        from entrada
        where mensaje = 'SYSTEM FAILURE'
        order by fecha desc
    ");
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}

function buildTableData($result){
$table = "";
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        $table .= "<thead>";
        for($i = 0; $i < $fieldNumber; $i++){
            $table .= "<td><strong>".mysqli_fetch_field_direct($result, $i)->name." </strong></td>";
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