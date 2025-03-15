<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require('fpdf/fpdf.php');
 require "../../connection.php";
$sql="SELECT * FROM confregistration";
$result=mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<script src=icjs.js></script>
<?php include("header.php");?>

 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="summary17.php">Registration Details </a></li>
                        
                </div>
            </div>
        </div>
    </div>
</div>

	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Registration  Details </label></h2></center>

		
<div class="container"> 
<br/><br/>
<form class="form-group" method="post" action="summary17.php">
    <center><table class="table" >
	<!--<td style="text-align:center"><input type="submit" name="get" value="Get Regsitration List" class="btn btn-info btn-lg" /></td>
	<td><input type="submit" name="print" value="Generate PDF" class="btn btn-info btn-lg" /></td>-->
	</tr>
		
	</table>
 
</center>
</div>
<br/><br/>


<div class="container"><center>
	<?php
echo '
		<table class="table" >
	
        <tr>

<th> Sr. No</th>
<th> First Name</th>
<th> Last Name</th>
<th> Address</th>
<th> DoB</th>
<th> Email</th>
<th> Category </th>
<th> Transaction No</th>
		</tr>		
    <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
	
					
					<td>'.$row['SNO'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['dob'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['category'].'</td>
					<td>'.$row['transactionno'].'</td>
				</tr>';
					
					
		}


	echo'</tbody>
			 
    </table>';
?>
					 
   </center>  
 </div>

	
 <?php include("../../footer.php");?>
</body>


</html>

