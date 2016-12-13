<?php
require 'clean.inc';


function controllogin($link, $username, $password){
	$loge = 0;
	$username = clean($link,$username);
    $password = clean($link,$password);

    if(empty($username) == true){
        $loge++;
    }
    if(empty($password) == true){
        $loge++;
    }

    if($loge == 0){
        
        $checkq = mysqli_query($link, "SELECT id FROM admin WHERE name='$username' AND password='$password' ");
        $cknum = mysqli_num_rows($checkq);
        if($cknum == 1){
            $getx = mysqli_fetch_assoc($checkq);
            $id = $getx['id'];
            return '1|'.$id;
        }
        else{
        	return '0|';
        }
    }
    else{
    	return '0|';
    }

}

?>