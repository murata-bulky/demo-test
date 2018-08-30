<?php

// receive json data from line webhook
$jsonString = file_get_contents('php://input');
error_log('テスト１');
$jsonObj = json_decode($jsonString, true);
error_log($jsonObj);


$message_text = $jsonObj["message"];
$sendID = $jsonObj["sendID"];
error_log($message_text);
error_log($sendID);

//ファイルに吐き出す
//ファイル出力
$json = fopen('./QandA.json', 'w+b');
fwrite($json, json_encode($jsonObj));
fclose($json);

?>