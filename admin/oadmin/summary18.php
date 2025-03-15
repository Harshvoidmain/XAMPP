<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require('fpdf/fpdf.php');
require "../../connection.php";
$sql="SELECT paperid,ptitle,auname,aucategory,auemail,auphone,austate FROM `papers`,author WHERE opstatus='Accepted' and papers.auid=author.auid order by paperid";
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
                        <li><a href="summary18.php">Accepted Paper List </a></li>
                        
                </div>
            </div>
        </div>
    </div>
</div>

	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Accepted Paper</label></h2></center>

		
<div class="container"> 
<br/><br/>
<form class="form-group" method="post" action="summary17.php">
    <center><table class="table" >
	<!--<td style="text-align:center"><input type="submit" name="get" value="Accepted Paper List" class="btn btn-info btn-lg" /></td>
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

<th> Paper ID</th>
<th> Paper Title</th>
<th> Author Name</th>
<th> Category</th>
<th> Email</th>
<th> Phone No</th>
<th> State</th>
</tr>		
    <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo'<tr>
					<td>'.$row['paperid'].'</td>
					<td>'.$row['ptitle'].'</td>
					<td>'.$row['auname'].'</td>
					<td>'.$row['aucategory'].'</td>
					<td>'.$row['auemail'].'</td>
					<td>'.$row['auphone'].'</td>
					<td>'.$row['austate'].'</td>
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

