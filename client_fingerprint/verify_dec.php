<?php
session_start();
include("dbconnect.php");
include("decrypt.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];


$q2=mysqli_query($connect,"select * from fp_files where id='$fid'");
$r2=mysqli_fetch_array($q2);
$uu=$r2['uname'];
echo $fname=$r2['upload_file'];

$q1=mysqli_query($connect,"select * from fp_owner where uname='$uu'");
$r1=mysqli_fetch_array($q1);
$key=$r1['img_key'];
$k=substr($key,0,8);
$crypt = "upload/$fname";
	$decrypt = "down/$fname";
	DecryptFile($crypt,$decrypt,$uu);


?>
<h3 style="color:#009966"><a href="download.php?file1=<?php echo $fname; ?>&folder1=down">Download now</a></h3>