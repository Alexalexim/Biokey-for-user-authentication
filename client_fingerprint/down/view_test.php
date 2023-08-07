<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['uname'];
?>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>COVID19</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mamba - v2.0.1
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="icofont-envelope"></i><a href="mailto:contact@example.com">contact@healthdept.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a href="#"><span>COVID19</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="user.php">Home <i class="la la-angle-down"></i></a></li>
		  <li><a href="view_test.php">Test Details</a></li>
          <li><a href="logout.php">Logout</a></li>
          <!--<li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>-->
          
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
  
  

                 
                  <p align="center"><strong>Patient Test Result </strong></p>
                  <?php
				  $q1=mysqli_query($connect,"select * from sm_patient where status>0 && entry_user='$uname'");
				  $n1=mysqli_num_rows($q1);
				  if($n1>0)
				  {
				  ?>
				  <table width="90%" border="1" align="center">
                    <tr>
                      <th>Sno</th>
                      <th>Patient ID </th>
                      <th>Date</th>
                      <th>BMI</th>
                      <th>Symptoms</th>
                      <th>Symptoms Test Result </th>
                      <th>E-Nose Test </th>
                    </tr>
					<?php
					$i=0;
					while($r1=mysqli_fetch_array($q1))
					{
					$i++;
					?>
					
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $r1['name']." (".$r1['uname'].")"; ?></td>
                      <td><?php echo $r1['rdate']; ?></td>
                      <td>
					  
					  <?php
					  if($r1['bmi'] <= 18.4)
					  { 
            			echo "BMI: ".$r1['bmi'].", underweight";
					  }
					  else if($r1['bmi'] <= 24.9)
					  { 
            			echo "BMI: ".$r1['bmi'].", healthy";
					  }
					  else if($r1['bmi'] <= 29.9)
					  { 
            			echo "BMI: ".$r1['bmi'].", over weight";
					  }
					  else if($r1['bmi'] <= 34.9)
					  { 
            			echo "BMI: ".$r1['bmi'].", severely over weight";
					  }
					  else if($r1['bmi'] <= 39.9)
					  { 
            			echo "BMI: ".$r1['bmi'].", obese";
					  }
					  else
					  {
					  echo "BMI: ".$r1['bmi'].", severely obese..";
					  }
      					?>					  </td>
                      <td>
					  <?php
					  if($r1['fever']=='1') 
					  {
					  echo "Fever: Yes";
					  }
					  else
					  {
					  echo "Fever: No";
					  }
					  ?>
					  
					  <br>
					  <?php
					  if($r1['headache']=='1') 
					  {
					  echo "Headache: Yes";
					  }
					  else
					  {
					  echo "Headache: No";
					  }
					  ?>
					  <br>
					  <?php
					  if($r1['vomit']=='1') 
					  {
					  echo "Vomiting: Yes";
					  }
					  else
					  {
					  echo "Vomiting: No";
					  }
					  ?>
					 
					  <br>
					  <?php
					  if($r1['tired']=='1') 
					  {
					  echo "Tiredness: Yes";
					  }
					  else
					  {
					  echo "Tiredness: No";
					  }
					  ?>
					 
					  
					  <br>
					  <?php
					  if($r1['cough']=='1') 
					  {
					  echo "Dry-Cough: Yes";
					  }
					  else
					  {
					  echo "Dry-Cough: No";
					  }
					  ?>
					  
					  <br>
					  <?php
					  if($r1['breath']=='1') 
					  {
					  echo "Difficulty-in-Breathing: Yes";
					  }
					  else
					  {
					  echo "Difficulty-in-Breathing: No";
					  }
					  ?>
					 
					  <br>
					  <?php
					  if($r1['throat']=='1') 
					  {
					  echo "Sore-Throat: Yes";
					  }
					  else
					  {
					  echo "Sore-Throat: No";
					  }
					  ?>
					
					  <br>
					  <?php
					  if($r1['pains']=='1') 
					  {
					  echo "Pains: Yes";
					  }
					  else
					  {
					  echo "Pains: No";
					  }
					  ?>
					  
					  <br>
					  <?php
					  if($r1['nasal']=='1') 
					  {
					  echo "Nasal-Congestion: Yes";
					  }
					  else
					  {
					  echo "Nasal-Congestion: No";
					  }
					  ?>
					  
					  <br>
					  <?php
					  if($r1['nose']=='1') 
					  {
					  echo "Runny-Nose: Yes";
					  }
					  else
					  {
					  echo "Runny-Nose: No";
					  }
					  ?>
					 
					  <br>
					  <?php
					  if($r1['diarrhea']=='1') 
					  {
					  echo "Diarrhea: Yes";
					  }
					  else
					  {
					  echo "Diarrhea: No";
					  }
					  ?>
					  
					  <br>
					  <?php
					  if($r1['contact']=='1') 
					  {
					  echo "Known Contact: Yes";
					  }
					  else
					  {
					  echo "Known Contact: No";
					  }
					  ?>					    </td>
                      <td>
					  <?php
					  	 if($r1['status']=='1')
							  {
							  echo "High";
							  }
							  else if($r1['status']=='2')
							  {
							  echo "Moderate";
							  }
							  else if($r1['status']=='3')
							  {
							  echo "Mild";
							  }
							  else
							  {
							  echo 'Low';
							  }
					  ?>
					  </td>
                      <td><?php
					  // || $r1['status']=='2' || $r1['status']=='3'
					  if($r1['enose_st']=="2")
					  {
					  echo "Covid Positive";
					  }
					  else if($r1['enose_st']=="3")
					  {
					  echo "Covid Negative";
					  }
					  
					  ?>
					  </td>
                    </tr>
					<?php
					}
					?>
                  </table>
				  <?php
				  }
				  else
				  {
				  ?><h4 align="center">No Result</h4><?php
				  }
				  ?>
                  <p>&nbsp;</p>
  

  <!-- ======= Footer ======= -->
  <footer id="footer">
   

    <div class="container">
      <div class="copyright">
        COVID19
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
        <a href="https://bootstrapmade.com/"></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>