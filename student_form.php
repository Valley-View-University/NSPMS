<?php

session_start();

if (empty($_SESSION['sid']) == true) {
	header("Location:student.php");
}

$sid = $_SESSION['sid'];

$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$year = date('Y', time());
  	$yearmax = $year - 40;
  	$year -= 16;
  	$dobyr = '';
	for($i=$year; $i>=$yearmax; $i--){
		$dobyr .= '<option value="'.$i.'">'.$i.'</option>';
	}

$studetid=$fname=$img1error=$lname=$mname=$dob=$gender=$mstatus=$done=$nationality=$error=$program=$optio=$email=$instituition=$address=$phone=$options=$option=$regi=$option1=$amstatus='';

$mars = mysqli_query($link,"SELECT * FROM marital_status ORDER BY status ASC");
$rmars = mysqli_num_rows($mars);
if ($rmars!=0) {
	while ($all = mysqli_fetch_array($mars, MYSQLI_ASSOC)) {
		$options .= '<option value="'.$all['msid'].'">'.$all['status'].'</option>';
	}
}

$opq = mysqli_query($link,"SELECT * FROM options ORDER BY options ASC");
$opqr = mysqli_num_rows($opq);
if ($opqr!=0) {
	$optio ='';
	while ($oti = mysqli_fetch_array($opq, MYSQLI_ASSOC)) {
		$optio .='	<div class="opt">
	 					<input style="float:left;" type="checkbox" data-parsley-maxcheck="3" data-parsley-mincheck="3" name="cop1[]" value="'.$oti['oid'].'" />
	 						<span>'.$oti['options'].'</span>
					</div>';
	}
}

$regq = mysqli_query($link,"SELECT * FROM region ORDER BY rname ASC");
$regr = mysqli_num_rows($regq);
if ($regr!=0) {
	while ($reg = mysqli_fetch_array($regq, MYSQLI_ASSOC)) {
		$regi .= '<option value="'.$reg['rid'].'">'.$reg['rname'].'</option>';
	}
}

$mars1 = mysqli_query($link,"SELECT * FROM nationality ORDER BY nationality ASC");
$rmars1 = mysqli_num_rows($mars1);
if ($rmars1 != 0) {
	while ($all1 = mysqli_fetch_array($mars1, MYSQLI_ASSOC)) {
		$option .= '<option value="'.$all1['nid'].'">'.$all1['nationality'].'</option>';
	}
}

$mars2 = mysqli_query($link,"SELECT * FROM school ORDER BY sname ASC");
$rmars2 = mysqli_num_rows($mars2);
if ($rmars2!=0) {
	while ($all2 = mysqli_fetch_array($mars2, MYSQLI_ASSOC)) {
		$option1 .= '<option value="'.$all2['shid'].'">'.$all2['sname'].'</option>';
	}
}


	$sid = $_SESSION['sid'];
	$query = mysqli_query($link, "SELECT * FROM studentinfo WHERE sid='$sid' ");
	$qresult = mysqli_num_rows($query);
	$result = mysqli_fetch_assoc($query);

	$studentid = $result['studentid'];
	$fname = $result['fname'];
	$lname = $result['lname'];
	$mname = $result['mname'];
	// $dob = $result['dob'];

	// $day = date("d",strtotime($dob));

	// $month = date("F",strtotime($dob));
	// $monthnum = date("m",strtotime($dob));
	// $year = date("Y",strtotime($dob));
	// //$gender = $result['gender'];
	if($result['gender'] == 'm'){
		$gender = '<option value="m">Male</option>';
	}
	else{
		$gender = '<option value="f">Female</option>';
	}
	$mstatus = $result['msid'];
	$aquery = mysqli_query($link,"SELECT * FROM marital_status WHERE msid='$mstatus' ");
    $ar = mysqli_num_rows($aquery);
	if ($ar==1) {
	while ($mstatus = mysqli_fetch_array($aquery, MYSQLI_ASSOC)) {
		$optionmad= '<option value="'.$mstatus['msid'].'">'.$mstatus['status'].'</option>';
	}
		}
		else{
			$optionmad= '<option value="">-Select marital status-</option>';
		}

    $nationality = $result['nid'];
	$aquery1 = mysqli_query($link,"SELECT * FROM nationality WHERE nid='$nationality' ");
    $ar1 = mysqli_fetch_assoc($aquery1);
    $nation = $ar1['nationality'];

	$program = $result['program'];
	$email = $result['email'];

	$instituition = $result['instituition'];
	$aquery2 = mysqli_query($link,"SELECT * FROM school WHERE shid='$instituition' ");
    $ar2 = mysqli_fetch_assoc($aquery2);
    $inst = $ar2['sname'];


	$address = $result['resaddress'];
	$phone = $result['phonenum'];


