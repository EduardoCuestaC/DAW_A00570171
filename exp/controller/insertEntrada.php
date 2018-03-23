<?php
session_start();
require_once("../util.php");
if(isset($_POST["input"]) && $_POST["input"] != null){
    if(!isset($_SESSION["exists"])){
        insertEntrada("");
        $_SESSION["exists"] = 1;
        echo "started session";
        return;
    }
    insertEntrada(htmlspecialchars($_POST["input"]));
    echo "entry registered";
}