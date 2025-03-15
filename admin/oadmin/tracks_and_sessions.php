<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
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
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="tracks_and_sessions.php">Tracks and Sessions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h2 style="text-align: center;">Tracks and Sessions</h2>
    <hr class="style17">
</div>


<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
    The deliberations in ICNTE 2021 are grouped into 13 Tracks which correspond to a specific research fields. Further, each Track is comprised of four Sessions and each Session corresponds to a thrust area in the respective research field.
</div>
<div class="container">
<!--    <button class="btn btn-default openall">open all</button> <button href="#" class="btn btn-default closeall">close all</button>
    <hr>-->
    <div class="panel-group" id="accordion">
	<?php
 include '../../connection.php';
$sql="SELECT * FROM tracks ";
$result=mysqli_query($db,$sql);
$sql="SELECT * FROM collapse ";
$result3=mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result) )
					{
						$tname=$row['trackname'];
						$tid=$row['tid'];	
						$row=mysqli_fetch_array($result3);
                        $nohash=$row['nohash'];	
						$no=$row['no'];	
						$class=$row['class'];
       echo "<a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='$nohash'>"; ?>
            <div class="panel panel-default" style="margin: 10px">
                <div class="panel-heading">
                    <h4 class="panel-title">

                        <?php echo "$tname";?> 
                        <span class="fa fa-arrow-down" style="float:right"></span>
                    </h4>
                </div>
                <?php echo "<div id='$no' class='$class'>"; ?>
                    <div class="panel-body">
                        <ol class="alist">
						<?php
							$sql="SELECT * FROM sessions where tid='$tid' ";
							$result1=mysqli_query($db,$sql);
				      while($row = mysqli_fetch_array($result1))
					{
						$name=$row['sname']; ?>
                            <li><?php echo "$name" ;?></li>
				<?php	}?></ol>
                    </div>
                </div>
            </div>
					</a><?php } ?>
        
               
           

    </div>
</div>




  <?php include 'footer.php'; ?>
</html>