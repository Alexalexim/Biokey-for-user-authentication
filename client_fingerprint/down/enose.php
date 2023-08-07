<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];

$rdate=date("d-m-Y");
$ch1=mktime(date('h')+5,date('i')+30,date('s'));
$rtime=date('h:i:s A',$ch1);

$qry2=mysqli_query($connect,"select * from sm_admin where username='admin'");
$row2=mysqli_fetch_array($qry2);
$email1=$row2['email'];

$qry=mysqli_query($connect,"select * from sm_patient where uname='$pid'");
$row=mysqli_fetch_array($qry);
$name=$row['name'];
$mobile=$row['mobile'];
$email=$row['email'];
$address=$row['address'];
$aadhar=$row['aadhar'];
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

  <style type="text/css">
<!--
.style1 {color: #0033FF}
-->
  </style>
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
  <h3 align="center">Patient ID: <?php echo $pid; ?></h3>
  <table width="660" border="0" align="center">
    <tr>
      <td align="left"><?php echo $rdate; echo ", 02:15:27 PM"; //.", ".$rtime; ?></td>
    </tr>
    <tr>
      <td align="center">
	  <?php
	  $q3=mysqli_query($connect,"select * from sm_patient where view_st=1");
  $r3=mysqli_fetch_array($q3);
	  if($r3['enose_st']=="1")
	  {
	  ?>
	  <img src="assets/img/nose2.jpg" width="586" height="363">
	  <?php
	  }
	  else
	  {
	  ?>
	  <img src="assets/img/nose1.jpg" width="586" height="363">
	  <?php
	  }
	  ?>
	  </td>
    </tr>
</table>
  <form name="form1" method="post" action="">
    <div align="center">
      <input type="submit" name="btn" value="Covid19 Exhaled Breath Test">
    </div>
  </form>
  <p align="center">&nbsp;</p>
  <?php
  if(isset($btn))
  {
  mysqli_query($connect,"update sm_patient set view_st=0");
  mysqli_query($connect,"update sm_patient set sms_st=1,enose_st=1,view_st=1 where uname='$pid'");
  $act="1";
  ?>
  <script language="javascript">
  window.location.href="enose.php?act=<?php echo $act; ?>&pid=<?php echo $pid; ?>";
  </script>
  <?php
  }
 /* if($act=="yes")
  {
  mysqli_query($connect,"update sm_patient set view_st=0");
  mysqli_query($connect,"update sm_patient set enose_st=1,view_st=1 where uname='$pid'");
  mysqli_query($connect,"update sm_det set sms_st=0 where id=1");
  }*/
  
  if($act>=1)
  {
  	if($act=="6")
	{
	$act="";
	}
	else
	{
  	$act+=1;
	}
  }
  //print($act);
  
  
  $q1=mysqli_query($connect,"select * from sm_det order by id desc");
  $r1=mysqli_fetch_array($q1);
  
  $q2=mysqli_query($connect,"select * from sm_patient where view_st=1");
  $r2=mysqli_fetch_array($q2);
  
  
  //if($r2['sms_st']=="1")
  if($act=="1")
  {
  mysqli_query($connect,"update sm_patient set enose_st=1 where uname='$pid'");
  
  }
  if($act=="3")
  {
  mysqli_query($connect,"update sm_patient set sms_st=2,enose_st=0 where uname='$pid'");
  
  }
  
  //if($r2['sms_st']=="2")
  if($act=="4")
  {
  
  $ss=explode('t',$r1['details']);
  $vv=explode('/',$ss[0]);
  //echo "$vv[0]>=150 || $vv[1]>=600 || $vv[2]>=150";
  		if($vv[1]>=200 && $vv[2]>=300 && $vv[3]>=600)
		{
		$v1=$vv[1]+$vv[2]+$vv[3];
				if($v1>=600)
				{
				$st='1';
				}
				else if($v1>=400)
				{
				$st='2';
				}
				else if($v1>=200)
				{
				$st='3';
				}
				else
				{
				$st='4';
				}
				//status=$st,
  		mysqli_query($connect,"update sm_patient set sms_st=3,enose_st=2 where uname='$pid'");
		?><h3 style="color:#FF0000" align="center">Covid Positive</h3><?php
		
		}
		else
		{
		mysqli_query($connect,"update sm_patient set sms_st=3,enose_st=3 where uname='$pid'");
		?><h3 style="color:#009933" align="center">Covid Negative</h3><?php
		}
		
  }
  //if($r2['sms_st']=="3")
  if($act=="5")
  {
  
  //mysqli_query($connect,"update sm_patient set sms_st=0,enose_st=0 where uname='$pid'");
  }
 
  	/*if($r1['details']=="*NORMAL")
	{
	mysqli_query($connect,"update sm_patient set enose_st=1,rdate2='$rdate',rtime2='$rtime' where uname='$pid'");
	
	$message="Patient ID: $pid, Covid Negative";
	echo '<iframe src="http://iotcloud.co.in/testmail/sendmail.php?message='.$message.'&email='.$email.'" style="display:none"></iframe>';
	
	?><h3 style="color:#009933" align="center">Covid Negative</h3><?php
	}
	else
	{
	mysqli_query($connect,"update sm_patient set enose_st=2,rdate2='$rdate',rtime2='$rtime' where uname='$pid'");
	
	$message="Patient ID: $pid, Covid Positive, Call your health care provider or 911 for immediate guidance.";
	echo '<iframe src="http://iotcloud.co.in/testmail/sendmail.php?message='.$message.'&email='.$email.'" style="display:none"></iframe>';
	
	echo '<iframe src="http://iotcloud.co.in/testmail/senddata.php?email1='.$email1.'&email='.$email.'&name='.$name.'&mobile='.$mobile.'&aadhar='.$aadhar.'&address='.$address.'" style="display:none"></iframe>';
	?><h3 style="color:#FF0000" align="center">Covid Positive</h3><?php
	}*/
	
	
	if($act!="")
	{
?>
<script>
//Using setTimeout to execute a function after 5 seconds.
setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'enose.php?act=<?php echo $act; ?>&pid=<?php echo $pid; ?>';
}, 20000);
</script>
<?php
 	}
  ?>
  <p></p>
  <p></p>
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