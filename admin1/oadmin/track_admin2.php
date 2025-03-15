<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";  
   
   //get Track_admins
   $sql="Select * from track_admin";
   $result=mysqli_query($db,$sql);
   $result2=mysqli_query($db,"SELECT taname FROM track_admin");
   
   //delete track admin
   if(isset($_POST['delete'])){
			$taname=$_POST['taname'];
		$del="DELETE FROM track_admin WHERE taname='$taname'";
		$result1=mysqli_query($db,$del);
		header("refresh:1;url='track_admin2.php';");
   }
	/*if($result){
		echo "<script>alert('Session deleted successfully...')</script>";
	}*/
 
   
  
   
?>

<!DOCTYPE html>
<html lang="en">
    <body>
    <!--<body onload='document.table2.focus()>-->
 <?php include("header.php");?>
 
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="track_admin2.php">Delete track admin</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
<br/><br/>
<?php  
   
    //delete session
   /*if(isset($_POST['delete'])){
		$taname=$_POST['taname'];
		$del="DELETE FROM track_admin WHERE taname='$taname'";
		$result1=mysqli_query($db,$del);
	   echo '<center><div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Success!</strong> Track admin Deleted succesfully.
</div></center>';
		
   }*/
   

?>
  <div class="container"> 
 <form class="form-group" method="post" action="track_admin2.php">
    <table class="table">
	<tr>
	<td>Choose Track Admin Name:</td>
	<td><select name="taname" class="form-control input-lg">
				<?php
					while($row = mysqli_fetch_array($result2))
					{
						//$taname=$row['trackname'];
						echo '<option>'.$row['taname'].'</option>';
					
					}
				
		
					?>
                
                </select>
				</td>
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="delete" value="Delete" class="btn btn-info btn-lg" /></td>
	</tr>
	
	
	
	</table>
</div>	
<br/><br>
<div name="table2" class="container">	
		<table class="table" >
        <tr>
<th>Department</th>
<th>Track Admin Name</th>
<th>Track Admin Email</th>
<th>Track Admin Login Id</th>
<th>Track Admin Password</th>
		</tr>		
          <tbody>
		<?php
	
		while($row = mysqli_fetch_array($result))
		{
			echo '<tr>
					
					<td>'.$row['tadept'].'</td>
					<td>'.$row['taname'].'</td>
					<td>'.$row['taemail'].'</td>
					<td>'.$row['tausername'].'</td>
					<td>'.$row['tapwd'].'</td>';
					
					
		}
		
		?>
		</tbody>
			 
    </table>
 
 </form>
 </div>

 <?php include("../../footer.php");?>
</body>
</html>
