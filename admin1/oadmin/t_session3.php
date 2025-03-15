<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";  
   
   //create session
   $sql="Select * from sessions";
   $result=mysqli_query($db,$sql);
   
   //delete session
   if(isset($_POST['update'])){
		 $sid=$_POST['sid'];
   $tid=$_POST['tid'];
   $sname=$_POST['sname'];
  		$upd="UPDATE sessions SET sid='$sid',tid='$tid',sname='$sname' WHERE sid='$sid'";
		$result1=mysqli_query($db,$upd);
		if($result){header("refresh:1;url='t_session3.php';");}
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
                        <li><a href="t_session3.php">Update Sessions</a></li>
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
<th>Session ID</th>
<th>Track Id</th>
<th>Session Name</th>

		</tr>		
          <tbody>		
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr><form action="t_session3.php" class="form-group" method="post">
					<td><input type="number" name="sid" class="form-control input-sm" value="'.$row['sid'].'"></td>
					<td><input type="text" name="tid" class="form-control input-sm" value="'.$row['tid'].'"></td>
					<td><input type="text" name="sname" class="form-control input-sm" value="'.$row['sname'].'"></td>
					<td><input type="submit" value="Update" class="btn btn-info btn-lg" name="update"></td></form></tr>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 </div>
 
 <?php include("../../footer.php");?>
</body>
</html>
