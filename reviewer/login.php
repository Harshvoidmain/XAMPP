<?php session_start();
   /* This is the login page. There are separate login  buttons for reviewer and author.
   The user can register or opt for forgot password here.
     @author: sinimol
   */ 
require "../connection.php";
   if(isset($_POST['login_btn']))
   {
	   $email=mysqli_real_escape_string($db,$_POST['email']);
       $password=mysqli_real_escape_string($db,$_POST['password']);
	    //echo $email ;
		//echo $password;
      // $password=md5($password); //hashing password 
	   if(empty($email)||empty($password))
		{
			header("location:login.php?fill=emp");
		}
		else
		{
       $sql="SELECT * FROM author WHERE auemail='$email' AND aupassword='$password'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
		$row = mysqli_fetch_array($result);
   		$auid=$row["auid"];
   		$_SESSION['auid']=$auid;
		$_SESSION['auname']=$row["auname"];
		$_SESSION['auemail']=$row["auemail"];
   		//$row = mysqli_fetch_array($result);
   		
			header("location:author/home.php");
		}
   	
      else
      {
   		header("location:login.php?combo=wrong");
      }
		}
   }
   if(isset($_POST['rlogin_btn']))
   {   $email=mysqli_real_escape_string($db,$_POST['email']);
       $password=mysqli_real_escape_string($db,$_POST['password']);
       //$password=md5($password); //hashing password 
       $sql="SELECT * FROM reviewer WHERE email='$email' AND rpassword='$password'";
	   //$sql="SELECT * FROM reviewer WHERE email='$email'";
	     
       $result=mysqli_query($db,$sql);
	   echo $result;
       if(mysqli_num_rows($result)==1)
       {
		$row = mysqli_fetch_array($result);
   		$rewid=$row["rewid"];
		$_SESSION['rewid']=$rewid;
		$_SESSION['salutation']=$row["salutation"];
		$_SESSION['rname']=$row["rewname"];
		$_SESSION['email']=$row["email"]; 
		
   		//$row = mysqli_fetch_array($result);
   		
			header("location:reviewer/home.php");
		}
   	
      else
      {
   		
		$_SESSION['messag']="Username and Password combination incorrect";
		
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
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" type="text/css" href="css/sstyle.css" />
	 <link rel="stylesheet" type="text/css" href="css/helper.css" />
	<link rel="stylesheet" type="text/css" href="css/pe-icon-line.css" />
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.vertical-tabs.css" />
<script src="js/icjs.js"></script>

       
      <style>
		 th,td{
        padding: 10px;

    }
    .nav-tabs > li > a:hover {
        border-color: #57bc90 #57bc90 #57bc90;
    }
	.nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    border-bottom: 5px solid #57bc90;
}

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



<?php require '..\head.php'; ?>
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
     <!-- <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('adlogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
          Administrator Login
        </div>
        <div class="bimg">
          <img src="images/admn.png" alt="FCRIT" height="100%" width="100%" />        </div>
      </div></a>-->
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
    <!--
           <div class="login-container">
           
            <div class="avatar">
                <img src="images/admn.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="login.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
					

                </form>
				

            </div>
        </div>
        -->    
         
 
  </div>

</div>


<div style="display:none;" id="adlogin">
  <div class="login-container">
           
            <div class="avatar">
                <img src="images/admn.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="login.php">
                    <input name="email" type="text" placeholder="Email">
                    <input type="password" name="password" placeholder="Password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
					

                </form>
				
            </div>
        </div>
</div>

<div style="display:none;" id="athrlogin"><?php if(!empty($_GET['combo'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Incorrect E-mail and password combination<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }
   if(!empty($_GET['fill'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Please Fill All Fields<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }
   if(!empty($_GET['reg'])){
          echo '<div class="panel panel-success" id="close7">
      <div class="panel-heading" style="font-size:16px">Registered Successfully<button type="button" class="close" data-target="#close7" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }
   ?>


  <div class="login-container">
          
            <div class="avatar">
                <img src="images/athr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="login.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="login_btn">Login</button>
					<div class="col-md-12" style="margin-top:4px;">
                        <div class="col-md-6" > 
                        <p ><a style="font-size:13px;color:  #39B3D7" href="author/register.php">Sign Up</a></p>
                    </div>
                        
                    <div class="col-md-6">
                   <p > <a style="font-size:13px;color: #39B3D7" href="forgot.php"><nobr>Forgot Password</nobr></a></p>
                    </div>
            </div>

                </form>
				
            </div>
        </div>
</div>

<div style="display:none;" id="rlogin">
  <!--<?php if(isset($_SESSION['messag'])){
          echo '<div class="panel panel-danger">
      <div class="panel-heading" style="font-size:20px"><center>'.$_SESSION['messag'].'</center></div>
      
    </div>';
   }?>-->
  <div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <img src="images/rvwr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="login.php">
                    <input name="email" type="text" placeholder="email">
                    <input type="password" name="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="rlogin_btn">Login</button>
					<div class="col-md-12" style="margin-top:4px;">
                    <div class="col-md-6">
                   </div>
                        
                    <div class="col-md-6">
                   <p > <a style="font-size:13px;color: #39B3D7" href="reviewer/forgot.php"><nobr>Forgot Password</nobr></a></p>
                    </div>
            </div>

                </form>
				
            </div>
        </div>
</div>
<!--banner end-->
<!-- banner end -->

<!--  footer section -->

<!--  footer section ending -->
<!-- sub-footer -->
<?php include"footer.php"?>
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
