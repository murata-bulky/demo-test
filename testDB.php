<?php

try {
	// DBへ接続
	$dbh = new PDO("pgsql:host=ec2-50-16-241-91.compute-1.amazonaws.com; dbname=dc9ftkn51cgcj;", 'zhyyeuduffaiuf', 'b770c8d49644c40a7bbf73401a7c8dd8e140829b3ae028b70fe7e35067279898');

	// testテーブルにデータを登録
	$sql = "insert test (name) values ('test')";
	
	// SQL実行
	$res = $dbh->query($sql);
	print_r("insert".$res);
	
	// testテーブルの全データを取得
	$sql = "SELECT * FROM test";
	$data = $dbh->query($sql);
	print_r("実行");
	
	foreach($data as $value){
		var_dump("氏名".$value['name']);
		//error_log($value['name']);
	}

} catch(PDOException $e) {
	print_r("エラー".$e->getMessage());
	error_log($e->getMessage());
	die();
}

// 接続を閉じる
$dbh = null;
?>