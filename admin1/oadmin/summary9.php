<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
require('fpdf/fpdf.php');
//connect to database
 require "../../connection.php";
$sql="SELECT * FROM author";
$result=mysqli_query($db,$sql);
//$result1=mysqli_query($db,"SELECT * FROM author WHERE aucountry!='india'");
//$result2=mysqli_query($db,"SELECT * FROM author WHERE aucountry='india' AND austate!='maharashtra'");
if(isset($_POST['get'])){
	$aucountry=$_POST['country'];
	$austate=$_POST['state'];
	$sql="SELECT * FROM author WHERE aucountry='$aucountry' && austate='$austate' || aucountry='$aucountry'";
	$result=mysqli_query($db,$sql);
}

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
   $pdf->AddPage('P');
   
   $pdf->SetFont('Times','B',11);
   $pdf->Cell(190,10," Author List",1,1,"C");
   						
   $pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(95,10,'Name',1,0,'',true);
		$pdf->Cell(95,10,'Email',1,0,'',true);
		
$aucountry=$_POST['country'];
$austate=$_POST['state'];
$sql="SELECT * FROM author WHERE aucountry='$aucountry' && austate='$austate' || aucountry='$aucountry' ";
$result1=mysqli_query($db,$sql);

	while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(95,10,$data['auname'],1,0);
		$pdf->Cell(95,10,$data['auemail'],1,0);
		

	}



/*foreach($result as $row) {
	$pdf->SetFont('Arial','',12);	
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(90,12,$column,1);
}*/
	$pdf->Output();
}
?>
<!DOCTYPE html>
<html lang="en">
<script src=icjs.js></script>

<style>

body{font-size:16px;}
</style>
<body>
     <?php include("header.php");?>
     
     <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="summary9.php">Author Details[Name,Email]</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Author Summary</label></h2></center>

<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="summary9.php">
    <center><table class="table" >
	<tr>
	<td style="text-align:center">Select Country:</td>
	<td><select name="country" id="country" class="form-control input-lg">
		</select>
	</td>
	</tr>
	
	<tr>
	<td style="text-align:center">Select State:</td>
	<td><select name="state" id="state" class="form-control input-lg">
		</select>
	</td>
	</tr>
	
	<script language="javascript">
            populateCountries("country", "state");
            </script>
	
	
	<tr>
	<td style="text-align:center"><input type="submit" name="get" value="Get Author List" class="btn btn-info btn-lg" /></td>
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
<th> Email</th>
		</tr>		
          <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
	
					
					<td>'.$row['auname'].'</td>
					<td>'.$row['auemail'].'</td></tr>';
					
					
		}
//}

		echo'</tbody>
			 
    </table>';
?>
					 
  </center>   
 </div>

	
 <?php include("../../footer.php");?>
</body>
</html>

