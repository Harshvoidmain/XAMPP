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
   $pdf->Cell(280,10," Track Name:	".$tdata['trackname']."",1,1,"C");
   
   $sesid=mysqli_query($db,"SELECT * FROM sessions WHERE tid='$tid'");
	while($res=mysqli_fetch_array($sesid)){
		$sid=$res['sid'];
		$pdf->SetFont('Times','',12);
		$pdf->Cell(280,10," Session Name:	".$res['sname']."",1,1,"L");
		$pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(51,197,255);
		$pdf->SetDrawColor(0,0,0);
		$pdf->Cell(25,20,'Paper Id',1,0,'',true);
		$pdf->Cell(170,20,'Paper Title',1,0,'',true);
		$pdf->Cell(60,10,'Paper Status',1,0,'C',true);
		$pdf->Cell(25,20,'Overall Status',1,0,'',true);
		$pdf->Cell(0,10,'',0,1);
		$pdf->Cell(195,10,'',0,0);
		$pdf->Cell(20,10,'Review 1',1,0,'',true);
		$pdf->Cell(20,10,'Review 2',1,0,'',true);
		$pdf->Cell(20,10,'Review 3',1,0,'',true);
		//$row=mysqli_fetch_object($sid);
		//$sql="SELECT pid, auid, pstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE  ";
		//$result=mysqli_query($db,$sql);
	//$sname=$_POST['sname'];
//$sid=mysqli_query($db,"SELECT sid FROM sessions WHERE sname='$sname'");
//$row=mysqli_fetch_object($sid);
//$sql="SELECT pid, auid, pstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE sessionid='$row->sid' ";
		$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename, rew1,rew2,rew3,rewd1, rewd2, rewd3 FROM papers WHERE trackid='$tid' AND sessionid='$sid' ";
		$result1=mysqli_query($db,$sql);
		while($data=mysqli_fetch_array($result1)){
		$pdf->Ln(10);
		$pdf->Cell(25,10,$data['paperid'],1,0);
		//$pdf->Cell(7,10,$data['auid'],1,0);
		$pdf->Cell(170,10,$data['ptitle'],1,0);
		if($data['rewd1']==1)
		{
	    $rew1=$data['rew1'];
		$sql1="select rewname from reviewer where rewid='$rew1'";	  
		$result2=mysqli_query($db,$sql1);
		$data1=mysqli_fetch_assoc($result2);
		$rewname=$data1['rewname'];
		$pdf->Cell(20,10,$rewname,1,0);
		    $pdf->Cell(20,10,'Done',1,0);
		}
		elseif($data['rewd1']==0)
		{
		$rew1=$data['rew1'];
		$sql1="select rewname from reviewer where rewid='$rew1'";	  
		$result2=mysqli_query($db,$sql1);
		$data1=mysqli_fetch_assoc($result2);
		$rewname=$data1['rewname'];
		$pdf->Cell(20,10,$rewname,1,0);
          
		}
		else
		{
		    $pdf->Cell(20,10,'--',1,0);
		}
		if($data['rewd2']==1)
		{
		    $pdf->Cell(20,10,'Done',1,0);
		}
		elseif($data['rewd2']==0)
		{
		$rew2=$data['rew2'];
		$sql1="select rewname from reviewer where rewid='$rew2'";	  
		$result2=mysqli_query($db,$sql1);
		$data1=mysqli_fetch_assoc($result2);
		$rewname=$data1['rewname'];
		$pdf->Cell(20,10,$rewname,1,0);
		}
		else
		{
		    $pdf->Cell(20,10,'--',1,0);
		}
		if($data['rewd3']==1)
		{
		    $pdf->Cell(20,10,'Done',1,0);
		}
		elseif($data['rewd3']==0)
		{
		$rew3=$data['rew3'];
		$sql1="select rewname from reviewer where rewid='$rew3'";	  
		$result2=mysqli_query($db,$sql1);
		$data1=mysqli_fetch_assoc($result2);
		$rewname=$data1['rewname'];
		$pdf->Cell(20,10,$rewname,1,0);
		}
		else
		{
		    $pdf->Cell(20,10,'--',1,0);
		}
		$pdf->Cell(25,10,$data['opstatus'],1,0);
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
                        <li><a href="summary4.php">Overall review Summary</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
	 	<center></br><h2><label  class="label" name="rew1done" value="" style="color:black;font-size:16px;">Overall Review Summary</label></h2></center>

<div class="container"> 
<br/>
 <form class="form-group" style="font-size:16px;"  method="post" action="summary4.php">
    <table class="table table-responsive" style="border:none;font-size:16px;">
	<tr>
	<td style="padding-top:20px;">Choose Track:</td>
	<td><select name="trackname" style="font-size:16px;" class="form-control input-lg">
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
		
		$tname=mysqli_fetch_array(mysqli_query($db,"SELECT trackname FROM tracks WHERE tid='$tid'"));
	    echo '<b><center><h4 style="font-size:16px;">Track Name:	</b>'.$tname['trackname'].'</h4></center>';
		
		while($d1=mysqli_fetch_array($res)){
		$sid=$d1['sid'];
	
		echo '<b><h4 style="font-size:16px;">Session Name:	</b>'.$d1['sname'].'</h4>';
		echo '<table class="table table-bordered table-responsive" style="font-size:16px;border:1px solid black"><tr>
				<th>Paper ID</th>
				<th>Paper Title</th>
				<th colspan="3"><table class="table-striped" style="font-size:16px;border:0px solid black;width:100%">
				<tr style=""><td colspan="3">Paper Status</td></tr>
				<tr><td>Review 1</td><td>Review 2</td><td>Review 3</td></tr></table></th>
				<th>Overall Paper Status</th>
				</tr>		
				<tbody>';
				
		$sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename,rew1,rew2,rew3,rewd1, rewd2, rewd3 FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus!='NULL' ";
		$result=mysqli_query($db,$sql);
		while($row=mysqli_fetch_array($result))
		{
			echo '<tr>
					
					<td>'.$row['paperid'].'</td>
					<td>'.$row['ptitle'].'</td>';
					if($row['rewd1']==1)
					{
					 $rew1=$row['rew1'];
		             $sql1="select rewname from reviewer where rewid='$rew1'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname1=$data1['rewname'];
					 echo '<td>Done<br>';echo $rewname1; echo'</td>';
					 }
					elseif($row['rewd1']==0) 
					{
					 $rew1=$row['rew1'];
		             $sql1="select rewname from reviewer where rewid='$rew1'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname1=$data1['rewname'];
					 echo '<td>Pending<br>';echo $rewname1; echo'</td>';
					}
					else {echo '<td>--</td>';}
					if($row['rewd2']==1)
					{
					 $rew2=$row['rew2'];
		             $sql1="select rewname from reviewer where rewid='$rew2'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname2=$data1['rewname'];
					 echo '<td>Done<br>';echo $rewname2; echo'</td>';
					 }
					elseif($row['rewd2']==0) 
					{
					 $rew2=$row['rew2'];
		             $sql1="select rewname from reviewer where rewid='$rew2'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname2=$data1['rewname'];
					 echo '<td>Pending<br>';echo $rewname2; echo'</td>';
						
						
					}
					else {echo '<td>--</td>';}
					if($row['rewd3']==1)
					{
					 $rew3=$row['rew3'];
		             $sql1="select rewname from reviewer where rewid='$rew3'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname3=$data1['rewname'];
					 echo '<td>Done <br>';echo $rewname3; echo'</td>';
					}					elseif($row['rewd3']==0) 
					{
					 $rew3=$row['rew3'];
		             $sql1="select rewname from reviewer where rewid='$rew3'";	  
		             $result2=mysqli_query($db,$sql1);
					 $data1=mysqli_fetch_assoc($result2);
					 $rewname3=$data1['rewname'];
					 echo '<td>Pending<br>';echo $rewname3; echo'</td>';
					}
					else {echo '<td>--</td>';}
					echo '<td>'.$row['opstatus'].'</td></tr>';
					
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

