<?php session_start();
require "../connection.php";
	/* This is the reviewer homepage
		@reviewer: alvina
	*/
	 if(!$_SESSION["rewid"])
  {
  	header("location:login.php?notloggedin=You Are Allowed!");
  }
                
?>

<!DOCTYPE html>
<html lang="en">
<?php include("../header1.php");?>
<?php include("navbar.php");?>
     
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
    <body style='font-size:16px'>
   <div class="container">
  <div style='font-size:16px' class="jumbotron">
    <p style='font-size:17px'><b>Welcome <?php echo $_SESSION['rname']; ?> to ICNTE 2021 (International Conference on Nascent Technologies in Engineering)! <b></p>
    <p style='font-size:16px'>Here are a few Instructions:</p>
	<p style='font-size:16px'>* The papers to be reviewed are displayed in 'Papers -> Waiting for review' tab. </p>
	<p style='font-size:16px'>* The paper to be reviewed can be downloaded by clicking on the 'Download' button and reviewed by clicking on the 'Review' button  </p>
	<p style='font-size:16px'>* The review page will have four options. Click on the appropriate option and if required also provide suggestions to improve the quality of paper.</p>
	<p style='font-size:16px'>* History of your reviewed papers is displayed in 'Papers -> Review' tab</p>
	<p style='font-size:16px'>* Your Reviewer certificate can be downloaded from 'Download Certificate' tab. Once you have reviewed atleast one of the papers, the download button will be enabled. </p>
	<p style='font-size:16px'>* You can update your profile through 'Update Profile' tab </p>
	<p style='font-size:16px'>* You can also reset your password through the 'Update Password' tab.</p>
	<p style='font-size:16px'>* You can click on the 'Contact Us' link on the header for any queries.</p>
	
	
  </div>
  
</div>
   
	  
  <?php include("../footer.php");?>
   </body>
</html>