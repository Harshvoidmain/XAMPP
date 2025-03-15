<?php
session_start();
//connect to database
$db=mysqli_connect("localhost", "root", "", "icnte2");
if(isset($_POST['add']))
{
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
   
   
   //create session
   $sql="INSERT INTO reviewer(rewid, rewname, qualification, affilation, experience, branch, specialization, email, mobile, address) VALUES('$rewid', '$rewname', '$qualification', '&affilation', '$experience', '$branch', '$specialization', '$email', '$mobile', '$address')";
   mysqli_query($db,$sql);
   
   



}



?>



<!DOCTYPE html>
<html lang="en">
     <?php include("header.php");?>
<br/><br/>
  <div class="container"> 
 <form class="form-group" method="post" action="reviwer1.php">
    <table class="table">
           <tr>
                <td> Reviewer ID:</td>
                <td><input type="number" name="rewid" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td> Reviewer Name:</td>
                <td><input type="text" name="rewname" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td>Reviewer Qualification:</td>
                <td><select name="qualification" class="form-control input-lg">
				<option>Doctorate</option>
				<option>M.Tech/M.E</option>
				</select></td>
           </tr>
        <tr>
                <td> Reviewer Affiliation:</td>
                <td><input type="text" name="affilation" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td>Total Experience:</td>
                <td><input type="text" name="experience" class="form-control input-lg" /></td>
           </tr>
           <tr>
                <td>Branch:</td>
                <td>
				<select name="branch" class="form-control input-lg">
				<option>Mechanical Engineering</option>
				<option>Computer Engineering</option>
				<option>Electronics and Telecommunication</option>
				<option>Electrical Engineering</option>
				<option>Information Technolo</option>
				
				</td>
           </tr>
           <tr>
                <td>Area of Specialization:</td>
                <td><input type="text" name="specialization" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Email :</td>
                <td><input type="text" name="email" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Mobile Number:</td>
                <td><input type="text" name="mobile" class="form-control input-lg" /></td>
           </tr>
		   <tr>
                <td>Address:</td>
                <td><input type="text" name="address" class="form-control input-lg" /></td>
           </tr>
            <tr>
                <td> </td>
                <td><input type="submit" name="add" value="ADD"  class="btn btn-info btn-lg"/></td>
           </tr>
           
    </table>
 
 </form>
 </div>
 
<?php include("footer.php");?>
</body>
</html>
