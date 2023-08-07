<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['uname'];
$q1=mysqli_query($connect,"select * from fp_owner where uname='$uname'");
$r1=mysqli_fetch_array($q1);
?>
<form name="form1" method="post" enctype="multipart/form-data" action="http://iotcloud.co.in/clouddata/get_upload.php?uname=<?php echo $uname; ?>">
						<div class="row">
							<div class="col-md-12">
							<input type="text" name="keyword" placeholder="Description" class="form-control" required>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
							<input type="file" name="file" placeholder="Select File" class="form-control" required>
							</div>
						</div>
						<br>
						
						<div class="row">
							<div class="col-md-12">
							<input type="submit" name="btn" class="btn" value="Upload">
							</div>
						</div>
						</form>