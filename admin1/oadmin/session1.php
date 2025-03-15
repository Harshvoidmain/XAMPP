<?php
session_start();
//connect to database
	$db=mysqli_connect("localhost","id3446588_root","icnte123", "id3446588_icnte2");
$trackt=mysqli_query($db,'SELECT * FROM tracks');
//$q = intval($_GET['q']);

if(isset($_POST['add']))
{
   $sid=$_POST['sid'];
   $sdate=$_POST['sdate'];
   $stime=$_POST['stime'];
   $time=$_POST['stimetill'];
   $svennue=$_POST['svennue'];
   $schair=$_POST['schair'];
   $scochair=$_POST['scochair'];
   
   
   //create session
   $sql="INSERT INTO session(sid, sdate, stime, stimetill, svennue, schair, scochair) VALUES('$sid', '$sdate', '$stime', '$stimetill', '$svennue', '$schair', '$scochair')";
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
                        <li><a href="overall_home_1.php.php">Home</a></li>
                        <li><a href="session1.php.php">Add Plenary Session</a></li>
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
 
 <form class="form-group" method="post" action="session1.php" >
    <table class="table">
           <tr>
                <td>Plenary Session ID:</td>
                <td><input type="text" name="sid" class="form-control input-lg" /></td>
           </tr>
		   <!--<tr>
			<td>Choose Track:</td>
			<td><select name="trackid" class="form-control input-lg" id="track-list" onChange="getsessions(this.value)">
				<?php
					while($row = mysqli_fetch_array($trackt))
					{
						//$tid=$row['tid'];
						$trackname=$row['trackname'];
						echo '<option value='.$row['tid'].'>'.$trackname.'</option>';
					
					}
				
		
					?>
                
                </select>
				</td>
		</tr>
		<tr>
		<td>Choose Session:</td>
		<td>
		<select style="font-size:20px" class="form-control input-lg" name="sessionid" id="session-list" >
                  <option class="form-control input-lg"  name="sname" value="">Select Session
                  </option>
                  <?php 
						/*$sql="SELECT * FROM sessions WHERE tid='".$trackid."'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)) {
					    echo "<option>" . $row['sname'] . "</option>";
					}				
					
					/*if(isset($_POST['trackname'])){
					$trackname=$_POST('trackname');	
					$ses=mysqli_query($db,"SELECT * FROM sessions WHERE tid='SELECT tid FROM tracks WHERE trackname='$trackname''");
					while($row = mysqli_fetch_array($ses))
					{
						$sname=$row['sname'];
						echo '<option value='.$row['sid'].'>'.$sname.'</option>';
					
					}
					}*/
				  
				  
				  ?>
                </select>
				
				</td></tr>-->
           <tr>
                <td> Session date:</td>
                <td><input type="date" name="sdate" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td>Session  Time[From]:</td>
                <td><input type="time" name="stime" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Session  Time[To]:</td>
                <td><input type="time" name="stime" class="form-control input-lg" /></td>
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
            <tr>
                <td> </td>
                <td><input type="submit" name="add" value="ADD"  class="btn btn-info btn-lg"/></td>
           </tr>
           
    </table>
 
 </form>

 </div>


<?php include("footer.php");?>
</body>
</html>