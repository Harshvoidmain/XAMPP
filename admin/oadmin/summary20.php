<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require('fpdf/fpdf.php');
 require "../../connection.php";

// if(isset($_POST['get'])){
	
// 	$sql="SELECT paperid,ptitle,auname,auemail,auphone from author,papers where author.auid=papers.auid";
// 	$result=mysqli_query($db,$sql);
// }

$sql="SELECT paperid,ptitle,pdate,auname,auemail,auphone from author,papers where author.auid=papers.auid";
$result=mysqli_query($db,$sql);
    

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
   $pdf->Cell(282,10," Author List with paper info",1,1,"C");
   						
   $pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(30,10,'Paper ID',1,0,'',true);
		$pdf->Cell(30,10,'Paper Title',1,0,'',true);
		$pdf->Cell(22,10,'Name',1,0,'',true);
		$pdf->Cell(25,10,'Email',1,0,'',true);
		$pdf->Cell(25,10,'Phone',1,0,'',true);
	

$sql="SELECT paperid,ptitle,auname,auemail,auphone from author,papers where author.auid=papers.auid";
$result1=mysqli_query($db,$sql);

	while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
        $pdf->Cell(30,10,$data['paperid'],1,0);
        $pdf->Cell(30,10,$data['pdate'],1,0);
        $pdf->Cell(30,10,$data['ptitle'],1,0);
		$pdf->Cell(22,10,$data['auname'],1,0);
		$pdf->Cell(25,10,$data['auemail'],1,0);
		$pdf->Cell(25,10,$data['auphone'],1,0);
	
		

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
<?php include("header.php");?>

 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="summary20.php">Author summary with Paper Info</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>

	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Author Summary- with Paper Info</label></h2></center>

<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="summary20.php">
    <center><table class="table" >
	
	<tr>
	<td style="text-align:center"><input type="submit" name="get" value="Author-Paper Info List" class="btn btn-info btn-lg" /></td>
	
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
<th> Date</th>
<th> Paper title</th>
<th> Author name</th>
<th> Phone </th>
<th> Email </th>

		</tr>		
          <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
	
					
                    <td>'.$row['paperid'].'</td>
                    <td>'.$row['pdate'].'</td>
					<td>'.$row['ptitle'].'</td>
					<td>'.$row['auname'].'</td>
					<td>'.$row['auphone'].'</td>
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

