<?php
   session_start();
   //connect to database
   $db=mysqli_connect("localhost","root","","icnte2");
   if(isset($_POST['login_btn']))
   {
	   $email=mysqli_real_escape_string($db,$_POST['email']);
       $password=mysqli_real_escape_string($db,$_POST['password']);
       $password=md5($password); //hashing password 
       $sql="SELECT * FROM author WHERE auemail='$email' AND aupassword='$password'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$auid=$row["auid"];
   		$_SESSION['auid']=$auid;
		$_SESSION['auname']=$row["auname"];
   		//$row = mysqli_fetch_array($result);
   		
			header("location:upload.php");
		}
   	
      else
      {
   		$_SESSION['message']="Username and Password combination incorrect";
      }
   }
   if(isset($_POST['fillup']))
{
	//$auid = $_SESSION["auid"];
    $auname=mysqli_real_escape_string($db,$_POST['auname']);
    $auemail=mysqli_real_escape_string($db,$_POST['auemail']);
    $aucategory=mysqli_real_escape_string($db,$_POST['aucategory']);
	$auphone=mysqli_real_escape_string($db,$_POST['auphone']);
	$aucountry=mysqli_real_escape_string($db,$_POST['aucountry']);
	$austate=mysqli_real_escape_string($db,$_POST['austate']);
	$auaddress=mysqli_real_escape_string($db,$_POST['auaddress']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
		$password2=mysqli_real_escape_string($db,$_POST['password2']); 
		$number="/^[0-9]+$/";
	/*if()//add a this condition
    { */          
	if(empty($auname)||empty($auemail)||empty($auphone)||empty($password)||empty($password2)||empty($aucategory)||empty($aucountry)||empty($austate)||empty($auaddress))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Fill All Fields!")';
			echo '</script>';
			exit();
		}
	else
		{
			if(strlen($password)<9)
			{
				echo '<script language="javascript">';
				echo 'alert("Weak Password")';
				echo '</script>'; 
				exit();
			}
			if(!preg_match($number,$auphone))
			{
				echo '<script language="javascript">';
				echo 'alert("Mobile no is not valid")';
				echo '</script>';
				exit();
			}
			if(!(strlen($auphone) == 10))
			{
				echo '<script language="javascript">';
				echo 'alert("Mobile number should be 10 digit!")';
				echo '</script>';
				exit();
			}
			
			$emck= "SELECT uid FROM authors WHERE auemail='$auemail' LIMIT 1";
			$ck=mysqli_query($db,$emck);
			$cck=mysqli_num_rows($ck);
			if( $cck>0)
			{
				echo '<script language="javascript">';
				echo 'alert("Email is already registered with us!")';
				echo '</script>';
				exit();
			}
			if($password==$password2)
			{           //Create User
				$password=md5($password); //hash password before storing for security 
				$sql="INSERT INTO author(auname,auemail,aucategory,auphone,aucountry,austate,auaddress,aupassword) VALUES('$auname','$auemail','$aucategory','$auphone','$aucountry','$austate','$auaddress','$password')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="Your Information has been Registered"; 
            $_SESSION['auname']=$auname;
				
				header("location:index.php");  //redirect to the home page
			}
			else
			{
				$_SESSION['message']="The two password do not match";   
			}
	
	   
	}
            
           
}
?><!DOCTYPE html>
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
	 <link rel="stylesheet" type="text/css" href="css/sstyle.css" />
	 <link rel="stylesheet" type="text/css" href="css/helper.css" />
	<link rel="stylesheet" type="text/css" href="css/pe-icon-line.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.vertical-tabs.css" />
