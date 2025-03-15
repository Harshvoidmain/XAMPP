<?php session_start();
require "../connection.php";

   if(isset($_POST['fillup']))
{
	$email=mysqli_real_escape_string($db,$_POST['email']);
	$random_char = str_shuffle("1234567890");
	$rpassword = substr($random_char,1,5);
	$mailto = $email;                //receiver
$mailSub = "ICNTE-2021: New Password";
// $mailMsg = "The new password to log into your Reviewer Portal of ICNTE 2021 is ' ".$rpassword ." ' . You may change this password in your Reviewer Portal.";
$mailMsg = "The new password to log into your Reviewer Portal of ICNTE 2021 is: ".$rpassword;
$mailMsg = wordwrap($mailMsg,300);
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
				//$rpassword=md5($rpassword); //hash password before storing for security 
			//$_SESSION['message']="Your New Password is mailed to you."; 
			$sql="UPDATE reviewer SET rpassword='$rpassword' WHERE email='$email'";
            mysqli_query($db,$sql);  
            //$_SESSION['message']="Your New Password is mailed to you."; 
            $_SESSION['email']=$email;
			echo "<script language=javascript>alert('Your New Password is mailed to you.');
                     window.location='../login.php';</script>";
			//header("location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ICNTE">
        <title>ICNTE</title>
        <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="css/sstyle.css" />
	 <link rel="stylesheet" type="text/css" href="css/helper.css" />
	<link rel="stylesheet" type="text/css" href="css/pe-icon-line.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.vertical-tabs.css" />

       
        <style>
            .header-top{
                width:100%;
            }
            .header-top img{
                width: 70px;
                margin-left: 20px;
            }
            .header-top .title{
                line-height: 28px;
                margin-top: 34px;

                font-size: 30px;
                word-spacing: 12px;

                margin-left: 40px;
                float: left;
                font-family: 'Dosis', sans-serif;
                text-transform: capitalize;
                text-align: center;

            }
            .header-top .title2{
                line-height: 28px;
                margin-top: 40px;

                font-size: 35px;
                word-spacing: 12px;

                margin-left: 30px;
                float: left;
                font-family: 'Dosis', sans-serif;
                text-transform: capitalize;
                text-align: center;



            }
        </style>
    <?php include("../head.php");?>

<!-- banner start -->
<!--  page header section -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="/icnte/home">Home</a></li>
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
               <h2 class="text-center">Forgot Password</h2>
            
               <?php
                  if(isset($_SESSION['message']))
                  {
                       echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                       unset($_SESSION['message']);
                  }
                  ?>
				  <form method="post" action="forgot.php" class="col-md-12 center-block">
					
					<div class="form-group">
                        <div id="frm" class="modal-body">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
									<br><br>
						<div class="form-group ">
							<input type="submit" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>	
               
               <div class="modal-footer">
                  <div class="col-md-12"><a href="login.php">
                     <button class="btn">Cancel</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
	  <?php include("../footer.php");?>
   </body>
</html>