<?php

session_start();

if (empty($_SESSION['sid']) == false) {
	header("Location:check_status.php");
}

$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$loge= 0;$error ='';

if (isset($_POST['submit'])) {

$nscode = $_POST['nscode'];
$password = $_POST['password'];

    if(empty($nscode) == true){
        $loge++;
    }
    if(empty($password) == true){
        $loge++;
    }

    if ($loge == 0) {

     $password1 =md5($password);
     $query = mysqli_query($link, "SELECT sid FROM personnel WHERE nscode='$nscode' AND password='$password1'  ");
     $qresult = mysqli_num_rows($query);

     if ($qresult == 1) {
        $checkq = mysqli_fetch_assoc($query);
         $_SESSION['sid'] = $checkq['sid'];
         header("Location: check_status.php");
     	}
     else{
        $error .= "invalid studentid or voucher code";
    }

   }
   else{
   	$error .= "field(s) cannot be left empty!!!";
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
			<a href="index.php"><div id="logobx"></div></a>
		</div>
	</div>
</div>
<div id="main">
 <form method="POST" action="">
	<div id="student">
	<div id="one"><span id="log">Check Status</span></div>
		<div class="studntidf">
			<div id="one"><input name="nscode" type="text" placeholder="Nss Code" class="stdntf" required/></div>
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