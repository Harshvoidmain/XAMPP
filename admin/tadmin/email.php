<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
 require "../../connection.php";  


if(isset($_POST['send']))

  {
     $messagebody=$_POST['messagebody'];
     $subject=$_POST['subject'];
     $sql="SELECT auemail from author WHERE auid IN (
              SELECT auid from papers WHERE trackid IN(
                     SELECT tid FROM tracks WHERE dept= '$dept'
                                                      )
                                                )";
    $result1=mysqli_query($db,$sql);
     require '../../PHPMailer-master/PHPMailerAutoload.php';  
    while($row = mysqli_fetch_array($result1))
        {
        $email = $row['auemail'];

  
        $mailto = $email;                //receiver
        $mailSub = $subject;
        $mailMsg = nl2br($messagebody);
           //A file from the PHPMailer-master file is referred. 
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
        $mail->AddCC('icnte@fcrit.ac.in', 'ICNTE');
        if(!$mail->Send())
        {
            echo "Mail Not Sent";
        }

        }
        header("Location:mailed.php");   
  }
?>

<!DOCTYPE html>
<html lang="en">
    <?php include("header.php"); ?>

<style>    .info p {       
    text-align:center;       
    color: #999;      
    text-transform:none;       
    font-weight:600;      
    font-size:15px;      
    margin-top:1px    }  
    .info i {       
    color:#F6AA93;    
               }    
    p span {    
    color: #F00;    }   
    p {        
    margin: 0px;        
    font-weight: 500;        
    //line-height: 2;        
    color:#333;    }    
    input {       
    border-radius: 0px 5px 5px 0px;        
    border: 1px solid #2BBAFC;        
    margin-bottom: 1px;        
    width: 75%;        
    height: 50px;        
    float: left;        
    padding: 0px 5px;    }    
    a {        
    text-decoration:inherit    }    
    textarea {        
    border-radius: 0px 5px 5px 0px;        
    border: 1px solid #2BBAFC;        
    margin: 0;        
    width: 75%;        
    height: 130px;        
    float: left;        
    padding: 0px 5px;    }    
    .form-group {        
    overflow: hidden;        
    clear: both;
    padding: 5px 5px;    }    
    .icon-case {        
    width: 35px;        
    float: left;        
    border-radius: 5px 0px 0px 5px;        
    background:#F5F5F5;        
    height:42px;       
    position: relative;        
    text-align: center;        
    line-height:40px;    }    
    i {        
    color:#555;    }    
                                        .contentform {        }    
                                        .bouton-contact{        
                                            background-color: #2BBAFC;        
                                            color: #FFF;        
                                            text-align: center;        
                                            width: 100%;        
                                            border:0;        
                                            padding: 5px 5px;        
                                            border-radius: 0px 0px 5px 5px;        
                                            cursor: pointer;        
                                            margin-top: 40px;        
                                            font-size: 25px;    }    
                                            .leftcontact {        
                                                width:49.5%;         
                                                float:left;        
                                                border-right: 1px solid #87CEFA;        
                                                box-sizing: border-box;        
                                                padding: 0px 5px 0px 0px;    }    
                                                .rightcontact {        
                                                    width:49.5%;        
                                                    float:right;        
                                                    box-sizing: border-box;        
                                                    padding: 0px 0px 0px 5px;    }    
                                                    .validation {        
                                                        display:none;        
                                                        margin: 0 0 10px;        
                                                        font-weight:400;        
                                                        font-size:13px;        
                                                        color: #DE5959;    }        
                                                        input[type=submit]{ 
                                                            font-size: 18px;}


</style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="tadmin.php">Home</a></li>
                        <li><a href="javascript::">Email to Everyone</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

    <h2 style="text-align:center;">Email To Everyone</h2>

    <hr class="style17">

</div>
    <body>

 <div id="wrapper" class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
        <form class="form" method="POST" action="#" enctype="multipart/form-data">
            
             <div class="form-group">
              <p>Subject<span>*</span></p>
              <div class="input-group">
             <span class="input-group-addon">
             <span class="fa fa-user" style="color:#57BC98"></span></span>
             <input class="form-control" name="subject" id="prenom" required="required" aria-required="true" type="text"></div></div>


            <div class="form-group">
            <p>Message Body <span>*</span></p>
            <div class="input-group">
            <span class="input-group-addon"><span class="icon-case"><i class="fa fa-comments-o"  style="color:#57BC98"></i> </span></span>
            <textarea type="textarea" rows="11" class="form-control" name="messagebody" required="required" aria-required="true"> </textarea>
            </div> </div>
            <br>
     
            <div class="form-group ">
          <input class="btn btn-info btn-block login" type="submit" name="send" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Send"> 
 </div>             
</form>
</div></div></div>
 <?php include("../../foot.php");?>
</body>
</html>