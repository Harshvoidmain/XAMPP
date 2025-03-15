<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";
//get trackid and and trackname from tracks table 
$result=mysqli_query($db,"SELECT tid, trackname FROM tracks");




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
                        <li><a href="t_session1.php.php">Add Session</a></li>
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
$sid=$_POST['sid'];
$trackname=$_POST['trackname'];
$sname=$_POST['sname'];

//get track id
$trackid=mysqli_query($db,"SELECT tid FROM tracks WHERE trackname='$trackname'");
$row=mysqli_fetch_object($trackid);

//check session to be inserted already exists or not
    $check=mysqli_query($db,"SELECT * FROM sessions Where sname='$sname' AND tid='$row->tid'");
	$checkrows=mysqli_num_rows($check);

//create track
   if($checkrows>0){echo '<center><div class="alert alert-warning alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><strong>Warning!</strong> Session Exists.
</div></center>';}
   else{
   $sql="INSERT INTO sessions(sid, tid, sname) VALUES('$sid', '$row->tid', '$sname')";
   mysqli_query($db,$sql);
   echo '<center><div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
  <strong>Success!</strong> Session added succesfully.
</div></center>';
   }



}

   ?>
<br/><br/>
  <script>
   function validateForm(){
	   var trackname=document.form1.trackname.value;
	   var sname=document.form1.sname.value;
	   if(trackname==""){
		   alert("Select Track");
		   document.form1.trackname.focus();
		   return false;
	   }
	   if(sname==""){
		   alert("Enter Session Name");
		   document.form1.sname.focus();
		   return false;
	   }
   }
   </script>
<br/><br/>
  <div class="container">
 <form name="form1" class="form-group" method="post" action="t_session1.php" onsubmit="return validateForm()">
    <table class="table">
           <input type="hidden" name="sid" class="form-control input-lg" /></td>
           <tr>
                <td>Track Name:</td>
                <td><select name="trackname" class="form-control input-lg">
				<option value="">Select Track</option>
				<?php
					while($row = mysqli_fetch_array($result))
					{
						$trackname=$row['trackname'];
						echo '<option value="'.$trackname.'">'.$trackname.'</option>';
					
					}
				
		
					?>
                </select>
				</td>
           </tr>
           <tr>
                <td>Session Name:</td>
                <td>
				<input type="text" name="sname" class="form-control input-lg" /></td>
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
