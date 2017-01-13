<?php 
session_start();
require 'inc/connect.php';
require 'inc/clean.inc';
$errorx=$options ='';
$optio ='';
$error='';
if (empty($_SESSION['cid']) == true) {
  header("Location:company.php");
}

$optionsx = '';
$optq = mysqli_query($link, "SELECT * FROM options ORDER BY options ASC");
while ($opr = mysqli_fetch_array($optq, MYSQLI_ASSOC)) {
  $optionsx = '<div id="one">
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
      <a href="student_form.php"><div id="logobx"></div></a>
      <a href="inc/logout.php"><button class="log" name="logout" type="submit">Logout</button></a>
    </div>
  </div>
</div>
<div id="main">
 <form method="POST" action="" enctype="multipart/form-data">
  <div id="student">
  <div id="one"><span id="log">Request Form</span></div>
    <?php echo $optionsx;?>
    <div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
  </div>
 </form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div> 
</body>
</html>
