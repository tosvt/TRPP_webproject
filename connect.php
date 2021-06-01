<?php
	$connect = mysqli_connect('mardiadb', 'test_user', 'test_pass', 'testdb');
	mysqli_set_charset($connect, "utf8");
	if(!$connect) {
		echo 'Error connect to DB';
	}
?>
