<?php
session_start();
$ptitle= $_POST["ptitle"];

$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
$track=$_SESSION['id'];

$sql="SELECT email FROM reviewer where rewname=(SELECT rew1 FROM papers where trackid='$track' and ptitle = '$ptitle')";
$result=mysqli_query($db,$sql);    
$result=mysqli_fetch_array($result);
$result=$result['email'];                        
                  

$sql="SELECT email FROM reviewer where rewname=(SELECT rew2 FROM papers where trackid='$track' and ptitle = '$ptitle')";
$result1=mysqli_query($db,$sql);           
$result1=mysqli_fetch_array($result1);
$result1=$result1['email'];                        


require '../../PHPMailer-master/PHPMailerAutoload.php';


$mail = new PHPMailer;

$icnte= "icnte";

      $mail1 = new PHPMailer;
      $mail1->isSMTP();                                      // Set mailer to use SMTP
      $mail1->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail1->SMTPAuth = true;                               // Enable SMTP authentication
      $mail1->Username = 'icnte.project@gmail.com';                 // SMTP username
      $mail1->Password = 'icnte123';                           // SMTP password
      $mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail1->Port = 465;                                    // TCP port to connect to
      $mail1->addAddress($result);
      $mail1->AddCC('icnte@fcrit.ac.in', 'ICNTE'); 
      $mail1->addAddress($result1); 
      $mail1->setFrom($icnte,'Icnte');     
         
      $mail1->isHTML(true);                                  // Set eamil format to HTML
      $mail1->Subject = 'Pending work';
      $mail1->Body = 'Dear, Reviewer<br/><br/> This is to inform you please review the paper <br/><br/>Thank you again.';
      
      if( $mail1->send())
      {            
            header("Location:updatedr.php");            
            exit;
            
      }
      else
      {

            echo "Error " .$mail1->ErrorInfo;
            // echo $result1;
            // echo error_message;
      }


?>