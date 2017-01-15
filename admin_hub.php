<?php
require 'inc/connect.php';
require 'inc/clean.inc';
session_start();

if(empty($_SESSION['aid']) == true) {
	header("Location:admin.php");
}

$year = date("Y",time());
$studgtq = mysqli_query($link, "SELECT * FROM studentinfo WHERE year='$year' ");
$stnum = mysqli_num_rows($studgtq);
$studentax = '';

if(isset($_POST['enroll'])){
	$studentax = 0;
	$alstq = mysqli_query($link, "SELECT * FROM studentinfo WHERE year='$year'");
	$stnum = mysqli_num_rows($studgtq);
	if($stnum > 0){
		while ($sqr = mysqli_fetch_array($alstq, MYSQLI_ASSOC)) {
			$sid = $sqr['sid'];
			$gsrq = mysqli_query($link, "SELECT * FROM student_request WHERE sid='$sid' ");
			$xzc = mysqli_num_rows($gsrq);
			if($xzc != 0){
				$gr = mysqli_fetch_assoc($gsrq);
				$option1 = $gr['option1'];
				$option2 = $gr['option2'];
				$option3 = $gr['option3'];

				$region1 = $gr['region1'];
				$region2 = $gr['region2'];
				$region3 = $gr['region3'];

				$offer = getpost($link, $region1, $option1);
				if($offer != 0){
					$pstq = mysqli_query($link, "INSERT INTO posting(`sid`,`cid`,`rid`,`oid`,`added`) VALUES('$sid','$offer','$region1','$option1',now()) ");
					$studentax++;
				}
				else{
					$offer = getpost($link, $region2, $option2);
					if($offer != 0){
						$pstq = mysqli_query($link, "INSERT INTO posting(`sid`,`cid`,`rid`,`oid`,`added`) VALUES('$sid','$offer','$region2','$option2',now()) ");
						$studentax++;
					}
					else{
						$offer = getpost($link, $region3, $option3);
						if($offer != 0){
							$pstq = mysqli_query($link, "INSERT INTO posting(`sid`,`cid`,`rid`,`oid`,`added`) VALUES('$sid','$offer','$region3','$option3',now()) ");
							$studentax++;
						}
						else{
							$offer = randpost($link);
							if($offer != 0){
								$offerhd = explode('|',$offer);
								$cidx = $offerhd[0];
								$oidx = $offerhd[1];

								$gridq = mysqli_query($link, "SELECT rid FROM company WHERE cid='$cidx' ");
								$rw = mysqli_fetch_assoc($gridq);
								$rid = $rw['rid'];
								$pstq = mysqli_query($link, "INSERT INTO posting(`sid`,`cid`,`rid`,`oid`,`added`) VALUES('$sid','$cidx','$rid','$oidx',now()) ");
								$studentax++;
							}
							
						}
					}
				}
			}

		}
		$studentax = '<span style="color:#ccc;">Student(s) Posted </span>'.$studentax;
	}
}

function getpost($link, $rid, $opid){
	$ckpq = mysqli_query($link, "SELECT `cid` FROM company_request WHERE oid='$opid' AND cid IN (SELECT cid FROM company WHERE rid='$rid') ");
	$pznum = mysqli_num_rows($ckpq);
	if($pznum > 0){
		$qrv = mysqli_fetch_assoc($ckpq);
		return $qrv['cid'];
	}
	else{
		return 0;
	}

}

function randpost($link){
	$ckpq = mysqli_query($link, "SELECT `cid`,`oid` FROM `company_request` WHERE number > posted ORDER BY RAND() LIMIT 1");
	$pznum = mysqli_num_rows($ckpq);
	if($pznum > 0){
		$qrv = mysqli_fetch_assoc($ckpq);
		return $qrv['cid'].'|'.$qrv['oid'];
	}
	else{
		return 0;
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
			<a href="admin_hub.php"><div id="logobx"></div></a>
			<a href="inc/logout.php"><button class="log" name="logout" type="submit">Logout</button></a>
		</div>
	</div>
</div>
<span style="float:left;width:100%;margin:20px 0;font-size:18px;text-align:center;"><?php echo $studentax;?><br><span style="color:#ccc;">Student Enrolled this year:</span> <?php echo $stnum;?></span>
<form method="POST" action="">
	<div style="width: 300px;height: 20px;cursor:pointer;border:4px solid #ccc;border-radius: 5px;background-color: #8BC34A;margin: 100px auto;text-align:center;color:#fff;padding:20px;">
		<button style="width:100%;height:100%;border:none;background:none;color:#fff;font-size:18px;" type="submit" name="enroll">Post enrolled students</button>
	</div>
</form>
</body>
</html>
