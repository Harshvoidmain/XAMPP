<?php session_start();
require "../../connection.php";
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
    $dept=$_SESSION['id'];
	$track=$_SESSION['id'];	//connect to database
	$pid=['paper'];
	$sid=['session'];
	$tid=['trackid'];
	
    $daten= date('Y-m-d');
		

    $sql="SELECT * FROM papers ";
    $result1=mysqli_query($db,$sql);
    $sql="SELECT * FROM tracks WHERE dept='$dept'";
	$result4=mysqli_query($db,$sql);
      
?>

<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
<script>
    function getSession(val)
    { 
      $.ajax({
        type: "POST",
        url: "get_session.php",
        data:'tid='+val,
        success: function(data){
        $("#session-list").html(data);
        //$("#track-list").html(data);sl
        }
    }
            );
    }
    function track(val)
    {
        $.ajax({
        type: "POST",
        url: "get_track.php",
        data:'tid='+val,
        success: function(data){
        
        $("#track-list").html(data);
        }
    }
            ); 
    }
    function gettrack(val)
    {
        
        var val=$('#track-list').val();
    $.ajax({
        type: "POST",
        url: "get_track.php",
        data:'tid='+val,
        success: function(data){
        $("#track1").html(data);
        }
    }
            );
    }

    function getPaper(sval)
      {
        var tval=$('#track-list').val();
        $.ajax({
          type: "POST",
          url: "get_paper.php",
          data:{tid:tval,sid:sval},
          success: function(data){
             $("#paper-list").html(data);
            
          }
        }
              );
      }

</script>
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="upload_revised.php">Upload Revised Paper</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

	<body style="font-size:20px">

  <br>
    <br>
    <br>
	
	
	
    <div style="font-size:16px;" class="container">
        <form class="form" method="post" action="dbupload_revised.php" enctype="multipart/form-data">
          
                   <div class="form-group">
        
                 <label style="font-size:16px;" for="Description" class="cols-sm-2 control-label">Select Track:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span>
                
                <select  style="font-size:16px" class="form-control input-lg" name="trackid" id="track-list" onChange="getSession(this.value);"  >
                  <option value="">Select Track
                  </option>
                  <?php 
                        $s="select * from tracks";
                        $q=mysqli_query($db,$s);
                        while($row=mysqli_fetch_array($q))
                        { ?>
                                        <option  value="<?php echo $row['tid'];  ?>">
                                            <?php echo $row['trackname']; //$tid=$row['tid'];?>
                                        </option>
                                        <?php 
                        //$_SESSION['tid']=$tid;$_SESSION['tid']=$row['tid'];

                        }

                    ?>
                </select>

                
                
                </div></div></div><br>
 <div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select Session:</label><div class="cols-sm-10">
 <div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true"> </i>
                </span>
                
                <select style="font-size:16px" class="form-control input-lg" name="sessionid" id="session-list" onchange="getPaper(this.value);" >
                  <?php /*
$trid=mysqli_real_escape_string($db,$_POST['trackid']);
//$tid=$_SESSION['tid'];
$s="select sname from sessions WHERE tid='".$_POST["trackid"]."'";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ ?>
                  <option value="<?php echo $row['sname']; ?>">
                    <?php echo $row['sname']; ?>
                  </option>
                  <?php 
}*/
?>
                <!-- </select> -->
    
    <option value="">Select Track first</option>
</select></div></div></div><br>

<div class="form-group"> <label for="Description" class="cols-sm-2 control-label">Select paper:</label><div class="cols-sm-10">
<div class="input-group"><span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true"> </i>
                </span><select style='font-size:16px;'  name="paperid" id="paper-list" class="form-control input-lg">
    <option value="">Select session first</option>
</select></div></div></div><br>

<div class="form-group">
           
            </p>
          <div class="cols-sm-10"><label style="font-size:16px" for="Description" class="cols-sm-2 control-label">File   
            </label>
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
              <input type="file" accept="application/msword,
                                         application/pdf,
                                         application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="file" size="512000"/>
            
            </div>
			
          </div>
          </div> <p style="font-size:16px">( Only .docx, .pdf format allowed for Paper Submission.   )</p><!-- to a max size of .)-->
        <br>
				
	<div class="form-group "><input class="btn btn-info btn-block login" type="submit" name="UPLOAD_REVISED" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Send"> 

    </div>			
				
	
</div></div></div>   


              
	
				
				

 </form>

  </div>
 <?php include("../../footer.php");?>
</body>
</html>