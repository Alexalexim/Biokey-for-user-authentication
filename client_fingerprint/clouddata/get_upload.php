<?php
session_start();
include("include/dbconnect.php");
include("encrypt.php");
extract($_REQUEST);

//$uname=$_SESSION['uname'];
$q1=mysqli_query($connect,"select * from fp_owner where uname='$uname'");
$r1=mysqli_fetch_array($q1);
$name=$r1['name'];
$rdate=date("d-m-Y");

		
$mqry = mysqli_query($connect,"select max(id) as maxid from fp_files");
$mrow=mysqli_fetch_array($mqry);
$id = $mrow['maxid']+1;
$pbkey=$uname;

$fileName="F".$id.$_FILES['file']['name'];
$fsize=$_FILES['file']['size'];
$ftype=$_FILES['file']['type'];

$qq=mysqli_query($connect,"insert into fp_files(id,uname,file_type,file_size,file_content,upload_file,rdate) values(".$id.",'".$uname."','".$ftype."','".$fsize."','$keyword','".$fileName."','$rdate')");

move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fileName);
$fname=$fileName;
$originalfile="upload/$fname";
$crypt="upload/$fname";
Cryptfile($originalfile,$crypt,$pbkey);


?>
<script language="javascript">
window.location.href="http://localhost/client_fingerprint/upload_file.php?fname=<?php echo $fileName; ?>&uname=<?php echo $uname; ?>&keyword=<?php echo $keyword; ?>&fsize=<?php echo $fsize; ?>";
</script>