<script src="icjs.js"></script>

       
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
    </head>
    <!-- header section -->

    <div class="header" style=";position: relative; height:150px;">

      <img src="images/bck.jpg" height="100%" width="100%" alt="" />
        <div class="container">
            <div class="header-top " style="position:absolute;top:5px;left:0;height:150px;">
              <div class="col-md-2">  
                <div class="" style="font-family:'Cinzel', serif;color: #555;height:100%;float:left;font-size:60px;padding:12px;">
                    <span style="vertical-align:text-bottom;">ICNTE</span>
                </div>
                   <span style="font-family:'Cinzel', serif; color: #555;   vertical-align:central;height:100%;float:left;font-size:60px;padding-left:16%;padding-right:50%;padding-top:15px;padding-bottom: 20px;">2019</span>
                 </div>
                
                <div class="" style="margin:0;padding:0;">
                <div class="title visible-lg" style="float: left; display:inline-block;text-transform: none; margin-top: 25px" >
                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-size:23px;font-weight:900;"> 3rd Biennial International Conference on Nascent Technologies in Engineering </p>
                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-size:20px;font-weight:800;"> An IEEE Technically Co-Sponsored Conference </p>
                        <p style="text-align: left;margin:0px;word-spacing: 2px;font-weight:600;">Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</p>
                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-weight:600;">     January 04-05, 2019  </p>
                </div>
                <div class="title visible-md " style="float: left; display:inline-block;" >
                    <p style="text-align: left;margin:0px;word-spacing: 2px;"> An IEEE Technically Co-Sponsored Conference </p>
                    <a href="/icnte/" class="activet" style="color:; text-decoration: none;"> Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</a>
                </div>

                <!--div class="title2 visible-xs" style="float: left; display:inline-block " >
                    <a href="/icnte/" class="activet" style="color:; text-decoration: none">F.C.R.I.T</a>
                </div-->
                <div style="float:left;display: inline-block;">
                   
                </div>
                <div class="title visible-sm" style="float: left; display:inline-block; font-size: 25px;" >
                    <a href="/icnte/" class="activet" style="color:white; text-decoration: none">FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a>
                </div>
              </div>

            </div>

    </div>
 </div>


<div class="main-text  visible-md" style="float:right;margin-left:650px;">
    <div class="text-center" style="padding-left:100px;margin-top:50px">

        <div  style="padding-left:70px;margin-top:60px;">
                <a class="btn btn-clear btn-sm btn-min-block" style="margin-bottom:5px"
                    href="#">Contact-us</a><a class="btn btn-clear btn-sm btn-min-block"  href="/icnte/redirectportal">Login</a></div>
        </div>
</div>




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

                    <li class="dropdown" style="margin-left:130px;"> <a href="/icnte/contact_us" ><span class="glyphicon glyphicon-globe"></span>Contact-Us</a>
                        
                    </li>
                    
                     <li class="dropdown" style="margin-left:5px"> <a href="index.php" ><span class="glyphicon glyphicon-log-in"></span>Login</a>
                        
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
<!--banner start-->
<div class="container">
  <div class="col-md-6" style="height:500px;margin-left:px;margin-top:30px;border-right:1px solid lightskyblue;">
    <div style="vertical-align:middle;width:380px;margin:auto;">
      
      <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('athrlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Author Login
        </div>
        <div class="bimg">
          <img src="images/athr.png" alt="FCRIT" height="100%" width="100%" />        </div>
      </div></a>
      <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('rlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Reviewer Login
        </div>
        <div class="bimg">
          <img src="images/rvwr.png" alt="FCRIT" height="90%" width="100%" margin-bottom="0" />        </div>
      </div></a>
    </div>
  </div>
  <div class="col-md-6" style="height:500px;display:table;margin-top:10px;" id="activediv">
    <!--respective login-->
    
           <div class="login-container">
           
            <div class="avatar">
                <img src="images/athr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="index.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
                </form>
				<div class="modal-footer">
                  <div class="col-md-12">
                     <span class="pull-right"><a href="register.php">Sign Up</a></span>
                  </div>
               </div>

            </div>
        </div>
            
         
 
  </div>

</div>


<div style="display:none;" id="athrlogin">
  <div class="login-container">
           
            <div class="avatar">
                <img src="images/athr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="index.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
                </form>
				<div class="modal-footer">
                  <div class="col-md-12">
                     <span class="pull-right"><a href="register.php">Sign Up</a></span>
                  </div>
               </div>
            </div>
        </div>
</div>

<div style="display:none;" id="rlogin">
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <img src="images/rvwr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="index.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
                </form>
            </div>
        </div>
</div>
<!--banner end-->
<!-- banner end -->

<!--  footer section -->

<!--  footer section ending -->
<!-- sub-footer -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <p>© 2014 FCRIT, Vashi. All rights reserved.</p>
            </div>
            <div class="col-md-1-and-half">
                <a href="#"><i class="fa fa-facebook-square"></i></a>
                <a href="#"><i class="fa fa-twitter-square"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-youtube-square"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- sub-footer ending -->
<!-- section -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) 

	<script type="text/javascript" src="/icnte/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/icnte/js/bootstrap.js"></script>
	<script type="text/javascript" src="/icnte/js/owl.carousel.js"></script>
	<script type="text/javascript" src="/icnte/js/scripts.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.carouFredSel-6.2.1-packed.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.carouFredSel-6.2.1.js"></script>
	<script type="text/javascript" src="/icnte/js/pdfobject.js"></script>
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.bootstrap.newsbox.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
