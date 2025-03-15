<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";  
   
   //create session
   $sql="Select * from track_admin";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['update'])){
		$tadept=$_POST['tadept'];
		$taname=$_POST['taname'];
		$taemail=$_POST['taemail'];
		$tausername=$_POST['tausername'];
		$tapwd=$_POST['tapwd'];
  		$upd="UPDATE track_admin SET tadept='$tadept',taname='$taname',taemail='$taemail',tausername='$tausername',tapwd='$tapwd' WHERE taname='$taname'";
		$result1=mysqli_query($db,$upd);
		if($result1){header("refresh:1;url='track_admin3.php';");}
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
                        <li><a href="track_admin3.php">Update track admins</a></li>
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
<th>Track Admin Department</th>
<th>Track Admin Name</th>
<th>Track Admin Email ID</th>
<th>Track Admin Login ID</th>
<th>Track Admin Password</th>
		</tr>		
          <tbody>
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr><tr><form action="track_admin3.php" class="form-group" method="post">
					<td><input type="text" name="tadept" class="form-control input-sm" value="'.$row['tadept'].'"></td>
					<td><input type="text" name="taname" class="form-control input-sm" value="'.$row['taname'].'"></td>
					<td><input type="text" name="taemail" class="form-control input-sm" value="'.$row['taemail'].'"></td>
					<td><input type="text" name="tausername" class="form-control input-sm" value="'.$row['tausername'].'"></td>
					<td><input type="text" name="tapwd" class="form-control input-sm" value="'.$row['tapwd'].'"></td>
					<td><input type="submit" value="Update" class="btn btn-info btn-lg" name="update"></td></form></tr>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 
 </div>

 <?php include("../../footer.php");?>
</body>
</html>
