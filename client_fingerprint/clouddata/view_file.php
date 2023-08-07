<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

$uname=$_SESSION['uname'];

if($act=="del")
{
mysqli_query($connect,"delete from fp_files where id=$did");
?>
<script language="javascript">
window.location.href="view_file.php";
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


    <h2 align="center">Welcome to Cloud</h2>
	<h3 align="center">Files</h3>
	<p>&nbsp;</p>
	<?php

	$arr=array("txt","docx","xlsx","ppt","html","css","jpg","png","gif","mp3","mp4","avi","mov","wav","pdf");
	$arr_img=array("img_txt.jpg","img_doc.jpg","img_xls.jpg","img_ppt.jpg","img_html.jpg","img_css.jpg","img_jpg.jpg","img_png.jpg","img_gif.jpg","img_mp3.jpg","img_mp4.jpg","img_avi.jpg","img_mov.jpg","img_wav.jpg","img_pdf.jpg");
	
	$qs=mysqli_query($connect,"select * from fp_files where uname='".$uname."'");
	$ns=mysqli_num_rows($qs);
	if($ns>0)
	{
	?>
                    <table class="table table-striped">
                     <?php
		$i=0;
        $cc=0;
		
		while($rs=mysqli_fetch_array($qs))
		{
	
		
		$i++;
		
		$fff=explode(".",$rs['upload_file']);
		
		$ext=$fff[1];
		$j=0;
			foreach($arr as $arr1)
			{
			
				if($arr1==$ext)
				{
				$img=$arr_img[$j];	
				break;
				}
				else
				{
				$img="img_def.jpg";
				}
				$j++;
			}
		$aa=0;
		$bb=0;			
			
$aa=$rs['file_size']/1024;
$bb=($aa/1024);
$cc+=$bb;


?>
      <tr>
        <td width="157" class="bor">
		<a href="upload/<?php echo $rs['upload_file']; ?>" target="_blank"><img src="images/<?php echo $img; ?>" width="34" height="43"></a>
		<?php 
		
		echo $rs['upload_file']; ?></td>
        <td width="154" class="bor"><?php echo $bb; ?>
MB</td>
        <td width="339" class="bor"><?php echo $rs['rdate']; ?></td>
        <td width="172" class="bor">
		<!--<a href="file_access.php?fid=<?php //echo $rs['id']; ?>">Access</a> |-->
		<a href="download.php?file1=<?php echo $rs['upload_file']; ?>&folder1=upload">Download</a> |
		<a href="view_file.php?act=del&did=<?php echo $rs['id']; ?>">Delete</a>
		</td>
      </tr>
		<?php
		}
		?>
</table>
    <p>&nbsp;</p>
    <p align="center">Total Usage:
      <?php
			  echo $cc;
			  ?>
MB </p>

<?php
}
else
{
?><h3 align="center">No Files!!</h3><?php
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