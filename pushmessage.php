<?php

$accessToken = 'LIiqj7lBQ2iiBzw7REZMK/eeKIgHCv+0noCI7pzaxAG6c4ZTAvZHronTOAuAugpOZDDjo4R7995GMuexO5YxguPjLyxjpRGgtBYjTRpau3eMPR3NQZHAcxwbD39ZNbdZbGgxm5QgSCX9QDkFHMHQ0AdB04t89/1O/w1cDnyilFU=';
$url = 'https://api.line.me/v2/bot/message/push';


echo "aaa";


// receive json data from line webhook
$jsonString = file_get_contents('php://input');
error_log('テスト１');
$jsonObj = json_decode($jsonString, true);
error_log($jsonObj);
/*
$stdout= fopen( 'php://stdout', 'w' );
fwrite( $stdout, $jsonObj . "\n" );

$message_text = $jsonObj["message"];

$stdout= fopen( 'php://stdout', 'w' );
fwrite( $stdout, $message_text . "\n" );
*/

$message_text = $jsonObj["message"];
$sendID = $jsonObj["sendID"];
error_log($message_text);
error_log($sendID);

//ファイルに吐き出す



/*
いらない？
// build request headers
$headers = array('Content-Type: application/json',
                 'Authorization: Bearer ' . $accessToken);

// build request body
$message = array('type' => 'text',
                 'text' => $message_text);
$body = json_encode(array('to' => $sendID,
                          'messages'   => array($message)));

error_log('テスト');
error_log($body);
// post json with curl
$options = array(CURLOPT_URL            => $url,
                 CURLOPT_CUSTOMREQUEST  => 'POST',
                 CURLOPT_RETURNTRANSFER => true,
                 CURLOPT_HTTPHEADER     => $headers,
                 CURLOPT_POSTFIELDS     => $body);
                 
$curl = curl_init();
curl_setopt_array($curl, $options);
$result = curl_exec($curl);
curl_close($curl);
print_r($result);
*/

?>