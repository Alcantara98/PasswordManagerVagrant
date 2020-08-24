<?php
	$db_host   = '192.168.2.12';
	$db_name   = 'fvision';
	$db_user   = 'webuser';
	$db_passwd = 'insecure_db_pw';
	
	$conn = mysqli_connect($db_host, $db_user, $db_passwd, $db_name);

	if(conn === false){
		die("No Connection. " . mysqli_connect_error());
	}
	
	$sql = "SELECT name FROM papers WHERE code = 'COSC326';";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 0){
		echo Hi;
	}
	
	while($row = mysqli_fetch_array($result)){
		   echo $row['name'];
	}
	//echo $row['name'];
?>
