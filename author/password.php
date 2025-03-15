<?php session_start();
   //connect to database
require "../connection.php";
/*This page is accessible through the Profile tab in the Navigation Bar.
 The authors reset their password here.
     @author: sinimol
   */ 
   if(!$_SESSION["auemail"])
  {
  	header("location:login.php?notloggedin=You Are Allowed!");
  }
   if(isset($_POST['fillup']))
{
	//$auid = $_SESSION["auid"];
    
    $auemail=$_SESSION["auemail"];
    $code=mysqli_real_escape_string($db,$_POST['code']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	$password2=mysqli_real_escape_string($db,$_POST['password2']);
	if(empty($auemail)||empty($code)||empty($password)||empty($password2))
		{
			header("location:password.php?passw=incmp");
			exit();
		}
		else if(strlen($password)<=9)
			{
				header("location:password.php?pass=weak");
				exit();
			}
	else{
		
if($password==$password2)
			{           //Create User
		        //$code=md5($code);
				//$password=md5($password); //hash password before storing for security 
				$lsql="SELECT * FROM author WHERE auemail='$auemail' AND aupassword='$code'";
				 $lresult=mysqli_query($db,$lsql);
			  if(mysqli_num_rows($lresult)==1)
				   {
							$sql="UPDATE author SET aupassword='$password' WHERE auemail='$auemail'";
						mysqli_query($db,$sql);  
					
						//redirect to the same page with the status
								header("location:password.php?passtatus=success");
						}
						else{
							header("location:password.php?passta=inc");
						  
						}
			}
			else
			{
				header("location:password.php?pas=w");
			
				exit();  
			}
		
			
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
                 <?php if(!empty($_GET['passtatus'])){
          echo '<div class="panel panel-success" id="close6">
      <div class="panel-heading" style="font-size:16px">Password Updated Successfully<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }
   
   if(!empty($_GET['passw'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Please Fill All Fields<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
     if(!empty($_GET['pas'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">   The Two Passwords do not Match<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }

   
    if(!empty($_GET['passta'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">The Old Password is incorrect<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
    if(!empty($_GET['pass'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Password must contain minimum 10 characters<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   
   
   
   ?>
           

				  <form style="font-size:16px" method="post" action="password.php" class="col-md-12 center-block">
					
					
						<div class="form-group">
							<label for="code" class="cols-sm-2 control-label">Old Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
									<input  style="font-size:16px" type="password" class="form-control" name="code"  placeholder="Enter Old Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="pwd1" class="cols-sm-2 control-label">New Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
									<input style="font-size:16px" type="password" class="form-control" name="password"  placeholder="Enter New Password"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Confirm Your Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user-secret   fa" aria-hidden="true"></i></span>
									<input style="font-size:16px" type="password" class="form-control" name="password2"  placeholder="Enter Password Again"/>
								</div>
							</div>
						</div>
									<br><br>
						<div class="form-group ">
							<input type="submit" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>	
               
               <div class="modal-footer">
                  <div class="col-md-12"><a href="home.php">
                     <button class="btn" >Cancel</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
  <?php include("../footer.php");?>
   </body>
</html>