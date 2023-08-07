<?php
include("dbconnect.php");
extract($_REQUEST);

$rdate=date("d-m-Y");
$q1=mysqli_query($connect,"select * from fp_files where upload_file='$fname'");
$r1=mysqli_fetch_array($q1);
$fid=$r1['id'];		

$q2=mysqli_query($connect,"select * from fp_down where fid='$fid' && uname='$user'");
$n2=mysqli_num_rows($q2);
	if($n2==0)
	{	
$mqry = mysqli_query($connect,"select max(id) as maxid from fp_down");
$mrow=mysqli_fetch_array($mqry);
$id = $mrow['maxid']+1;


$qq=mysqli_query($connect,"insert into fp_down(id,uname,fid,filename,rdate) values($id,'$user','$fid','$fname','$rdate')");
	}

?>