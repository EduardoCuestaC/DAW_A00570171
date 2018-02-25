<?php
session_start();
include("html/_top.html");
include("html/navbar.html");
echo "<div class='row'><div class='col-12 text-center'><br><br><h3>Álbum de ".$_SESSION["username"]."</h3><br><br></div></div>";
include("html/album_buttons.html");
if(isset($_SESSION["image_uploads"]) && is_array($_SESSION["image_uploads"])){
    if(!empty($_SESSION["image_uploads"])){
        $size = count($_SESSION["image_uploads"]);
        for($i=0;$i<$size;$i++){
            echo "<div class='row'><div class='col-12 text-center'>".$_SESSION["image_titles"][$i]."</div></div>";
            echo "<div class='row'><div class='col-12 text-center'><img class='shadow' src=".$_SESSION["image_uploads"][$i]." width='300' height='300'><br><br></div></div>";
        }
    }else
        echo "<div class='row mt-5'><div class='col-12 text-center mt-5'>Aún no tienes imágenes</div></div>";
}else
    echo "<div class='row mt-5'><div class='col-12 text-center mt-5'>Aún no tienes imágenes</div></div>";
