<?php session_start();
require "../connection.php";
if(isset($_POST['submit']))    
{
$salutation= $_SESSION['salutation'];	
$username =$_SESSION['rname'];
/*$sql="select $prefix from reviewer WHERE rewid='' ";
$sq = mysqli_query($db,$sql);	
$prefix=mysqli_fetch_array($sq);*/
		
require("fpdf/fpdf.php");
 
$pdf=new FPDF('L');
$pdf->AddPage();
$pdf->Image('back.jpg',-10,-5,315,220);
$pdf->Image('agnellogo.png',15,25,40,40);
$pdf->Image('IEEE.png',235,10,50,50);
$pdf->Image('IAS_IEEE_logo.png',235,50,50,50);
$pdf->SetTextColor(100,0,255);
$pdf -> SetY(7);
$pdf->SetFont("times","","25");
$pdf->Cell(0,10,"Agnel Charities'",0,1,"C");
$pdf -> SetY(20);
$pdf->SetTextColor(194,8,8);
$pdf->SetFont("times","B","25");
$pdf->Cell(0,10,"Fr. C. Rodrigues Institute of Technology",0,1,"C");
$pdf->SetFont("times","B","25");
$pdf->Cell(0,10,"Vashi, Navi Mumbai (India)",0,1,"C");
$pdf -> SetY(43);
$pdf->SetTextColor(100,0,255);
$pdf->SetFont("times","","25");
$pdf->Cell(0,10,"IEEE Technically Co-Sponsored",0,1,"C");
$pdf->Cell(0,10,"4th Biennial International Conference on",0,1,"C");
$pdf->Cell(0,10,"Nascent Technologies in Engineering",0,1,"C");
$pdf->Cell(0,10,"ICNTE - 2021",0,1,"C");	
$pdf -> SetY(86);
$pdf->SetTextColor(194,8,8);
$pdf->SetFont("times","U","30");
$pdf->Cell(0,10,"Certificate of Appreciation",0,1,"C");	
/*$rid=$_SESSION['rid'];
$q="SELECT * FROM reviewer WHERE rewid=$rid";
$s=mysqli_query($db,$q);
while($record=$mysqli_fetch_array($s))
{
$pdf->SetFont(7,10,"Arial",1,0,"C");
}*/
//$pdf->SetFont("Arial","","15");
//$pdf->Cell(0,10,"SMITA DASHARATH DANGE",0,1,"C");
$pdf -> SetXY(20,100);
$pdf->SetTextColor(100,0,255);
$pdf->SetFont("times","I","20");
$pdf->Cell(0,10,"This is to certify that $salutation $username",0,1,"");
$pdf -> SetXY(20,110);
$pdf->Cell(0,10,"has reviewed papers of the 4th Biennial International Conference on Nascent Technologies ",0,1,"");
$pdf -> SetX(20);
$pdf->Cell(0,10,"in Engineering organised by Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, ",0,1,"");
$pdf -> SetX(20);
$pdf->Cell(0,10,"(India) in its premises in association with IEEE & IAS on January 15-16, 2021.",0,1,"");
$pdf->Image('miniR.png',22,140,38,30);  
$pdf -> SetXY(20,165);
$pdf->SetTextColor(100,0,255);
$pdf->SetFont("times","I","20");
$pdf->Cell(0,15,"(Dr. Mini Rajeev)");
$pdf -> SetXY(230,165);
$pdf->SetFont("times","I","20");
$pdf->Cell(0,15,"(Dr.S.M.Khot)");
$pdf -> SetXY(20,175);
$pdf->SetTextColor(194,8,8);
$pdf->SetFont("times","I","20");
$pdf->Cell(0,10,"Conference Chair");
$pdf->Image('principal.jpg',230,140,38,30);
$pdf -> SetXY(234,175);
$pdf->Cell(0,10,"  Principal");
//$pdf->Image('bombay.jpg',130,175,38,30);
$pdf->output();


$pdf->output();
}

 // Smita mam--- i added Mini Rajeev mam signature..just check settings

?>