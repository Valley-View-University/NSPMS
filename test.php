<?php

$link = mysqli_connect('localhost','root', '', 'nspms');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

$link1 = mysqli_connect('localhost','root', '', 'nspmsv');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

function voucher($link,$link1){
	//$vnum = 0;
	$codex = '';
	
   
    for($i=0;$i<100;$i++){
    	$time = time();
	    $end = $time*7;
	    $end = md5($end);
	    $end = substr($end, 0,15);
    	$insert = mysqli_query($link1,"INSERT INTO voucher(`code`,`time`) VALUES ('$end',now())  ");
    	
    	$end1 = md5($end);
    	$insert1 = mysqli_query($link,"INSERT INTO voucher(`code`,`time`) VALUES ('$end1',now())  ");
	   
	    if($insert AND $insert1){
	     //	$vnum++;
	    	$codex .= $end.'<br>';
	    }
	    else{
	    	return 'error insrting';
	    }
	    sleep(1);
    }
    return $codex;
    
    

}

echo voucher($link, $link1);

?>
