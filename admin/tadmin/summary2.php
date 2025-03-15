<?php

require('fpdf/fpdf.php');
 require "../../connection.php";
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
    $trackid="";
    if(isset($_POST['send']))
    {
    	$trackid=$_POST['trackid'];

    }          

               // $sql="SELECT * FROM tracks WHERE dept='$dept'";
				//$result1=mysqli_query($db,$sql);
$ses=mysqli_query($db,"SELECT * FROM sessions WHERE tid IN(SELECT tid FROM tracks WHERE dept='$dept')");
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
   
   $sid=$_POST['sname'];
   $trackname=mysqli_query($db,"SELECT trackname FROM tracks WHERE tid=(SELECT tid FROM sessions WHERE sid='$sid')");
   $tname=mysqli_fetch_array($trackname);
   $sesname=mysqli_query($db,"SELECT sname FROM sessions WHERE sid='$sid'");
   $sname=mysqli_fetch_array($sesname);
   
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(275,10,"Track name:	".$tname['trackname']."",1,1,"C");
   $pdf->Cell(275,10,"Session name:		".$sname['sname']."",1,1,"C");
   
   $pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(35,10,'Paper Id',1,0,'',true);
		//$pdf->Cell(7,10,'AID',1,0,'',true);
		$pdf->Cell(210,10,'Paper Title',1,0,'',true);
		$pdf->Cell(30,10,'Status',1,0,'',true);
		//$pdf->Cell(7,10,'TID',1,0,'',true);
		//$pdf->Cell(7,10,'SID',1,0,'',true);
		//$pdf->Cell(25,10,'Paper',1,0,'',true);
		$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE sessionid='$sid' ";
		$result1=mysqli_query($db,$sql);

		while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(35,10,$data['paperid'],1,0);
		//$pdf->Cell(7,10,$data['auid'],1,0);
		$pdf->Cell(210,10,$data['ptitle'],1,0);
		$pdf->Cell(30,10,$data['opstatus'],1,0);
		//$pdf->Cell(7,10,$data['trackid'],1,0);
		//$pdf->Cell(7,10,$data['sessionid'],1,0);
		//$pdf->Cell(25,10,$data['pfilename'],1,0);
		

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
     <?php include("header.php");?>
     
     <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="tadmin.php">Home</a></li>
                        <li><a href="summary2.php">Session-wise Paper Summary</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<center><br/><h2 style="font-size:16px;"><label  class="label" name="rew1done" value="" style="color:black">Papers Submitted Session Wise</label></h2></center>

<div class="container"> 
<br/>
 <form class="form-group" method="post" style="font-size:16px;" action="summary2.php">
    <table class="table">
	<tr>
	<td style="padding-top:20px;">Choose Session:</td>
	<td><select name="sname" style="font-size:16px;" class="form-control input-lg">
				<?php
					while($row = mysqli_fetch_array($ses))
					{
						//$tid=$row['tid'];
						$sname=$row['sname'];
						echo '<option value='.$row['sid'].'>'.$sname.'</option>';
					
					}
				
		
					?>
                
                </select>
				</td>
	</tr>
	<tr>
	<td><input type="submit" name="get" value="Get Papers" class="btn btn-info btn-lg" /></td>
	<td><input type="submit" name="print" value="Generate PDF" class="btn btn-info btn-lg" /></td>
	</tr>
	
	
	
	</table>

</div>
<br/><br/>
	<div class="container">
	<?php
	if(isset($_POST['get'])){
	$sid=$_POST['sname'];

$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE sessionid='$sid' ";
$result=mysqli_query($db,$sql);
//$result1=$result;
   $trackname=mysqli_query($db,"SELECT trackname FROM tracks WHERE tid=(SELECT tid FROM sessions WHERE sid='$sid')");
   $tname=mysqli_fetch_array($trackname);
   $sesname=mysqli_query($db,"SELECT sname FROM sessions WHERE sid='$sid'");
   $sname=mysqli_fetch_array($sesname);

	echo '<h4><b>Track Name:	'.$tname['trackname'].'</b></br></br>Session Name:	'.$sname['sname'].'</b></h4></br><br>';
	echo '<table style="font-size:16px;" class="table table-bordered table-responsive">
	
        <tr>
<th>Paper ID</th>
<th>Paper Title</th>
<th>Paper Status</th>
		</tr>		
          <tbody>';
		
		while($row = mysqli_fetch_array($result))
		{
		
			echo '<tr>
					
					<td>'.$row['paperid'].'</td>
					<td>'.$row['ptitle'].'</td>
					<td>'.$row['opstatus'].'</td></tr>';
					
		}
				
		echo '</tbody></table>';
	}
		?>
 
 </form>
 </div>

<?php include("../../footer.php");?>
</body>
</html>

