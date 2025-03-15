<?php
session_start();
require "../connection.php";
  /* This is the author home page
     @author: sinimol
   */ 
   if(!$_SESSION["auemail"])
  {
  	header("location:login.php?notloggedin=You Are Allowed!");
  }
  

   ?>
<!DOCTYPE html>
<html lang="en">
    <?php require "../header1.php";?>

<?php include("navbar.php");?>
     
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <!--<li><a href="upload.php">Profile</a></li>-->
                        <li class="active">Instructions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

   <body style='font-size:16px'>
   <div class="container">
  <div style='font-size:16px' class="jumbotron">
    <p style='font-size:17px'><b>Welcome <?php echo $_SESSION['auname']; ?> to ICNTE 2021(International Conference on Nascent Technologies in Engineering)! <b></p>
    <p style='font-size:16px'>Here are a few Instructions</p> 
	<p style='font-size:16px'>* You can upload your paper/poster through the 'Upload' tab.</p>
    <p style='font-size:16px'>* You can Upload your poster by clicking on the Link mentioned in 'Upload' tab.</p>
	<p style='font-size:16px'>* You can Update or Withdraw your paper only before the review process commences.</p>
	<p style='font-size:16px'>* The current status of all your uploaded papers can be viewed in the My Papers tab.Here you will also see an upload camera ready button if your paper is accepted</p>
	<p style='font-size:16px'>* You can reset your password through the Update Password option below the tab that has your name.</p>
	<p style='font-size:16px'>* You can update your profile through the Update Profile option below the tab that has your name.</p>
	<p style='font-size:16px'>* You can click on the contact us link on the header for any queries</p>
  </div>
  
</div>
   
	  
  <?php include("../footer.php");?>
   </body>
</html>