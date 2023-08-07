<?php
session_start();
include("include/dbconnect.php");
extract($_REQUEST);

mysqli_query($connect,"update fp_status set status=2,fid=$fid where bcode='$bc'");


?>