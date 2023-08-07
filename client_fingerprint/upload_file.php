<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$_SESSION['uname']=$uname;

$mqry = mysqli_query($connect,"select max(id) as maxid from fp_files");
$mrow=mysqli_fetch_array($mqry);
$id = $mrow['maxid']+1;
$pbkey=$uname;

//$fileName="F".$id.$_FILES['file']['name'];
//$fsize=$_FILES['file']['size'];
//$ftype=$_FILES['file']['type'];
$dd=file_get_contents("http://iotcloud.co.in/clouddata/upload/$fname");
//$fp=fopen("img.txt","w");
//fwrite($fp,$dd);
file_put_contents("upload/$fname",$dd);

$qq=mysqli_query($connect,"insert into fp_files(id,uname,file_type,file_size,file_content,upload_file,rdate) values(".$id.",'".$uname."','".$ftype."','".$fsize."','$keyword','".$fname."','$rdate')");

//move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fileName);

?>
<script language="javascript">
window.parent.location.href="owner_finger_verify.php?fid=<?php echo $id; ?>";
</script>