<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php");
}
//connect to database
require('fpdf/fpdf.php');
 require "../../connection.php";
$sql="SELECT * FROM reviewer";
$result=mysqli_query($db,$sql);

$sqlR="SELECT rew1,rew2,rew3 FROM papers";
$resultR=mysqli_query($db,$sqlR);
$reviewers = Array();
while($rowR = mysqli_fetch_array($resultR))
{
    // $rew1=$rowR["rew1"];
    // $rew2=$rowR["rew2"];
    // $rew3 = $rowR["rew3"];

    // array_push($reviewers,$rew1);
    // array_push($reviewers,$rew2);
    // array_push($reviewers,$rew3);
    // $reviewers = Array();
    // echo $rew1." ".$rew2." ".$rew3."<br>";
    foreach($rowR as $key=>$val){
        // echo $rowR[$key]."";
        if($rowR[$key]==null){
            break;
        }
        else{
            // echo "$key=$val";
            array_push($reviewers, $key=$val);
        }
    }
    // echo "<br>";
    // foreach($rew2 as $key=>$val){
    //     array_push($reviewers,$val);
    // }
    // foreach($rew3 as $key=>$val){
    //     array_push($reviewers,$val);
    // }

}

$reviewers_count = array_count_values($reviewers);
// echo $reviewers_count[380]/2;

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
   $pdf->Cell(40,10,'Name',1,0,'',true);
   $pdf->Cell(15,10,'Qual.',1,0,'',true);
   $pdf->Cell(100,10,'Organization',1,0,'',true);
   $pdf->Cell(45,10,'Department',1,0,'',true);
   $pdf->Cell(10,10,'Track ID',1,0,'',true);
   $pdf->Cell(50,10,'Email',1,0,'',true);
   $pdf->Cell(20,10,'Mobile No',1,0,'',true);	
$sql="SELECT * FROM reviewer ";
$result1=mysqli_query($db,$sql);

	while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(10,10,$data['salutation'],1,0);
		$pdf->Cell(40,10,$data['rewname'],1,0);
		$pdf->Cell(15,10,$data['qualification'],1,0);
		$pdf->Cell(100,10,$data['organization'],1,0);
		$pdf->Cell(45,10,$data['department'],1,0);
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
                        <li><a href="summary14php">Reviewer Details </a></li>
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
<form class="form-group" method="post" action="summary14.php">
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

<th> Salutation</th>
<th> Name</th>
<th> Qualification</th>
<th> Organization</th>
<th> Department</th>
<th> Total Papers Assigned</th>
<th> Track ID</th>
<th> Email</th>
<th> Mobile No</th>
		</tr>		
    <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
	
				
					<td>'.$row['salutation'].'</td>
					<td>'.$row['rewname'].'</td>
					<td>'.$row['qualification'].'</td>
					<td>'.$row['organization'].'</td>
                    <td>'.$row['department'].'</td>
                    <td>';
                    if (array_key_exists($row['rewid'],$reviewers_count)){
                        echo $reviewers_count[$row['rewid']];
                    }
                    else{
                        echo 0;
                    }
                    echo '</td>
					<td>'.$row['trackid'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['mobile'].'</td></tr>';
					
					
		}


	echo'</tbody>
			 
    </table>';
?>
					 
   </center>  
 </div>

	
 <?php include("../../footer.php");?>
</body>
</html>

