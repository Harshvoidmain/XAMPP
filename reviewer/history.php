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
						<li class="active">Review History</li>
                       
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
		 
       $sql= "SELECT * FROM papers WHERE (rew1='$rewid' AND rewd1=1) OR (rew2='$rewid' AND rewd2=1) OR (rew3='$rewid' AND rewd3=1) ";
		
		
	
		
          $result=mysqli_query($db,$sql);
echo "<br/><br/><br/><br/><div class=container><div class=row>	<div class=span5>";
echo "<table style='font-size:16px; WIDTH='50%' class=table table-striped table-condensed><tr class=active ><th>Paper Title <th>Given Remark</th><td><td><td></td></td></td></tr>";
while($record=mysqli_fetch_array($result)){
    $rewStatus="";
    if($record["rew1"]==$rewid){
        $rewStatus=$record['pstatus1'];      
    }else if($record["rew2"]==$rewid){
        $rewStatus=$record['pstatus2'];
    }else if($record["rew3"]==$rewid){
        $rewStatus=$record['pstatus3'];
    }

	echo "<form action=try_pdf.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['ptitle'] . " </td>";
	echo "<td>" . $rewStatus  . " </td>";

echo"<td><a href='../uploads/". $record['pfilename'] ."' target='_blank'></a></td>";
//echo"<td><p data-placement='top' data-toggle='tooltip' title='download certificate'><button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:19px'><span class='glyphicon glyphicon-download'> Download </span></button></p></td>";
	
	//echo"<td><input type="submit" name="print" value="Generate PDF" class="btn btn-info btn-lg" /></td>";
	//echo "<td>" . "<input type=hidden name=hidden value=" . $record['pid'] . " </td>";
//	echo "</tr>";
	//echo "</form>";
	//$rw1=$record['rew1'];
	//$rw2=$record['rew2'];
         
		 }
echo "</table></div></div>";
         ?></div>
		 <br><br>
	<br><br>
<?php include("../footer.php");?>
</body>
</html>



