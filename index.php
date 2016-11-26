<?php

session_start();
if (empty($_SESSION['sid']) == false) {
	header("Location:student_form.php");
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
			<div id="navbarbx">
				<ul>
					<li class="activetab">Home</li>
					<li>News</li>
					<li>Applicants</li>
					<li>Companies</li>
					<li>About</li>
					<li>Contact</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div id="sliderbx"></div>
<div id="newsbx">
	<div class="titlebar">
		<span>News</span>
	</div>
	<div class="newscntbx">
		<div class="newspicbx">
			<img src="img/phold.png">
		</div>
		<div class="newstxtbx">News detail show below here with all ypou need to know...</div>
	</div>
	<div class="newscntbx">
		<div class="newspicbx">
			<img src="img/phold.png">
		</div>
		<div class="newstxtbx">News detail show below here with all ypou need to know...</div>
	</div>
	<div class="newscntbx">
		<div class="newspicbx">
			<img src="img/phold.png">
		</div>
		<div class="newstxtbx">News detail show below here with all ypou need to know...</div>
	</div>
	<div class="newscntbx">
		<div class="newspicbx">
			<img src="img/phold.png">
		</div>
		<div class="newstxtbx">News detail show below here with all ypou need to know...</div>
	</div>
</div>
<div id="qicklnks">
	<a href="student.php"><div class="qlinkbx">
		<div class="qltopbx"><span class="linkicon regicon"></span></div>
		<div class="qlinkname"><span>Enroll</span></div>
	</div></a>
	<div class="qlinkbx">
		<div class="qltopbx"><span class="linkicon checkpost"></span></div>
		<div class="qlinkname"><span>Check Postings</span></div>
	</div>
	<div class="qlinkbx">
		<div class="qltopbx"><span class="linkicon company"></span></div>
		<div class="qlinkname"><span>Sign up your Company</span></div>
	</div>
	<div class="qlinkbx">
		<div class="qltopbx"><span class="linkicon school"></span></div>
		<div class="qlinkname"><span>Upload Student List</span></div>
	</div>

</div>
<div id="footercnt"></div>
</body>
</html>
