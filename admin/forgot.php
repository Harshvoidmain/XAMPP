<?php
 session_start();
   $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
   if(isset($_POST['fillup']))
{
	$auemail=mysqli_real_escape_string($db,$_POST['auemail']);
	$random_char = str_shuffle("1234567890");
	$password = substr($random_char,1,5);
	$mailto = $auemail;                //receiver
$mailSub = "New Password";
$mailMsg = "Your code is ".$password;
$mailMsg = wordwrap($mailMsg,100);
require '../PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
$mail = new PHPMailer();
$mail ->IsSmtp();
$mail ->SMTPDebug = 0;
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'STARTTLS';
$mail ->Host = "smtp.office365.com";
$mail ->Port = 587; 
$mail ->IsHTML(true);
$mail ->Username = "icnte@fcrit.ac.in";
$mail ->Password = "conf@2019";
$mail ->SetFrom("icnte@fcrit.ac.in");
$mail ->Subject = $mailSub;
$mail ->Body = $mailMsg;
$mail ->AddAddress($mailto);
if(!$mail->Send())
{
// echo "Mail Not Sent";
}
else
{
//echo "Mail Sent";
}

			           //Create User
				$password=md5($password); //hash password before storing for security 
				$sql="UPDATE overall_admin SET opwd='$password' WHERE oemail='$oemail'";
            mysqli_query($db,$sql);  
            $_SESSION['message']="Your Information has been Registered"; 
            $_SESSION['auemail']=$oemail;
				
				header("location:newpass.php");
}





?>
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php include '../head1.php'; ?>
<!-- header section end -->

<!-- banner start -->
<!--  page header section -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="../icnte.php">Home</a></li>
                        <li class="active">Login</li>
						<li class="active">Forgot Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
   <body>
   
      <div id="wrapper" class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="text-center"></h1>
            </div>
            <div id="frm" class="modal-body">
               <?php
                  if(isset($_SESSION['message']))
                  {
                       echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                       unset($_SESSION['message']);
                  }
                  ?>
				  <form method="post" action="forgot.php" class="col-md-12 center-block">
					
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="auemail" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
									<br><br>
						<div class="form-group ">
							<input type="submit" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>	
               
               <div class="modal-footer">
                  <div class="col-md-12"><a href="index.php">
                     <button class="btn">Cancel</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>

  <?php include '../foot.php'; ?>
   </body>
</html>