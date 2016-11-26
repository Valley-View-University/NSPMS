<?php

$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$studentid = $vouchernum = $loge = '';

$studentid = $_POST['studentid'];
$vouchernum = $_POST['vouchernum'];

    if(empty($studentid) == true){
        $loge++;
    }
    if(empty($vouchernum) == true){
        $loge++;
    }

    if ($loge == 0) {
     
     $vouchernum = md5($vouchernum);
     $query = mysql_query($link, "SELECT sid FROM studentinfo WHERE studentid='$studentid' ");
     $qresult = mysqli_num_rows($query);
     $query1 = mysqli_query($link, "SELECT vid FROM voucher WHERE code='$vouchernum' ");
     $qresult1 = mysqli_num_rows($query1);
    
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
 <form>
	<div id="student">
	<div id="one"><span id="log">student login</span></div>
		<div class="studntidf">
			<div id="one"><input name="studentid" type="text" placeholder="student id" class="stdntf"/></div>
		</div>
		<div style="margin-top:20px;" class="studntidf">
			<div id="one"><input name="vouchernum" type="text" placeholder="voucher code"class="stdntf"/></div>
		</div>
		<div id="one"><button id="submit"type="submit">submit</button></div>
	</div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>
