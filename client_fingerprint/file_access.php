<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
//$qq=mysqli_query($connect,"select * from fp_status where uname='$user'");
//$rr=mysqli_fetch_array($qq);


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
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php include("title.php"); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

		<!-- CSS here -->
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style.css">
   </head>

   <body>
    <!-- Preloader Start -->
    <!--<div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loder.jpg" alt="">
                </div>
            </div>
        </div>
    </div>-->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparent">
            <div class="main-header">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-1 col-md-1">
                                <div class="logo">
                                  <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="owner_home.php">Home</a></li>
                                            <li><a href="owner_files.php">Files</a></li>
											<!--<li><a href="owner_send.php">Send to Cloud</a></li>-->
											<li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>             
                            <div class="col-xl-2 col-lg-3 col-md-3">
                                <div class="header-right-btn f-right d-none d-lg-block">
                                    <a href="#" class="btn header-btn">
                                        <!-- iocn -->
                                       <!-- <svg   xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22px" height="25px">
                                       <path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M17.433,17.550 C20.041,18.419 21.933,21.164 21.933,24.076 C21.933,24.336 21.722,24.547 21.461,24.547 L0.704,24.547 C0.443,24.547 0.232,24.336 0.232,24.076 C0.232,21.164 2.124,18.419 4.731,17.550 L6.974,16.802 L7.778,15.193 C7.707,15.121 7.637,15.047 7.570,14.970 C7.248,14.600 6.984,14.188 6.779,13.744 L6.365,13.744 C5.584,13.744 4.949,13.109 4.949,12.329 L4.949,11.776 C4.400,11.581 4.006,11.057 4.006,10.442 L4.006,7.470 C4.006,3.559 7.170,0.393 11.082,0.393 C14.984,0.393 18.159,3.568 18.159,7.470 L18.159,10.442 C18.159,11.223 17.524,11.857 16.744,11.857 L15.885,11.857 L15.785,12.459 C15.615,13.477 15.111,14.455 14.386,15.192 L15.191,16.802 L17.433,17.550 ZM10.443,22.156 L11.082,23.184 C11.755,22.105 11.722,22.154 11.745,22.122 C12.128,21.613 12.485,21.078 12.812,20.528 L11.039,18.755 L9.357,20.535 C9.681,21.080 10.038,21.613 10.420,22.122 C10.428,22.134 10.435,22.145 10.443,22.156 ZM11.020,17.402 L11.854,16.521 C11.599,16.562 11.340,16.584 11.082,16.584 C10.753,16.584 10.423,16.550 10.099,16.481 L11.020,17.402 ZM8.381,16.097 L7.819,17.222 C8.109,18.061 8.463,18.882 8.875,19.671 L10.372,18.088 L8.381,16.097 ZM11.688,18.069 L13.289,19.671 C13.701,18.884 14.055,18.063 14.346,17.222 L13.704,15.938 L11.688,18.069 ZM7.016,17.783 L5.030,18.445 C2.936,19.143 1.381,21.267 1.194,23.604 L10.233,23.604 L9.652,22.672 C9.181,22.042 8.747,21.379 8.361,20.700 C8.360,20.699 8.359,20.698 8.358,20.696 C7.830,19.767 7.379,18.789 7.016,17.783 ZM5.893,12.329 C5.893,12.589 6.105,12.801 6.365,12.801 L6.450,12.801 C6.423,12.688 6.399,12.574 6.380,12.459 L6.280,11.857 L5.893,11.857 L5.893,12.329 ZM4.949,10.442 C4.949,10.702 5.161,10.914 5.421,10.914 L6.141,10.914 C6.024,10.005 5.945,9.042 5.912,8.096 C5.912,8.095 5.912,8.095 5.912,8.095 C5.912,8.093 5.912,8.092 5.912,8.090 C5.910,8.040 5.909,7.991 5.907,7.941 L4.949,7.941 L4.949,10.442 ZM16.744,10.914 C17.004,10.914 17.215,10.702 17.215,10.442 L17.215,7.941 L16.258,7.941 C16.257,7.969 16.256,7.995 16.255,8.022 C16.223,8.996 16.143,9.985 16.023,10.914 L16.744,10.914 ZM16.271,6.998 L17.197,6.998 C16.956,3.836 14.305,1.337 11.082,1.337 C7.845,1.337 5.206,3.836 4.967,6.998 L5.894,6.998 C5.928,4.393 8.049,2.281 10.660,2.281 L11.505,2.281 C14.115,2.281 16.237,4.393 16.271,6.998 ZM15.328,7.065 C15.329,4.953 13.618,3.224 11.505,3.224 L10.660,3.224 C8.679,3.224 7.055,4.742 6.857,6.663 C7.659,5.688 8.872,5.111 10.139,5.111 C10.264,5.111 10.384,5.160 10.472,5.249 C11.618,6.394 13.131,7.151 14.734,7.380 L15.324,7.464 C15.324,7.463 15.324,7.461 15.324,7.460 C15.327,7.342 15.328,7.213 15.328,7.065 ZM14.854,12.304 C14.941,11.778 14.975,11.590 15.018,11.298 C15.018,11.297 15.018,11.297 15.018,11.297 C15.154,10.387 15.249,9.398 15.296,8.413 L14.601,8.314 C12.865,8.066 11.222,7.268 9.952,6.060 C8.987,6.115 8.080,6.598 7.497,7.375 L6.862,8.222 C6.922,9.703 7.192,12.015 7.428,12.801 L8.804,12.801 C8.993,12.263 9.510,11.857 10.139,11.857 L11.082,11.857 C11.863,11.857 12.498,12.492 12.498,13.273 C12.498,14.054 11.864,14.688 11.082,14.688 L10.139,14.688 C9.524,14.688 8.999,14.293 8.805,13.744 L7.843,13.744 C8.388,14.658 9.233,15.296 10.155,15.526 C10.762,15.678 11.402,15.678 12.010,15.526 C13.486,15.157 14.604,13.802 14.854,12.304 ZM9.667,13.273 C9.667,13.533 9.879,13.744 10.139,13.744 L11.082,13.744 C11.343,13.744 11.554,13.533 11.554,13.273 C11.554,13.012 11.342,12.801 11.082,12.801 L10.139,12.801 C9.878,12.801 9.667,13.012 9.667,13.273 ZM13.820,20.671 C13.820,20.671 13.820,20.672 13.820,20.672 C13.817,20.677 13.815,20.681 13.813,20.685 C13.423,21.372 12.985,22.040 12.512,22.672 L11.932,23.604 L20.970,23.604 C20.784,21.267 19.228,19.143 17.135,18.445 L15.149,17.783 C14.788,18.781 14.342,19.751 13.820,20.671 ZM16.272,20.019 C16.011,20.019 15.800,19.807 15.800,19.547 C15.800,19.287 16.011,19.075 16.272,19.075 C16.532,19.075 16.744,19.287 16.744,19.547 C16.744,19.807 16.532,20.019 16.272,20.019 ZM18.217,20.073 C18.776,20.503 19.237,21.064 19.553,21.695 C19.669,21.928 19.574,22.212 19.341,22.328 C19.109,22.444 18.825,22.350 18.708,22.116 C18.457,21.612 18.088,21.165 17.642,20.822 C17.435,20.663 17.397,20.366 17.556,20.160 C17.714,19.953 18.011,19.914 18.217,20.073 Z"/>
                                       </svg>--><?php include("title3.php"); ?>
                                    </a>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
    <main>

        <!-- Hero Start-->
        <div class="slider-area slider-bg ">
            <div class="single-slider d-flex align-items-center slider-height2 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center pt-50">
                                <h2><?php include("title3.php"); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider Shape -->
            <div class="slider-shape d-none d-lg-block">
                <img class="slider-shape1" src="assets/img/hero/top-left-shape.png" alt="">
                <img class="slider-shape2" src="assets/img/hero/right-top-shape.png" alt="">
                <img class="slider-shape3" src="assets/img/hero/left-botom-shape.png" alt="">
            </div>
        </div>
        <!--Hero End -->
        <!--All startups Start -->
        <section class="all-starups-area section-padding2">
            <!-- left Contents -->
            <div class="row">
				<div class="col-md-2">
				</div>
				<div class="col-md-4">
					<div class="starups-details">
						<!-- Section Tittle -->
						<div class="section-tittle section-tittle3">
							<span>Data User</span>
							<h3>File Sharing</h3>
						</div>
						
						 
						<!-- details caption -->
						<div class="details-caption">
						   
						</div>
                    
                	</div>
				<form name="form1" method="post">
	 <?php
				  $qry3=mysqli_query($connect,"select * from fp_owner where owner='$uname' && utype='user'");
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
					 <td><?php echo '<a href="file_access.php?act=del&did='.$row4['id'].'&fid='.$fid.'" style="color:#FF6666">Delete</a>'; ?></td>
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
			<div class="col-md-6">
            <!--Right Contents  -->
				<!--<div class="starups-img">-->
					<img src="assets/img/gallery/visit_bg.jpg" alt="" class="img-fluid">
				<!--</div>-->
			</div>
			</div>
        </section>
        <!--All startups End -->
        <!-- work company Start-->
       
        <!-- work company End-->
        <!-- Our pricing Start -->
        
        <!-- Our pricing End -->
        <!-- Testimonial Start -->
        
        <!-- Testimonial End -->

    </main>
    <footer>
        <!-- Footer Start-->
        <div class="footer-area">
            <div class="container">
               <div class="footer-top footer-padding">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>All packages</h4>
                                    <ul>
                                        <li><a href="#">Package-1</a></li>
                                        <li><a href="#">Package-2</a></li>
                                        <li><a href="#">Package-3</a></li>
                                        <li><a href="#">Custome</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick Link</h4>
                                    <ul>
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">News & Articles</a></li>
                                        <li><a href="#">Privacy Policy</a></li>     
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>+1 514 648 256</h4>
                                    <ul>
                                        <li><a href="#">cloud@gmail.com</a></li>
                                    </ul>
                                    <p>Cloud</p>
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
                <div class="footer-bottom">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-9 col-lg-9 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  <?php include("title4.php"); ?>  <a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3">
                            <!-- Footer Social -->
                            <div class="footer-social f-right">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>


    <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Nice-select, sticky -->
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        
    </body>
</html>