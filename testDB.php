<?php

try {
	// DB�֐ڑ�
	$dbh = new PDO("pgsql:host=ec2-50-16-241-91.compute-1.amazonaws.com; dbname=dc9ftkn51cgcj;", 'zhyyeuduffaiuf', 'b770c8d49644c40a7bbf73401a7c8dd8e140829b3ae028b70fe7e35067279898');

	// SQL�쐬
	$sql = 'CREATE TABLE user (
		id INT(11) AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(20),
		age INT(11),
		registry_datetime DATETIME
	) engine=innodb default charset=utf8';

	// SQL���s
	$res = $dbh->query($sql);
	
	// test�e�[�u���Ƀf�[�^��o�^
	$sql = 'insert into test(id,name) values("12345678901","test")';
	
	// SQL���s
	$res = $dbh->query($sql);
	
	// test�e�[�u���̑S�f�[�^���擾
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

// �ڑ������
$dbh = null;
?>