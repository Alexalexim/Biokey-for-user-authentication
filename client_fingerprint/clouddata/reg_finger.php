<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$q1=mysqli_query($connect,"select * from fp_det where bcode='$bc' order by id desc");
$r1=mysqli_fetch_array($q1);
$ss=explode("/",$r1['details']);
	
	if($ss[0]==$bc && $ss[1]==$fid)
	{

			$q11=mysqli_query($connect,"select * from fp_status where bcode='$bc'");
			$r11=mysqli_fetch_array($q11);
			$st=$r11['status'];
			
			if($st=="1")
				{
				
			mysqli_query($connect,"update fp_status set fid=0 where bcode='$bc'");
			
			
			//header("location:view_det.php?id=".$id);
			?>
			<h3 style="color:#009966">Your Fingerprint has Stored..</h3>
			<?php
				}
				else
				{
			?>
			<h3 style="color:#FF0000">Fingerprint not stored!</h3>
			<?php
				}
	}
	else
	{
	?>
			<h3 style="color:#FF0000">Wait for Fingerprint!!</h3>
			<?php
	}

?>
<script language="javascript">
	setTimeout(function () {
   //Redirect with JavaScript
 window.location.href="reg_finger.php?bc=<?php echo $bc; ?>&fid=<?php echo $fid; ?>";
  
}, 6000);
	</script>