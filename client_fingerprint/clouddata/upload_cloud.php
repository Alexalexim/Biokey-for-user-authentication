<?php
include("include/dbconnect.php");
extract($_REQUEST);

$rdate=date("d-m-Y");

if(isset($btn))
{
		
$mqry = mysqli_query($connect,"select max(id) as maxid from fp_files");
$mrow=mysqli_fetch_array($mqry);
$id = $mrow['maxid']+1;

$fileName=$_FILES['file']['name'];
$fsize=$_FILES['file']['size'];
$ftype=$_FILES['file']['type'];

$qq=mysqli_query($connect,"insert into fp_files(id,uname,file_type,file_size,file_content,upload_file,rdate) values(".$id.",'".$owner."','".$ftype."','".$fsize."','','".$fileName."','$rdate')");

move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$fileName);
?>
<h4 style="color:#006633">File has sent..</h4>
<?php
}

?>