if (isset($_POST['submit'])) {

	$error='';

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$mname = $_POST['mname'];
	$day= $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$gender = $_POST['gender'];
	$mstatus = $_POST['mstatus'];
	$nationality = $_POST['nationality'];
	$phone = $_POST['phone'];
	$email = $_POST["email"];
	$address = $_POST['address'];
	$nameofn = $_POST['nameofn'];
	$kinsp = $_POST['kinsp'];
	$relationship = $_POST['relationship'];
	$kinsemail = $_POST['kinsemail'];
	$region1 = $_POST['region1'];
	$region2 = $_POST['region2'];
	$region3 = $_POST['region3'];

	$photograph = $_FILES['photograph']['name'];
	$photosize = $_FILES['photograph']['size'];
	$phototemp = $_FILES['photograph']['tmp_name'];

if(empty($photograph) == false){
    $imgupdt = checkimage($link,$photograph,$photosize);
    if($imgupdt == 0){
        $img1error ='<span style="color:red;width: 100%;text-align: center;float: left;">Invalid file format(Allowed png,jpg,jpeg)</span>';
    }
    else if($imgupdt == 2){
        $img1error ='<span style="color:red;width: 100%;text-align: center;float: left;">Image size too big (Max image size 2MB)</span>';
    }
}


    if ($region1 == $region2 || $region1 == $region3 || $region2 == $region3) {
    	$error ='<span style="color:red;width: 100%;text-align: center;float: left;">select three different regions</span>';
    }
    else{

    	$avartar = uploadimage($link,$photograph,$phototemp);
    	if ($avartar == '0') {
    		$nwavat = NULL;
    	}
    	else{
    		$nwavat = $avartar;
    	}

    	$yearx = date("Y",time());
    	$dob = $year.'-'.$month.'-'.$day;
    	$querry = mysqli_query($link, "UPDATE studentinfo SET fname='$fname',lname='$lname',mname='$mname',dob='$dob',gender='$gender',msid='$mstatus',nid='$nationality',next_of_kin_name='$nameofn',kin_contact='$kinsp',kin_email='$kinsemail',kin_relationship='$relationship',avatar='$nwavat',time=now(),year='$yearx' WHERE sid='$sid'");

    	if ($querry) {
    		$count = 1;
    		foreach ($_POST['cop1'] as $optionx) {
    			if($count == 1){
    				$option1x = $optionx;
    			}
    			else if($count == 2){
    				$option2x = $optionx;
    			}
    			else if($count == 3){
    				$option3x = $optionx;
    			}
    			$count++;
    		}
    		$deq = mysqli_query($link,"DELETE FROM student_request WHERE sid='$sid'");
    		$querry2 = mysqli_query($link,"INSERT INTO student_request(`sid`,`region1`,`region2`,`region3`,`option1`,`option2`,`option3`,`added`) VALUES('$sid','$region1','$region2','$region3','$option1x','$option2x','$option3x',now())");
 
            $stdntid = md5($studentid); 

            $nscode = "NSS".$yearx.rand(1000,9999);

            $depq = mysqli_query($link,"DELETE FROM personnel WHERE sid='$sid'");
            $querry3 = mysqli_query($link,"INSERT INTO personnel(`nscode`,`sid`,`password`) VALUES('$nscode','$sid','$stdntid')");
         	$key = 'ElSFNrnsozXAU1yhpxN5i0qms';
         	$message = 'Your NSS login are (NS Code:'.$nscode.') (Password: '.$stdntid.')';
         	$sender_id = 'NSS';
         	$phone = '233'.substr($phone,1,15);;
         	 $url = "https://apps.mnotify.net/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";

    		if ($querry3) {
    			$done = '<span style="color:green;font-size:25px;width: 100%;text-align: center;float: left;">successful</span>';
    		}
    		else{
    			$done = '<span style="color:red;width:100%;font-size:25px;text-align: center;float: left;">error could not insert</span>';
    		}
    	}
    	else{
    		$done = '<span style="color:red;width:100%;font-size:25px;text-align: center;float: left;">error could not insert</span>';
    	}
    }

}


