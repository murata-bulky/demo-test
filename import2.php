<?php
	//watson�ւ̑��M�f�[�^
	$data = file_get_contents('./import2.json',true);
	
	//watson�ڑ�URL
	$url = 'https://gateway.watsonplatform.net/assistant/api/v1/workspaces/d77632f7-8c14-4076-8512-3b1760cf3841/dialog_nodes?version=2018-07-10';
	
	//watson�̃��[�U�[ID : �p�X���[�h
	$userInfo = '69bcc66a-a892-438e-b7f7-ec7af5014788:2vYLXsmtFGbg';
	
	$encode = $data;
	print_r("�m�F".$encode);
	//$encode = str_replace('"', '' , $encode);
	//print_r("�m�F2".$encode);
	//���M�p��CURL�R�}���h�쐬
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $encode);
	curl_setopt($ch, CURLOPT_USERPWD, $userInfo);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charser=UTF-8'));
	
	//CURL�R�}���h���s
	$result = curl_exec($ch);
	print_r("����".$result);
	curl_close($ch);
?>