<?php
	session_start();

	$table = array(
		'pic' => '狗',
		'pic1' => '猫',
		'pic2' => '鱼',
		'pic3' => '鸟',
		);

	$index = rand(0, 3);

	$value = $table['pic'.$index];
	$_SESSION['authcode'] = $value;

	$filename = dirname(_FILE_).'\\pic'.$index.'.jpg';
	$contents = file_get_contents($filename);

	header('content-type:image/jpg');

	echo $contents;