<?php
    $db_host   = 'localhost';
	$db_name   = 'assignmentone';
	$db_user   = 'root';
	$db_passwd = '';
	
	$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

    if(!$conn){
        die("Connection Failed: ".mysqli_connect_error());
    }