<?php session_start();
require "../../connection.php";
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
$dept=$_SESSION['id'];
    $track=$_SESSION['id']; //connect to database
    $pid=['paper'];
    $sid=['session'];
 
    $tid=['trackid'];

    $sql="SELECT * FROM papers ";
    $result1=mysqli_query($db,$sql);
    $sql="SELECT * FROM tracks WHERE dept='$dept'";
    $result4=mysqli_query($db,$sql);
   
   if(isset($_POST['send']))
      {  
        $track=mysqli_real_escape_string($db,$_POST['trackid']);
        $session=mysqli_real_escape_string($db,$_POST['session']);
       $paperid=mysqli_real_escape_string($db,$_POST['paper']);
  $messagebody=$_POST['messagebody'];
     $subject=$_POST['subject'];
       $sql=" SELECT auemail from author WHERE auid IN ( SELECT auid from papers WHERE pid='$paperid')";
    $result6=mysqli_query($db,$sql);
     require '../../PHPMailer-master/PHPMailerAutoload.php';  
    while($row = mysqli_fetch_array($result6))
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
  <?php include 'header.php'; ?>
<script>
      function getSession(val)
      {
        $.ajax({
          type: "POST",
          url: "get_paper.php",
          data:'tid='+val,
          success: function(data){
            $("#session-list").html(data);
            
          }
        }
              );
      }
      function getPaper(val)
      {
        $.ajax({
          type: "POST",
          url: "get_paper.php",
          data:'tid='+val,
          success: function(data){
            /* $("#session-list").html(data); */
            
          }
        }
              );
      }
    
    </script>
    <script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#track').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData3.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#session').html(html);
                    $('#paper').html('<option value="">Select session first</option>'); 
                }
            }); 
        }else{
            $('#session').html('<option value="">Select track first</option>');
            $('#paper').html('<option value="">Select session first</option>'); 
        }
    });
    
    $('#session').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData3.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#paper').html(html);
                     
                }
            }); 
        }else{
            $('#paper').html('<p>Please Select the Session </p>'); 
        }
    });
      $('#paper').on('change',function(){
        var paperID = $(this).val();
        if(paperID){
            $.ajax({
                type:'POST',
                url:'ajaxData3.php',
                data:'paper_id='+paperID,
                success:function(html){
                    $('#rev').html(html);
                }
            }); 
        }else{
            $('#paper').html('<p>Please Select the Session </p>'); 
        }
    });

});

</script>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="tadmin.php">Home</a></li>
                        <li><a href="sendr.php">Email to Specific Paper</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <h2 style="text-align:center;">Email To Specific Paper</h2>

    <hr class="style17">

</div>

    <body style="font-size:20px">
    <div style="font-size:16px;" class="container">
        <form class="form" method="POST" action="#" enctype="multipart/form-data">
          
                   <div class="form-group">
                 <label style="font-size:16px;" for="Description" class="cols-sm-2 control-label">Select Track:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span>
                <select id="track" style="font-size:16px" class="form-control input-lg" name="trackid" id="track" onChange="getSession(this.value);" >
                 <?php
                echo '<option value="null">'.'Select Track'.'</option>';
                    while($row = mysqli_fetch_array($result4))
                    {
                        $track=$row['trackname'];
                        echo '<option value='.$row['tid'].'>'.$track.'</option>';
                    
                    }
                
                    ?>
                
                </select>
            </div></div></div>
 <div class="form-group"> 
    <label for="Description" class="cols-sm-2 control-label">Select Session:</label>
    <div class="cols-sm-10">
    <div class="input-group">
        <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">                  </i>
                </span>
                <select style='font-size:16px;'  name="session" id="session" class="form-control input-lg">
    <option value="">Select Track first</option>
</select></div></div></div>

<div class="form-group"> 
<label for="Description" class="cols-sm-2 control-label">Select paper:</label>
<div class="cols-sm-10">
<div class="input-group">
    <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
    </span>
    <select style='font-size:16px;'  name="paper" id="paper" class="form-control input-lg">
    <option value="">Select session first</option>
</select></div></div></div>

 <p id="demo"></p>

<div class="form-group"> 
<label for="Description" class="cols-sm-2 control-label">Subject:</label>
<div class="cols-sm-10">
<div class="input-group">
    <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
    </span>
             <input class="form-control" name="subject" id="prenom" required="required" aria-required="true" type="text"></div></div></div>


          <div class="form-group"> 
<label for="Description" class="cols-sm-2 control-label">Message Body:</label>
<div class="cols-sm-10">
<div class="input-group">
    <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
    </span>
            <textarea type="textarea" rows="11" class="form-control" name="messagebody" required="required" aria-required="true"> </textarea>
            </div> </div></div>
            <br>

    <div class="form-group ">
        <input class="btn btn-info btn-block login" type="submit" name="send" data-toggle="modal" data-target="#myModal" id="submitBtn" value="Send"> 
    </div>          
 </form>

  </div>
 <?php include("../../foot.php");?>
</body>
</html>