<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
require("../../connection.php");
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database

    $trackid="";
    $daten= date('Y-m-d');
		

    $sql="SELECT * FROM papers ";
                $result1=mysqli_query($db,$sql);
                $sql="SELECT * FROM tracks WHERE dept='$dept'";
	            $result4=mysqli_query($db,$sql);
    

    
    
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
            $("#session-list").html(data);
			
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
                url:'ajaxData2.php',
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
                url:'ajaxData2.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#paper1').html(html);
                     $('#paper2').html(html);
                      $('#paper3').html(html);
                       $('#paper4').html(html);
                        $('#paper5').html(html);
                         $('#paper6').html(html);
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
                        <li><a href="plenarysession.php">Assign Plenary Session</a></li>
                    <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
	<body style="font-size:20px">

  <br>
    <br>
    <br>
    
    <?php
        if(isset($_POST['send']))
        {
		$pid1=$_POST['paper1'];
		$pid2=$_POST['paper2'];
		$pid3=$_POST['paper3'];
		$pid4=$_POST['paper4'];
		$pid5=$_POST['paper5'];
		$pid6=$_POST['paper6'];
		$sid=$_POST['session'];
		$tid=$_POST['trackid'];
		$psid=$_POST['psession'];
	    /*$check=mysqli_query($db,"SELECT * FROM pspapers WHERE");
	    $checkrows=mysqli_num_rows($check);
        if($checkrows>0)
        {echo 'Plenary Session assigned....';}
        else {*/
    	$result=mysqli_query($db,"INSERT INTO pspapers(pid1, pid2, pid3, pid4, pid5, pid6, tid, sid, psid) VALUES ('$pid1','$pid2','$pid3','$pid4','$pid5','$pid6','$tid','$sid','$psid')");
         mysqli_query($db,$sql);
        //}
        }
    
    ?>
    <div class="container">
     
        <form class="form" method="post" action="plenarysession.php" enctype="multipart/form-data">
          
                   <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select Plenary session:</label><div class="cols-sm-10">
	<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="psession" id="psession" class="form-control input-lg">
    <option value="">Select Plenary Session</option>
	
	<?php
				//$sid=$_POST['psession'];
				$ps="SELECT * FROM session WHERE dept='$dept'";
				$rps=mysqli_query($db,$ps);
				/*$check=mysqli_query($db,"SELECT * FROM session Where sid='$sid'");
				$checkrows=mysqli_num_rows($check);
				if($checkrows>7)
				{
					echo '<p>Already 7 papers are assigned<p>';
				}
				echo '<option value="null">'.'Select Paper'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$pid=$row['pid'];
						echo '<option >'.$pid.'</option>';
					
					}*/
					while($row = mysqli_fetch_array($rps))
					{
						$sid=$row['sid'];
						echo '<option value='.$row['sid'].'>'.$sid.'</option>';
					
					}
				
					?>
</select></div></div></div>            
                   
                   <div class="form-group">
        
                 <label for="Description" class="cols-sm-2 control-label">Select Track:</label>
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

<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper1:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper1" id="paper1" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>
<!-- <table style='font-size:16px;' WIDTH='50%' class='table table-striped table-condensed' name="paper" id="paper">
               </table>-->  
               
               
               <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper2:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper2" id="paper2" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>
          
          
              <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper3:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper3" id="paper3" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>
				
				<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper4:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper4" id="paper4" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>
				
				<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper5:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper5" id="paper5" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>


<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper6:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span><select style='font-size:16px;'  name="paper6" id="paper6" class="form-control input-lg">
   <option value="">Select session first</option>
</select></div></div></div><br>
				
				<div class="form-group ">
     <br><input class="btn btn-info btn-block login" type="submit" name="send" value="Assign Plenary Session"  class="submit"/>
        </div> 
				
				

 </form>

  </div>
 <?php include("../../footer.php");?>
</body>
</html>
