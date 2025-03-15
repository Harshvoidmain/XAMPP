<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
 require "../../connection.php";
 require('fpdf/fpdf.php');
 /*class PDF extends FPDF
   {
   // Page header
   function Header()
   {
       // Logo
       //$this->Image('fcritlogo.png',5,10,20);
       // Arial bold 15
       $this->SetFont('Arial','B',15);
       // Move to the right
       $this->Cell(15);
       // Title
        $this->Cell(160,17,'International Conference on Nascent Technologies in Engineering',0,0);
	  
       // Line break
       $this->Ln(20);
	    //$this->Cell(80,10,'Track-wise Summary',0,1);
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
   
   $pdf->SetFont('Times','B',12);
   $pdf->Cell(200,10,"Camera Ready",0,0,"C");
   
   $pdf->SetFont('Arial','',8);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		//$pdf->Cell(25,10,'Paper',1,0,'',true);
		
		$query="SELECT * FROM papers WHERE pcameraready='yes'";
        $result1=mysqli_query($db,$query);
        
        

		
		
		while($data=mysqli_fetch_array($result1)){
		 $pid=$data['pid'];
		$pdf->Ln(10);
		$pdf->Cell(190,10,$data['paperid'],1,0);
		$pdf->Ln(10);
		$pdf->Cell(190,10,$data['ptitle'],1,0,'C');
		$pdf->Ln(10);
		//$pdf->Ln(10);
		$query1="SELECT name FROM coauthors WHERE pid='$pid'";
        $result2=mysqli_query($db,$query1);
		while($data1=mysqli_fetch_array($result2))
		{
		   
		    $pdf->Cell(30,10,$data1['name'].',',0,0,'C');
		    //$pdf->Cell(20,10,', ',0,0);
		}
		$pdf->Ln(10);
        $pdf->Cell(190,100,'<p>'.$data['pabstract'].'</p>',1,0,'C');
        $pdf->Ln(10);
		
		}
	$pdf->Output();
}*/
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
                        <li><a href="summary11.php">Information for Souvenir</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<center><h2><label  class="label" name="cameraready" value="" style="color:black">Camera Ready</label></h2></center>

<div class="container"> 
<br/><br/>
 <form class="form-group" method="post" action="export.php">
     <?php
        $query="SELECT * FROM papers WHERE pcameraready='yes'";
        $result1=mysqli_query($db,$query);
       

     ?>
    <center>
        <?php
        while($data1=mysqli_fetch_array($result1)){
        echo '<table style="font-size:16px" class="table table-bordered table-responsive-xl" >
            <tr><td>'.$data1['paperid'].'</td></tr>
            <tr><td><center><!--<b>Paper Title</b></br>-->'.$data1['ptitle'].'</center></td></tr>
            <tr><td><center>';
            $pid=$data1['pid'];
            $query1="SELECT name FROM coauthors WHERE pid='$pid'";
            $result2=mysqli_query($db,$query1);
            echo '<!--<b>Coauthors</b></br>-->';
            while($data2=mysqli_fetch_array($result2)){echo $data2['name'].',    ';}
            echo '</center></td></tr>
            <tr><td><center><!--<b>Paper Abstract</b></br>-->'.$data1['pabstract'].'</center></td>
        </tr></table><br><br>';
        }
        ?>
       <input style="font-size:16px" type="submit" name="print" value="Generate Word Document" class="btn btn-info btn-lg"/>
    </center>
    
    
</form>
</div>

 <?php include("../../footer.php");?>
</html>