<?php
session_start();
    if(isset($_SESSION['id'])==null)
    {
        header("Location:../index.php"); 
    }
    if(isset($_POST['send'])){  
        $track=$_SESSION['id'];        
        // $rew1=$_POST['rew1'];
        // $rew2=$_POST['rew2'];
        $ptitle=$_POST['ptitle'];
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");         
        $sql= "UPDATE papers SET premark = 'Reviewed' where  ptitle='$ptitle' and rewd1 = '1' and rewd2 = '1' and trackid='$track'";
        $result19=mysqli_query($db,$sql);
        $sql= "SELECT auemail from author where auid=(SELECT auid from papers where ptitle='$ptitle' and rewd1 = '1' and rewd2 = '1')";
        $result9=mysqli_query($db,$sql);
        $result9=mysqli_fetch_array($result9);
        $result9=$result9['auemail'];                                
    }   
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
      $mail1->addAddress($result9);
      $mail1->AddCC('icnte@fcrit.ac.in', 'ICNTE'); 
      // $mail1->addAddress($result1); 
      $mail1->setFrom($icnte,'Icnte');     
         
      $mail1->isHTML(true);                                  // Set eamil format to HTML
      $mail1->Subject = 'Work Done';
      $mail1->Body = 'Dear, Author<br/><br/> the paper '.$ptitle.' has been Reviewed<br/><br/>Thank you again.';
      
      if( $mail1->send())
      {            
            header("Location:mailsent.php");            
            exit;
            
      }
      else
      {

            echo "Error " .$mail1->ErrorInfo;
            // echo $result1;
            // echo error_message;
      }
    ?>