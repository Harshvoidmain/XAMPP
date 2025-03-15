<?php session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
 $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
    $trackid="";
    if(isset($_POST['send']))
    {
    	$trackid=$_POST['trackid'];

    }          
    $daten= date('Y-m-d');
		

    $sql="SELECT ptitle FROM papers WHERE trackid='$track' and rew1 != '0' and rewd1 != 1 or rewd2 != 1 and DATEDIFF(DateAssigned, '$daten') <= 1";
                $result1=mysqli_query($db,$sql);
                $sql="SELECT rewid,rewname FROM reviewer";
                $result2=mysqli_query($db,$sql);
                $sql="SELECT rewid,rewname FROM reviewer";
                $result3=mysqli_query($db,$sql);	
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
                url:'ajaxData.php',
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
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#paper').html(html);
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
                        <li><a href="status.php">Status</a></li>
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
    <div class="container">
     
        <form class="form" method="post" action="mailp.php" enctype="multipart/form-data">
          
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
</select></div></div></div>
<!--
<select name="paper" id="paper">
    <option value="">Select session first</option>
</select>--><br>
 <table style='font-size:16px;' WIDTH='50%' class='table table-striped table-condensed' name="paper" id="paper">
               </table>  
       <!--   
          <div class="form-group">
            <label for="Description" class="cols-sm-3 control-label">Session
            </label>
            <div class="cols-sm-10">
			<p ></p>
              
            </div>
          </div>
          		   <table cellpadding='25' cellspacing='25' border='1'  >
        		                  
<tr>
                      
                     	<td width="100" align=center><strong>Paper ID</strong></td>
        				<td width="400" align=center><strong>Paper Title</strong></td>
        				<td width="150" align=center><strong>Date</strong></td>
        				<td width="150" align=center><strong>Reviewed1</strong></td>
        				<td width="150" align=center><strong>Reviewed2</strong></td>
                        <td width="150" align=center><strong>DateAssigned</strong></td>
        			</tr>
            </table>
         
            <table name="sessionid" id="session-list">
                <!--     <tr>
                <td> Reviewer 1:</td>
                <td><select  name="rew1" style="margin-bottom: 10px;">
                <?php
                /*echo '<option value="null" style="font-size: 25px;">'.'Select Reviewer'.'</option>';
                    while($row = mysqli_fetch_array($result1))
                    {
                        $rew1=$row['rewname'];
                        echo '<option style="font-size: 25px;">'.$rew1.'</option>';
                    
                    }*/
                
                    ?>
                
                </select>                
                </td>
           </tr> -->
           <!-- <tr>
                <td>Reviewer 2:</td>
                <td><select  name="rew2" style="margin-bottom: 10px;">
                <?php
                /*echo '<option style="font-size: 25px;">'.'Select Reviewer'.'</option>';
                    while($row = mysqli_fetch_array($result2))
                    {
                        $rew2=$row['rewname'];
                        echo '<option style="font-size: 25px;">'.$rew2.'</option>';
                    
                    }*/
                
        
                    ?>
                
                </select>
                </td>
           </tr> --><!--</table>       

            <h2></h2>
           
				
								<br>
				<label for="Description" class="cols-sm-2 control-label">Paper Title:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:20px" class="form-control input-lg" name="ptitle" >
                 <?php
				echo '<option value="null">'.'Select Paper'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$ptitle=$row['ptitle'];
						echo '<option >'.$ptitle.'</option>';
					
					}
				
					?>
                
                </select></div></div> -->
				
				
				
				<div class="form-group ">
     <br><input class="btn btn-info btn-block login" type="submit" name="send" value="Send"  class="submit"/>
        </div> 
				
				

 </form>

  </div>
 <?php include("../../footer.php");?>
</body>
</html>
