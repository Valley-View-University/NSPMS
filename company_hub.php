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

$cid = $_SESSION['cid'];
$year = date("Y",time());
$done = '';
if(isset($_POST['submit'])){
  $delrq = mysqli_query($link, "DELETE FROM company_request WHERE cid='$cid' AND year='$year' ");

  $optzq = mysqli_query($link, "SELECT * FROM options ORDER BY options ASC");
  while ($opzr = mysqli_fetch_array($optzq, MYSQLI_ASSOC)) {
    $oid = $opzr['oid'];
    $oprion = clean($link, $_POST[$opzr['oid']]);
    if($oprion >= 1){
      $inq = mysqli_query($link, "INSERT INTO company_request(`cid`,`oid`,`number`,`added`,`year`) VALUES('$cid','$oid','$oprion',now(),'$year') ");
    }
  }
  if($inq){
    $done = '<span style="color:green;font-size:25px;width: 100%;text-align: center;float: left;">successful</span>';
  }
  else{
    $done = '<span style="color:red;width:100%;font-size:25px;text-align: center;float: left;">error could not insert</span>';
  }
}


$optionsx = '';
$optq = mysqli_query($link, "SELECT * FROM options ORDER BY options ASC");
while ($opr = mysqli_fetch_array($optq, MYSQLI_ASSOC)) {
  $oidx = $opr['oid'];
  $gtq = mysqli_query($link, "SELECT `number` FROM company_request WHERE cid='$cid' AND oid='$oidx' AND year='$year' ");
  $gtnum = mysqli_num_rows($gtq);
  if($gtnum == 0){
    $valx = '';
  }
  else{
    $grz = mysqli_fetch_assoc($gtq);
    $valx = $grz['number'];
  }

  $optionsx .= '<div id="one">
                  <div class="finfo">
                      <div class="info">'.$opr['options'].'</div>
                      <input type="number" style="width:50px;" value="'.$valx.'" class="field" name="'.$opr['oid'].'"/>
                  </div>
                </div>';
}


      
     
?> 
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="css/font-awesome.css">
<style type="text/css">
  .info {
    width: 248px;
    height: 40px;
    text-align: right;
    float: left;
    margin-top: 7px;
    text-transform: capitalize;
    padding-right: 5px;
}

#submit {
    width: 300px;
    height: 35px;
    margin: 0 20px;
    margin-bottom: 50px;
    float: left;
    font-family: "exo";
    margin-top: 20px;
    background-color: #adad44;
    cursor: pointer;
    border: 4px solid rgba(138, 115, 12, 0.31);
    text-transform: capitalize;
}

</style>

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
<div id="main">
<div id="one"><span id="log">Request Form</span></div>
 <form method="POST" action="" style="float:left;margin-left:450px;">
    <?php echo $optionsx;?>
    <div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
 </form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div> 
</body>
</html>
