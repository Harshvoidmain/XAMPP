<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";  
   
   //get Track
   $sql="Select * from tracks";
   $result=mysqli_query($db,$sql);
   
   //delete track admin
   if(isset($_POST['delete'])){
			$tid=$_POST['tid'];
		$del="DELETE FROM tracks WHERE tid='$tid'";
		$result1=mysqli_query($db,$del);
		header("refresh:1;url='track2.php';");
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
                        <li><a href="track2.php.php">Delete tracks</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
   <?php
   //delete tracks
   /*if(isset($_POST['delete'])){
		$tid=$_POST['tid'];
		$del="DELETE FROM tracks WHERE tid='$tid'";
		$result1=mysqli_query($db,$del);
		echo '<center><div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Success!</strong> Track Deleted succesfully.
</div></center>';
   }*/
   ?>  

<br/><br/>
  <div class="container">
 <form class="form-group" method="post" action="track2.php">
    <table class="table">
	<tr>
	<td>Enter Track Id:</td>
	<td><input type="number" name="tid" class="form-control input-lg"/></td>
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
<th>Track ID</th>
<th>Track Name</th>
<th>Department</th>

		</tr>		
          <tbody>		
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					
					<td>'.$row['tid'].'</td>
					<td>'.$row['trackname'].'</td>
					<td>'.$row['dept'].'</td>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 
 </form>
 </div>
</div>
 <?php include("../../footer.php");?>
</body>
</html>
