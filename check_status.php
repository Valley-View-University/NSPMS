<?php

session_start();

if(empty($_SESSION['sid']) == true) {
	header("Location:check.php");
}
$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$sid = $_SESSION['sid'];
$result = '';
$query1 = mysqli_query($link, "SELECT * FROM posting WHERE sid='$sid' ");
$numr = mysqli_num_rows($query1);

if ($numr == 0) {
	$result = '<span style="float:left;width:100%;text-align:center;margin:50px 0;">Posting Not Yet Available</span>';
}
else{
	$rquerry = mysqli_fetch_assoc($query1);
    $sq = mysqli_query($link,"SELECT * FROM studentinfo WHERE sid='$sid'");
    $rsq = mysqli_fetch_assoc($sq);
    $fname = $rsq['fname'].' '.$rsq['mname'].' '.$rsq['lname'];
    $program = $rsq['program'];
    $email = $rsq['email'];
    $dob = $rsq['dob'];
    $phonenum = $rsq['phonenum'];
    if($rsq['gender'] == 'm'){
		$gender = 'Male';
	}
	else{
		$gender = 'Female';
	}
    $intid = $rsq['instituition'];
    $insqt = mysqli_query($link, "SELECT sname FROM school WHERE shid='$intid' ");
    $inrw = mysqli_fetch_assoc($insqt);
    $institution = $inrw['sname'];

    $avatar = $rsq['avatar'];


	$rid = $rquerry['rid'];
	$rq = mysqli_query($link,"SELECT * FROM region WHERE rid='$rid'");
    $rqr = mysqli_fetch_assoc($rq);
    $rname = $rqr['rname'];

	$oid = $rquerry['oid'];
	$oq = mysqli_query($link,"SELECT * FROM options WHERE `oid`='$oid'");
    $oqr = mysqli_fetch_assoc($oq);
    $options = $oqr['options'];

	$cid = $rquerry['cid'];
	$cq = mysqli_query($link,"SELECT * FROM company WHERE `cid`='$cid'");
    $cqr = mysqli_fetch_assoc($cq);
    $cname = $cqr['cname'];


    $result = '<img src="avatar/'.$avatar.'" style="height:300px;width:300px; background-size:100%; float:left;" />
    			<div class="finfo">
					<div class="info">Name : '.$fname.'</div>
				</div>
				<div class="finfo">
					<div class="info">Date of Birth : '.$dob.'</div>
				</div>
				<div class="finfo">
					<div class="info">Gender : '.$gender.'</div>
				</div>
				<div class="finfo">
					<div class="info">Institution : '.$institution.'</div>
				</div>
				<div class="finfo">
					<div class="info">Program : '.$program.'</div>
				</div>
				<div class="finfo">
					<div class="info">Email : '.$email.'</div>
				</div>
				<div class="finfo">
					<div class="info">Phone : '.$phonenum.'</div>
				</div>
				<hr>
				<div class="finfo">
					<div class="info">Company Posted to : '.$cname.'</div>
				</div>
				<div class="finfo">
					<div class="info">Region : '.$rname.'</div>
				</div>
				<div class="finfo">
					<div class="info">Job : '.$options.'</div>
				</div>';

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
			<a href="check_status.php"><div id="logobx"></div></a>
			<a href="inc/logout.php"><button class="log" name="logout" type="submit">Logout</button></a>
		</div>
	</div>
</div>
<?php echo $result;?>
</body>
</html>
