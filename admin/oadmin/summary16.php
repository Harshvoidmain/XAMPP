<?php

//connect to database
require('fpdf/fpdf.php');
require "../../connection.php";
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];

//$sql="SELECT * FROM reviewer";
//$result=mysqli_query($db,$sql);

$sql="SELECT * FROM excellence_awards";
$result1=mysqli_query($db,$sql);
    
class PDF extends FPDF
   {
   // Page header
   function Header()
   {
        // Logo
       $this->Image('../../images/header.jpg',0,0);
        // Line break
       $this->Ln(30);
   }
   
   // Page footer
   function Footer()
   {
       // Position at 1.5 cm from bottom
       $this->SetY(-15);
       // Arial italic 8
       $this->SetFont('Arial','I',8);
       // Page number
       $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   }
   }
	if(isset($_POST['print'])){
		
		
   $pdf = new PDF();
   $pdf->AliasNbPages();
   $pdf->AddPage('L');
   
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(282,10," Author List ",1,1,"C");
   						
   $pdf->SetFont('Arial','',10);
   $pdf->SetFillColor(51,197,255);
   $pdf->SetDrawColor(0,0,0);
   $pdf->Cell(20,10,'First Name',1,0,'',true);
   $pdf->Cell(20,10,'Last Name',1,0,'',true);
   $pdf->Cell(50,10,'Organization',1,0,'',true);
   $pdf->Cell(50,10,'Position',1,0,'',true);
   $pdf->Cell(50,10,'Email',1,0,'',true);
   $pdf->Cell(10,10,'Mobile No',1,0,'',true);	
   $pdf->Cell(20,10,'Category',1,0,'',true);
   $pdf->Cell(20,10,' Sub Category',1,0,'',true);
   $pdf->Cell(20,10,'Transaction ID',1,0,'',true);
//$sql="SELECT * FROM reviewer WHERE dept='$dept'";
//$result1=mysqli_query($db,$sql);

	while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(20,10,$data['fname'],1,0);
		$pdf->Cell(20,10,$data['lname'],1,0);
		$pdf->Cell(50,10,$data['oname'],1,0);
		$pdf->Cell(50,10,$data['position'],1,0);
		$pdf->Cell(50,10,$data['email'],1,0);
		$pdf->Cell(10,10,$data['phone'],1,0);
		$pdf->Cell(20,10,$data['category_id'],1,0);
		$pdf->Cell(20,10,$data['sub_category_id'],1,0);
		$pdf->Cell(20,10,$data['transaction_id'],1,0);
		
	}
	$pdf->Output();
}
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
                        <li><a href="summary14php">Author's Details </a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Reviewer Details </label></h2></center>

		
<div class="container"> 
<br/><br/>
<form class="form-group" method="post" action="summary15.php">
    <center><table class="table" >
	<td style="text-align:center"><input type="submit" name="get" value="Get Reviewer List" class="btn btn-info btn-lg" /></td>
	<td><input type="submit" name="print" value="Generate PDF" class="btn btn-info btn-lg" /></td>
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
<th> First Name</th>
<th> Last Name ID</th>
<th> Organization</th>
<th> Position</th>
<th> Email</th>
<th> Phone No</th>
<th> Category </th>
<th> Sub Category</th>
<th> Transaction ID</th>
</tr>		
<tbody>';	

		while($row=mysqli_fetch_array($result1))
		{
			echo '<tr>
	
					
					<td>'.$row['fname'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['oname'].'</td>
					<td>'.$row['position'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['category_id'].'</td>
					<td>'.$row['sub_category_id'].'</td>
					<td>'.$row['transaction_id'].'</td>
					
					
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

