<?php session_start();
require "../connection.php";
  
   if(isset($_POST['fillup']))
{
	
    $email=$_SESSION["email"];
    $code=mysqli_real_escape_string($db,$_POST['code']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	$password2=mysqli_real_escape_string($db,$_POST['password2']);
	
	
		
if($password==$password2)
			{           //Create User
		        //$code=md5($code);
				//$password=md5($password); //hash password before storing for security 
				$lsql="SELECT * FROM reviewer WHERE email='$email' AND rpassword='$code'";
				 $lresult=mysqli_query($db,$lsql);
			  if(mysqli_num_rows($lresult)==1)
				   {
							$sql="UPDATE reviewer SET rpassword='$password' WHERE email='$email'";
						mysqli_query($db,$sql);  
						$_SESSION['message']="New Password Saved"; 
						
							$_SESSION['m']="Password Updated"; 
							//header("location:../login.php");  //redirect to the home page
						}
			}
			else
			{
				$_SESSION['messa']="The two password do not match";   
			}
		
			
	
	   
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
                        <li><a href="profile.php">Profile</a></li>
                        <li class="active"><a href="password.php">Update Password</a></li>
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
             <?php if(isset($_SESSION['m'])){
       echo '<div class="panel panel-success">
      <div class="panel-heading" style="font-size:20px"><center>'.$_SESSION['message'].'</center></div>
      
    </div>';
   }?>

				 
				  <form method="post" action="password.php" class="col-md-12 center-block">
					
					
						<div class="form-group">
							<label for="code" class="cols-sm-2 control-label">Old Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="code"  placeholder="Enter Old Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd1" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password"  placeholder="Enter New Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Confirm Your Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
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