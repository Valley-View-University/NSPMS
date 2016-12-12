<?php 
require 'connect.php';
$error ='';
  $getsch = mysqli_query($link, "SELECT * FROM schools");
 
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
 <form method="POST" action="">
  <div id="student">
  <div id="one"><span id="log">student login</span></div>
    <div class="studntidf">
      <div id="one"><input name="studentid" type="text" placeholder="student id" class="stdntf" required/></div>
    </div>
    <div style="margin-top:20px;" class="studntidf">
      <div id="one"><input name="vouchernum" type="text" placeholder="voucher code"class="stdntf" required/></div>
    </div>
    <div style="color:red; margin-top:10px;" id="one"><?php echo $error;?></div>
    <div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
  </div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>
