<?php session_start();
require "../connection.php";  
   
    if (isset($_POST['review'])){
			$_SESSION['pid']=$_POST['hidden'];
			header("location:remark.php");
		}
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
                        <li class="active">Waiting for review</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<body>	

<?php
$rewid=$_SESSION['rewid'];
if(isset($_POST['update']))
         {
         $statuschange = " UPDATE status SET pstatus='accept', ptitle='$_POST[name]' WHERE pid='$_POST[hidden]'";
         mysqli_query($db,$statuschange);
         }
			if(isset($_POST['delete']))
         {
         $reject = " UPDATE status SET pstatus='rejected' WHERE pid='$_POST[hidden]'";
         mysqli_query($db,$reject);
         }
		 
       $sql= "SELECT * FROM papers WHERE rew1='$rewid' AND rewd1=0 OR rew2='$rewid' AND rewd2=0 OR rew3='$rewid' AND rewd3=0";
		//  $sql= "SELECT * FROM papers";
		
        $result=mysqli_query($db,$sql);
echo "<br/><br/><br/><br/><div class=container><div class=row>	<div class=span5>";
echo "<table style='font-size:16px; WIDTH='50%' class=table table-striped table-condensed><tr class=active ><th>Paper Title</th><td>
<th><th>Action</td></th></th><td><td></td></td></tr>";
while($record=mysqli_fetch_array($result)){
	
	echo "<form action=waiting.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['ptitle'] . " </td>";
	//echo "<td>" . $record['pstatus'] . " </td>";

//echo"<td><a href='../uploads/". $record['pfilename'] ."' target='_blank'><button class='btn btn-info btn-md' data-title=' review' name=review style='font-size:19px'><span class='glyphicon glyphicon-download'> Download</span></button></p></td>";
//echo"<td><a href='../uploads/Track".$record['trackid']."/Session".$record['sessionid']."/". $record['pfilename'] ."' target='_blank'><span class='glyphicon glyphicon-download-alt' style='font-size:20px;color:#39B3D7'></span></button></a></td>";

echo"<td><td><a href='../uploads/Track".$record['trackid']."/Session".$record['sessionid']."/".$record['pfilename']."' target='_blank'><button type='button' class='btn btn-info btn-md' data-title='download' style='font-size:16px'><span class='glyphicon glyphicon-download'> Download</span></button></a></td></td>";
echo"<td></td><td><p data-placement='top' data-toggle='tooltip' title='review'><button class='btn btn-info btn-md' data-title=' review' name=review style='font-size:16px'><span class='glyphicon glyphicon-th-list'> Review</span></button></p></td>";



	echo "<td>" . "<input type=hidden name=hidden value=" . $record['pid'] . " </td>";
	echo "</tr>";
	echo "</form>";
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