function checkimage($link,$imagename,$imgsize){
    $allow = array('jpg','jpeg','png');
    $bits = explode('.',$imagename);
    $file_extn = strtolower(end($bits));
    if(in_array($file_extn, $allow) == false){
        return '0';
    }
    else if($imgsize > 250000000){
        return '2';
    }
    else{
        return '1';
    }
}
function uploadimage($link,$imagename,$imagetmp){
    $allow = array('jpg','jpeg','png');
    $bits = explode('.',$imagename);
    $file_extn = strtolower(end($bits));
    $filename = 'cant'.substr(md5(time().rand(10000,99999)), 0, 15).'.'.$file_extn;
    $fullpath = 'avatar/'.$filename;
        $move = move_uploaded_file($imagetmp ,$fullpath) ;
        if(!$move){
            return '0';
        }
        return $filename;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<script src="js/jquery-2.1.1.min.js"></script>
<link rel="stylesheet" href="css/font-awesome.css">
<link rel="stylesheet" href="css/parsley.css"> 
<script src="js/parsley.js"></script>
</head>

<body>
<div id="runner">
	<div id="contbx">
		<div id="topbanner">
			<a href="student_form.php"><div id="logobx"></div></a>
			<a href="inc/logout.php"><button class="log" name="logout" type="submit">Logout</button></a>
		</div>
	</div>
</div>
<?php echo $done;?>
<div id="form">
<form method="POST" action="" data-parsley-validate enctype="multipart/form-data">
	<div class="finfo">
		<div class="info">first name</div>
		<input type="text" value="<?php echo $fname; ?>" class="field" name="fname" required=""/>
	</div>
	<div class="finfo">
		<div class="info">last name</div>
		<input type="text" value="<?php echo $lname; ?>" class="field" name="lname" required=""/>
	</div>
	<div class="finfo">
		<div class="info">middle name</div>
		<input type="text" value="<?php echo $mname; ?>" class="field" name="mname"/>
	</div>
	<div class="finfo">
		<div class="info">date of birth</div>
		<div class="dob">
		  <div>
			<select style="margin-left:0px;" class="day" name="day" required>
			 <option value="">day</option>
            <option value="01">01</option>
	        <option value="02">02</option>
	        <option value="03">03</option>
	        <option value="04">04</option>
	        <option value="05">05</option>
	        <option value="06">06</option>
	        <option value="07">07</option>
	        <option value="08">08</option>
	        <option value="09">09</option>
	        <option value="10">10</option>
	        <option value="11">11</option>
	        <option value="12">12</option>
	        <option value="13">13</option>
	        <option value="14">14</option>
	        <option value="15">15</option>
	        <option value="16">16</option>
	        <option value="17">17</option>
	        <option value="18">18</option>
	        <option value="19">19</option>
	        <option value="20">20</option>
	        <option value="21">21</option>
	        <option value="22">22</option>
	        <option value="23">23</option>
	        <option value="24">24</option>
	        <option value="25">25</option>
	        <option value="26">26</option>
	        <option value="27">27</option>
	        <option value="28">28</option>
	        <option value="29">29</option>
	        <option  value="30">30</option>
	        <option  value="31">31</option>
			</select>
		  </div>
		 <div>
			<select style="width:195px;" class="day" name="month" required>
			 <option value="">month</option>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05">May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12" >December</option>
			</select>
		 </div>
		 <div>
			<select class="day" name="year" required>
			 <option value="">year</option>
			 <?php echo $dobyr;?>
			</select>
		 </div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">gender</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="gender" required>
			 <?php echo $gender;?>
			 <option value="m">male</option>
			 <option value="f">female</option>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">marital status</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="mstatus" required>
				<?php echo $optionmad;?>
				<?php echo $options;?>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">nationality</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="nationality" required>
			<option value="<?php echo $nationality;?>"><?php echo $nation;?></option>
			<?php echo $option;?>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">phone number</div>
		<input type="text" value="<?php echo $phone; ?>" class="field" name="phone" required/>
	</div>
	<div class="finfo">
		<div class="info">email</div>
		<input type="text" value="<?php echo $email; ?>" class="field" name="email" data-parsley-type="email" required/>
	</div>
	<div class="finfo">
		<div class="info">residential address</div>
		<input type="text" value="<?php echo $address; ?>" class="field" name="address" required/>
	</div>
	<div class="finfo">
		<div class="info">name of next of kin</div>
		<input type="text"  class="field" name="nameofn" required/>
	</div>
	<div class="finfo">
		<div class="info">kin's phone number</div>
		<input type="text" class="field" name="kinsp" data-parsley-type="digits"  required/>
	</div>
	<div class="finfo">
		<div class="info">relationship</div>
		<input type="text" class="field" name="relationship" required/>
	</div>
	<div class="finfo">
		<div class="info">kin's email</div>
		<input type="text" class="field" name="kinsemail" data-parsley-type="email"  required/>
	</div>
	<div class="finfo">
		<span style="margin:0 auto;">select in order of priority the regions you wish to be considered for the national service posting.</span>
	</div>
	<div class="finfo">
		<div class="info">regions</div>
		<select type="text" class="field regions" name="region1" required>
			<option value="">region1</option>
			<?php echo $regi;?>
		</select> 
		<select type="text" class="field regions" name="region2" required>
			<option value="">region2</option>
			<?php echo $regi;?>
		</select>
		<select type="text" class="field regions" name="region3" required>
			<option value="">region3</option>
			<?php echo $regi;?>
		</select>
	</div>
	<?php echo $error;?>
	<div class="finfo">
		<span style="margin:0 auto;">select three(3) from the following options.</span>
	</div>
	<div class="finfo finfo1" >
     <fieldset data-parsley-mincheck="3" data-parsley-maxcheck="3"><?php echo $optio;?></fieldset>
	</div>
	<div class="finfo">
		<div class="info">photograph</div>
		<input type="file" class="field" name="photograph" required/>
	</div>
	<?php echo $img1error;?>
	<div class="finfo">
		<span style="margin:0 auto;color:red;">the secretariat is not bound to post service personnel to regions or service of their preference!!!.</span>
	</div>
	<button type="submit" name="submit" class="sub">submit</button>
</form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div>
</body>
</html>
