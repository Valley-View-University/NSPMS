<?php
require 'inc/connect.php';
require 'inc/clean.inc';
session_start();
if (empty($_SESSION['cid']) == false) {
	header("Location:company_hub.php");
}

$errorx=$options ='';
  $getsch = mysqli_query($link, "SELECT cname,cid FROM company ORDER BY cname ASC");
  $numrows = mysqli_num_rows($getsch);
  if($numrows != 0){
    while ($r = mysqli_fetch_array($getsch,MYSQLI_ASSOC)) {
      $options .= '<option value="'.$r['cid'].'">'.$r['cname'].'</option>';
    }
  }
$loge= 0;$error ='';

if (isset($_POST['submit'])) {
	

$companyx = $_POST['company'];
$passcodex = $_POST['passcode'];

    if(empty($companyx) == true){
        $loge++;
    }
    if(empty($passcodex) == true){
        $loge++;
    }

    if($loge == 0){
     $passcodex = md5($passcodex);
     $query = mysqli_query($link, "SELECT cid FROM company WHERE cid='$companyx' AND cpass='$passcodex' ");
     $qresult = mysqli_num_rows($query);
     if ($qresult == 1) {
        $czrow = mysqli_fetch_assoc($query);
        $_SESSION['cid'] = $czrow['cid'];
        header("Location: company_hub.php");
    }
    else{
    	$error .= "invalid Company or Passcode code";
    }

   }
   else{
   	$error .= "field(s) cannot be left empty!!!";
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
			<a href="index.php"><div id="logobx"></div></a>
		</div>
	</div>
</div>
<div id="main">
 <form method="POST" action="">
	<div id="student">
	<div id="one"><span id="log">company login</span></div>
		<div class="studntidf">
          <select style="width: 307px;margin-left: 51px;" class="day" name="company" required>
               <option value="">- Select Company -</option>
                <?php echo $options;  ?>
              </select>
         </div>
		<div style="margin-top:20px;" class="studntidf">
			<div id="one"><input name="passcode" type="password" placeholder="Passcode" class="stdntf" required/></div>
		</div>
		<div style="color:red; margin-top:10px;" id="one"><?php echo $error;?></div>
		<div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
	</div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>
