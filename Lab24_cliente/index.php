<?php
include("idx.html");
//GET

$h = curl_init();
curl_setopt($h, CURLOPT_URL, "http://".$_SERVER["HTTP_HOST"]."/Labs/Lab24_servicio/public/words");
curl_setopt($h, CURLOPT_RETURNTRANSFER, true);
$r = json_decode(curl_exec($h));
curl_close($h);
for($i=0;$i<count($r);$i++){
    echo $r[$i][0].". ".$r[$i][1]."<br>";
}
echo "</div></body></html>";
