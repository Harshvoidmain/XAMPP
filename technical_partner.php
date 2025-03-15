<!DOCTYPE html>
<html lang="en">
<?php include './icnte/header.php'; ?>
<style>
    .med-img img {
        height:100%;
    }
	@media (min-width:1700px) {
		.med-img img {
			width: 1200px;
			height:450px;
		}
	}
	.morecontent span {
    display: none;
    }
.morelink {
    display: block;
	  color: #74C5FC;
}
</style>
<script type="text/javascript">

</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Partners</a></li>
                        <li class="active">Technical Partners</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="padding:50px 0px;text-align:center;padding-bottom: 0;">
        <h2>Technical Partners</h2>
    </div>
</div>
<hr class="style17" style="margin-top: 30px;">
<div class="container">

<?php
 include 'connection.php'; 
$sql="SELECT image FROM companies where type ='Technical'";
$result=mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result))
					{
						$name=$row['image']; ?>
						<div class="col-md-3" style="padding:10px;">
        <div style="border:1px solid #2bbafc;border-radius:20px;padding:10px;min-height:289px;">
        <div style="width:100%">
           <?php echo "<img src='$name' style='width:100%;height:100%' alt='' />";?>        
		</div>
        </div>
    </div>
											
<?php
}
?>
    </div>
	
	<?php include 'footer.php'; ?>
		<script type="text/javascript" src="/icnte/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/icnte/js/bootstrap.js"></script>
	<script type="text/javascript" src="/icnte/js/owl.carousel.js"></script>
	<script type="text/javascript" src="/icnte/js/scripts.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.carouFredSel-6.2.1-packed.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.carouFredSel-6.2.1.js"></script>
	<script type="text/javascript" src="/icnte/js/pdfobject.js"></script>
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript" src="/icnte/js/jquery.bootstrap.newsbox.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
	 </body>
</html>