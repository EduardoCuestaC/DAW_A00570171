<?php
$NUMBER = "/^[0-9]+$/";
$NAME = "/^([ÑA-Z']+(\s*))+$/";
$DATE = "DATE";
$SCHOOLING = "/^(NINGUNO|PREESCOLAR|PRIMARIA|SECUNDARIA|PREPARATORIA|UNIVERSIDAD|MAESTRIA|DOCTORADO)$/";
$GENDER = "/^(MASCULINO|FEMENINO)$/";

function test($type, $subject){
    if($subject == null || $type == null)
        return false;
    global $DATE;
    if($type == $DATE){
        $s = explode("-", $subject);
        return checkdate($s[1], $s[2], $s[0]);
    }
    return preg_match($type, $subject);
}
