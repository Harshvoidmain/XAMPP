<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <div class="container">
    <h2 style="text-align: center;">Tracks and Sessions</h2>
    <hr class="style17">
</div>
<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
    The deliberations in ICNTE 2023 are grouped into 14 Tracks which correspond to a specific research fields. Further, each Track is comprised of four Sessions and each Session corresponds to a thrust area in the respective research field.
</div>
<div class="container">
<!--    <button class="btn btn-default openall">open all</button> <button href="#" class="btn btn-default closeall">close all</button>
    <hr>-->
    <div class="panel-group" id="accordion">
	<?php
 include 'connection.php'; 
$sql="SELECT * FROM tracks ";
$result=mysqli_query($db,$sql);
$sql="SELECT * FROM collapse ";
$result3=mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result) )
					{
                    $tname=$row['trackname'];
                    $tid=$row['tid'];	
                    $row2=mysqli_fetch_array($result3);
                    $nohash = $row2 ? $row2['nohash'] : '#';
                    $no = $row2 ? $row2['no'] : 'collapse'.$tid;
                    $class = $row2 ? $row2['class'] : 'panel-collapse collapse';
       ?>
        <div class="panel panel-default" style="margin: 10px">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion' href='<?php echo $nohash; ?>'>
                    <?php echo "$tname";?> 
                    <span class="fa fa-arrow-down" style="float:right"></span>
                    </a>
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
                <?php  if($tid==2) {				
                echo '<p style="color: red; text-align: center">
      Acceptance of paper submitted in Thermal Engineering and Fluid control track does not guarantee the publication of manuscript in IEEE Xplore. Paper under the scope of IEEE only will be sent for sent for inclusion in IEEE Xplore.
      </p>';}?>
                    </div>
                </div>
            </div>
                    <?php } ?>
        
               
           

    </div>
</div>

  <?php include 'footer.php'; ?>
</html>