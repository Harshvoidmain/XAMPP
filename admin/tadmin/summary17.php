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

$sql="SELECT * FROM reviewer,papers WHERE dept='$dept' and reviewer.rewid in(rew1,rew2,rew3)";
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
   $pdf->Cell(282,10," Reviewer List ",1,1,"C");
   						
   $pdf->SetFont('Arial','',10);
   $pdf->SetFillColor(51,197,255);
   $pdf->SetDrawColor(0,0,0);
   $pdf->Cell(10,10,'Sal.',1,0,'',true);
   $pdf->Cell(50,10,'Name',1,0,'',true);
   $pdf->Cell(15,10,'Qual.',1,0,'',true);
   $pdf->Cell(110,10,'Organization',1,0,'',true);
   $pdf->Cell(10,10,'Track ID',1,0,'',true);
   $pdf->Cell(50,10,'Email',1,0,'',true);
   $pdf->Cell(20,10,'Mobile No',1,0,'',true);	
$sql="SELECT * FROM reviewer WHERE dept='$dept'";
$result1=mysqli_query($db,$sql);

	while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(10,10,$data['salutation'],1,0);
		$pdf->Cell(50,10,$data['rewname'],1,0);
		$pdf->Cell(15,10,$data['qualification'],1,0);
		$pdf->Cell(110,10,$data['organization'],1,0);
		$pdf->Cell(10,10,$data['trackid'],1,0);
		$pdf->Cell(50,10,$data['email'],1,0);
		$pdf->Cell(20,10,$data['mobile'],1,0);
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
                        <li><a href="summary15.php">Reviewer Assignment Details </a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

<center><h2><label  class="label" name="rew1done" value="" style="color:black">Reviewer Assignment Details </label></h2></center>

		
<div class="container"> 
<br/><br/>
<form class="form-group" method="post" action="summary15.php">
    <center><table class="table" >
	<td style="text-align:center"><input type="submit" name="get" value="Get Reviewer Assignment List" class="btn btn-info btn-lg" /></td>
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
<th> Name</th>
<th> Paper ID</th>
<th> Paper Title</th>
<th> Email</th>
<th> Mobile No</th>
</tr>		
<tbody>';	

		while($row=mysqli_fetch_array($result1))
		{
			echo '<tr>
	     			<td>'.$row['rewname'].'</td>
					<td>'.$row['paperid'].'</td>
					<td>'.$row['ptitle'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['mobile'].'</td>
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

