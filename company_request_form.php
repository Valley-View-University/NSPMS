<?php 
require 'connect.php';
require 'inc/clean.inc';
$errorx=$options ='';
$optio ='';
$error='';
  // $getsch = mysqli_query($link, "SELECT * FROM school ORDER BY sname ASC");
  // $numrows = mysqli_num_rows($getsch);
  // if($numrows != 0){
  //   while ($r = mysqli_fetch_array($getsch,MYSQLI_ASSOC)) {
  //     $options .= '<option value="'.$r['shid'].'">'.$r['sname'].'</option>';
  //   }
  // }
  $getcate = mysqli_query($link, "SELECT * FROM Options ORDER BY options ASC");
  $numrows = mysqli_num_rows($getcate);
if($numrows != 0){
    while ($r = mysqli_fetch_array($getcate,MYSQLI_ASSOC)) {
      $optio .= '<option value="'.$r['oid'].'">'.$r['options'].'</option>';
    }
  }
  $stdntfrit = '';
  $stdntfrbf = '';
      if ($_SERVER["REQUEST_METHOD"] == "POST"){

          if (empty($_POST[numit])){
            $numerror = "Please enter the number of people";
          }
          // else {$stdntfrit = clean($_POST["numit"])
          //   if (!preg_match("/^[1-9][0-9]", numit)){
          //     $numerror = "Only integers allowed";
          //   }
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
    </div>
  </div>
</div>
<div id="main">
 <form method="POST" action="" enctype="multipart/form-data">
  <div id="student">
  <div id="one"><span id="log">Request Form</span></div>
 
    <!-- <div class="studntidf">
      <div style="border:1px solid black;" id="one"  class="stdntf">
       <div>
        <span>Information Technology</span>
       </div>
      </div>
    </div>
    <div class="studntidf">
      <div id="one"><input name="numit" type="integer" style="font-size:18px;" placeholder="Number of People" class="stdntf" /></div>
    </div>
    
     <div class="studntidf">
     <div style="border:1px solid black;" id="one" class="stdntf">
       <div>
        <span>Banking  and Finance</span>
       </div>
      </div>
    </div>
    <div class="studntidf">
      <div id="one"><input name="numbknf" type="integer" style="font-size:18px;" placeholder="Number of People" class="stdntf" /></div>
    </div> -->
 <div class="studntidf">
     <!--  <select style="width: 307px;margin-left: 51px;" class="day" name="school" required>
       <option value="">- Select School -</option> -->
       <?php echo $optio;  ?>
      <!-- </select> -->
     </div>


    <div style="color:red; margin-top:10px;" id="one"><?php echo $errorx;?></div>
    <div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
  </div>
 </form>
</div>
<div style="height:77px;float:left;" id="footercnt"></div> 
</body>
</html>
