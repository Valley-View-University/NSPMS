<?php

session_start();

if(isset($_SESSION['aid']) == true){
	unset($_SESSION['aid']);
	session_destroy();
	header ('location: ../admin.php');
}
else if(isset($_SESSION['sid']) == true){
	unset($_SESSION['sid']);
	session_destroy();
	header ('location: ../index.php');
}
else if(isset($_SESSION['cid']) == true){
	unset($_SESSION['cid']);
	session_destroy();
	header ('location: ../company.php');
}

	
	
	

	

?>