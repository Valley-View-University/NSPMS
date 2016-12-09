<?php

	$username = $_POST['User'];
	$password = $_POST['Pass'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	mysql_connect("localhost", "root");
	mysql_select_db("login");


	$result = mysql_query("select * from users where username = '$username' and password = '$password'")
				or die('failed to query database' .mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['Username'] == $username && $row['Password'] == $password ){
		echo "Login successful!!!  Welcome " .$row['Username'];
	} else {
		echo "failed to login";
	}
	
	
?>