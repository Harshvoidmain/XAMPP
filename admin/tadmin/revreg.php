<?php session_start();
require "../../connection.php";
   if(isset($_POST['fillup']))
{
	$salutation=mysqli_real_escape_string($db,$_POST['salutation']);
    $rewname=mysqli_real_escape_string($db,$_POST['rewname']);
	$qualification=mysqli_real_escape_string($db,$_POST['qualification']);
	$prefix=mysqli_real_escape_string($db,$_POST['prefix']);
    $organization=mysqli_real_escape_string($db,$_POST['organization']);
    $department=mysqli_real_escape_string($db,$_POST['department']);
	$post=mysqli_real_escape_string($db,$_POST['post']);
	$experience=mysqli_real_escape_string($db,$_POST['experience']);
	$trackid=$_POST['trackid'];
	
	$trackids = implode(",",$trackid);
    //$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
	$sessionid=$_POST['sessionid'];
	$sessionids = implode(",",$sessionid);
	//$sessionid=mysqli_real_escape_string($db,$_POST['sessionid']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
	$mobile=mysqli_real_escape_string($db,$_POST['mobile']);
	$permanent=mysqli_real_escape_string($db,$_POST['permanent']);
	$number="/^[0-9]+$/";
	
	if(empty($salutation)||empty($rewname)||empty($qualification)||empty($organization)||empty($department)||empty($experience)||empty($trackid)||empty($email)||empty($mobile)||empty($permanent))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Fill All Fields!")';
			echo '</script>';
			exit();
		}
	else
		{
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
			
			$emck= "SELECT rewid FROM reviewer WHERE email='$email' LIMIT 1";
			$ck=mysqli_query($db,$emck);
			$cck=mysqli_num_rows($ck);
			if( $cck>0)
			{
				echo '<script language="javascript">';
				echo 'alert("Email is already registered with us!")';
				echo '</script>';
				exit();
			}
			         
			//Create User
			//$sql="INSERT INTO reviewer(salutation,rewname,qualification,organization,department,post,experience,trackid,sessionid,email,mobile,permanent) VALUES('$salutation','$rewname','$qualification' ,'$organization','$department','$post','$experience','$trackids','$sessionids','$email','$mobile','$permanent')";
			
			$sql="INSERT INTO reviewer(salutation,rewname,qualification,organization,department,post,experience,trackid,email,mobile,permanent) VALUES('$salutation','$rewname','$qualification' ,'$organization','$department','$post','$experience','$trackids','$email','$mobile','$permanent')";
            
		//print_r($sql); die;	
		/*	mysqli_query($db,$sql); 
			
			if ($qualification=="Ph.D") {
					$sql = "UPDATE reviewer SET prefix = 'Dr' WHERE reviewer.email = '$email'";}
					 
					else{
					 $sql ="UPDATE reviewer SET prefix='Prof' WHERE reviewer.email = '$email'";
					 	 } */
						
						 mysqli_query($db,$sql);
						 
            $_SESSION['message']="Your Information has been Registered"; 
            $_SESSION['rewname']=$rewname;
			
			$random_char = str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789");
			$password = substr($random_char,1,5);
			
			
			$mailto = $email;                //receiver
$mailSub = "Registration Successful";
//$mailMsg = "Your password is ".$password;
$mailMsg = nl2br("Dear Sir/Madam,
			At the outset accept our greetings of the day.

			Thanks for accepting our invitation for reviewing the papers of ICNTE 2021 and registering yourself for the same. You have created your Reviewer’s Account. You can access the Account by clicking on the Login button available on the Home Page of the ICNTE 2021 website whose link is given below. 
			https://fcrit.ac.in/login.php
			Your Login Details are as follows:

			Login ID: Your registered email ID
			Password: $password

			You will be duly informed by email, once the papers to be reviewed are assigned to you. You need to access your Reviewer’s Account to complete the review process. After the review process of all the papers assigned to you is completed, you can download the Reviewer Certificate in your Reviewer’s Account itself. 

			For more information or any query contact the Technical Program Committee through Contact Us tab given on the Home Page of the ICNTE 2021 website. 

			Pranali Choudhari
			ICNTE (Technical Committee Convenor)
			Fr. C. Rodrigues Institute of Technology, Vashi (India)
			Contact: 9833422677
			");

$mailMsg = wordwrap($mailMsg,100);
require '../../PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
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
			$password=md5($password);
			$sql="UPDATE reviewer SET rpassword='$password' WHERE email='$email'";
			mysqli_query($db,$sql);	
				
				header("location:./tadmin.php");  //redirect to the home page
}
            
           
}
   
   ?>
