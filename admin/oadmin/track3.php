<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";  
   
   //create session
   $sql="Select * from tracks";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['update'])){
		 $tid=$_POST['tid'];
   $trackname=$_POST['trackname'];
   $dept=$_POST['dept'];
  		$upd="UPDATE tracks SET tid='$tid',trackname='$trackname',dept='$dept' WHERE tid='$tid'";
		$result1=mysqli_query($db,$upd);
		if($result){header("refresh:1;url='track3.php';");}
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
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="track3.php.php">Update tracks</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     

<br/><br>
<div class="container">	
		<table class="table" >
	
        <tr>
<th>Track ID</th>
<th>Track Name</th>
<th>Department</th>

		</tr>		
          <tbody>		
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr><form action="track3.php" class="form-group" method="post">
					<td><input type="number" name="tid" class="form-control input-sm" value="'.$row['tid'].'"></td>
					<td><input type="text" name="trackname" class="form-control input-sm" value="'.$row['trackname'].'"></td>
					<td><input type="text" name="dept" class="form-control input-sm" value="'.$row['dept'].'"></td>
					<td><input type="submit" value="Update" class="btn btn-info btn-lg" name="update"></td></form></tr>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 </div>
 

 <?php include("../../footer.php");?>
</body>
</html>
