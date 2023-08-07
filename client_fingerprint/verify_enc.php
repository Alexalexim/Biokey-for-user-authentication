<?php
session_start();
include("dbconnect.php");
include("encrypt.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$q1=mysqli_query($connect,"select * from fp_owner where uname='$uname'");
$r1=mysqli_fetch_array($q1);
$key=$r1['img_key'];
$k=substr($key,0,8);
$q2=mysqli_query($connect,"select * from fp_files where id='$fid'");
$r2=mysqli_fetch_array($q2);
$fname=$r2['upload_file'];

/*$originalfile="upload/$fname";
$crypt="upload/$fname";
Cryptfile($originalfile,$crypt,$k);*/

mysqli_query($connect,"update fp_files set status=1 where id=$fid");
?>
<h3 style="color:#009966">File has Successfully Encrypted..</h3>

<script language="javascript">
	setTimeout(function () {
   //Redirect with JavaScript
 window.location.href="owner_files.php";
  
}, 3000);
	</script>