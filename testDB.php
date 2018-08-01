<?php

try {
	// DBへ接続
	$dbh = new PDO("pgsql:host=ec2-50-16-241-91.compute-1.amazonaws.com; dbname=dc9ftkn51cgcj;", 'zhyyeuduffaiuf', 'b770c8d49644c40a7bbf73401a7c8dd8e140829b3ae028b70fe7e35067279898');

	// SQL作成
	$sql = 'CREATE TABLE user (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(20),
		age INT(11),
		registry_datetime DATETIME
	) engine=innodb default charset=utf8';

	// SQL実行
	$res = $dbh->query($sql);
	
	// testテーブルにデータを登録
	$sql = 'insert into test(id,name) values("12345678901","test")';
	
	// SQL実行
	$res = $dbh->query($sql);
	
	// testテーブルの全データを取得
	$sql = 'SELECT * FROM test';
	$data = $dbh->query($sql);

	if( !empty($data) ) {
		foreach( $data as $value ) {
			var_dump($value['name']);
		}
	}

} catch(PDOException $e) {
	print_r($e->getMessage());
	die();
}

// 接続を閉じる
$dbh = null;
?>