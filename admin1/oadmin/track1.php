<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";

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
                        <li><a href="track1.php">Add tracks</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     <?php
     if(isset($_POST['add']))
{
$tid=$_POST['tid'];
$tname=$_POST['tname'];
$dept=$_POST['dept'];
$check=mysqli_query($db,"SELECT * FROM tracks Where trackname='$tname' AND dept='$dept'");
	$checkrows=mysqli_num_rows($check);
	if($checkrows>0){echo '<center><div class="alert alert-warning alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Warning!</strong> Track Exists.
</div></center>';}
	else{
//create track
   $sql="INSERT INTO tracks(tid, trackname, dept) VALUES('$tid', '$tname', '$dept')";
   mysqli_query($db,$sql);
   
echo '<center><div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Success!</strong> Track added succesfully.
</div></center>';


}
}


     
     
     ?>
<br/><br/>
  <div class="container">
 <form class="form-group" method="post" action="track1.php" style="font-size:16px;">
    <table table class="table table-condensed" style="border:0px !important;font-size:16px;">
           <input type="hidden" name="tid" class="form-control input-lg" /></td>
          
           <tr>
                <td>Track Name:</td>
                <td><input type="text" name="tname" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td>Department:</td>
                <td>
				<select name="dept" class="form-control input-lg">
				<option value="cs/it">Computer Department</option>
				<option value="elec">Electrical Department</option>
				<option value="extc">Electronics Department</option>
				<option value="mech">Mechanical Department</option>
				<option value="cs/it">Information Technology Department</option>
				</select>
				</td>
           </tr>
           <tr>
                <td> </td>
                <td><input type="submit" name="add" value="ADD"  class="btn btn-info btn-lg"/></td>
           </tr>
           
    </table>
 
 </form>
 </div>
 
 <?php include("../../footer.php");?>
</body>
</html>
