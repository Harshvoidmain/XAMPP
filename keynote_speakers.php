<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    th,td{
        padding: 10px;

    }
    .nav-tabs > li > a:hover {
        border-color: #57bc90 #57bc90 #57bc90;
    }
</style>

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">People</a></li>
                        <li class="active">Keynote Speakers</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2 style="text-align: center;">Keynote Speakers</h2>
    <hr class="style17">
</div>

<!--<div class="container">
    <h2 style="text-align: center;">More Information Coming Up Soon!</h2>
</div> -->
<!--<div class="container">
    <div class="row" style="padding:50px 0px;text-align:center;padding-bottom: 0;">        <h2>Dr.Tomy Sebastian</h2>
    </div>-->
</div>
<hr class="style17" style="margin-top: 10px;">
<div class="container" >
    <div class="center" style="padding-left: 170px;align:center;">        
        <div>
            <?php echo "<embed src='/images/messages/Keynote Speaker1.pdf' width='800px' height='1000px' align='center' />"; ?>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        </div>  
    </div> 
</div>

<hr class="style17" style="margin-top: 10px;">

<div class="container-fluid"> 
 
	<div class="col-md-10 col-md-offset-1">
			<div style="margin-bottom:15px;">
	<table class="table table-striped table-responsive table-condensed" >   
		<?php
		include 'connection.php'; 
		$sql="SELECT * FROM keynotes";
		$result=mysqli_query($db,$sql);
				while($row = mysqli_fetch_array($result))
					{
						$name=$row['name']; 
						$designation=$row['designation'];
						$description=$row['description'];?>
											

        <tr>
      <td class="col-md-2"><?php echo "$name";?></td>
      <td class="col-md-6"><?php echo "$designation";?></td>
      <td class="col-md-4"><?php echo "$description";?></td>
    </tr>    
		<?php
		}
		?>	
</table>

</div>
</div>
</div>	
 	   <?php include 'footer.php'; ?> 
</html>