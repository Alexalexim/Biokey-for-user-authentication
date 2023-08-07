<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$rdate=date("d-m-Y");
if(isset($btn))
{
$mq=mysqli_query($connect,"select max(id) from fp_webuser");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

$rn=rand(1000,9999);
$code=$rn.$i;
mkdir("$code");
copy("web/index.php","$code/index.php");
$url_link="http://iotcloud.co.in/clouddata/$code";

$ins=mysqli_query($connect,"insert into fp_webuser(id,bcode,code,url_link,status,rdate) values($id,'$bcode','$code','$url_link','1','$rdate')");
	if($ins)
	{
	?>
	<script language="javascript">
	window.location.href="adminhome.php?act=success";
	</script>
	<?php
	}
	else
	{
	?>
	<script language="javascript">
	window.location.href="adminhome.php?act=wrong";
	</script>
	<?php
	}
}
//////////
if($act=="del")
{
mysqli_query($connect,"delete from fp_user where id=$did");
?>
<script language="javascript">
window.location.href="adminhome.php";
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
<script language="javascript">
function del()
{
	if(!confirm("Are you sure want to delete?"))
	{
	return false;
	}
	return true;
}
</script>
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
                    <a href="#" class="navbar-brand">Cloud</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li class="active"><a href="adminhome.php" class="smoothScroll">Home</a></li>
                         <li><a href="logout.php" class="smoothScroll">Logout</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#"><i class="fa fa-phone"></i> +65 2244 1100</a></li>
                    </ul>
               </div>

          </div>
     </section>



     <!-- CONTACT -->
     <section id="contact">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <form id="contact-form" role="form" action="" method="post">
                              <div class="section-title">
                                   <h2>Sign Up <small>New Data Owners Register here</small></h2>
                              </div>
								<?php
								if($act=="success")
								{
								?>
								<div class="alert-success">Added Success</div>
								<?php
								}
								if($act=="wrong")
								{
								?>
								<div class="alert-warning">Already Exist!</div>
								<?php
								}
								
								?>
								
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Batch" name="bcode" required="" value="<?php echo $bcode; ?>">
								   
                                   
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="btn" value="Add">
                              </div>

                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/img3.jpg" class="img-responsive" alt="Smiling Two Girls">
							   <img src="images/img2.jpg" class="img-responsive" alt="Smiling Two Girls">
                         </div>
                    </div>

               </div>
          </div>
     </section>       


<?php
				  $qry3=mysqli_query($connect,"select * from fp_webuser");
				  $num3=mysqli_num_rows($qry3);
				  if($num3>0)
				{
				?>
                  <table class="table table-striped thead-dark table-bordered table-hover">
                    <thead>

						
                      <tr>
						<th>S.No</th>
						<th>Batch</th>
						<th>Link</th>
						<th>Date</th>
                        <th>Status</th>
						<th>Action</th>
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
					 <td><?php echo $i; ?></td>
					 <td><?php echo $row3['batch']; ?></td>
					 <td><?php echo $row3['url_link']; ?></td>
					 <td><?php echo $row3['rdate']; ?></td>
					 <td></td>
					 
					 <td><div class="col-md-3 col-sm-4"><a href="adminhome.php?act=del&did=<?php echo $row3['id']; ?>" onClick="return del()"><i class="fa fa-fw fa-times"></i></a></div></td>
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