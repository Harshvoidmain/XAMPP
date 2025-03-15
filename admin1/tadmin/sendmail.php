<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
$dept=$_SESSION['id'];
	
	require"../../connection.php";
           
   $pid=$_SESSION['pkaid'];
    $sql="SELECT auid FROM papers WHERE pid='$pid'";
                $result1=mysqli_query($db,$sql);
				if(mysqli_num_rows($result1)==1)
{
$row = mysqli_fetch_array($result1);
$auid=$row["auid"];                     
}
                /*$sql="SELECT rewid,rewname FROM reviewer";
                $result2=mysqli_query($db,$sql);
                $sql="SELECT rewid,rewname FROM reviewer";
                $result3=mysqli_query($db,$sql);	
                $sql="SELECT * FROM tracks WHERE dept='$dept'";
				$result4=mysqli_query($db,$sql);
*/
$sql="SELECT auemail FROM author WHERE auid='$auid'"; 
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$auemail=$row["auemail"];                         // email has been fetched into 'auemail' variable
}
    if(isset($_POST['accept']))
   {
		//$status=mysqli_real_escape_string($db,$_POST['status']);
		
		
		/*if(empty($status))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Accept or Reject!")';
			echo '</script>';
			exit();
		}*/
		//else 
		//{
			/*if($status=='Accepted')
			{*/
				$ideas="SELECT * FROM papers where pid='$pid'";
			$result=mysqli_query($db,$ideas);
			while ($row = mysqli_fetch_array($result)) 
			{
				 $r1=$row['premark1'];
				$r2=$row['premark2'];
			$r3=$row['premark3'];
				$plagcount=$row['plagcount'];
			}
				$sql="UPDATE papers SET opstatus='Accepted',pcameraready='YES' WHERE pid='$pid'";
		mysqli_query($db,$sql); 

$mailto = $auemail;                //receiver
$mailSub = "Congratulations!";

$mailMsg =nl2br("Dear Author,
The Organizing Committee of 2nd Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2017) is thankful to you for submitting the paper. Your paper has undergone double review by two different experts. The comments of both the reviewers are attached with this email. Based on the review of your paper, the Committee has decided to accept your paper for presentation in the ICNTE 2017 and subsequently for publication in the IEEE Xplore. 
Followings are the important things which you need to do now. 
•	Revise your paper according to the suggestions of the reviewers. Go to ‘ICNTE Paper Submission System’ (IPSS) and login using your registered email id and password. If you have forgotten your password please retrieve it by clicking on Forgot Password tab. After getting into your IPSS account, click on Submit Revised Paper tab and follow the step to submit your revised paper in MS Word format. 
•	Ensure that your paper follows all the IEEE format guidelines. The IEEE format is made available to the authors on the ICNTE 2017 website www.fcrit.ac.in/icnte2017 (Author/Reviewer Login > Instructions). If your paper does not comply with the IEEE format, it may not be considered for publication in IEEE Xplore even after presenting it in the ICNTE 2017. 
•	In due course of time, IEEE/Organizer will communicate with the authors to give intrusions about further processing of their papers. 
•	A Plagiarism Count upto 20% is allowed. If your paper exceeds this Count, revisit and refine the paper to minimize the Plagiarism Count. Follow standard protocols of the Intellectual Property Rights especially in the case of figures and tables borrowed from the references. If the Plagiarism Count in the revised paper exceeds 20%, it may not be considered for publication in IEEE Xplore even after presenting it in the ICNTE 2017.
•	Download the Copyright Form and fill it. A filled Copyright Form is made available on the IPSS. Use it as a reference. Scan the filled Copyright Form and upload it along with the revised paper, even if you have uploaded the Copyright Form previously along with the prerevised manuscript.
•	Authors registering as student are required to produce valid identity card during the Conference. 
•	IEEE members including IEEE Student members will be given a discount of 20% on regular registration fees. The discounted amount will be refunded to the IEEE members during the Conference after showing adequate proof of IEEE membership.
•	Go to the Online Registration tab in the Conference website and proceed to register and pay online. 
Or 
Click on the link given below to register and pay online. 

https://fcrit.almaconnect.com/event_calendar/an-ieee-technically-co-sponsored-2nd-biennial-international-conference-on-nascent-technologies-in-engineering-icnte-2017-2019

•	There is no need to send the hardcopy of filled Registration Form. However, authors are requested to preserve the payment receipt as they may be asked to produce it any time till the Conference gets over. 
In the case of any problem or if you have any query, feel free to contact on icnte@fcrit.ac.in. We look forward to interact with you during ICNTE 2017.
Here are the reviews of yor paper
Review 1: .$r1. Review 2:.$r2. Review 3: .$r3.Plagcount is .$plagcount.

Pranali Choudhari
ICNTE (Technical Committee Convenor)
Fr. C. Rodrigues Institute of Technology, Vashi (India)
Contact: 9833422677");
/*
$mailMsg = "Your Paper Has Been Accepted By Us! Kindly got to your profile and upload the cameraready paper. You will be further notified About the Presentation Details!  Regards,";*/
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

 $ideas="SELECT * FROM papers where pid='$pid'";
$result=mysqli_query($db,$ideas);
$row=mysqli_fetch_array($result1);
$file_name=$row['plagreport'];
$file_to_attach = '../../uploads/Plagreport/'.$file_name.'';

$mail->AddAttachment( $file_to_attach , $file_name );

return $mail->Send();
if(!$mail->Send())
{
  echo '<script>alert("Mail sent successfully");</script>';
  	header('location: overall.php');
}
else
{
      echo '<script>alert("Mail does not sent successfully");</script>';

}

    //header('location: sendmail.php');
		//}
}
if(isset($_POST['reject']))
   {
		//$status=mysqli_real_escape_string($db,$_POST['status']);
		
		
		/*if(empty($status))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Accept or Reject!")';
			echo '</script>';
			exit();
		}*/
		//else
		//{
			
			/*if($status=='Accepted')
			{*/
				$ideas="SELECT * FROM papers where pid='$pid'";
			$result=mysqli_query($db,$ideas);
			while ($row = mysqli_fetch_array($result)) 
			{
				 $r1=$row['premark1'];
				$r2=$row['premark2'];
			$r3=$row['premark3']; 
			}

				$sql="UPDATE papers SET opstatus='$status' WHERE pid='$pid'";
		mysqli_query($db,$sql);
		$mailto = $auemail;                //receiver
$mailSub = "Your paper submitted to ICNTE 2017 Conference";
$mailMsg = nl2br("
Dear Author,
The Organizing Committee of 2nd Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2017) is thankful to you for submitting the paper. After carefully studying the review of your paper, the Committee has observed that your paper fall short of the quality measures of the ICNTE 2017. The Track Chair again checked your paper for plagiarism count, formatting, organization, technical content, and novelty. Based on the Reviewers’ and Track Chair’s recommendations, we highly regret to inform you that your paper will not be considered for the ICNTE 2017.

Here are the reviews of yor paper
Review 1: .$r1. Review 2:.$r2. Review 3: .$r3.
Pranali Choudhari
ICNTE (Technical Committee Convenor)
Fr. C. Rodrigues Institute of Technology, Vashi (India)
Contact: 9833422677");


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
$mail->Send();
if(!$mail->Send())
{
// echo "Mail Not Sent";
}
else
{
//echo "Mail Sent";
}

				header('location: overall.php');
//}			


			
		}
	   
	

