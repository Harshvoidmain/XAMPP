<?php session_start();
require "../connection.php";
 /*This page is accessible through the Profile tab in the Navigation Bar.
 The reviewers update their personal information here.
     @author: alvina
   */ 
if(!$_SESSION["rewid"])
  {
  	header("location:login.php?notloggedin=You Are Not Logged In!");
  }
  else
  {
  	//Secure Home Page opens
  }
$rewid=$_SESSION['rewid'];
$data = 'SELECT * FROM reviewer WHERE rewid = "'.$rewid.'"'; 
  $query = mysqli_query($db,$data) or die("Couldn't execute query. ". mysql_error()); 
  $data2 = mysqli_fetch_array($query,MYSQLI_ASSOC); 
  
   if(isset($_POST['fillup']))
{
	//$rewid=$_SESSION['rewid'];
    $rewname=mysqli_real_escape_string($db,$_POST['rewname']);
	$qualification=mysqli_real_escape_string($db,$_POST['qualification']);
    $organization=mysqli_real_escape_string($db,$_POST['organization']);
    $department=mysqli_real_escape_string($db,$_POST['department']);
	$post=mysqli_real_escape_string($db,$_POST['post']);
	$experience=mysqli_real_escape_string($db,$_POST['experience']);
    $trackid=mysqli_real_escape_string($db,$_POST['trackid']);
	$sessionid=mysqli_real_escape_string($db,$_POST['sessionid']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
	$mobile=mysqli_real_escape_string($db,$_POST['mobile']);
	$permanent=mysqli_real_escape_string($db,$_POST['permanent']);
		$number="/^[0-9]+$/";
		if(!preg_match($number,$mobile))
			{
				echo '<script language="javascript">';
				echo 'alert("Mobile no is not valid")';
				echo '</script>';
				exit();
			}
			if(!(strlen($mobile) == 10))
			{
				echo '<script language="javascript">';
				echo 'alert("Mobile number should be 10 digit!")';
				echo '</script>';
				exit();
			}
		if(empty($rewname)||empty($organization)||empty($department)||empty($experience)||empty($email)||empty($mobile))

		{
			echo '<script language="javascript">';
			echo 'alert("Please Fill All Fields!")';
			echo '</script>';
			exit();
		}
		else
			{          
			
			$sql="UPDATE reviewer SET rewname='$rewname',qualification='$qualification',department='$department',organization='$organization',experience='$experience',post='$post',trackid='$trackid',sesssionid='$sessionid',email='$email',mobile='$mobile',permanent='$permanent' WHERE rewid='$rewid'";
            mysqli_query($db,$sql);  
            $_SESSION['message']="Your Information has been updated"; 
           // $_SESSION['rname']=$rewname;
			
				//header("location:home.php");
		   
		}



}
   ?>
   
   
   
<!DOCTYPE html>
<html lang="en">
    <?php include("../header1.php");?>
	<?php include("navbar.php");?>
		 <script>
		 function gSession(val)
      {
	
	var selected=[];
	$('#track-list :selected').each(function(i, sel){
		
     selected[$(this).val()]= $(sel).val();
	 //alert( $(sel).val() );
    });	
	var newArray = $.map( selected, function(v){
  return v === "" ? null : v;
});
		var jsonString = JSON.stringify(newArray);

		$.ajax({
          type: "POST",
          url: "get_session.php",
          data:'tid='+jsonString,
          success: function(data){
			  
			  $("#session-list") .html("<option> select session </option>");
            $("#session-list").append(data);
			
          }
        }
              );
      } 
		 
      function getSession(val)
      {
        $.ajax({
          type: "POST",
          url: "get_session.php",
          data:'tid='+val,
          success: function(data){
            $("#session-list").html(data);
			//$("#track-list").html(data);
          }
        }
              );
      }
	/*  function track(val)
	  {
		 $.ajax({
          type: "POST",
          url: "get_track.php",
          data:'tid='+val,
          success: function(data){
           
			$("#track-list").html(data);
          }
        }
              ); 
	  }*/
	 function gettrack(val)
      {
		  
		  var val=$('#track-list').val();
        $.ajax({
          type: "POST",
          url: "get_track.php",
          data:'tid='+val,
          success: function(data){
            $("#track").html(data);
          }
        }
              );
      }
    </script>	

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Reviewer</a></li>
                        <li><a href="profile.php">Update Profile</a></li>
                        <li class="active"> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
   
   
				  
				 <body style="font-size:20px">
				<div class="container"> 
				  
				<form method="post" action="profile.php" class="col-md-12 center-block" style="font-size:16px">

					


					<div class="form-group">
						<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Full Name</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user-o fa" aria-hidden="true"></i></span>
						<input type="text" style="font-size:16px"  class="form-control" name="rewname" id="name" disabled value='<?php echo $data2["rewname"]; ?>' placeholder="Enter your Full Name"/>
						</div>
						</div>
					</div>

					
					<div class="form-group">
						<label for="sel1"> Qualification:</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
							<select class="form-control" name="qualification" >
							<option value="">Select...</option>
							<option value="Ph.D">Ph.D</option>
							<option value="M.Tech/M.E">M.Tech/M.E</option>
    						</select>
						</div>
						</div>
					</div>
					
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name of Organization</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="organization" id="organization"  value='<?php echo $data2["organization"]; ?>'  placeholder="Enter name of your organization"/>
								</div>
							</div>
					</div>
					
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Name of Department</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="department" id="department" value='<?php echo $data2["department"]; ?>' placeholder="Enter name of your department"/>
								</div>
							</div>
					</div>
					
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Post holding in Department/Organization</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="post" id="post" value='<?php echo $data2["post"]; ?>' placeholder="Enter your Post in Organization"/>
								</div>
							</div>
					</div>					
								
					
					<div class="form-group">
							<label for="mobno" class="cols-sm-2 control-label">Experience</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-plus fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="experience" id="experience" value='<?php echo $data2["experience"]; ?>' placeholder="Total Experience"/>
								</div>
							</div>
					</div>
					
					
					<div class="form-group">
					<label for="Description" class="cols-sm-2 control-label">Track (Hold Ctrl to select multiple tracks)</label>
					<div class="cols-sm-10">
					<div class="input-group">
					<span class="input-group-addon">
					<i class="fa fa-edit fa" aria-hidden="true">
					</i>
					</span>
					<select multiple type="checkbox" style="font-size:20px" class="form-control input-lg" name="trackid" id="track-list" onChange="getSession(this.value);"  >
					<option value="">Select Track
					</option>
					<?php 
						$s="select * from tracks";
						$q=mysqli_query($db,$s);
						while($row=mysqli_fetch_array($q))
						{?>
					<option  value="<?php echo $row['tid'];  ?>">
                    <?php echo $row['trackname']; //$tid=$row['tid'];?>
					</option>
					<?php
						}
					?>
				   </select>
					</div>
					</div>
					</div> <br>

         <div class="form-group">
            <label for="Description" class="cols-sm-3 control-label">Session (Hold Ctrl to select multiple sessions)
           
            <div class="cols-sm-10">
            <div class="input-group" >
			<span class="input-group-addon">
					<i class="fa fa-edit fa" aria-hidden="true">
					</i>
					</span>

			
                <select multiple type="checkbox" style="font-size:20px" class="form-control input-lg" name="sessionid" id="session-list" >
                  <option value="">Select Track
                  </option>
                  <?php /*
$trid=mysqli_real_escape_string($db,$_POST['trackid']);
//$tid=$_SESSION['tid'];
$s="select sname from sessions WHERE tid='".$_POST["trackid"]."'";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ ?>
                  <option value="<?php echo $row['sname']; ?>">
                    <?php echo $row['sname']; ?>
                  </option>
                  <?php 
}*/
?>
            </select>
            </div>
            </div>
          </div>
          <br>					
				  				  
						
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email ID</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" class="form-control" name="email" id="email" value='<?php echo $data2["email"]; ?>' placeholder="Enter your Email"/>
								</div>
							</div>
					</div>
					
						
					<div class="form-group">
							<label for="mobno" class="cols-sm-2 control-label">Mobile No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="mobile" id="" value='<?php echo $data2["mobile"]; ?>' placeholder="Mobile Number"/>
								</div>
							</div>
					</div>
				
					

					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Are you interested to become a permanent reviewer for ICNTE Series</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="radio"  name="permanent" value='yes' id="yes">Yes<br>
									<input type="radio"  name="permanent" value='no' id="no">No
								</div>
							</div>
					</div>
					
																					
</div>
	</div>			
	<br><br>
						<div class="form-group ">
							<input type="submit" style="height:50px; width:800px;  position:relative; top:-20px; left: 200px;" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
						</div>
					</form>
	  
<?php include("../footer.php");?>
   </body>
</html>