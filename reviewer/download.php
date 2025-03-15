<?php session_start();
require "../connection.php"; 
   
   // if (isset($_POST['submit'])){
		//	$_SESSION['pid']=$_POST['hidden'];
			//header("location:try_pdf.php");
	//	}
?>


<!DOCTYPE html>
<html lang="en">
<?php include("../header1.php");?>
<?php include("navbar.php");?>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Reviewer</a></li>
                         <li class="active">Download Certificate</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<body>	

<?php
$rewid=$_SESSION['rewid'];
/*if(isset($_POST['update']))
         {
         $statuschange = " UPDATE status SET pstatus='accept', ptitle='$_POST[name]' WHERE pid='$_POST[hidden]'";
         mysqli_query($db,$statuschange);
         }
			if(isset($_POST['delete']))
         {
         $reject = " UPDATE status SET pstatus='rejected' WHERE pid='$_POST[hidden]'";
         mysqli_query($db,$reject);
         }*/
		 
		 	//  $sql= "SELECT * FROM papers";
			/*<?php
					if rew1='$rid' AND rewd1=1 OR rew2='$rid' AND rewd2=1 OR rew3='$rid' AND rewd3=1
					{
					echo "<form action=try_pdf.php method=post>";
					$result=mysqli_query($db,$sql);
					echo"<center><br/><td><p data-placement='top' data-toggle='tooltip' title='download certificate'><button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:16px'><span class='glyphicon glyphicon-download'> Download </span></button></p></td></center>";
					} 
					else {echo "review paper to download certificate" 
					}
					?>*/
		
		 
       $sql= "SELECT * FROM papers WHERE rew1='$rewid' AND rewd1=1 OR rew2='$rewid' AND rewd2=1 OR rew3='$rewid' AND rewd3=1";
		echo "<form action=certificate.php method=post>";
          $result=mysqli_query($db,$sql);
		  
	    if(mysqli_num_rows($result)>0)
		{
			echo"<center><br/><td><p data-placement='top' data-toggle='tooltip' title='download certificate'>
			<button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:16px' >
			<span class='glyphicon glyphicon-download'> Download </span>
			</button></p></td></center>";
			}
		else{echo "<center><br/><td>No papers reviewed</td></center>";}	
			
echo "<br/><div class=container><div class=row>	<div class=span5>";
echo "<table style='font-size:16px; WIDTH='50%' class=table table-striped table-condensed><tr class=active ><th>Paper Title <th></th><td><td><td></td></td></td></tr>";
while($record=mysqli_fetch_array($result)){
	
	echo "<tr>";
	echo "<td>" . $record['ptitle'] . " </td>";

echo"<td><a href='../uploads/". $record['pfilename'] ."' target='_blank'></a></td>";


		 }
echo "</table></div></div>";
         ?></div>
		 <br><br>
	<br><br>
<?php include("../footer.php");?>
</body>
</html>



