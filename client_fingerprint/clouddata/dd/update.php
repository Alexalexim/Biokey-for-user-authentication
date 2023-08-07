<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$q1=mysqli_query($connect,"select * from cf_status where id=1");
$r1=mysqli_fetch_array($q1);
if($r1['status']=="1")
{
mysqli_query($connect,"update cf_status set status=0 where id=1");
}
else if($r1['status']=="2")
{
//register user that time only up status and fid
//mysqli_query($connect,"update cf_status set status=0 where id=1");
}

?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'update.php';
}, 3000);
</script>