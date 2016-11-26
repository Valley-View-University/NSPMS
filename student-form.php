<?php

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
	<button type="submit" class="sub">submit</button>
</form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div>
</body>
</html>