?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <script>$('input[type=radio]').click(function() {
    $("mail").submit();
});</script>
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="/icnte/home">Home</a></li>
                        <li><a href="upload.php">Overall Status</a></li>
                         <li class="active">Reviews</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
 
  <body style="font-size:20px">
    <?php echo $_SESSION['pkaid'];
	echo $auemail;?>
  <br>
    <br>
    <br>   <div class='container' style='background-color:#F5F5F5;'>
	<form method='post' action='sendmail.php' id="mail"class='col-md-12 center-block' enctype="multipart/form-data">
													<div class="row">
    <div class="">
									<div class="">
		
											
										
											<div class="">
												<div class="">
													
																				
		<?php
		
		
		
			$ideas="SELECT * FROM papers where pid='$pid'";
			$result=mysqli_query($db,$ideas);
			while ($row = mysqli_fetch_array($result)) 
			{
				//echo "<div class='col-sm-12' ><b>IDEA NUMBER:</b><p>".( $row['iid'] )."</p></div>";
				echo "<div class='col-sm-12' ><b>REVIEWER 1:</b> <br>          <p> Decision: ".( $row['pstatus1'] )."</p><p>Remark 1: ".( $row['premark1'] )."</p></div>";
				echo "<div class='col-sm-12' ><b>REVIEWER 2:</b><br><p>Decision: ".( $row['pstatus2'] )."</p><p>Remark 2: ".( $row['premark2'] )."</p></div>";
				echo "<div class='col-sm-12' ><b>REVIEWER 3:</b><br><p>Decision: ".( $row['pstatus3'] )."</p><p>Remark 3: ".( $row['premark3'] )."</p></div>";
				if($row['pstatus1']='Rejected' AND $row['pstatus2']='Rejected' OR $row['pstatus2']='Rejected' AND $row['pstatus3']=='Rejected' OR $row['pstatus1']=='Rejected' AND $row['pstatus3']=='Rejected')
				{
					echo "<div class='col-sm-12'><b>Plagcount:</b><br><p>".$row['plagcount']."</p></div>";
					echo "<!--<div ><b><p>Attach Plag Report</p></b><input type='file' name='doc' value=''/><form></div>-->";
				
				}
				
				
			
			
			}
			
		 
										echo "	</div>
													
											
											</div>
											</div>
											</div>		";
  
