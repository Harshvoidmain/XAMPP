<?php session_start();
   //connect to database
   require "../connection.php";
   /*This page is accessible through the Sign Up button in the Author login tab.
      They can register their details here
     @author: sinimol
   */ 
   if(isset($_POST['fillup']))
{//<!--Registration Page-->
	//$auid = $_SESSION["auid"];
    $auname=mysqli_real_escape_string($db,$_POST['auname']);
    $auemail=mysqli_real_escape_string($db,$_POST['auemail']);
	/*$emck= "SELECT auid FROM authors WHERE auemail='$auemail' LIMIT 1";
			$ck=mysqli_query($db,$emck);
			$cck=mysqli_num_rows($ck);
			if( $cck>0)
			{echo '<script language="javascript">';
				echo 'alert("Email is already registered with us!")';
				echo '</script>';
				//header("location:register.php?em=reg");
				exit();
			}*/
    $aucategory=mysqli_real_escape_string($db,$_POST['aucategory']);
	$phd=mysqli_real_escape_string($db,$_POST['optradio']);
		if($aucategory=='Other')
		{
	$aucategory=mysqli_real_escape_string($db,$_POST['other1']);
	}
	$cc=mysqli_real_escape_string($db,$_POST['cc']);
	$auphone=mysqli_real_escape_string($db,$_POST['auphone']);
	$aucountry=mysqli_real_escape_string($db,$_POST['aucountry']);
	$austate=mysqli_real_escape_string($db,$_POST['austate']);
	$auaddress=mysqli_real_escape_string($db,$_POST['auaddress']);
	$auorg=mysqli_real_escape_string($db,$_POST['auorg']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
		$password2=mysqli_real_escape_string($db,$_POST['password2']); 
		$number="/^[0-11]+$/";
	/*if()//add a this condition
    { */          
	
	if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$auemail))
{ 
header("location:register.php?email=weak");
				exit();
}
	
	if(empty($auname)||empty($auemail)||empty($auphone)||empty($auorg)||empty($password)
		||empty($password2)||empty($aucategory)||empty($aucountry)||empty($austate)||empty($auaddress)||empty($cc))
		{
			header("location:register.php?field=empty");
			exit();
		}
	
			else if(strlen($password)<=9)
			{
				header("location:register.php?pass=weak");
				exit();
			}
			// else if(!preg_match($number,$auphone))
			// {
			// 	header("location:register.php?mob=nv");
			// 	exit();
			// }
			// else if(!(strlen($auphone) == 10))
			// {
			// 	header("location:register.php?mobno=short");
			// exit();
			// }
		else
		{	if($password==$password2)
			{           //Create User
		
		$auphone=$cc.$auphone;
			//$password=md5($password); //hash password before storing for security 
			$sql="INSERT INTO author(auname,auemail,aucategory,auphone,aucountry,austate,auorg,auaddress,aupassword,phd) VALUES('$auname','$auemail','$aucategory','$auphone','$aucountry','$austate','$auorg','$auaddress','$password','$phd')";
            mysqli_query($db,$sql);  
            $_SESSION['message']="Your Information has been Registered"; 
            $_SESSION['auname']=$auname;
			if($phd=='Yes')	
			{
				$mailto = $auemail;                //receiver
$mailSub = "Reviewer Registration";
$mailMsg = nl2br("  Dear Sir/Madam,
				    At the outset accept our greetings of the day.

										
					For more information or any query contact the Technical Program Committee through Contact Us tab given on the Home Page of the ICNTE 2021 website. 


					Pranali Choudhari
					ICNTE (Technical Committee Convenor)
					Fr. C. Rodrigues Institute of Technology, Vashi (India)
					Contact: 9833422677
");
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
 echo "Mail Not Sent";
}
else
{
echo "Mail Sent";
}
			}
				header("location:../login.php?status=1");  //redirect to the home page
			}
			else{
				
				header("location:register.php?pwd=no");
			exit();
			}
	
	   
	}
            
           
}
   
   ?>


  <?php include("../head.php");?>

