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

                $sql="SELECT * FROM tracks WHERE dept='$dept'";
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
   $tid=$_POST['trackname'];
   $tname=mysqli_query($db,"SELECT * FROM tracks WHERE tid='$tid'");
   $tdata=mysqli_fetch_array($tname);
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(275,10," Track Name:	".$tdata['trackname']."",1,1,"C");
   
   $sesid=mysqli_query($db,"SELECT * FROM sessions WHERE tid='$tid'");
	while($res=mysqli_fetch_array($sesid)){
		$sid=$res['sid'];
		$pdf->SetFont('Times','B',11);
		$pdf->Cell(275,10," Session Name:	".$res['sname']."",1,1,"L");
		$pdf->SetFont('Arial','',11);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(35,10,'Paper Id',1,0,'',true);
		$pdf->Cell(195,10,'Paper Title',1,0,'',true);
		$pdf->Cell(45,10,'Status',1,0,'',true);
		//$row=mysqli_fetch_object($sid);
		//$sql="SELECT pid, auid, pstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE  ";
		//$result=mysqli_query($db,$sql);
	//$sname=$_POST['sname'];
//$sid=mysqli_query($db,"SELECT sid FROM sessions WHERE sname='$sname'");
//$row=mysqli_fetch_object($sid);
//$sql="SELECT pid, auid, pstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE sessionid='$row->sid' ";
		$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL ";
		$result1=mysqli_query($db,$sql);
		while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(35,10,$data['paperid'],1,0);
		//$pdf->Cell(7,10,$data['auid'],1,0);
		$pdf->Cell(195,10,$data['ptitle'],1,0);
		$pdf->Cell(45,10,'Reviewer Not assigned',1,0);
		//$pdf->Cell(7,10,$data['trackid'],1,0);
		//$pdf->Cell(7,10,$data['sessionid'],1,0);
		//$pdf->Cell(25,10,$data['pfilename'],1,0);
		

	}
	$pdf->Ln(10);
	$pdf->Ln(10);


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
                        <li><a href="summary5.php">Overall review Pending</a></li>
                    <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<center><h2><label  class="label" name="rew1done" value="" style="color:black">Review Pending Papers</label></h2></center>

<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="summary5.php">
    <table class="table table-responsive" style="border:none;font-size:16px;">
	<tr>
	<td style="padding:20px;">Choose Track:</td>
	<td><select name="trackname" class="form-control input-lg">
				<?php
					while($row = mysqli_fetch_array($result1))
					{
						//$tid=$row['tid'];
						$trackname=$row['trackname'];
						echo '<option value='.$row['tid'].'>'.$trackname.'</option>';
					
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
	<div class="container" style="font-size:16px;">
	
	
        <?php
		
		if(isset($_POST['get'])){
		$tid=$_POST['trackname'];
		//$result1=$result;
		$query="SELECT * FROM sessions WHERE tid='$tid'";
		$res=mysqli_query($db,$query);
		while($d1=mysqli_fetch_array($res)){
		$sid=$d1['sid'];
		$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL ";
		$result=mysqli_query($db,$sql);
		echo '<b><h4 style="font-size:16px;">Session Name:	</b>'.$d1['sname'].'</h4>';
		echo '<table class="table table-bordered table-responsive" style="font-size:16px;border:1px solid black"><tr>
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
					<td>Reviewer not Assigned</td></tr>';
					
		}
		echo '</tbody></table></br></br>';
		}
		}		
		?>
		
					 
    
 
 </form>
 </div>

<?php include("../../footer.php");?>
</body>
</html>

