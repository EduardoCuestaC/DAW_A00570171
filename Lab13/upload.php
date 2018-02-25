<?php
include("html/_top.html");
include("html/navbar.html");
include("html/upload.html");
include("regexps.php");
session_start();
if(isset($_POST["submit"])){
    $target_directory = "uploads/";
    //create path

    $target_name = basename($_FILES["image"]["name"]);
    $target_file = $target_directory . $target_name;
    $is_ready_for_upload = true;
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $output_message = "";
    $test_image_size = getimagesize($_FILES["image"]["tmp_name"]);
    if(isset($_POST["image_name"])){
        if(test($ID, $_POST["image_name"])){
            $target_name = htmlspecialchars($_POST["image_name"]);
            $target_file = $target_directory . $target_name . "." . $image_file_type;
        }else{
            echo "<p class = \"text-center\">El nombre de la imagen no puede contener caracteres especiales o espacios</p>";
        }
    }
    if($test_image_size !== false)
        $is_ready_for_upload = true;
    else{
        $output_message = "El archivo no es una imagen";
        $is_ready_for_upload = false;
    }
    if(file_exists($target_file)){
        $output_message = "El archivo ya existe";
        $is_ready_for_upload = false;
    }
    if($_FILES["image"]["size"] > 500000){
        $output_message =  "El archivo es demasiado grande (tamaño máximo de 500KB)";
        $is_ready_for_upload = false;
    }
    if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"){
        $output_message = "Solo es posible subir imágenes .jpg, .jpeg o .png";
        $is_ready_for_upload = false;
    }
    if($is_ready_for_upload){
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $output_message = "El archivo ".$target_name.".".$image_file_type." se subió exitosamente";
            if(!isset($_SESSION["image_uploads"]) || !is_array($_SESSION["image_uploads"]))
                $_SESSION["image_uploads"] = array();
            if(!isset($_SESSION["image_titles"]) || !is_array($_SESSION["image_titles"]))
                $_SESSION["image_titles"] = array();
            array_push($_SESSION["image_uploads"], $target_file);
            array_push($_SESSION["image_titles"], $target_name);
        }
        else
            $output_message = "Hubo un error al subir la imagen";
    }
    echo "<p class = \"text-center\">".$output_message."</p>";
}
