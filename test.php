<?php
	//watsonへの送信データ
	//$data = array("input" => array("text" => $_POST["inquiry"]));
	//$data = array("intent" => "新商品2","examples" => array("text" => "新商品について教えてください","text" => "新商品について"));
	$data = array("intent" => "新商品");
	
	//watson接続URL
	$url = 'https://gateway.watsonplatform.net/assistant/api/v1/workspaces/d77632f7-8c14-4076-8512-3b1760cf3841/intents?version=2018-07-10';
	
	//watsonのユーザーID : パスワード
	$userInfo = '69bcc66a-a892-438e-b7f7-ec7af5014788:2vYLXsmtFGbg';
	
	$encode = json_encode($data,JSON_FORCE_OBJECT);
	print_r("確認".$encode);
	//送信用のCURLコマンド作成
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $encode);
	curl_setopt($ch, CURLOPT_USERPWD, $userInfo);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charser=UTF-8'));
	
	//CURLコマンド実行
	$result = curl_exec($ch);
	print_r("確認".$result);
	curl_close($ch);
?>