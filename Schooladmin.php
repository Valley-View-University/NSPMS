<?php 
require 'inc/connect.php';
require 'inc/clean.inc';
$errorx=$options ='';
  $getsch = mysqli_query($link, "SELECT * FROM school ORDER BY sname ASC");
  $numrows = mysqli_num_rows($getsch);
  if($numrows != 0){
    while ($r = mysqli_fetch_array($getsch,MYSQLI_ASSOC)) {
      $options .= '<option value="'.$r['shid'].'">'.$r['sname'].'</option>';
    }
  }
  if(isset($_POST['submit'])){
      $error = 0;
      $errormsg = '';

      $school = clean($link, $_POST['school']);
       if(empty($school) == true){
        $error++;
        $errormsg .= 'Please select a school<br>';
      }
       $password = clean($link, $_POST['pass']);
       if(empty($password) == true){
        $error++;
        $errormsg .= 'Please enter password<br>';
      }

      $csvnm = $_FILES['csvfile']['name'];
      if(empty($csvnm) == true){
        $error++;
        $errormsg .= 'Upload file of csv type<br>';
      }
      else{ 
        $csvtmp = $_FILES['csvfile']['tmp_name'];
        $allow = array('csv');
        $bits = explode('.', $csvnm); 
        $file_extn = strtolower(end($bits));
        if (in_array($file_extn, $allow)==false){
            $error++;
            $errormsg .= 'Invalid file format uploaded. (Only CSV files allowed)'.$csvtmp.'<br>';
        }

      }

      if($error == 0){
          $password = md5($password);
          $qx = mysqli_query($link, "SELECT shid,sname FROM school WHERE shid = '$school'and spassword = '$password'");
            $numrows= mysqli_num_rows($getsch);
              if($numrows != 0){
                $year = date("Y", time());
                $xa = mysqli_query($link, "SELECT sid FROM studentinfo WHERE year='$year' AND instituition='$school' ");
                $xnum = mysqli_num_rows($xa);
                if($xnum > 0){
                  $zx = mysqli_query($link, "DELETE FROM studentinfo WHERE year='$year' AND instituition='$school'");
                }

                $handle = fopen($csvtmp, "r");
                $count = $done = 0;
                while(($filesop = fgetcsv($handle,1000,",")) !== false){

                    $studentid = $filesop[0];
                    $f_name = $filesop[1];
                    $middle_name = $filesop[2];
                    $last_name = $filesop[3];
                    $program = $filesop[4];
                    $email = $filesop[5];
                    $contact = $filesop[6];
                    $gender = $filesop[7];
                    if($gender =="male" ){
                      $genderx = "m";
                    }
                    else{
                      $genderx = "f";
                    }
                    $address = $filesop[8];

                    $insertion = mysqli_query($link,"INSERT INTO studentinfo(studentid,fname,mname,lname,program,email,phonenum,gender,resaddress,instituition,year) VALUES('$studentid','$f_name','$middle_name', '$last_name','$program','$email','$contact','$genderx','$address','$school','$year')");
                    if($insertion){
                      $count++;
                    }
                }
                if($insertion){
                      $errorx = '<span style="color:green;">'.$count.' Student(s) enrolled</span>';
                    }
              }
              else{
                $errorx = 'Invalid password and school combination';
              }
     }
     else{
        $errorx = $errormsg;
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
      <div id="logobx"></div>
    </div>
  </div>
</div>
<div id="main">
 <form method="POST" action="" enctype="multipart/form-data">
  <div id="student">
  <div id="one"><span id="log">Upload student list</span></div>
  <div class="studntidf">
      <select style="width: 307px;margin-left: 51px;" class="day" name="school" required>
       <option value="">- Select School -</option>
       <?php echo $options;  ?>
      </select>
     </div>
    <div class="studntidf">
      <div id="one"><input name="pass" type="password" style="font-size:18px;" placeholder="password" class="stdntf" required/></div>
    </div>
    <div style="margin-top:20px;" class="studntidf">
      <div id="one"><input name="csvfile" type="file" style="font-size:18px;" placeholder="voucher code" class="stdntf" required/></div>
    </div>
    <div style="color:red; margin-top:10px;" id="one"><?php echo $errorx;?></div>
    <div id="one"><button name="submit" id="submit"type="submit">submit</button></div>
  </div>
 </form>
</div>
<div style="height:77px;" id="footercnt"></div>
</body>
</html>
