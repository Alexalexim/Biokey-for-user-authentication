<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

if(isset($btn))
{
$mq=mysqli_query($connect,"select max(id) from fp_owner");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

$ins=mysqli_query($connect,"insert into fp_owner(id,name,mobile,email,city,uname,pass) values($id,'$name','$mobile','$email','$city','$uname','$pass')");
	if($ins)
	{
	?>
	<script language="javascript">
	window.location.href="register.php?act=success";
	</script>
	<?php
	}
	else
	{
	?>
	<script language="javascript">
	window.location.href="register.php?act=wrong";
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
                         <li><a href="index.php" class="smoothScroll">Home</a></li>
                         <li class="active"><a href="register.php" class="smoothScroll">Owner</a></li>
                         <li><a href="login_user.php" class="smoothScroll">User</a></li>
                         <li><a href="login.php" class="smoothScroll">Cloud</a></li>
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
								<div class="alert-success">Registered Success</div>
								<?php
								}
								if($act=="wrong")
								{
								?>
								<div class="alert-warning">Already Exist!</div>
								<?php
								}
								if($pass!=$cpass)
								{
								?>
								<div class="alert-warning">Password does not match!</div>
								<?php
								}
								?>
								
                              <div class="col-md-12 col-sm-12">
                                   <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required="" value="<?php echo $name; ?>">
								   <input type="text" class="form-control" placeholder="Enter Mobile No." name="mobile" required="" value="<?php echo $mobile; ?>">
                    
                                   <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required="" value="<?php echo $email; ?>">
								   <input type="text" class="form-control" placeholder="Enter Your City" name="city" required="" value="<?php echo $city; ?>">
								   <input type="text" class="form-control" placeholder="Enter the Username" name="uname" required="" value="<?php echo $uname; ?>">
								   <input type="password" class="form-control" placeholder="Enter the Password" name="pass" required="" value="<?php echo $pass; ?>">
								   <input type="password" class="form-control" placeholder="Re-type Password" name="cpass">

                                  
                              </div>

                              <div class="col-md-4 col-sm-12">
                                   <input type="submit" class="form-control" name="btn" value="Sign Up">
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