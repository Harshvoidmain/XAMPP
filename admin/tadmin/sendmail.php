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
				//$sql="UPDATE papers SET opstatus='Accepted',pcameraready='YES' WHERE pid='$pid'";
				
				$sql="UPDATE papers SET opstatus='Accepted' WHERE pid='$pid'";
		mysqli_query($db,$sql); 

$mailto = $auemail;                //receiver
$mailSub = "Acceptance Notification for the paper submitted to ICNTE-2021";

$mailMsg =nl2br("
Dear Author,  
 
Greetings from the team of ICNTE 2021 ! 
The Organizing Committee of 4th Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2021) (Technically Co-Sponsored By IEEE & INDUSTRY APPLICATIONS SOCIETY) is thankful to you for submitting the manuscript.  
We are happy to inform you that, based on the reviewers recommendation, your manuscript has been ACCEPTED for oral presentation in ICNTE-2021. The comments of the reviewers are attached with this email.  
Kindly follow the below mentioned guidelines, related to preparation of final manuscript, copyright transfer form, payment and final submission. The procedure has been detailed as a six step process (I)-(VI) 

I.Manuscript Revision: Revise your manuscript according to the suggestions of the reviewers.  

II.Formatting: Ensure that your manuscript follows all the IEEE format guidelines. The IEEE format is made available to the authors on the ICNTE 2021 website https://icnte.fcrit.ac.in (Under Download Tab). If your manuscript does not comply with the IEEE format, it may not be considered for publication in IEEE Xplore even after presenting it in the ICNTE 2021.  The number of pages in the paper should not exceed 6 pages.

III.Plagiarism check: A Plagiarism report of your manuscript has been attached along with this Email. The Plagiarism Count of the revised manuscript needs to less than 25% (Excluding the references) for it to be considered for publication in IEEE Xplore even after presenting it in the ICNTE 2021. If your manuscript exceeds this Count, revisit and refine the manuscript to minimize the Plagiarism Count. Follow standard protocols of the Intellectual Property Rights especially in the case of figures and tables borrowed from the references. Make sure that your manuscript does not contain any text that appears to be identical to previously published work and does not appear without attribution to the original work. 

IV. Copyright Transfer: Download the Copyright Form and fill it. A sample filled Copyright Form is made available in the Downloads Tab. Use it as a reference. Scan the filled Copyright Form and name it as PaperID_Copyright.pdf 

V. Online fee payment and Registration: Go to the Payment Registration Fee tab in the Conference website (Under Registration tab) and pay online. Then you can proceed to Online Registration tab for registration. Authors are requested to note down the Registration Fee Payment Transaction No. and preserve the payment receipt as they may be asked to produce it any time till the Conference gets over. At least one Author must register. 

VI. Camera Ready Paper and Copyright form Submission: After successful registration, click on the following link for Submitting the Camera-Ready Paper in MS Word format ONLY and IEEE copyright form submission. 

https://forms.gle/HAMMR99Jem25nqCJ9

The file name must be PaperID_Cameraready.docx or PaperID_Cameraready.doc. Upload the duly filled and signed IEEE copy right form along with it.  

Authors registering as student are required to upload their valid identity card during the registration fee payment.
The Authors availing discount are required to upload applicable proof during the registration fee payment. 
In the case of any problem or if you have any query, feel free to contact us on icnte@fcrit.ac.in. We look forward to interact with you during ICNTE 2021. 
  
Here are the reviews of your manuscript 

Review 1:.$r1. 


Review 2:.$r2. 


Review 3:.$r3.


Plagcount is: .$plagcount. 

Dr. Pranali Choudhari 
ICNTE (Technical Committee Convenor) 
Fr. C. Rodrigues Institute of Technology, Vashi (India) 
Contact: 9833422677 ");

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
$row=mysqli_fetch_array($result);
$file_name=$row['plagreport'];
//echo $file_name;
//$file_to_attach = '//tadmin/'.$file_name.'';
$file_to_attach = '../../uploads/Plagreport/'.$file_name.'';
$mail->AddAttachment( $file_to_attach , $file_name );

$mail->Send();
if($mail->Send())
{
    echo '<script>alert("Mail sent successfully");</script>';
	//header("Location:../overall.php"); 
  	//header('location:../overall.php');
}
else
{
      echo '<script>alert("Mail does not sent successfully");</script>';

}

    header('location:../tadmin/overall.php');
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

				$sql="UPDATE papers SET opstatus='Rejected' WHERE pid='$pid'";
		mysqli_query($db,$sql);
		$mailto = $auemail;                //receiver
$mailSub = "Your paper submitted to ICNTE 2021 Conference";
$mailMsg = nl2br("
Dear Sir/ Madam, 


Thank you for submitting your work to the 4th IEEE & IAS Technically Co-Sponsored Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2021). 

We regretfully conclude that the paper has been rejected due to one of the following reasons:
	i)As per the reviewer's recommendation
	ii)The paper does not fall within the Theme of the conference.
	iii)Incomplete submission.
	iv)Higher level of plagiarism
	
However, the reviewer's panel has recommended that your scholarly work could be shared with the delegates of the conference inthe following way :

You may submit the paper as a poster. You can upload the poster through the same Author login which you created for uploading the paper.

We hope to see you in the conference

We do thank you for your interest in ICNTE-2021 . 

Regards,

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
  echo "Mail Not Sent";
}
else
{
//echo "Mail Sent";
}
header("Location:../tadmin/overall.php");
//header("Location:../../overall.php"); 
//header('location: overall.php');
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
