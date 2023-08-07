<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$q1=mysqli_query($connect,"select * from fp_det2 where bcode='$bc' && sms_st=0 order by id desc");
$r1=mysqli_fetch_array($q1);
$rid=$r1['id'];

$ss=explode("/",$r1['details']);
	
	if($ss[0]==$bc)
	{

			if($uid==$ss[1])
			{
			mysqli_query($connect,"update fp_det2 set sms_st=1 where id=$rid");
			?>
			<h3 style="color:#009966">Your Fingerprint has Verified..</h3>
			<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'http://localhost/Project2022/engg/client_fingerprint/verify_dec.php?bc=<?php echo $bc; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>';
}, 6000);
</script> 
			<?php
				}
				else
				{
				mysqli_query($connect,"update fp_det2 set sms_st=1 where id=$rid");
			?>
			<h3 style="color:#FF0000">Fingerprint not match!</h3>
			<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'verify_finger2.php?bc=<?php echo $bc; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>';
}, 6000);
</script> 
			<?php
				}
	}
	else
	{
	?>
			<h3 style="color:#FF0000">Wait for Fingerprint!!</h3>
			<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'verify_finger2.php?bc=<?php echo $bc; ?>&uid=<?php echo $uid; ?>&fid=<?php echo $fid; ?>';
}, 6000);
</script> 
			<?php
	}

?>