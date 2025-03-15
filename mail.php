<?php
include 'connection.php'; 
  if(isset($_POST['submit']))
  {			
			       
    			$cname=$_POST['cname'];
				$name=$_POST['name'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$company=$_POST['company'];
				$message=$_POST['message'];
               	//insert to papers
				$rew="INSERT INTO contacts(name,email,phone,message,company) VALUES ('$name','$email','$phone','$message','$company')";
				mysqli_query($db,$rew);
				
				$sql="SELECT email FROM committee_members WHERE organizing_committee_id='$cname' ";
				$result1=mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result1))
		{
		$email1 = $row['email'];
				
  
  
  
  $mailto = $email1;                //receiver
$mailSub = "Query";
$mailMsg = $message;
$mailmsg1 = $email;
$mailMsg = wordwrap($mailMsg,100);
require './PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
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
$mail ->Body = $mailMsg."             from ".$mailmsg1;

$mail ->AddAddress($mailto);
$mail->AddCC('icnte@fcrit.ac.in', 'ICNTE');
if(!$mail->Send())
{
echo "Mail Not Sent";
}
else
{
//echo "Mail Sent";
 header("Location:contactdone.php");            
            exit;
}

  }
  
  }
  ?>
  
  
  
  
