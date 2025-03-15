<?php
session_start();
//connect to database
$db=mysqli_connect("localhost", "root", "", "icnte2");
  
   
   //create session
   $sql="Select * from reviewer";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['delete'])){
		$rewid=$_POST['rewid'];
		$del="DELETE FROM reviewer WHERE rewid='$rewid'";
		$result1=mysqli_query($db,$del);
		header("refresh:1;url='reviwer2.php';");
   }
	/*if($result){
		echo "<script>alert('Session deleted successfully...')</script>";
	}*/
?>



<!DOCTYPE html>
<html lang="en">
     <?php include("header.php");?>


<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="reviwer2.php">
    <table class="table">
	<tr>
	<td>Enter Reviewer Id:</td>
	<td><input type="number" name="rewid" class="form-control input-lg"/></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="delete" value="Delete" class="btn btn-info btn-lg" /></td>
	</tr>
	
</div>
</table>
<br/><br>
<br/><br/>
	<div class="container">
	
	<table class="table">
	
        <tr>
<th>Reviewer ID</th>
<th>Reviewer Name</th>
<th>Reviewer Qualification</th>
<th>Reviewer Affiliation</th>
<th>Total Experience</th>
<th>Branch</th>
<th>Area of Specialization</th>
<th>Mobile Number</th>
<th>Email ID</th>
<th>Address</th>


		</tr>		
          <tbody>		
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					
					<td>'.$row['rewid'].'</td>
					<td>'.$row['rewname'].'</td>
					<td>'.$row['qualification'].'</td>
					<td>'.$row['affilation'].'</td>
					<td>'.$row['experience'].'</td>
					<td>'.$row['branch'].'</td>
					<td>'.$row['specialization'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['mobile'].'</td>
					<td>'.$row['address'].'</td>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 
 </form>
 </div>
 </div>
<?php include("footer.php");?>
</body>
</html>
