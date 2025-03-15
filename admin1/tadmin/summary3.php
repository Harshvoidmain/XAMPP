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
   
if(isset($_POST['printA'])){
		
		
		$pdf = new PDF();
   $pdf->AliasNbPages();
   $pdf->AddPage('L');
   
   $pdf->SetFont('Times','B',13);
   $pdf->Cell(280,10," Accepted Papers Summary",0,0,"C");
   $pdf->Ln(10);
   	$trk=mysqli_query($db,"SELECT * FROM tracks WHERE dept='$dept'");
		while($track=mysqli_fetch_array($trk))
		{
		    $tid=$track['tid'];
        $pdf->SetFont('Times','B',12);
   $pdf->Cell(280,10,"Track Name:".$track['trackname']."",1,1,"L");
   $pdf->SetFont('Arial','B',11);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(35,10,'Session ID',1,0,'',true);
		$pdf->Cell(45,10,'Paper Id',1,0,'',true);
		//$pdf->Cell(7,10,'AID',1,0,'',true);
		$pdf->Cell(200,10,'Paper Title',1,0,'',true);
		//$pdf->Cell(25,10,'Status',1,0,'',true);
		//$pdf->Cell(7,10,'TID',1,0,'',true);
		
		//$pdf->Cell(25,10,'Paper',1,0,'',true);
		//$result1=mysqli_query($db,"SELECT pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Accepted'");
		$result2=mysqli_query($db,"SELECT paperid, pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Accepted' AND trackid='$tid'");
		
		
		while($data=mysqli_fetch_array($result2)){
		$pdf->Ln(10);
		$pdf->Cell(35,10,$data['sessionid'],1,0);
		$pdf->Cell(45,10,$data['paperid'],1,0);
		//$pdf->Cell(7,10,$data['auid'],1,0);
		$pdf->Cell(200,10,$data['ptitle'],1,0);
		//$pdf->Cell(25,10,$data['opstatus'],1,0);
		//$pdf->Cell(7,10,$data['trackid'],1,0);
	
		//$pdf->Cell(25,10,$data['pfilename'],1,0);
		}
		$pdf->Ln(10);
		$pdf->Ln(10);


		}
	$pdf->Output();
}

if(isset($_POST['printR'])){
		
		
		$pdf = new PDF();
   $pdf->AliasNbPages();
   $pdf->AddPage('L');
   
   $pdf->SetFont('Times','B',13);
   $pdf->Cell(280,10," Rejected Papers Summary",0,0,"C");
   $pdf->Ln(10);
   	$trk=mysqli_query($db,"SELECT * FROM tracks WHERE dept='$dept'");
		while($track=mysqli_fetch_array($trk))
		{
		    $tid=$track['tid'];
        $pdf->SetFont('Times','B',12);
   $pdf->Cell(280,10,"Track Name:".$track['trackname']."",1,1,"L");
   $pdf->SetFont('Arial','B',11);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(35,10,'Session ID',1,0,'',true);
		$pdf->Cell(45,10,'Paper Id',1,0,'',true);
		//$pdf->Cell(7,10,'AID',1,0,'',true);
		$pdf->Cell(200,10,'Paper Title',1,0,'',true);
		//$pdf->Cell(25,10,'Status',1,0,'',true);
		//$pdf->Cell(7,10,'TID',1,0,'',true);
		
		//$pdf->Cell(25,10,'Paper',1,0,'',true);
		//$result1=mysqli_query($db,"SELECT pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Accepted'");
		$result2=mysqli_query($db,"SELECT paperid, pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Rejected' AND trackid='$tid'");
		
		
		while($data=mysqli_fetch_array($result2)){
		$pdf->Ln(10);
		$pdf->Cell(35,10,$data['sessionid'],1,0);
		$pdf->Cell(45,10,$data['paperid'],1,0);
		//$pdf->Cell(7,10,$data['auid'],1,0);
		$pdf->Cell(200,10,$data['ptitle'],1,0);
	//	$pdf->Cell(25,10,$data['opstatus'],1,0);
		//$pdf->Cell(7,10,$data['trackid'],1,0);
	
		//$pdf->Cell(25,10,$data['pfilename'],1,0);
		}
		$pdf->Ln(10);
		$pdf->Ln(10);


		}
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
                        <li><a href="session3.php">Accepted/Rejected Papers</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<form class="form-group" action="summary3.php" method="POST">
<center><h2><label  class="label" name="acceptedpaper" value="" style="color:black">Accepted Papers </label></h2></center>

<?php


	
		
		$trk=mysqli_query($db,"SELECT * FROM tracks WHERE dept='$dept'");
		while($track=mysqli_fetch_array($trk))
		{
		$tname=$track['trackname'];
		echo '<center><h4 style="font-size:16px;"><b>Track Name:</b>    '.$tname.'</h4></center>';
		$tid=$track['tid'];
		$result1=mysqli_query($db,"SELECT paperid, pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Accepted' AND trackid='$tid'");
//$result2=mysqli_query($db,"SELECT pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Rejected'");
		
		
echo '			<div class="container">
	<table class="table table-bordered" style="font-size:16px">
	
        <tr>
<th>Session ID</th>
<th>Paper ID</th>
<th>Paper Title</th>




		</tr>		
          <tbody>';		
		while($row = mysqli_fetch_array($result1))
		{
		
			echo '<tr>
					
					<td>'.$row['sessionid']. '</td>
					<td>'.$row['paperid']. '</td>
					<td>'.$row['ptitle'].'</td>
				</tr>';
					
		}
//}

		echo'</tbody>
			 
    </table></div><br/><br/>';
		}
    
    
?>

<div style="font-size:16px;" align="Center"><input type="submit" name="printA" value="Generate PDF" class="btn btn-info btn-lg" /><br/><br/></div>


<center><h2 ><label  class="label" name="rejectedpaper" value="" style="color:black">Rejected Papers </label></h2></center>

<?php


	
		
		$trk=mysqli_query($db,"SELECT * FROM tracks WHERE dept='$dept'");
		while($track=mysqli_fetch_array($trk))
		{
		$tname=$track['trackname'];
		echo '<center><h4 style="font-size:16px;"><b>Track Name:</b>    '.$tname.'</h4></center>';
		$tid=$track['tid'];
		$result1=mysqli_query($db,"SELECT pid, paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Rejected' AND trackid='$tid'");
//$result2=mysqli_query($db,"SELECT pid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE opstatus='Rejected'");
		
		
echo '			<div class="container">
	<table class="table table-bordered" style="font-size:16px">
	
        <tr>
<th>Session ID</th>
<th>Paper ID</th>
<th>Paper Title</th>
<th>Paper Status</th>



		</tr>		
          <tbody>';		
		while($row = mysqli_fetch_array($result1))
		{
		
			echo '<tr>
					
					<td>'.$row['sessionid']. '</td>
					<td>'.$row['paperid']. '</td>
					<td>'.$row['ptitle'].'</td>
					</tr>';
					
		}
//}

		echo'</tbody>
			 
    </table></div><br/><br/>';
		}
    
    
?>

<div style="font-size:16px;" align="Center"><input type="submit" name="printR" value="Generate PDF" class="btn btn-info btn-lg" /><br/><br/></div>
 </form>
 

<?php include("../../footer.php");?>
</body>
</html>

