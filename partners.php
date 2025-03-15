<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
      #middle {
    line-height: 100px;
}

#middle img {
    vertical-align: middle;
}
  </style>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">SPONSORS</a></li>
                        <li class="active">Techinal & Financial Sponsors</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="padding:50px 0px;text-align:center;padding-bottom: 0;">        <h2>Techinal & Financial Sponsors</h2>

    </div>
</div>
<hr class="style17" style="margin-top: 30px;">
<div class="container" >
    <div class="row">    
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">        
    <div> 
<div style="width: 300px;text-align: center;border: 3px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">   
    <h2 style="margin: 15px;">Technical Co-Sponsors</h2>
    </div>            
    <div style="width:100%">
    <?php include 'connection.php'; 
    $sql="SELECT image FROM companies where type ='Technical'";
    $result=mysqli_query($db,$sql);				
    while($row = mysqli_fetch_array($result))					
    {						
    $name=$row['image']; ?>                                    
    <div class="col-md-4" style="height: 150px;">									
    <div style="border:1px solid #2bbafc;border-radius:20px;padding:10px;height:150px;width:150px;">            
    <div id="middle"><?php echo "<img src='$name' style='width:100%;height:100%;allign:middle' alt='' />";?> </div>  
    </div> </div>          <?php } ?>
    </div>        
    </div></div>
 <div class="col-md-6" style="padding: 20px;">       
 <div>           
 <div style="width: 300px;text-align: center;border: 3px solid #2bbafc;border-radius: 12px;margin: auto;margin-bottom: 40px;">              
 <h2 style="margin: 15px;">Financial Sponsors</h2>       
 </div>        
 <div style="width:100%">		
 <?php include 'connection.php';
 $sql="SELECT image FROM companies where type ='Financial'";
 $result=mysqli_query($db,$sql);			
 while($row = mysqli_fetch_array($result))			
 {					
 $name=$row['image']; ?>	
 <div class="col-md-4" style="height: 150px;">	
 <div style="border:1px solid #2bbafc;border-radius:20px;padding:10px;height:150px;width:150px;"> 
 <div id="middle"><?php echo "<img src='$name' style='width:100%;height:100%' alt='' />";?> </div>      
 </div>           
 </div>            
 <?php } ?>			
 </div>       
 </div>		    
		</div>
        </div>
    </div> 
	
	<?php include 'footer.php'; ?>
	 </body>
</html>