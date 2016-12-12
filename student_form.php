<?php

session_start();

if (empty($_SESSION['sid']) == true) {
	header("Location:student.php");
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
<form>
	<div class="finfo">
		<div class="info">student id</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">first name</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">last name</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">middle name</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">date of birth</div>
		<div class="dob">
		  <div>
			<select style="margin-left:0px;" class="day">
			 <option value="">day</option>
			</select>
		  </div>
		 <div>
			<select style="width:195px;" class="day">
			 <option value="">month</option>
			</select>
		 </div>
		 <div>
			<select class="day">
			 <option value="">year</option>
			</select>
		 </div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">gender</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day">
			 <option value="">select gender</option>
			 <option value="m">male</option>
			 <option value="f">female</option>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">marital status</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day">
			 <option value="">select marital status</option>
			 <option value="1">single</option>
			 <option value="2">married</option>
			 <option value="3">divorced</option>
			 <option value="4">seperated</option>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">nationality</div>
		<div>
			<select style="width:405px;margin-left:0px;" class="day">
			<option value="">select nationality</option>
			</select>
		</div>
	</div>
	<div class="finfo">
		<div class="info">phone number</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">email</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">residential address</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">name of institution</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">name of next of kin</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">kin's phone number</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">relationship</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">kin's email</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">are you on study leave?</div>
		<div class="field">
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;"/>
		 	<span style="float:left;margin-top:7px;">yes</span>
		 </div>
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;"/>
		 	<span style="float:left;margin-top:7px;">no</span>
		 </div>
		 <div class="yes"></div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">if yes, organization working with</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<div class="info">contact tel no</div>
		<input type="text" class="field"/>
	</div>
	<div class="finfo">
		<span style="margin:0 auto;">select in order of priority the regions you wish to be considered for the national service posting.</span>
	</div>
	<div class="finfo">
		<div class="info">regions</div>
		<select type="text" class="field regions">
			<option value="">region1</option>
		</select> 
		<select type="text" class="field regions">
			<option value="">region2</option>
		</select>
		<select type="text" class="field regions">
			<option value="">region3</option>
		</select>
	</div>
	<div class="finfo">
		<span style="margin:0 auto;">select four(4) from the following options.</span>
	</div>
	<div style="height:100px;margin-top:10px;" class="finfo">
	 <div class="opt">
	 	<input style="float:left;" type="checkbox" />
	 	<span>agriculture and agro buisness</span>
	 </div>
	 <div class="opt">
	    <input style="float:left;" type="checkbox" />
	 	<span>buisness service</span>
	 </div>
	 <div class="opt">
    	<input style="float:left;" type="checkbox" />
	 	<span>community health</span>
	 </div>
	 <div class="opt">
	    <input style="float:left;" type="checkbox" />
	 	<span>educational support</span>
	 </div>
	 <div class="opt">
	    <input style="float:left;" type="checkbox" />
	 	<span>military service</span>
	 </div>
	 <div class="opt">
	    <input style="float:left;" type="checkbox" />
	 	<span>rural development service</span>
	 </div>
	</div>
	<div class="finfo">
		<div class="info">do you have any health condition?</div>
		<div class="field">
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;"/>
		 	<span style="float:left;margin-top:7px;">yes</span>
		 </div>
		 <div class="yes">
		 	<input type="radio" style="float:left;margin-top:13px;"/>
		 	<span style="float:left;margin-top:7px;">no</span>
		 </div>
		 <div class="yes"></div>
		</div>
	</div>
	<div class="finfo">
		<div class="info">photograph</div>
		<input type="file" class="field"/>
	</div>
	<div class="finfo">
		<span style="margin:0 auto;color:red;">the secretariat is not bound to post service personnel to regions or service to their preference!!!.</span>
	</div>
	<button type="submit" class="sub">submit</button>
</form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div>
</body>
</html>
