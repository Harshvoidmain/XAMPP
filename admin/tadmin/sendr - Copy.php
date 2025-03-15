<?php session_start();
require "../../connection.php";
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
	$pid=['paper'];
	$sid=['session'];
	//$sids = explode(",",$sid);
	$tid=['trackid'];
	//$tids = explode(",",$tid);
    //$trackid="";
	//$sessionid="";
	
    $daten= date('Y-m-d');
		

    $sql="SELECT * FROM papers ";
    $result1=mysqli_query($db,$sql);
    $sql="SELECT * FROM tracks WHERE dept='$dept'";
	$result4=mysqli_query($db,$sql);
    
	$sql="SELECT rewid,rewname FROM reviewer";
	$result1=mysqli_query($db,$sql);
/*$sql="SELECT rewid,rewname FROM reviewer WHERE trackid='$tids' AND sessionid='$sids'";
	$result2=mysqli_query($db,$sql);
	$sql="SELECT rewid,rewname FROM reviewer";
	$result3=mysqli_query($db,$sql);	
  */  
      if(isset($_POST['send'])){  
        $track=mysqli_real_escape_string($db,$_POST['trackid']);
		$session=mysqli_real_escape_string($db,$_POST['session']);
       $paperid=mysqli_real_escape_string($db,$_POST['paper']);
        $rew1=mysqli_real_escape_string($db,$_POST['rev1']);
        $rew2=mysqli_real_escape_string($db,$_POST['rev2']);
		$rew3=mysqli_real_escape_string($db,$_POST['rev3']);
      
        $pdate = date('Y-m-d H:i:s');
		if(($rew1==$rew2) OR ($rew3==$rew2) OR ($rew1==$rew3))
		{
				header("location:sendr.php?rev=no");
		}			
	else{
     $sql= "UPDATE papers SET rew1='$rew1', pstatus1='Under Review', rew2='$rew2', pstatus2='Under Review',rew3='$rew3', pstatus3='Under Review',DateAssigned = '$pdate' WHERE paperid='$paperid'";
        // $sql="insert into papers(auid, pstatus, ptitle, trackid, pdate, pcameraready, pfilename, rew1, rew2 ) values('2', 'Reviewed', '$ptitle', '$track', CURRENT_TIMESTAMP, '-NA-', 'hello world', '$rew1', '$rew2')";      
       // $sql= "UPDATE papers SET rew1='$rew1', pstatus1='Under Review', rew2='$rew2', pstatus2='Under Review',rew3='$rew3', pstatus3='Under Review',trackid = '$track', sesssionid='session',DateAssigned = '$pdate' WHERE paperid='$paperid'";        
        mysqli_query($db,$sql);
		
		
				$sql="SELECT * FROM reviewer WHERE rewid='$rew1'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$remail1=$row["email"];
   		$rewname1=$row["rewname"];
       }
	   	$sql="SELECT * FROM reviewer WHERE rewid='$rew2'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$remail2=$row["email"];
   		$rewname2=$row["rewname"];
       }
	   	$sql="SELECT * FROM reviewer WHERE rewid='$rew3'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$remail3=$row["email"];
   		$rewname3=$row["rewname"];
       }
	  $recipients = array(
   $remail1 => $rewname1,
   $remail2 => $rewname2,
   $remail3 => $rewname3,
   // ..
);
/*foreach($recipients as $email => $name)
{
   $mailto->AddCC($email, $name);
}*/
	//$mailto = "sini <sini.george.9529@gmail.com> ,icnte <icnte.project@gmail.com>";                //receiver
