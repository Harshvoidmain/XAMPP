<?php session_start();
require "../connection.php";
 /*This page is accessible through the My Papers tab in the Navigation Bar.
 The authors can see all their uploaded papers here along with it's current status.
     @author: sinimol
   */ 
   if(!$_SESSION["auemail"])
  {
  	header("location:login.php?notloggedin=You Are Allowed!");
  }
    if (isset($_POST['upload'])){
			$_SESSION['papid']=$_POST['hidden'];
			header("location:cameraready.php");
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
                        <li><a href="home.php">Home</a></li>
						<li class="active"><a href="paper.php">My Paper</a></li>
                        <!--<li><a href="upload.php">Profile</a></li>
                        <li class="active">Update Password</li>-->
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
   <body>
<?php
// $sid=$d1['sid'];
// $sql="SELECT paperid, auid, opstatus, ptitle, trackid, sessionid, pfilename FROM papers WHERE trackid='$tid' AND sessionid='$sid' ";
// $result=mysqli_query($db,$sql);
// echo '<b><h4 style="font-size:16px;">Session Name:	</b>'.$d1['sname'].'</h4>';
// echo '<table class="table table-bordered table-responsive" style="font-size:16px;border:1px solid black"><tr>
//         <th>Paper ID</th>
//         <th>Paper Title</th>
//         <th>Paper Status</th>
//         <th>Download</th>
//         </tr>		
//         <tbody>';
// while($row = mysqli_fetch_array($result))
// {
//     echo '<tr>
            
//             <td>'.$row['paperid'].'</td>
//             <td>'.$row['ptitle'].'</td>';
//             if($row['opstatus']=='Reviewed'){echo '<td>Decision Pending</td></tr>';}
//             else{echo '<td>'.$row['opstatus'].'</td>
//             <td><a href="../../uploads/Track'.$tid.'/Session'.$sid.'/'.$row['pfilename'].'"><button class="btn btn-info btn-lg" style="color:white;" type="button">Download</button></a></td>	
                
//         </tr>';}
            
// }
// echo '</tbody></table></br></br>';
// }

 if(!empty($_GET['status'])){
    echo '<div class="panel panel-success" id="close1">
        <div class="panel-heading" style="font-size:16px;margin-left:100px;margin-right:100px;">Congratulations! Kindly verify your paper submission by Clicking on the corresponding Preview Button. If you are able to View/Download your Paper, Paper Uploaded Successfully! Else, in case of any discrepancy, kindly Reupload your Research Paper and inform the ICNTE Authority. 
        </div>

</div>';
}else{
    echo '<div class="panel panel-danger" id="close1">
        <div class="panel-heading" style="font-size:16px;margin-left:100px;margin-right:100px;">NOTE: Kindly verify your paper submission by Clicking on the corresponding Preview Button. If you are not able to View/Download your Paper kindly Reupload your Research Paper and inform the ICNTE Authority. 
        </div>

</div>';
}

$uid=$_SESSION['auid'];
         $sql= "SELECT pid,paperid,ptitle,trackid,sessionid,opstatus,pcameraready, pfilename FROM papers WHERE  auid='$uid'";
		 
          $result=mysqli_query($db,$sql);
echo "<br/><br/><br/><br/><div class=container><div class=row>	<div class=span5>";
 /* if(!empty($_GET['camstatus'])){
          echo '<div class="panel panel-success" id="close4">
      <div class="panel-heading" style="font-size:20px">Camera Ready Paper Uploaded Successfully<button type="button" class="close" data-target="#close4" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }*/
 echo "<form action=paper.php method=post>";
echo "<table style='font-size:16px; WIDTH='50%' class=table table-striped table-condensed><tr class=active ><th>Paper ID</th><th>Paper Title</th>
<th> Track</th><th>Session</th><th>Overall Status</th><th>Preview Paper</th></tr>";
while($record=mysqli_fetch_array($result)){
	
	$pcamera=$record["pcameraready"];
	//$stat=$record['opstatus'];
	echo "<form action=paper.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['paperid'] . " </td>";
	echo "<td>" . $record['ptitle'] . " </td>";
$query ="SELECT trackname FROM tracks WHERE tid=$record[trackid]";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo "<td>" . $row['trackname'] . " </td>";
}
$query ="SELECT sname FROM sessions WHERE sid=$record[sessionid]";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo"<td>".$row['sname']."</td>";
}
$opstat=$record['opstatus'];
$tid = $record['trackid'];
$sid = $record['sessionid'];
$pfilename = $record['pfilename'];
if($opstat== "Not Assigned")
{
echo "<td> Paper Received</td>";
}
else if ($opstat=='Under Review' )
{
echo "<td> Under Review</td>";
}	
else if( $opstat=='Reviewed')
{
	echo "<td> Under Review</td>";
}
else
{
	echo "<td>" . $opstat . " </td>";
}
echo '<td><a href="../uploads/Track'.$tid.'/Session'.$sid.'/'.$pfilename.'"><button class="btn btn-info btn-lg" style="color:white;" type="button">Preview</button></a></td>';
if($pcamera=="YES")
{

	 echo "<td><button class='btn btn-info btn-xs  b2' data-title='Upload Camera Ready Paper' name=upload style='font-size:16px'>Upload Camera <br>Ready Paper</button></td>";
      
}
else if($pcamera=="DONE")
{
     echo "<td>Uploaded Camera<br>Ready Paper</td>";
}
else
{
    echo "<td> </td>";
}
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['pid'] . " </td>";
    echo "</tr>";
	echo "</form>";
          }
echo "</table></form></div></div>";
         ?></div>
	  
  <?php include("../footer.php");?>
   </body>
</html>