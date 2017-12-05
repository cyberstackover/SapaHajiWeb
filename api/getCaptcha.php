<?php

header('Access-Control-Allow-Origin: *');
// error_reporting(E_ALL ^ E_DEPRECATED);

    session_start();

    $log['Chapta'] = $_SESSION['captcha'];
    $tmp[] = $log;

$data = "{\"Get_Chapta\" : ".json_encode($tmp)."}";
echo $data; 
?>
