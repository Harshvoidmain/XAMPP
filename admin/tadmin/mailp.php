<?php
session_start();
$ptitle= $_POST["ptitle"];

$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
$track=$_SESSION['id'];

$sql="SELECT email,rpassword FROM reviewer where rewname=(SELECT rew1 FROM papers where trackid='$track' and ptitle = '$ptitle')";
$result=mysqli_query($db,$sql);    
$result=mysqli_fetch_array($result);
$resultEmail1=$result['email']
$resultPass1=$result['rpassword'];                        
                  

$sql="SELECT email, rpassword FROM reviewer where rewname=(SELECT rew2 FROM papers where trackid='$track' and ptitle = '$ptitle')";
$result1=mysqli_query($db,$sql);           
$result1=mysqli_fetch_array($result1);
$resultEmail2=$result1['email'];
$resultPass2=$result1['rpassword'];                    


require '../../PHPMailer-master/PHPMailerAutoload.php';


$mail = new PHPMailer;

$icnte= "icnte";

      $mail1 = new PHPMailer();
      $mail1->isSMTP();                                      // Set mailer to use SMTP
      $mail1->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail1->SMTPAuth = true;           
      //SCENE!!!!!                    // Enable SMTP authentication
      $mail1->Username = 'icnte.project@gmail.com';                 // SMTP username
      $mail1->Password = 'icnte123';    
      //!!!!!!!!!!!                       // SMTP password
      $mail1->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail1->Port = 465;                                    // TCP port to connect to
      $mail1->addAddress($resultEmail1);
      $mail1->AddCC('icnte@fcrit.ac.in', 'ICNTE'); 
      // $mail1->addAddress($resultEmail2); 
      $mail1->setFrom($icnte,'Icnte');     
         
      $mail1->isHTML(true);                                  // Set eamil format to HTML
      $mail1->Subject = 'Pending work';
      $mail1->Body = nl2br("Dear Reviewer, This is to inform you please review the paper.
                        Credentials to login are as follows:
                        
                        Login ID: $resultEmail1
                        Password: $resultPass1
                        
                        Thank you again.");
      
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

      //Mail to Reviewer 2

      $mail2 = new PHPMailer();
      $mail2->isSMTP();                                      // Set mailer to use SMTP
      $mail2->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail2->SMTPAuth = true;                               // Enable SMTP authentication
      $mail2->Username = 'icnte.project@gmail.com';                 // SMTP username
      $mail2->Password = 'icnte123';                           // SMTP password
      $mail2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
      $mail2->Port = 465;                                    // TCP port to connect to
      // $mail2->addAddress($resultEmail1);
      $mail2->AddCC('icnte@fcrit.ac.in', 'ICNTE'); 
      $mail2->addAddress($resultEmail2); 
      $mail2->setFrom($icnte,'Icnte');     
         
      $mail2->isHTML(true);                                  // Set eamil format to HTML
      $mail1->Subject = 'Pending work';
      $mail1->Body = nl2br("Dear Reviewer, This is to inform you please review the paper.
                        Credentials to login are as follows:
      
                        Login ID: $resultEmail2
                        Password: $resultPass2
                        
                        Thank you again.");
      
      if( $mail2->send())
      {            
            header("Location:updatedr.php");            
            exit;
            
      }
      else
      {

            echo "Error " .$mail2->ErrorInfo;
            // echo $result1;
            // echo error_message;
      }


?>