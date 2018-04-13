<?php
if(count($_POST)<=0)
    return;
$h = curl_init();
$s = $_POST["word"];
curl_setopt($h, CURLOPT_URL, "http://".$_SERVER["HTTP_HOST"].preg_replace("/\/Lab24_cliente\/insert.php/","",$_SERVER["REQUEST_URI"])."/Lab24_servicio/public/words");
curl_setopt($h, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($h, CURLOPT_POSTFIELDS, $s);
curl_setopt($h, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($s))
);
$r = curl_exec($h);
curl_close($h);
header("Location: index.php");