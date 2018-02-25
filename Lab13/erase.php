<?php
session_start();
if(isset($_SESSION["image_uploads"])){
    unset($_SESSION["image_uploads"]);
    $_SESSION["image_uploads"] = array();
}
if(isset($_SESSION["image_titles"])){
    unset($_SESSION["image_titles"]);
    $_SESSION["image_titles"] = array();
}
header("Location: album.php");
/*
if(empty($_SESSION["image_uploads"]))
    echo "<meta http-equiv=\"refresh\" content=\"0;url=album.php\">";
else
    echo "<meta http-equiv=\"refresh\" content=\"1\">";
*/