<?php
	//watsonへの送信データ
	$data = file_get_contents('./QandA.json',true);
	
	//watson接続URL
	$url = 'https://gateway.watsonplatform.net/assistant/api/v1/workspaces/d77632f7-8c14-4076-8512-3b1760cf3841/intents?version=2018-07-10';
	
	//watsonのユーザーID : パスワード
	$userInfo = '69bcc66a-a892-438e-b7f7-ec7af5014788:2vYLXsmtFGbg';
	
	$encode = $data;
	//送信用のCURLコマンド作成
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $encode);
	curl_setopt($ch, CURLOPT_USERPWD, $userInfo);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charser=UTF-8'));
	
	//CURLコマンド実行
	$result = curl_exec($ch);
	print_r("intent登録結果".$result);
	
	$data = file_get_contents('./dialog_import.json',true);
	
	//watson接続URL
	$url = 'https://gateway.watsonplatform.net/assistant/api/v1/workspaces/d77632f7-8c14-4076-8512-3b1760cf3841/dialog_nodes?version=2018-07-10';
	
	$encode = $data;
	//送信用のCURLコマンド作成
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $encode);
	curl_setopt($ch, CURLOPT_USERPWD, $userInfo);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charser=UTF-8'));
	
	//CURLコマンド実行
	$result = curl_exec($ch);
	print_r("dialog登録結果".$result);
	curl_close($ch);
?>
