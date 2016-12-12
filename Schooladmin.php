<?php
session_start();
require 'connect.php';
require 'clean.inc';

if(isset($_SESSION['id']) == true){
	$id = $_SESSION['id'];
  	$controldata = get_control_data($link,$ctid, 'eid', 'title', 'fname', 'lname','avatar');
  	if(empty($controldata['eid']) == true){
  		$controlnm = 'Control';
  		$avatar = 'default.png';
  	}
  	else{
  		$controlnm = $controldata['title'].' '.$controldata['fname'].' '.$controldata['lname'];
  		if(empty($controldata['avatar'] == true)){
  			$avatar = 'default.png';
  		}
  		else{
  			$avatar = 'employees/'.$controldata['avatar'];
  		}
  	}

  	$lastlog = get_last_log($link, $ctid);
  	$adminnum = total_admins($link);
  	$employnum = total_employee($link);
  	$tutornum = total_tutors($link);


}
else{
	header('location: control.php');
}




?>