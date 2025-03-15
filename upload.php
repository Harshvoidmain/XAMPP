<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Excellence Awards</a></li>
                        <li class="active">Submit Nomination</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php
include('connection.php');
//if we clicked on Upload button

if($_POST['Submit'] == 'Submit')
  {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
  //make the allowed extensions
  //$goodExtensions = array( '.pdf'); 
  $error='';

  //set the current directory where you wanna upload the doc/docx files

  $uploaddir = './uploads/excellence_awards_submission/images/ ';

  $name = $fname."-".$lname."-".$_FILES['attach_declaration']['name'];//get the name of the file that will be uploaded

   //$min_filesize=1;set up a minimum file size(a doc/docx can't be lower then 10 bytes)
   $min_filesize=3;//set up a minimum file size(a doc/docx can't be lower then 10 bytes)

  $stem=substr($name,0,strpos($name,'.'));

  //take the file extension
 
  $extension = substr($name, strpos($name,'.'), strlen($name)-1);

  //verify if the file extension is doc or docx

  // if(!in_array($extension,$goodExtensions))

     //$error.='Extension not allowed<br>';
 
echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1

   if(filesize($_FILES['attach_declaration']['tmp_name']) < $min_filesize)

     $error.='File size too small<br>'."\n";

  $uploadfile = $uploaddir . $stem.$extension;

$filename=$stem.$extension;

if ($error=='')

{

//upload the file to

if (move_uploaded_file($_FILES['attach_declaration']['tmp_name'], $uploadfile)) {

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $oname=$_POST['oname'];
		$position=$_POST['position'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $category=$_POST['category'];
        $sub_category=$_POST['sub_category'];      
        //$justification=$_POST['justification'];
        $attach_declaration=$name;
        $transaction_id=$_POST['transaction_id'];
                //insert to papers
        $rew="INSERT INTO excellence_awards (fname,lname,oname,position,email,phone,category_id,sub_category_id,attach_declaration,transaction_id) VALUES ( '$fname', '$lname', '$oname','$position', '$email', '$phone', '$category', '$sub_category','$attach_declaration', '$transaction_id');";
        mysqli_query($db,$rew);
		
		$mailto = $email;                //receiver
$mailSub = "Acknowlegment for Excellence Award Application";
$mailMsg = nl2br("  Dear Sir/Madam,
				    At the outset accept our greetings of the day.

                    We have received your application. Thanks for showing interest.  

                    Regards,
					Prof. Megha Kolhekar
					Chairmen of IEI-FCRIT Execellence Awards
					Fr. C. Rodrigues Institute of Technology, Vashi (India)
");
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
$mail ->Body = $mailMsg;
$mail ->AddAddress($mailto);
if(!$mail->Send())
{
 echo "Mail Not Sent";
}
else
{
echo "Mail Sent";
}
		
		
		
    
?>
<div class="container"><br><br>
    <h2 style="text-align: center">Your Submission For Nomination been sent successfully. Thank you.</h2>
    <hr class="style17">
</div>
<?php

}

}

else echo $error;

}

?>



<?php include("footer.php");?>
</html>