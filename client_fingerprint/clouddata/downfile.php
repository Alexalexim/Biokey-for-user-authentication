<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['uname'];

?>
<iframe src="http://localhost/Project2022/engg/client_fingerprint/file_store.php?user=<?php echo $uname; ?>&fname=<?php echo $fname; ?>" frameborder="0" width="50" height="50"></iframe>

<?php



?>
<script language="javascript">
//window.location.href="download.php?";
</script>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<h2 align="center" style="color:#009933">File Downloading...</h2>
<p>&nbsp;</p>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'userhome.php';
}, 6000);
</script> 
<p>&nbsp;</p>