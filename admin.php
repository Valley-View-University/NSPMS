<?php
session_start();
require 'inc/connect.php';

$loge= 0;$error ='';
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) == true){
        $loge++;
    }
    if(empty($password) == true){
        $loge++;
    }
    if($loge == 0){
    	$passwordx = md5($password);
    	$q = mysqli_query($link, "SELECT aid FROM admin WHERE username='$username' AND password='$passwordx' ");
    	$n = mysqli_num_rows($q);
    	if($n == 0){
    		$error = "invalid username and password combination";
    	}
    	else{
    		$ar = mysqli_fetch_assoc($q);
    		$_SESSION['aid'] = $ar['aid'];
    		header("location: admin_hub.php");
    	}
    }
    else{
    	$error = "invalid username and password combination";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="css/font-awesome.css">
</head>

<body>
<div id="runner">
	<div id="contbx">
		<div id="topbanner">
			<div id="logobx"></div>
		</div>
	</div>
</div>
<div id="main">
 <form method="POST" action="">
	<div id="student">
	<div id="one"><span id="log">Admin login</span></div>
		<div class="studntidf">
			<div id="one"><input name="username" type="text" placeholder="Username" class="stdntf" required/></div>
		</div>
		<div style="margin-top:20px;" class="studntidf">
			<div id="one"><input name="password" type="password" placeholder="Password"class="stdntf" required/></div>
		</div>
		<div style="color:red; margin-top:10px;" id="one"><?php echo $error;?></div>
		<div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
	</div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>