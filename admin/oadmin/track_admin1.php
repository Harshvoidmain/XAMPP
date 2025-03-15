<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";

?>
<!DOCTYPE html>
<html lang="en">
    <body onload='document.form1.taemail.focus()'>
    <?php include("header.php");?>
    
    <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="track_admin1.php">Add Track admin</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

<br/><br/>
<?php
if(isset($_POST['add']))
{
	$tadept=$_POST['tadept'];
	$taname=$_POST['taname'];
	$taemail=$_POST['taemail'];
	$tausername=$_POST['tausername'];
	$tapwd=$_POST['tapwd'];
	
	$check=mysqli_query($db,"SELECT * FROM track_admin Where taname='$taname'");
	$checkrows=mysqli_num_rows($check);

//add track_admin
   if($checkrows>0){echo '<center><div class="alert alert-warning alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Warning!</strong> Track admin Exists.
</div></center>';}
   else{
   $sql="INSERT INTO track_admin(tadept, taname, taemail, tausername, tapwd) VALUES ('$tadept','$taname','$taemail','$tausername','$tapwd')";
   mysqli_query($db,$sql);
   

//mail to track_admin

$auemail=mysqli_real_escape_string($db,$_POST['taemail']);
	//$random_char = str_shuffle("1234567890");
	//$password = substr($random_char,1,5);
	$mailto = $auemail;                //receiver
$mailSub = "Assigned as track admin";
$mailMsg = "Your Login id is ".$tausername."        Your password is ".$tapwd;
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
echo '<center><div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Success!</strong> Track admin added succesfully.
</div></center>';
}
}



?>
<script>
function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}
function validateForm(){
	var taname=document.form1.taname.value;
	var taemail=document.form1.taemail.value;
	var tausername=document.form1.tausername.value;
	var tapwd=document.form1.tapwd.value;
	var tadept=document.form1.tadept.value;
	if(tadept==""){
		alert("Select Track");
		document.form1.tadept.focus();
		return false;
	}
	if(taname==""){
		alert("Enter Track admin name");
		document.form1.taname.focus();
		return false;
	}
	if(taemail==""){
		alert("Enter Track admin Email");
		document.form1.taemail.focus();
		return false;
	}
	if(tausername==""){
		alert("Enter Track admin Username");
		document.form1.tausername.focus();
		return false;
	}
	if(tapwd==""){
		alert("Enter Track admin Password");
		document.form1.tapwd.focus();
		return false;
	}
	
}
</script>
  <div class="container">
      
 <form name="form1" class="form-group" method="post" action="track_admin1.php" onsubmit="return validateForm()">
    <table class="table">
        <tr>
                <td>Track Admin Department:</td>
                <td>
				<select name="tadept" class="form-control input-lg">
					<option value="">Select Track</option>
					<option value="cs/it">Computer Department</option>
					<option value="elec">Electrical Department</option>
					<option value="extc">Electronics Department</option>
					<option value="mech">Mechanical Department</option>
					<option value="cs/it">Information Technology Department</option>
					<option value="hmnts">Humanities</option>
				</select>
				</td>
           </tr>  
		
		   <tr>
                <td>Track Admin Name:</td>
                <td><input type="text" name="taname" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Email:</td>
                <td><input type="email" name="taemail" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Track Admin LogIn ID:</td>
                <td><input type="text" name="tausername" class="form-control input-lg" /></td>
           </tr>
           
           
		   <tr>
                <td>Track Admin Password:</td>
                <td><input type="password" name="tapwd" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td> </td>
                <td><input type="submit" name="add" value="ADD"  class="btn btn-info btn-lg" onclick="ValidateEmail(document.form1.taemail)"/></td>
           </tr>
           
    </table>
 
 </form>
 </div>

 <?php include("../../footer.php");?>
</body>
</html>
