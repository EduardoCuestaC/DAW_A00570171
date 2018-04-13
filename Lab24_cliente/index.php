<?php
if(!preg_match("/\/index.php/", $_SERVER["REQUEST_URI"]))
    header("Location: index.php");
include("idx.html");
$h = curl_init();
curl_setopt($h, CURLOPT_URL, "http://".$_SERVER["HTTP_HOST"].preg_replace("/((\/Lab24_cliente\/index.php)|(\/Lab24_cliente\/))/","",$_SERVER["REQUEST_URI"])."/Lab24_servicio/public/words");
curl_setopt($h, CURLOPT_RETURNTRANSFER, true);
$r = json_decode(curl_exec($h));
curl_close($h);
for($i=0;$i<count($r);$i++){
    echo $r[$i][0].". ".$r[$i][1]."<br>";
}
echo "http://".$_SERVER["HTTP_HOST"].preg_replace("/((\/Lab24_cliente\/index.php)|(\/Lab24_cliente\/))/","",$_SERVER["REQUEST_URI"])."/Lab24_servicio/public/words";
echo "</div></body></html>";
