<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['uname'];

$q1=mysqli_query($connect,"select * from fp_files where id=$fid");
$r1=mysqli_fetch_array($q1);
$fn=$r1['upload_file'];

if(isset($btn))
{

	for($i=0;$i<count($usr);$i++)
	{
	$mq=mysqli_query($connect,"select max(id) from fp_access");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

$ins=mysqli_query($connect,"insert into fp_access(id,fid,owner,uname) values($id,'$fid','$uname','$usr[$i]')");
	}
?>
<script language="javascript">
window.locaion.href="file_access.php?act=success&fid=<?php echo $fid; ?>";
</script>
<?php
}

/////////////////
if($act=="del")
{
mysqli_query($connect,"delete from fp_access where id=$did");
?>
<script language="javascript">
window.location.href="file_access.php?fid=<?php echo $fid; ?>";
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

     <title>Cloud</title>
<!-- 

Known Template 

https://templatemo.com/tm-516-known

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="#" class="navbar-brand">Data Owner</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="view_file.php" class="smoothScroll">Home</a></li>
						 <li><a href="view_user.php" class="smoothScroll">Users</a></li>
                         <li><a href="logout.php" class="smoothScroll">Logout</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#"><i class="fa fa-phone"></i> +65 2244 1100</a></li>
                    </ul>
               </div>

          </div>
     </section>


    <h2 align="center">Access Privilege</h2>
	<h3 align="center">File: <?php echo $fn; ?></h3>
	<p>&nbsp;</p>
	<div class="row">
	<div class="col-md-2">
	</div>
	<div class="col-md-8">
	<form name="form1" method="post">
	 <?php
				  $qry3=mysqli_query($connect,"select * from fp_user where owner='$uname'");
				  $num3=mysqli_num_rows($qry3);
				  if($num3>0)
				{
				?>
                  <table class="table table-striped thead-dark table-bordered table-hover">
                    <thead>

						
                      <tr>
						<th>Select</th>
						<th>User</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$i=0;
					while($row3=mysqli_fetch_array($qry3))
					{
					$i++;
					?>
					<tr>
					 <td><input type="checkbox" name="usr[]" value="<?php echo $row3['uname']; ?>"></td>
					 <td><?php echo $row3['uname']; ?></td>
					
					 </tr>
					  <?php
					 }
					 ?>
					
					</tbody>
                    
				</table>
				 <?php
				}
				else
				{
				echo "<p align=center>Empty Result!</p>";
				}
				?>
				<p align="center"><input type="submit" name="btn" value="Allow"></p>
			</form>
    <p>&nbsp;</p>
	<?php
				  $qry4=mysqli_query($connect,"select * from fp_access where fid='$fid'");
				  $num4=mysqli_num_rows($qry4);
				  if($num4>0)
				{
				?>
				<h3>Allowed Users</h3>
                  <table class="table table-striped thead-dark table-bordered table-hover">
                    <thead>

						
                      <tr>
						<th>Sno</th>
						<th>User</th>
						<th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$i=0;
					while($row4=mysqli_fetch_array($qry4))
					{
					$i++;
					?>
					<tr>
					 <td><?php echo $i; ?></td>
					 <td><?php echo $row4['uname']; ?></td>
					 <td><?php echo '<a href="file_access.php?act=del&did='.$row4['id'].'&fid='.$fid.'">Delete</a>'; ?></td>
					 </tr>
					  <?php
					 }
					 ?>
					
					</tbody>
                    
				</table>
				 <?php
				}
				else
				{
				
				}
				?>
	</div>
	</div>
	<p>&nbsp;</p>
     <!-- FOOTER -->
     <footer id="footer">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Cloud Service</h2>
                              </div>
                              <address>
                                   <p>Google / Amazon / Salesforce</p>
                              </address>

                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                              </ul>

                              <div class="copyright-text"> 
                                   <p>Cloud - Fingerprint</p>
                                   
                                   <p></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-6">
                         <div class="footer-info">
                              <div class="section-title">
                                   <h2>Contact Info</h2>
                              </div>
                              <address>
                                   <p>+65 2244 1100, +66 1800 1100</p>
                                   <p><a href="mailto:youremail.co">cloud@gmail.com</a></p>
                              </address>

                              <div class="footer_menu">
                                   <h2>Quick Links</h2>
                                   <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Owner</a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                         
                    </div>
                    
               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>


</body>
</html>