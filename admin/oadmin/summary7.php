<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
 require "../../connection.php";
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
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="summary7.php">Plenary Session Summary</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
	
<div name="plen">
<center></br></br>
        <form class="form" method="post" action="export.php" enctype="multipart/form-data">

<h2> Plenary Sessions Summary </h2>
<?php 
$res=mysqli_query($db,"SELECT * FROM session");
$res1=mysqli_query($db,"SELECT * FROM pspapers");
while($data=mysqli_fetch_array($res) && $data1=mysqli_fetch_array($res1) )
{
    $tid=$data1['tid'];
    $psid=$data1['psid'];
    $tname=mysqli_fetch_array(mysqli_query($db,"SELECT trackname FROM tracks WHERE tid='$tid'"));
    $ses=mysqli_fetch_array(mysqli_query($db,"SELECT * FROM session WHERE sid='$psid'"));
    $paperid1=$data1['pid1'];
    $ptitle1=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid1'"));
    $paperid2=$data1['pid2'];
    $ptitle2=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid2'"));
    $paperid3=$data1['pid3'];
    $ptitle3=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid3'"));
    $paperid4=$data1['pid4'];
    $ptitle4=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid4'"));
    $paperid5=$data1['pid5'];
    $ptitle5=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid5'"));
    $paperid6=$data1['pid6'];
    $ptitle6=mysqli_fetch_array(mysqli_query($db,"SELECT ptitle FROM papers WHERE paperid='$paperid6'"));





    echo '<center><table name="plenary" class="table table-bordered table-responsive" style="border:1px;width:800px;font-size:16px">
	<tr><td colspan="4"><b>Plenary Session Id:      </b>'.$data1['psid'].'</td></tr>
	<tr><td colspan="4"><b>Tracks Name:</b>'.$tname['trackname'].'</tr>
	<tr><td colspan="2"><b>Session Date-Time:</b>'.$ses['sdate'].'            '.$ses['stime'].'</td><td colspan="2"><b>Venue:</b>'.$ses['svennue'].'</td></tr>
	<tr><td colspan="4"><b>Session Chair:</b>'.$ses['schair'].'</td></tr>
	<tr><td colspan="4"><b>Session Co-Chair:</b>'.$ses['scochair'].'</td></tr>
	<tr><td><b>Paper ID</td><td colspan="2">Paper title</td><td>Page No.</b></td></tr>
	<tr><td>'.$data1['pid1'].'</td><td colspan="2">'.$ptitle1['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid2'].'</td><td colspan="2">'.$ptitle2['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid3'].'</td><td colspan="2">'.$ptitle3['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid4'].'</td><td colspan="2">'.$ptitle4['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid5'].'</td><td colspan="2">'.$ptitle5['ptitle'].'</td><td></b></td></tr>
	<tr><td>'.$data1['pid6'].'</td><td colspan="2">'.$ptitle6['ptitle'].'</td><td></b></td></tr>
	
	</table></center><br><br>';


}
?>

<input type="submit" name="create_word" class="btn btn-info" value="Convert To Word Document"/>
</center>

</form>
</div>
 <?php include("../../footer.php");?>
</body>
</html>