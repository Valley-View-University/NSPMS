<?php

session_start();

if (empty($_SESSION['sid']) == true) {
	header("Location:student.php");
}

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

$studetid=$fname=$lname=$mname=$dob=$gender=$mstatus=$nationality=$program=$optio=$email=$instituition=$address=$phone=$options=$option=$regi=$option1=$amstatus='';

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
	 					<input style="float:left;" type="checkbox" name="cop1[]" value="'.$oti['oid'].'" />
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
if ($rmars1!=0) {
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

	$studetid = $result['studentid'];
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
    $ar = mysqli_fetch_assoc($aquery);
    $amstatus = $ar['status'];

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

	$studentid = $_POST['studentid'];
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
	$email = test_input($_POST["email"]);
	$address = $_POST['address'];
	$institution = $_POST['institution'];
	$program = $_POST['program'];
	$nameofn = $_POST['nameofn'];
	$kinsp = $_POST['kinsp'];
	$relationship = $_POST['relationship'];
	$kinsemail = $_POST['kinsemail'];
	$studyl = $_POST['studyl'];
	$study2 = $_POST['study2'];
	$organization = $_POST['organization'];
	$contacttel = $_POST['contacttel'];
	$region1 = $_POST['region1'];
	$region2 = $_POST['region2'];
	$region3 = $_POST['region3'];
	$hcondition = $_POST['hcondition'];
	$hconname = $_POST['hconname'];
	$photograph = $_POST['photograph'];

    if (!empty($studentid) == true) {
    	$studentid = $_POST['studentid'];
    }
    else{
    	$error .= "cannot be empty";
    }

	$email = $_POST['email'];
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error .= "email format invalid";;
	}
	else{
		$email = $_POST['email'];
	}

	if (empty($fname) == true) {
		$error .= "enter student id";
	}
	else{

   		if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
   			$error .= "only letters allowed";
   		}
		$fname = $_POST['fname'];
	}



	

	$countx = 0;
	foreach($_POST['cop1'] as $optionx) {
		$countx++;
	}

	if ($countx != 3) {
		$error .= "please select three options only!!!";
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
			<a href="student_form.php"><div id="logobx"></div></a>
			<a href="inc/logout.php"><button class="log" name="logout" type="submit">Logout</button></a>
		</div>
	</div>
</div>
<div id="form">
<form method="POST" action="">
	<div class="finfo">
		<div class="info">student id</div>
		<input type="text" value="<?php echo $studetid; ?>" class="field" name="studentid" required/>
	</div>
	<div class="finfo">
		<div class="info">first name</div>
		<input type="text" value="<?php echo $fname; ?>" class="field" name="fname" required/>
	</div>
	<div class="finfo">
		<div class="info">last name</div>
		<input type="text" value="<?php echo $lname; ?>" class="field" name="lname" required/>
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
			<select class="day" required>
			 <option value="">year</option>
			 <?php echo $dobyr;?>
			</select>
		 </div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">gender</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="year" required>
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
				<option value=""><?php echo $amstatus;?></option>
				<?php echo $options;?>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">nationality</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="nationality" required>
			<option value=""><?php echo $nation;?></option>
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
		<input type="text" value="<?php echo $email; ?>" class="field" name="email" required/>
	</div>
	<div class="finfo">
		<div class="info">residential address</div>
		<input type="text" value="<?php echo $address; ?>" class="field" name="address" required/>
	</div>
	<div class="finfo">
		<div class="info">name of institution</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day" name="institution" required>
			<option value=""><?php echo $inst;?></option>
			<?php echo $option1;?>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">program</div>
		<input type="text" value="<?php echo $program; ?>" class="field" name="program" required/>
	</div>
	<div class="finfo">
		<div class="info">name of next of kin</div>
		<input type="text"  class="field" name="nameofn" required/>
	</div>
	<div class="finfo">
		<div class="info">kin's phone number</div>
		<input type="text" class="field" name="kinsp" required/>
	</div>
	<div class="finfo">
		<div class="info">relationship</div>
		<input type="text" class="field" name="relationship" required/>
	</div>
	<div class="finfo">
		<div class="info">kin's email</div>
		<input type="text" class="field" name="kinsemail" required/>
	</div>
	<div class="finfo">
		<div class="info">are you on study leave?</div>
		<div class="field">
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;" name="study1" />
		 	<span style="float:left;margin-top:7px;">yes</span>
		 </div>
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;" name="study1" />
		 	<span style="float:left;margin-top:7px;">no</span>
		 </div>
		 <div class="yes"></div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">if yes, organization working with</div>
		<input type="text" class="field" name="organization" />
	</div>
	<div class="finfo">
		<div class="info">contact tel no</div>
		<input type="text" class="field" name="contacttel" />
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
	<div class="finfo">
		<span style="margin:0 auto;">select three(3) from the following options.</span>
	</div>
	<div class="finfo finfo1" >
     <?php echo $optio;?>
	</div>
		<div class="finfo">
		<div class="info">do you have any health condition?</div>
		<div class="field">
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;" name="study2" />
		 	<span style="float:left;margin-top:7px;">yes</span>
		 </div>
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;" name="study2" />
		 	<span style="float:left;margin-top:7px;">no</span>
		 </div>
		 <div class="yes"></div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">if yes, name of condition</div>
		<input type="text" class="field" name="hcondition" />
	</div>
	<div class="finfo">
		<div class="info">photograph</div>
		<input type="file" class="field" name="photograph" required/>
	</div>
	<div class="finfo">
		<span style="margin:0 auto;color:red;">the secretariat is not bound to post service personnel to regions or service of their preference!!!.</span>
	</div>
	<button type="submit" class="sub">submit</button>
</form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div>
</body>
</html>
