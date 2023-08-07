<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

//$status='T1'

$q1=mysqli_query($connect,"select * from fp_status where bcode='$status'");
$r1=mysqli_fetch_array($q1);

if($r1['status']=="2")
{
echo $r1['fid'];
}
else
{
echo '0';
}

?>