<!-- header section end -->
   <!DOCTYPE html>
	<html lang="en">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
   <div class="container">
      <div id="wrapper" class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="text-center" style="font-size:25px;">Register</h1>
            </div>
			
            <div id="frm" class="modal-body">
      <?php         if(!empty($_GET['field'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Please Fill All Fields<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
      if(!empty($_GET['email'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Invalid Email<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   if(!empty($_GET['pass'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Weak Password<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   if(!empty($_GET['mob'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Mobile Number is not valid<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
    /* if(!empty($_GET['em'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Email already registered <button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }*/
   if(!empty($_GET['mobno'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Mobile Number must be 10 digit<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
    if(!empty($_GET['pwd'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Two Passwords Do not Match<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   ?>
				  <form method="post" action="register.php" class="col-md-12 center-block">
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"> Full Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="auname" id="name"  placeholder="Enter your name" required/>
								</div>
							</div>
						</div>
						
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="auemail" id="email"  placeholder="Enter your email" required/>
								</div>
							</div>
						</div>
						
		<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">Name of Organization</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="auorg" id="Description"  placeholder="Organization you are affiliated to" required/>
                </div>
              </div>
            </div>
		<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">Address of Organization</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="auaddress" id="Description"  placeholder="Address" required/>
                </div>
              </div>
            </div>
	     
       <div class="form-group"><label for="sel1" class="cols-sm-2 control-label">Select Country </label>
			<div class="cols-sm-10">	
			<div class="input-group">							<!--Got it from http://jsfiddle.net/bdhacker/eRv2W/-->
				<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
							
        <select class="form-control" id="country" name="aucountry"></select>
		</div>
        </div>
		</div>
		<div class="form-group"><label for="sel1" class="cols-sm-2 control-label">Select State</label>
							<div class="cols-sm-10">	
								<div class="input-group">							<!--Got it from http://jsfiddle.net/bdhacker/eRv2W/-->
									<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
							
        <select class="form-control" name="austate" id="state"></select>
		</div>
        </div>
		</div>
        <script language="javascript">
            populateCountries("country", "state");  
        </script>
						
						<div class="form-group">
							<label for="mobno" class="cols-sm-2 control-label">Mobile No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<div class="row">
									
									<div class="form-group col-xs-3"><input type="text" class="form-control" name="cc" id=""  placeholder="eg: +91" required/></div>
									<div class="form-group col-xs-9"><input type="text" class="form-control" name="auphone" id=""  placeholder="Mobile Number" required/>
								</div>
								</div>
							</div>
						</div></div>
						<div class="form-group"><label for="sel1"> Role</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
						<select class="form-control" name="aucategory" id='cat' onchange="showfield(this.options[this.selectedIndex].value)" required>
						<option value="">Select...</option>
						<option value="Faculty">Faculty</option>
						<option value="Graduate Student">Graduate Student</option>
						<option value="Post Graduate Student">Post Graduate Student</option>
						<option value="Research Scolar">Research Scholar</option>
						<option value="Industry Professional">Industry Professional</option>
						<option value="Government Official">Government Official</option>
						<option value="Other">Other</option>
						</select>
						</div>
						</div>
						</div>
		<script type="text/javascript">
function showfield(name){
  if(name=='Other')document.getElementById('div1').innerHTML='Please Mention Here: <input type="text" name="other1" />';
  else document.getElementById('div1').innerHTML='';
}
</script>
		<div class="form-group" id="div1"></div>
				
		<div class="form-group"><label for="password" class="cols-sm-2 control-label">Ph.D</label>
			<div class="cols-sm-10"><div class="input-group">
			 <div  class="radio">
             <label class="radio-inline"><input type="radio" name="optradio" value="Yes"> Yes</label>
	         <label class="radio-inline"><input type="radio" name="optradio" value="No"> No</label>
            </div>
         </div></div></div>				
						<div class="form-group"><label for="password" class="cols-sm-2 control-label">Password</label>(Atleast 10 characters long)
						<div class="cols-sm-10"><div class="input-group">
									<span class="input-group-addon"><i class="fa fa-archive fa" aria-hidden="true"></i></span>
                     <input type="password" class="form-control input-lg"name="password" placeholder="Password" class="textInput" required>
                  </div></div></div>
                  <div class="form-group"><label for="password" class="cols-sm-2 control-label">Password Again</label>
						<div class="cols-sm-10"><div class="input-group">
									<span class="input-group-addon"><i class="fa fa-archive fa" aria-hidden="true"></i></span>
                     <input type="password" class="form-control input-lg"name="password2" placeholder="Password again" class="textInput" required>
                  </div>
</div>
		</div>				<br><br>
						<div class="form-group ">
							<input type="submit" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>	
               
               <div class="modal-footer">
                  <div class="col-md-12"><a href="../login.php">
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