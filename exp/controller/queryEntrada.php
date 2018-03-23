<?php
require_once("../util.php");
if(isset($_POST["reportType"]) && $_POST["reportType"] != null){
    switch($_POST["reportType"]){
        case 1:
            echo buildTableData(getAll());
            break;
        case 2:
            echo buildTableDAta(getQuantity());
            break;
        case 3:
            echo buildTableData(getFailures());
            break;
        default:
            break;
    }
}