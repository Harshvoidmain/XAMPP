<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require('fpdf/fpdf.php');
 require "../../connection.php";
$sql="SELECT * FROM author";
$result=mysqli_query($db,$sql);
//$result1=mysqli_query($db,"SELECT * FROM author WHERE aucountry!='india'");
//$result2=mysqli_query($db,"SELECT * FROM author WHERE aucountry='india' AND austate!='maharashtra'");
if(isset($_POST['get'])){
	//$aucountry=$_POST['country'];
	//$austate=$_POST['state'];
	
	$aucategory=$_POST['category'];
	if($aucategory=='Other')
            {
                $sql="SELECT * FROM author WHERE aucategory!='Faculty' AND aucategory!='Post Graduate Student' AND aucategory!='Research Scholar' AND aucategory!='Industry Professional' AND aucategory!='Government Official'";
                    $result=mysqli_query($db,$sql);

            }
            else
            {
                $sql="SELECT * FROM author WHERE aucategory='$aucategory'";
                    $result=mysqli_query($db,$sql);

            }

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
   $pdf->AddPage('L');
   $aucategory=$_POST['category'];
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(277,10," Author List[Category]:         ".$aucategory."",1,1,"C");
   						
   $pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(45,10,'Name',1,0,'',true);
		$pdf->Cell(40,10,'Role',1,0,'',true);
		$pdf->Cell(32,10,'Phone',1,0,'',true);
		$pdf->Cell(35,10,'Country',1,0,'',true);
		$pdf->Cell(60,10,'State',1,0,'',true);
	
		$pdf->Cell(65,10,'Email',1,0,'',true);
		

//$austate=$_POST['state'];
            if($aucategory=='Other')
            {
                $sql="SELECT * FROM author WHERE aucategory!='Faculty' AND aucategory!='Post Graduate Student' AND aucategory!='Research Scholar' AND aucategory!='Industry Professional' AND aucategory!='Government Official'";
                    $result1=mysqli_query($db,$sql);

                    while($data=mysqli_fetch_array($result1)){
	            	    $pdf->Ln(10);
	            	    $pdf->Cell(45,10,$data['auname'],1,0);
	              	    $pdf->Cell(40,10,$data['aucategory'],1,0);
	                 	$pdf->Cell(32,10,$data['auphone'],1,0);
	                 	$pdf->Cell(35,10,$data['aucountry'],1,0);
		                $pdf->Cell(60,10,$data['austate'],1,0);
	                     $pdf->Cell(65,10,$data['auemail'],1,0);
		            }
            }

            else
            {
                $sql="SELECT * FROM author WHERE aucategory='$aucategory'";
                    $result1=mysqli_query($db,$sql);

                    while($data=mysqli_fetch_array($result1)){
	            	    $pdf->Ln(10);
	            	    $pdf->Cell(45,10,$data['auname'],1,0);
	              	    $pdf->Cell(40,10,$data['aucategory'],1,0);
	                 	$pdf->Cell(32,10,$data['auphone'],1,0);
	                 	$pdf->Cell(35,10,$data['aucountry'],1,0);
		                $pdf->Cell(60,10,$data['austate'],1,0);
	                     $pdf->Cell(65,10,$data['auemail'],1,0);
		            }
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
                        <li><a href="summary12.php">Author summary[All details-Category]</a></li>
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
 <form class="form-group" method="post" action="summary12.php">
    <center><table class="table" >
	<!--<tr>
	<td style="text-align:center;padding:20px;">Select Country:</td>
	<td><select id="country" name="country" class="form-control input-lg" >
		</select>
	</td>
	</tr>
	
	<tr>
	<td style="text-align:center;padding:20px;">Select State:</td>
	<td><select name="state" id="state" class="form-control input-lg">
		</select>
	</td>
	</tr>-->
	
	<tr>
	<td style="text-align:center;padding:20px;">Select Category:</td>
	<td><select id="category" name="category" class="form-control input-lg" >
		<option value="">Select Category </option>
	    <option value="Faculty">Faculty </option>
		<option value="Post Graduate Student">Post Graduate Student</option>
		<option value="Research Scholar">Research Scholar</option>
		<option value="Industry Professional">Industry Professional</option>
		<option value="Government Official">Government Official </option>
		<option value="Other">Other</option>
		</select>
	</td>
	</tr>
	
	<!--<script language="javascript">
            populateCountries("country", "state");
            </script>-->
	
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
<th> Role</th>
<th> Phone</th>
<th> Country</th>
<th> State</th>
<th> Address</th>
<th> Email</th>
		</tr>		
          <tbody>';		
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
	
					
					<td>'.$row['auname'].'</td>
					<td>'.$row['aucategory'].'</td>
					<td>'.$row['auphone'].'</td>
					<td>'.$row['aucountry'].'</td>
					<td>'.$row['austate'].'</td>
					<td>'.$row['auaddress'].'</td>
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

