<?php
require_once("util.php");
if(!isset($_POST["search"]))
    return;
$s = htmlspecialchars($_POST["search"]);
if(isset($_POST["searched"])){
    if(hasRows(queryWords($s)))
        echo "encontrado";
    else
        echo "no encontrado";
}else
    echo toListItems(queryWords($s));