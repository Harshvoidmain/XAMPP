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
                        <li><a href="tadmin.php">Home</a></li>
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
        $query="SELECT * FROM papers WHERE pcameraready='yes' AND trackid IN(SELECT tid FROM tracks WHERE dept='$dept')";
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