<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
$rdate=date("d-m-Y");
if(isset($btn))
{
	
$mq=mysqli_query($connect,"select max(id) from fp_user");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

$ins=mysqli_query($connect,"insert into fp_user(id,owner,name,mobile,email,city,uname,pass) values($id,'$uname','$name','$mobile','$email','$city','$user','$pass')");
	
	if($ins)
	{
	?>
	<script language="javascript">
	window.location.href="view_user.php";
	</script>
	<?php
	}
	else
	{
	?>
	<script language="javascript">
	window.location.href="add_user.php?act=wrong";
	</script>
	<?php
	}
	
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
function getmode()
{
	if(document.form1.stype.value=="2")
	{
	document.getElementById("x1").style.display="block";
	}
	else
	{
	document.getElementById("x1").style.display="none";
	}
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
                    <a href="#" class="navbar-brand">Data Owner</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="view_file.php" class="smoothScroll">Home</a></li>
						 <li class="active"><a href="view_user.php" class="smoothScroll">Users</a></li>
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
                         <form name="form1" id="contact-form" role="form" action="" method="post" enctype="multipart/form-data">
                              <div class="section-title">
                                   <h2>New User <small></small></h2>
                              </div>
								<?php
								if($act=="success")
								{
								?>
								<div class="alert-success">Registered Success</div>
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
							  		<input type="text" class="form-control" placeholder="Enter Full Name" name="name" required="" value="<?php echo $name; ?>">
								   <input type="text" class="form-control" placeholder="Enter Mobile No." name="mobile" required="" value="<?php echo $mobile; ?>">
                    
                                   <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required="" value="<?php echo $email; ?>">
								   <input type="text" class="form-control" placeholder="Enter Your City" name="city" required="" value="<?php echo $city; ?>">
								   <input type="text" class="form-control" placeholder="Enter the Username" name="user" required="" value="<?php echo $uname; ?>">
								   <input type="password" class="form-control" placeholder="Enter the Password" name="pass" required="" value="<?php echo $pass; ?>">
                              </div>
								
                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="btn" value="Add">
                              </div>
								
								
                         </form>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="contact-image">
                              <img src="images/img3.jpg" class="img-responsive" alt="">
                         </div>
                    </div>

               </div>
          </div>
     </section>       


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