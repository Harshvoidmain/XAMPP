<?php

session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
require '../../connection.php';
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
    $trackid="";

if(isset($_POST['add']))
{
   $sid=$_POST['sid'];
   $sdate=$_POST['sdate'];
   $stime=$_POST['stime'];
   //$time=$_POST['stimetill'];
   $svennue=$_POST['svennue'];
   $schair=$_POST['schair'];
   $scochair=$_POST['scochair'];
   
   
   //create session
   $sql="UPDATE session SET sdate='$sdate',stime='$stime',svennue='$svennue',schair='$schair', scochair ='$scochair' WHERE sid='$sid'";
   mysqli_query($db,$sql);
   
   



}



?>
<!DOCTYPE html>
<html lang="en">
    <?php include("header.php");?>
    
    <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="tadmin.php">Home</a></li>
                        <li><a href="plenarysession1.php">Generate Plenary Session</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
    
	<!--<script>
	function getsession(str){
	if(str=="")
	{
		document.getElementById("session-list").innerHTML = "Select Session";
		return; 
	}
	else
	{
		document.getElementById("session-list").innerHTML = "<?php 
						/*$sql="SELECT * FROM sessions WHERE tid='SELECT tid FROM tracks WHERE trackname='""'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)) {
					    echo "<option>" . $row['sname'] . "</option>";
					}				*/?>";
		return; 
	}
	
	
	
	}
	
	</script>-->
  <br/><br/>
  <div class="container">
 
 <form class="form-group" method="post" action="plenarysession1.php" >
    <table class="table">
           <tr>
                <td>Select Plenary Session ID:</td>
                <td><select name="sid" class="form-control input-lg">
                    <?php
                    $result=mysqli_query($db,"SELECT sid FROM session WHERE dept='$dept'");
                    while($data=mysqli_fetch_array($result)){
                        echo '<option>'.$data['sid'].'</option>';
                    }
                    ?>
                </td>
           </tr>
		   
           <tr>
                <td> Session date:</td>
                <td><select name="sdate" class="form-control input-lg">
                    <option value="4 January 2019">4 January 2019</option>
                    <option value="5 January 2019">5 January 2019</option>
                    </select>
                </td>
           </tr>
           <tr>
                <td>Session  Time:</td>
                <td><select name="stime" class="form-control input-lg">
                    <option value="2pm-4pm">2pm-4pm</option>
                    <option value="4:30pm-6:30pm">4:30pm-6:30pm</option>
                    <option value="9am-11am">9am-11am</option>
                    <option value="11am-1pm">11am-1pm</option>
                    </select></td>
           </tr>
		    <tr>
                <td> Session Venue:</td>
                <td><input type="text" name="svennue" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td> Session Chair:</td>
                <td><input type="text" name="schair" class="form-control input-lg" /></td>
           </tr>
           
           <tr>
                <td> Session CoChair:</td>
                <td><input type="text" name="scochair" class="form-control input-lg" /></td>
           </tr>
            </table>
 
           <center><input type="submit" name="add" value="Generate Plenary Session"  class="btn btn-info btn-lg"/></center>
           
   
 </form>

 </div>


<?php include("../../footer.php");?>
</body>
</html>