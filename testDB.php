<?php

try {
	// DB�֐ڑ�
	$dbh = new PDO("pgsql:host=ec2-50-16-241-91.compute-1.amazonaws.com; dbname=dc9ftkn51cgcj;", 'zhyyeuduffaiuf', 'b770c8d49644c40a7bbf73401a7c8dd8e140829b3ae028b70fe7e35067279898');

	// SQL�쐬
	/*
	$sql = "CREATE TABLE user_list (
	id serial PRIMARY KEY,
	name varchar(50),
	age int,
	registry_datetime timestamp)";

	// SQL���s
	$res = $dbh->query($sql);
	print_r($res);
	*/
	// test�e�[�u���Ƀf�[�^��o�^
	$sql = 'insert into user_list (id,name) values ("12345678902","test")';
	
	// SQL���s
	$res = $dbh->query($sql);
	print_r($res);
	
	// test�e�[�u���̑S�f�[�^���擾
	$sql = 'SELECT * FROM user_list';
	$data = $dbh->query($sql);

	if( !empty($data) ) {
		foreach( $data as $value ) {
			print_r($value['name']);
			error_log($value['name']);
		}
	}

} catch(PDOException $e) {
	print_r($e->getMessage());
	error_log($e->getMessage());
	die();
}

// �ڑ������
$dbh = null;
?>