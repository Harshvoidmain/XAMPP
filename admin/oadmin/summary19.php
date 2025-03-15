<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require('fpdf/fpdf.php');
require "../../connection.php";
$sql="SELECT paperid,ptitle,auname,auorg,pstatus1,pstatus2,pstatus3,premark1,premark2,premark3,plagcount,opstatus,pcameraready FROM `papers`,author WHERE papers.auid=author.auid order by paperid";
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
                        <li><a href="summary18.php">Paper List with Reviewer Comments</a></li>
                        
                </div>
            </div>
        </div>
    </div>
</div>

	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Paper List</label></h2></center>

		
<div class="container"> 
<br/><br/>
<form class="form-group" method="post" action="summary19.php">
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
<th> Orgnization</th>
<th> OpStatus</th>
<th> CameraReady</th>
<th> Review 1</th>
<th> Remarks 1</th>

<th> Review 2</th>
<th> Remark 2</th>
<th> Review 3</th>
<th> Remark3</th>
<th> Plag Count</th>
</tr>		
    <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo'<tr>
					<td>'.$row['paperid'].'</td>
					<td>'.$row['ptitle'].'</td>
					<td>'.$row['auname'].'</td>
					<td>'.$row['auorg'].'</td>
					<td>'.$row['opstatus'].'</td>
					<td>'.$row['pcameraready'].'</td>
					<td>'.$row['pstatus1'].'</td>
					<td>'.$row['premark1'].'</td>
					<td>'.$row['pstatus2'].'</td>
					<td>'.$row['premark2'].'</td>
					<td>'.$row['pstatus3'].'</td>
					<td>'.$row['premark3'].'</td>
					<td>'.$row['plagcount'].'</td>
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