<!DOCTYPE html>
<html>
   <?php include("header.php");?>

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
   
   <body>
   <br><br>
      <div id="wrapper" class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
             <br>  <h1 class="text-center" style="font-size:18px" ><bold> Reviewer Registration Form</bold></h1>
           
            <div id="frm" class="modal-body">
				<?php
                  if(isset($_SESSION['message']))
                  {
                       echo "<div id='error_msg'>".$_SESSION['message']."</div>";
                       unset($_SESSION['message']);
                  }
				  

                ?>
				  <form method="post" action="revreg.php" class="col-md-12 center-block">
					
					<div class="form-group">
						<label for="sel1" style="font-size:16px" >Salutation:</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
							<select class="form-control" name="salutation">
							<option style="font-size:16px" value="null">Select...</option>
							<option style="font-size:16px" value="Dr.">Dr.</option>
							<option style="font-size:16px" value="Prof.">Prof.</option>
							<option style="font-size:16px" value="Mr.">Mr.</option>
							<option style="font-size:16px" value="Ms.">Ms.</option>
   						</select>
						</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Full Name: </label>( As it should appear on your certificate )
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user-o fa" aria-hidden="true"></i></span>
						<input type="text" style="font-size:16px"  class="form-control" name="rewname" id="name"  placeholder="Enter your Full Name"/>
						</div>
						</div>
					</div>
						
						
					<div class="form-group">
						<label for="sel1" style="font-size:16px" > Qualification:</label>
						<div class="cols-sm-10">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-graduation-cap fa" aria-hidden="true"></i></span>
							<select class="form-control" name="qualification">
							<option style="font-size:16px" value="null">Select...</option>
							<option style="font-size:16px" value="Ph.D">Ph.D</option>
							<option style="font-size:16px" value="M.Tech/M.E">M.Tech/M.E</option>
    						</select>
						</div>
						</div>
					</div> 
					<!--?php
					if ($qualification="Ph.D") {
					$sql = "UPDATE reviewer SET prefix='Dr'" ;}
					 
					elseif($qualification="M.Tech/M.E") {
					 $sql ="UPDATE reviewer SET prefix='Prof'";
					 	 } 
						
						 mysqli_query($db,$sql);
					?-->
				
					<div class="form-group">
							<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Name of Department</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" style="font-size:16px" class="form-control" name="department" id="department"  placeholder="Enter name of your department"/>
								</div>
							</div>
					</div>					
					
					<div class="form-group">
							<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Name of Organization</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" style="font-size:16px" class="form-control" name="organization" id="organization"  placeholder="Enter name of your organization"/>
								</div>
							</div>
					</div>
					
					
					<div class="form-group">
							<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Post holding in Department/Organization</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-tasks fa" aria-hidden="true"></i></span>
									<input type="text" style="font-size:16px" class="form-control" name="post" id="post"  placeholder="Enter your Post in Organization"/>
								</div>
							</div>
					</div>					
								
					
					<div class="form-group">
							<label for="mobno" style="font-size:16px" class="cols-sm-2 control-label">Experience</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-plus fa" aria-hidden="true"></i></span>
									<input type="text" style="font-size:16px" class="form-control" name="experience" id=""  placeholder="Total Experience"/>
								</div>
							</div>
					</div>
					
					
					<div class="form-group">
					<label for="Description" style="font-size:16px" class="cols-sm-2 control-label">Track (Hold Ctrl to select multiple tracks)</label>
					<div class="cols-sm-10">
					<div class="input-group">
					<span class="input-group-addon">
					<i class="fa fa-edit fa" aria-hidden="true">
					</i>
					</span>
					<select multiple="multiple"  style="font-size:16px" class="form-control input-lg" name="trackid[]" id="track-list" onChange="gSession(this.val)">
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

         <!--<div class="form-group">
            <label for="Description" style="font-size:16px" class="cols-sm-3 control-label">Session (Hold Ctrl to select multiple sessions)
            <div class="cols-sm-10">
            <div class="input-group" >
			<span class="input-group-addon">
					<i class="fa fa-edit fa" aria-hidden="true">
					</i>
					</span>
            <select multiple style="font-size:16px" class="form-control input-lg" name="sessionid[]" id="session-list" onChange="gtrack(this.val)" >
                 <option style="font-size:16px" value="">Select Track
                  </option>
            </select>
            </div>
            </div>
            </div>
            <br>
			-->	  
				  
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
				<div class="form-group">
							<label for="email" style="font-size:16px" class="cols-sm-2 control-label">Email ID</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="email" style="font-size:16px" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
				</div>
					
						 
					<div class="form-group">
							<label for="mobno" style="font-size:16px" class="cols-sm-2 control-label">Mobile No.</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
									<input type="text" style="font-size:16px" class="form-control" name="mobile" id=""  placeholder="Mobile Number"/>
								</div>
							</div>
					</div>
				
					

					<div class="form-group">
							<label for="name" style="font-size:16px" class="cols-sm-2 control-label">Are you interested to become a permanent reviewer for ICNTE Series</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type="radio" style="font-size:16px" name="permanent" value='yes' id="yes">Yes<br>
									<input type="radio" style="font-size:16px" name="permanent" value='no' id="no">No
								</div>
							</div>
					</div>
					
					
						
				
						
</div>
	</div>		
	
		<br><br>
						<div class="form-group ">
							<input type="submit" style="height:50px; width:510px; font-size:16px;  position:relative; top:-20px; left: 45px;" class="btn btn-block btn-lg btn-info" name="fillup" class="Register">
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