$mailSub = "Paper Assigned";
$mailMsg = nl2br("Dear Sir/Madam,
			At the outset accept our greetings of the day.
			
			You have been assigned a paper kindly log in into the system and review it in the coming days.
			You can access your Reviewer’s Account by clicking on the Login button available on the Home Page of the
			ICNTE 2021 website whose link is given below.
			http://icnte.fcrit.ac.in/icnte/
			Your Login Details were given in the registration email.
			
			Regards,
			Pranali Choudhari
      ICNTE (Technical Committee Convenor)
      Fr. C. Rodrigues Institute of Technology, Vashi (India)
      Contact: 9833422677
			");
$mailMsg = wordwrap($mailMsg,100);
require '../../PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
$mail = new PHPMailer();
  /*$recipients = array(
   'sini.george.9529@gmail.com' => 'Person One',
   'icnte.project@gmail.com' => 'Person Two',
   // ..
);*/
foreach($recipients as $email => $name)
{
   $mail->AddCC($email, $name);
}
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
		
		
		
        header("location:sendr.php?assign=yes");
    } 
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
                url:'ajaxData1.php',
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
                url:'ajaxData1.php',
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
                url:'ajaxData1.php',
                data:'paper_id='+paperID,
                success:function(html){
                    $('#rev').html(html);
					  $('#rev2').html(html);
					  $('#rev3').html(html);
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
                        <li><a href="sendr.php">Send for review</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

	<body style="font-size:20px">

  <br>
    <br>
    <br>
	
	
	
    <div style="font-size:16px;" class="container">
     <?php if(!empty($_GET['rev'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">All the three reviewers must be different<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   if(!empty($_GET['assign'])){
          echo '<div class="panel panel-success" id="close6">
      <div class="panel-heading" style="font-size:16px">Reviewer Assigned Successfully<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
	
   }
   ?>
        <form class="form" method="post" action="sendr.php" enctype="multipart/form-data">
          
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
                
                </select></div></div></div><br>
 <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select Session:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="session" id="session" class="form-control input-lg">
    <option value="">Select Track first</option>
</select></div></div></div><br>

<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper" id="paper" class="form-control input-lg">
    <option value="">Select session first</option>
</select></div></div></div><br>
<!-- <table style='font-size:16px;' WIDTH='50%' class='table table-striped table-condensed' name="paper" id="paper">
               </table>-->  
 
 <p id="demo"></p>
 
 <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select reviewer:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="rev1" id="rev" class="form-control input-lg">
    <option value="">Select paper first</option>
</select></div></div></div>

<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select Second reviewer:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="rev2" id="rev2" class="form-control input-lg">
    <option value="">Select  Reviewer one first</option>
</select></div></div></div>

<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select Third reviewer:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="rev3" id="rev3" class="form-control input-lg">
    <option value="">Select  Reviewer two first</option>
</select></div></div></div>
	<!--<label for="Description" style="font-size:16px;"class="cols-sm-2 control-label">Reviewer 1:</label>
            <div style="font-size:16px;" class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:16px" class="form-control input-lg" name="rew1" >
                 <?php
				echo '<option value="null">'.'Select Reviewer'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$rew1=$row['rewname'];
						echo '<option value='.$row['rewid'].'>'.$rew1.'</option>';
					
					}
				
					?>
                
                </select></div></div>
				<br>
					<label for="Description" style="font-size:16px;" class="cols-sm-2 control-label">Reviewer 2:</label>
            <div style="font-size:16px;" class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:16px" class="form-control input-lg" name="rew2" >
                 <?php
				echo '<option value="null">'.'Select Reviewer'.'</option>';
					while($row = mysqli_fetch_array($result2))
					{
						$rew2=$row['rewname'];
						echo '<option value='.$row['rewid'].'>'.$rew2.'</option>';
					
					}
				
					?>
					
	</select></div></div><br>
	<label style="font-size:16px;" for="Description" class="cols-sm-2 control-label">Reviewer 3:</label>
            <div style="font-size:16px;" class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:16px" class="form-control input-lg" name="rew3" >
                 <?php
				echo '<option value="null">'.'Select Reviewer'.'</option>';
					while($row = mysqli_fetch_array($result3))
					{
						$rew3=$row['rewname'];
						echo '<option value='.$row['rewid'].'>'.$rew3.'</option>';
					
					}
				
					?>
                
                
                </select></div></div>-->
				<br>
				
	<div class="form-group "><input class="btn btn-info btn-block login" type="submit" name="send" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Send"> 
          <!--data-toggle="modal" data-target="#myModal">-->
    </div>			
				
	
</div></div></div>            
              
	
				
				

 </form>

  </div>
 <?php include("../../footer.php");?>
</body>
</html>

