<?php

// receive json data from line webhook
$jsonString = file_get_contents('php://input');
//$jsonObj = json_decode($jsonString, true);

//ファイル出力
$json = fopen('./QandA.json', 'w+b');
fwrite($json, json_encode($jsonString));
fclose($json);

?>