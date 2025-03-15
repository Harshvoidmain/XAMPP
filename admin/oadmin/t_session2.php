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
   if(isset($_POST['delete'])){
		$sid=$_POST['sid'];
		$del="DELETE FROM sessions WHERE sid='$sid'";
		$result1=mysqli_query($db,$del);
		header("refresh:1;url='t_session2.php';");
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
                        <li><a href="t_session2.php">Delete Sessions</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

<br/><br/>
  <div class="container">
 <form class="form-group" method="post" action="t_session2.php">
    <table class="table">
	<tr>
	<td>Enter Session Id:</td>
	<td><input type="number" name="sid" class="form-control input-lg"/></td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="delete" value="Delete" class="btn btn-info btn-lg"/></td>
	</tr>
	
</div>
</table>
<br/><br>
<div class="container">	
		<table class="table" >
	
        <tr>
<th>Session ID</th>
<th>Track ID</th>
<th>Session Name</th>

		</tr>		
          <tbody>		
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					
					<td>'.$row['sid'].'</td>
					<td>'.$row['tid'].'</td>
					<td>'.$row['sname'].'</td></tr>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 
 </form>
 </div>
 <?php include("../../footer.php");?>
</body>
</html>
