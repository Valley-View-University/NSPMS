<?php

session_start();

if (empty($_SESSION['sid']) == false) {
	header("Location:student_form.php");
}

$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$loge= 0;$error ='';

if (isset($_POST['submit'])) {

$studentid = $_POST['studentid'];
$vouchernum = $_POST['vouchernum'];

    if(empty($studentid) == true){
        $loge++;
    }
    if(empty($vouchernum) == true){
        $loge++;
    }

    if ($loge == 0) {
     
     $query = mysqli_query($link, "SELECT sid FROM studentinfo WHERE studentid='$studentid' ");
     $qresult = mysqli_num_rows($query);
     

     if ($qresult == 1) {
        $srow = mysqli_fetch_assoc($query);
         $vouchernum = md5($vouchernum);
         $query1 = mysqli_query($link, "SELECT vid FROM voucher WHERE code='$vouchernum' ");
         $qresult1 = mysqli_num_rows($query1);

     if ($qresult1 == 1) {
            $vrow = mysqli_fetch_assoc($query1);
         	$sidx = $srow['sid'];
         	$vidx = $vrow['vid'];

     	$fsql = mysqli_query($link, "UPDATE voucher SET sid='$sidx' WHERE vid='$vidx' ");

     	if ($fsql) {
     		 $_SESSION['sid'] = $sidx;
             header("Location: student_form.php");
     	}

     }
     else{
        $error .= "invalid studentid or voucher code";
    }
    
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
	<div id="one"><span id="log">student login</span></div>
		<div class="studntidf">
			<div id="one"><input name="studentid" type="text" placeholder="student id" class="stdntf" required/></div>
		</div>
		<div style="margin-top:20px;" class="studntidf">
			<div id="one"><input name="vouchernum" type="password" placeholder="voucher code"class="stdntf" required/></div>
		</div>
		<div style="color:red; margin-top:10px;" id="one"><?php echo $error;?></div>
		<div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
	</div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>
