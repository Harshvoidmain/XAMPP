<?php
session_start();
//connect to database
	$db=mysqli_connect("localhost","id3446588_root","icnte123", "id3446588_icnte2");
  
   
   //create session
   $sql="Select * from session";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['update'])){
		 $sid=$_POST['sid'];
   $sdate=$_POST['sdate'];
   $stime=$_POST['stime'];
   $svennue=$_POST['svennue'];
   $schair=$_POST['schair'];
   $scochair=$_POST['scochair'];
		$upd="UPDATE session SET sid='$sid',sdate='$sdate',stime='$stime',svennue='$svennue',schair='$schair',scochair='$scochair' WHERE sid='$sid'";
		$result1=mysqli_query($db,$upd);
		if($result){header("refresh:1;url='session3.php';");}
   }
	/*if($result){
		echo "<script>alert('Session deleted successfully...')</script>";
	}*/
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
                        <li><a href="session3.php">Update Plenary Session</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

<br/><br/>
	<div class="">
	
	<table class="table">
	
        <tr>
<th>Plenary Session ID</th>
<th>Session Date</th>
<th>Session Time</th>
<th>Session Venue</th>
<th>Session Chair</th>
<th>Session Cochair</th>

		</tr>		
          <tbody>
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			$sid=$row['sid'];
			echo '<tr><form action="session3.php" class="form-group" method="post">
					<td><input type="text" name="sid" class="form-control input-sm" value="'.$row['sid'].'"></td>
					<td><input type="text" name="sdate" class="form-control input-sm" value="'. date('F d, Y', strtotime($row['sdate'])) . '"></td>
					<td><input type="text" name="stime" class="form-control input-sm" value="'.$row['stime'].'"></td>
					<td><input type="text" name="svennue" class="form-control input-sm" value="'.$row['svennue'].'"></td>
					<td><input type="text" name="schair" class="form-control input-sm" value="'.$row['schair'].'"></td>
					<td><input type="text" name="scochair" class="form-control input-sm" value="'.$row['scochair'].'"></td>
					<td><input type="submit" value="Update" class="btn btn-info btn-lg" name="update"></td></form></tr>';
					
		}
				
		?>
		</tbody>
		<style>
		
		</style>
			 
    </table>
 
 </form>
 </div>


<?php include("footer.php");?>
</body>
</html>
