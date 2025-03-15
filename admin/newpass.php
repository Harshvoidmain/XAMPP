<!--Registration Page-->


<?php
   session_start();
   //connect to database
   $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
   if(!$_SESSION["auemail"])
  {
  	header("location:index.php?notloggedin=You Are Allowed!");
  }
   if(isset($_POST['fillup']))
{
	//$auid = $_SESSION["auid"];
    
    $auemail=mysqli_real_escape_string($db,$_POST['auemail']);
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
		        $code=md5($code);
				$password=md5($password); //hash password before storing for security 
				$lsql="SELECT * FROM author WHERE auemail='$auemail' AND aupassword='$code'";
				 $lresult=mysqli_query($db,$lsql);
			  if(mysqli_num_rows($lresult)==1)
				   {
							$sql="UPDATE author SET aupassword='$password' WHERE auemail='$auemail'";
						mysqli_query($db,$sql);  
						$_SESSION['message']="New Password Saved"; 
						$_SESSION['auname']=$auname;
							
							header("location:index.php");  //redirect to the home page
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
                  <div class="col-md-12"><a href="index.php">
                     <button class="btn">Cancel</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  
  <?php include("footer.php");?>
   </body>
</html>