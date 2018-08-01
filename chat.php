<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>自動回答</title>
	</head>
	<body>
		<form action="chat2.php" method="post">
			<label class="label" for="name">名前</label>
			<input id="name" type="text" name="name">
			<label class="label" for="tel">電話番号</label>
			<input id="tel" type="text" name="tel">
			<label class="label" for="e-mail">メール</label>
			<input id="e-mail" type="email" name="email">
			<label class="label" for="message">本文</label>
			<textarea cols="50" rows="6" id="message" placeholder="問い合せ内容を入力してください" name="inquiry"></textarea>
			<input type="submit" value="送信" />
			<input type="reset" value="取消">
		</form>

		<style>
			label, input[type=text]{
				display:block;
			}
		</style>

		<br/>

		<?php
			session_start();
			$_SESSION['test'] .= "Q : " .  $_POST["inquiry"] . "\n\n";
			//watsonへの送信データ
			$data = array("input" => array("text" => $_POST["inquiry"]));
			
			//watson接続URL
			$url = 'https://gateway.watsonplatform.net/assistant/api/v1/workspaces/d77632f7-8c14-4076-8512-3b1760cf3841/message?version=2018-02-16';
			
			//watsonのユーザーID : パスワード
			$userInfo = '69bcc66a-a892-438e-b7f7-ec7af5014788:2vYLXsmtFGbg';
			
			$encode = json_encode($data);
			//print_r("確認".$encode);

			//送信用のCURLコマンド作成
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $encode);
			curl_setopt($ch, CURLOPT_USERPWD, $userInfo);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charser=UTF-8'));
			
			//CURLコマンド実行
			$result = curl_exec($ch);
			curl_close($ch);
			$json = json_decode($result, true);
			//print_r($json);

			$_SESSION['test'] .= "A : " . $json['output']['text'][count($json['output']['text']) - 1] . "\n\n";

			
			//watsonからの回答を画面に出力
			//print_r($json['output']['text'][count($json['output']['text']) - 1]);
		?>
		
		<textarea name="ans" cols="100" rows="30" readonly="readonly" style="background-color:#fff0f5;"><?php if(strlen($_SESSION['test']) > 0){echo ($_SESSION['test']);} ?></textarea><br/>
		<br/>

	</body>
</html>