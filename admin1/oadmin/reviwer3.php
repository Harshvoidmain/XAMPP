<?php
session_start();
//connect to database
$db=mysqli_connect("localhost", "root", "", "icnte2");
  
   
   //create session
   $sql="Select * from reviewer";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['update'])){
		$rewid=$_POST['rewid'];
		$rewname=$_POST['rewname'];
		$qualification=$_POST['qualification'];
		$affilation=$_POST['affilation'];
		$experience=$_POST['experience'];
		$branch=$_POST['branch'];
		$specialization=$_POST['specialization'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$address=$_POST['address'];
  		$upd="UPDATE reviewer SET rewid='$rewid',rewname='$rewname' qualification='$qualification' WHERE rewid='$rewid' ";
		$result1=mysqli_query($db,$upd);
		if($result){header("refresh:1;url='reviwer3.php';");}
   }
	/*if($result){
		echo "<script>alert('Session deleted successfully...')</script>";
	}*/
?>
<!DOCTYPE html>
<html lang="en">
     <?php include("header.php");?>
<br/><br>
<div class="">
	
	<table class="">
	
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
			echo '<tr><form action="reviwer3.php" class="form-group" method="post">
					<td><input type="number" name="rewid" class="form-control input-sm" value="'.$row['rewid'].'"></td>
					<td><input type="text" name="rewname" class="form-control input-sm" value="'.$row['rewname'].'"></td>
					<td><input type="text" name="qualification" class="form-control input-sm" value="'.$row['qualification'].'"></td>
					<td><input type="text" name="affilation" class="form-control input-sm" value="'.$row['affilation'].'"></td>
					<td><input type="number" name="experience" class="form-control input-sm" value="'.$row['experience'].'"></td>
					<td><input type="text" name="branch" class="form-control input-sm" value="'.$row['branch'].'"></td>
					<td><input type="text" name="specialization" class="form-control input-sm" value="'.$row['specialization'].'"></td>
					<td><input type="text" name="email" class="form-control input-sm" value="'.$row['email'].'"></td>
					<td><input type="number" name="mobile" class="form-control input-sm" value="'.$row['mobile'].'"></td>
					<td><input type="text" name="address" class="form-control input-sm" value="'.$row['address'].'"></td>
					<td><input type="submit" value="Update" class="btn btn-info btn-lg" name="update"></td></form></tr>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 </div>

<?php include("footer.php");?>
</body>
</html>
