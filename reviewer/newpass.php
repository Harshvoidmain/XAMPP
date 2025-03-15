<?php session_start();
require "../connection.php";
   
   if(isset($_POST['fillup']))
{
	//$auid = $_SESSION["auid"];
    
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $code=mysqli_real_escape_string($db,$_POST['code']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	$password2=mysqli_real_escape_string($db,$_POST['password2']);
	if(empty($auemail))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Fill the Email!")';
			echo '</script>';
			exit();
		}
	else
		{
		
if($password==$password2)
			{           //Create User
		        //$code=md5($code);
				//$password=md5($password); //hash password before storing for security 
				$lsql="SELECT * FROM reviewer WHERE email='$email' AND rpassword='$code'";
				 $lresult=mysqli_query($db,$lsql);
			  if(mysqli_num_rows($lresult)==1)
				   {
							$sql="UPDATE reviewer SET rpassword='$password' WHERE email='$auemail'";
						mysqli_query($db,$sql);  
						$_SESSION['message']="New Password Saved"; 
						//$_SESSION['auname']=$auname;
							
							header("location:../login.php");  //redirect to the home page
						}
			}
			else
			{
				$_SESSION['message']="The two password do not match";   
			}
		}
			
	
	   
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
    <?php include("../header1.php");?>
<!-- header section end -->
 <div class="header">
        <div class="container-fluid"  style="background-color:white">



            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  style="width:100%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/icnte/" class="active">Home</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Call For Papers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/icnte/tracks_and_sessions">Tracks and Sessions</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Conference Details<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/icnte/ConferenceDetails/important_dates">Important Dates</a></li>
                            <li><a href="/icnte/ConferenceDetails/venue">Venue</a></li>
                            <li><a href="#">Publications</a></li>
                            <li><a href="/icnte/ConferenceDetails/instructions">Instructions</a></li>

                        </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">People<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/icnte/people/advisory_committee">Advisory Committe</a></li>
                            <li><a href="/icnte/people/organizing_committee">Organizing Committee</a></li>
                            
                              <li><a href="/icnte/people/reviewers_panel">Reviewers Panel</a></li>
                              <li><a href="/icnte/people/keynote_speakers">Keynote Speakers</a></li>

                        </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/icnte/Registration/fees">Registration Fees</a></li>
                            <li><a href="#">Online Registration</a></li>
                            <li><a href="/icnte/Registration/instructions">Instructions</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"> <a href="/icnte/about-us" class="dropdown-toggle" data-toggle="dropdown">Archives<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/icnte/Archives/icnte2017/">ICNTE 2017</a></li>
                            <li><a href="/icnte/Archives/icnte2015/">ICNTE 2015</a></li>
                           </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Partners<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li><a href="/icnte/technical_partner">Technical </a></li>
                         <li><a href="/icnte/financial_partner">Financial </a></li>

                        </ul>
                    </li>

                   
                    
                     <li class="dropdown" style="margin-left:5px"> <a href="login.php" ><span class="glyphicon glyphicon-log-in"></span>Login</a>
                        
                    </li>
                    
               
                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
    </nav>
</div>
<!-- header section end -->

<!-- banner start -->
<!--  page header section -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="/icnte/home">Home</a></li>
                        <li class="active">Portals</li>
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
				  <form method="post" action="newpass.php" class="col-md-12 center-block">
					
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Your Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="auemail" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="code" class="cols-sm-2 control-label">Code</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="code"  placeholder="Enter Code"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd1" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password"  placeholder="Enter New Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Password Again</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password2"  placeholder="Enter Password Again"/>
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
	  
  <?php include("../footer.php");?>
   </body>
</html>