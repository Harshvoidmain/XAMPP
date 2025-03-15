<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
require '../../connection.php';

	//$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
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
  <?php include 'header.php'; ?>
<script>
      function getSession(val)
      {
        $.ajax({
          type: "POST",
          url: "get_status.php",
          data:'tid='+val,
          success: function(data){
            $("#session-list").html(data);
			
          }
        }
              );
      }
	  	
    </script>
  <body style="font-size:20px">
    <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="tadmin.php">Home</a></li>
                        <li><a href="status.php">Status</a></li>
                         <li class="active">Status</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
  <br>
    <br>
    <br>
    <div class="container">

        <form class="form" method="post" enctype="multipart/form-data">
          
                   <div class="form-group">
        
                <label for="Description" class="cols-sm-2 control-label">Select Track:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select id="track" style="font-size:20px" class="form-control input-lg" name="trackid" id="track-list" onChange="getSession(this.value);" >
                 <?php
				echo '<option value="null">'.'Select Track'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$track=$row['trackname'];
						echo '<option value='.$row['tid'].'>'.$track.'</option>';
					
					}
				
					?>
                
                </select></div></div><br>
</div>
    
          <div class="form-group">
           <!-- <label for="Description" class="cols-sm-3 control-label">Session
            </label>-->
            <div class="cols-sm-10">
			<p ></p>
              
            </div>
          </div>
		 
          		   

           
         
            <table name="sessionid" id="session-list">
               </table>       
  
           
				
								<br>
				
				
				
				
				

 </form>

 </div>
 <?php include("../../footer.php");?>
</body>
</html>
