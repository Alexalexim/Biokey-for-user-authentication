<?php
include("include/dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
$ch1=mktime(date('h')+5,date('i')+30,date('s'));
$rtime=date('h:i:s A',$ch1);


//when--device is on
mysqli_query($connect,"update fp_status set rdate='$rdate',rtime='$rtime' where bcode='$status'");


?>