?>
<?php
	   $row = mysqli_fetch_array($result);
	   if($row['pstatus1']=='Rejected' AND $row['pstatus2']=='Rejected' OR $row['pstatus3']=='Rejected' AND $row['pstatus2']=='Rejected' OR $row['pstatus1']=='Rejected' AND $row['pstatus3']=='Rejected')
	   {
	       echo '<div  class="radio">
	   <br><br><label class="radio-inline"><input class="btn btn-danger" type="submit" name="reject" value="Rejected"></label></div>';
	   }
	   else
	   {
	       echo '<div  class="radio">
	   <br><br><label class="radio-inline"><input class="btn btn-success" type="submit" name="accept"  value="Accepted"></label>
	       <label class="radio-inline"><input class="btn btn-danger" type="submit" name="reject" value="Rejected"></label></div>';
	   }
	   ?>
	  <!-- <div  class="radio">
	   <br><br>
      <label class="radio-inline"><input class="btn btn-success" type="submit" name="accept"  value='Accepted'></label>
	  <label class="radio-inline"><input class="btn btn-danger" type="submit" name="reject" value='Rejected'></label>
    </div>
   
	<!--<div class='btn-group' data-toggle='buttons'>
  <label class='btn btn-primary active btn-md'>
    <input type='radio' name='status' value='Accepted' id='option1'   autocomplete='off' checked> Send Acceptance Mail
	 
  </label>
  <label class='btn btn-danger btn-md'>
    <input type='radio' name='status' value='Rejected'  autocomplete='off'> Send <br>Rejection Mail
  </label>
 -->
 
</div> <br><br>
               
                   <!--<div class='form-group'>
                     <input style='font-size: 20px  ;font-weight: bold;' type='submit' class='btn btn-md btn-info' name='review' value='Submit' class='Log In'>
                  </div>-->
               </form>
</div></div>
</body>

<?phpinclude("../../footer.php");?>
</html>
