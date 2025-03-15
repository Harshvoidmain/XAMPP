<?php
session_start();
//connect to database
	$db=mysqli_connect("localhost","id3446588_root","icnte123", "id3446588_icnte2");
  
   
   //create session
   $sql="Select * from session";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['delete'])){
		$sid=$_POST['sid'];
		$del="DELETE FROM session WHERE sid='$sid'";
		$result1=mysqli_query($db,$del);
		header("refresh:1;url='session2.php';");
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
                        <li><a href="session2.php.php">Delete Plenary session</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="session2.php">
    <table class="table">
	<tr>
	<td>Enter Plenary Session Id:</td>
	<td><input type="Text" name="sid" class="form-control input-lg"/></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="delete" value="Delete" class="btn btn-info btn-lg" /></td>
	</tr>
	
	
	
	</table>

</div>
	<br/><br/>
	<div class="container">
	
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
			echo '<tr>
					
					<td>'.$row['sid'].'</td>
					<td>'. date('F d, Y', strtotime($row['sdate'])) . '</td>
					<td>'.$row['stime'].'</td>
					<td>'.$row['svennue'].'</td>
					<td>'.$row['schair'].'</td>
					<td>'.$row['scochair'].'</td>';
					
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
