<?php

//DELETE
if(count($_POST)<=0)
    return;
$h = curl_init();
curl_setopt($h, CURLOPT_URL, "http://".$_SERVER["HTTP_HOST"].preg_replace("/\/Lab24_cliente\/delete.php/","",$_SERVER["REQUEST_URI"])."/Lab24_servicio/public/words/".$_POST["word"]);
curl_setopt($h, CURLOPT_CUSTOMREQUEST, "DELETE");
$r = curl_exec($h);
curl_close($h);
header("Location: index.php");



