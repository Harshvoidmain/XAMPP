<?php session_start();
//connect to database
require "../connection.php";
/*This page is accessible through the Profile tab in the Navigation Bar.
 The authors update their personal information here.
     @author: sinimol
   */ 
if(!$_SESSION["auid"])
  {
  	header("location:login.php?notloggedin=You Are Not Logged In!");
  }
  else
  {
  	//Secure Home Page opens
  }
$auid=$_SESSION['auid'];
$data = 'SELECT * FROM author WHERE auid = "'.$auid.'"'; 
  $query = mysqli_query($db,$data) or die("Couldn't execute query. ". mysql_error()); 
  $data2 = mysqli_fetch_array($query,MYSQLI_ASSOC); 
    if(isset($_POST['fillup']))
{
	//$auid = $_SESSION["auid"];
    $auname=mysqli_real_escape_string($db,$_POST['auname']);
    $auemail=mysqli_real_escape_string($db,$_POST['auemail']);
    $aucategory=mysqli_real_escape_string($db,$_POST['aucategory']);
	if($aucategory=='Other')
		{
	$aucategory=mysqli_real_escape_string($db,$_POST['other1']);
	}
	//$cc=mysqli_real_escape_string($db,$_POST['cc']);
	$auphone=mysqli_real_escape_string($db,$_POST['auphone']);
//	$aucountry=mysqli_real_escape_string($db,$_POST['aucountry']);
	//$austate=mysqli_real_escape_string($db,$_POST['austate']);
	$auaddress=mysqli_real_escape_string($db,$_POST['auaddress']);
$auorg=mysqli_real_escape_string($db,$_POST['auorg']);
		$number="/^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/";
       if(!preg_match($number,$auphone))
			{
					header("location:profile.php?mob=nv");
				exit();
			}
		/*	if(!(strlen($auphone) < 8))
			{
				header("location:profile.php?mobno=short");
				exit();
			}
			*///empty($cc)||
	if(empty($auname)||empty($auemail)||empty($auphone)||empty($auorg)||empty($aucategory)||empty($auaddress))
		{
			header("location:profile.php?field=empty");
			exit();
		}
	else
		{
			
			$sql="UPDATE author SET auname='$auname',auemail='$auemail',aucategory='$aucategory',auphone='$auphone',auorg='$auorg',auaddress='$auaddress' WHERE auid='$auid'";
            mysqli_query($db,$sql);  
            $_SESSION['message']="Your Information has been Registered"; 
            //$_SESSION['auname']=$auname;
				
				header("location:profile.php?prostatus=success");
			
			
			
	
	   
	}
            
           
}
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header section -->
<?php include("../header1.php");?>

<?php include("navbar.php");?>
    
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <li><a class="active" href="profile.php">Update Profile</a></li>
                       
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
 
 
  <body style="font-size:16px">
  <div class="container">
       <?php if(!empty($_GET['prostatus'])){
          echo '<div class="panel panel-success" id="close5">
      <div class="panel-heading" style="font-size:16px">Profile Updated Successfully<button type="button" class="close" data-target="#close5" data-dismiss="alert">
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
   if(!empty($_GET['field'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Please Fill All Fields<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
    if(!empty($_GET['mobno'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Mobile Number must be 10 digit<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   ?>
    <form method="post" action="profile.php" class="col-md-12 center-block" style="font-size:16px">
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"> Full Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="auname" id="name" value='<?php echo $data2["auname"]; ?>' placeholder="Enter your Name"/>
								</div>
							</div>
						</div>
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label"> Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="auemail" id="email" value='<?php echo $data2["auemail"]; ?>' placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
						<!--<div class="form-group"><label for="sel1" class="cols-sm-2 control-label">Select Country </label>
							<div class="cols-sm-10">	
								<div class="input-group">							<!--Got it from http://jsfiddle.net/bdhacker/eRv2W/-->
									<!--<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
							
        <select class="form-control" id="country" name="aucountry">
		<!--<option selected="true"><?php echo $data2["aucountry"]?></option>-->
		<!--</select>
		</div>
        </div>
		</div>
		<div class="form-group"><label for="sel1" class="cols-sm-2 control-label">Select State:</label>
							<div class="cols-sm-10">	
								<div class="input-group">							<!--Got it from http://jsfiddle.net/bdhacker/eRv2W/-->
									<!--<span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
							
        <select class="form-control" name="austate" id="state"></select>
		</div>
        </div>
		</div>-->
		<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">Country</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control"  id="Description" disabled value='<?php echo $data2["aucountry"]; ?>' />
                </div>
              </div>
            </div>
			<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">State</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control"  id="Description" disabled value='<?php echo $data2["austate"]; ?>' />
                </div>
              </div>
            </div>
		<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">Name of Organization</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="auorg" id="Description" value='<?php echo $data2["auorg"]; ?>' placeholder="Organization You Are Affiliated With"/>
                </div>
              </div>
            </div>
		<div class="form-group">
              <label for="Description" class="cols-sm-2 control-label">Address of Organization</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-address-book fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="auaddress" id="Description" value='<?php echo $data2["auaddress"]; ?>' placeholder="Address"/>
                </div>
              </div>
            </div>
	
      
       
        <script language="javascript">
            populateCountries("country", "state");
          
        </script>
						<!--<div class="form-group">
							<label for="mobno" class="cols-sm-2 control-label">Mobile No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
								<div class="row">
									
									<!--<div class="form-group col-xs-3"><input type="text" class="form-control" name="cc" id=""   placeholder="eg: +91"/></div>-->
								<!--	<div class="form-group col-xs-9"><input type="text" class="form-control" name="auphone" value='<?php echo $data2["auphone"]; ?>'id=""  placeholder="Mobile Number"/>
								</div>
								</div>
							</div>
						</div></div>-->
						<div class="form-group">
							<label for="mobno" class="cols-sm-2 control-label">Mobile No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-mobile fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="auphone" id="" value='<?php echo $data2["auphone"]; ?>' placeholder="Mobile Number"/>
								</div>
							</div>
						</div>
						<div class="form-group"><label for="sel1"> Role</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
						<select class="form-control" name="aucategory" id='cat' onchange="showfield(this.options[this.selectedIndex].value)">
						<option selected="true"><?php echo $data2["aucategory"]?></option>
						<option value="Faculty">Faculty</option>
						<option value="Post Graduate Student">Post Graduate Student</option>
						<option value="Research Scolar">Research Scholar</option>
						<option value="Industry Professional">Industry Professional</option>
						<option value="Government Official">Government Official</option>
						<option value="Other">Other</option>
						</select>
						</div>
						</div>
						</div><div id="div1"></div>
		<script type="text/javascript">
function showfield(name){
  if(name=='Other')document.getElementById('div1').innerHTML='Please Mention Here: <input type="text" name="other1" />';
  else document.getElementById('div1').innerHTML='';
}
</script>
				
						
                 			<br><br>
						<div class="form-group ">
							<input type="submit" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>
  </div>
  <?php include("../footer.php");?>
  </body>
</html>
