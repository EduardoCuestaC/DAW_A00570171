<?php
include("html/_top.html");
include("html/login.html");
include("regexps.php");
session_start();
if(session_status() != PHP_SESSION_NONE){
    session_unset();
    session_destroy();
}
session_start();
if(count($_POST)>0){
    if(test($ID, $_POST["username"]))
        $_SESSION["username"] = $_POST["username"];
    else
        echo "<p>El nombre de usuario no debe contener mayúsculas ni caracteres especiales</p>";
    header("Location: album.php");
}
