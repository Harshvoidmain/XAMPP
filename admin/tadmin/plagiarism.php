<?php session_start();
require "../../connection.php";
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
$dept=$_SESSION['id'];
$track=$_SESSION['id'];	
$sql="SELECT * FROM tracks WHERE dept='$dept'";
$result1=mysqli_query($db,$sql);
$trackid="";
  
	if(isset($_POST['submit']))
{
	    
$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
$id=mysqli_real_escape_string($db,$_POST['paperid']);	
$plagcount=mysqli_real_escape_string($db,$_POST['plagcount']); 
$pfilename=basename( $_FILES['file']['name']);


//$pfilename = $paperid."-".$ptitle."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];

echo $file_loc;
$folder="../uploads/";
echo $folder;
move_uploaded_file($file_loc,$folder.$pfilename);

/*$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
 */
    //$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
	//$session=mysqli_real_escape_string($db,$_POST['session']);
	//$trackid=$_POST['trackid'];
	//$plagiarism=mysqli_real_escape_string($db,$_POST['plagiarism']);
	//$pfilename=basename( $_FILES['file']['name']);
	
	if(empty($plagcount)||empty($pfilename))
	{
	echo '<script language="javascript">';
	echo 'alert("Please Fill All Fields!")';
	echo '</script>';
	exit();
	}
	/*// Check if file already exists
	if (file_exists($target_file))
	{
    echo "Sorry, file already exists.";
    $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	}*/
	else{/*
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	$sql= "UPDATE papers SET plagcount='$plagcount' , target_file='$fileToUpload' WHERE paperid='$id'";
	*/
		$sql= "UPDATE papers SET plagcount='$plagcount', target_file='$pfilename'  WHERE paperid='$id'";
		mysqli_query($db,$sql);    
	header("location:tadmin.php");
	}
}
?>


<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  
  <script>

      function getSession(val)

      {

        $.ajax({

          type: "POST",

          url: "get_paper_plagiarism.php",

          data:'tid='+val,

          success: function(data){

            $("#session-list").html(data);

			

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
                        <li><a href="tadmin.php">Home</a></li>
                         <li class="active">Plagiarism Check</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
	
	<div class="container">
	   <form class="form-group" method="post" action="plagiarism.php">  
	 <table class="table table-responsive" style="border:none;font-size:16px;">
	<tr>
	<td style="padding:20px;">Choose Track:</td>
	<td> <select id="track" style="font-size:16px" class="form-control input-lg" name="trackid" id="track"  >
                 <?php
				 $dept=$_SESSION['id'];
				
				$sql="SELECT * FROM tracks WHERE dept='$dept'";
				$result1=mysqli_query($db,$sql);
				echo '<option value="null">'.'Select Track'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$track=$row['trackname'];
						echo '<option value='.$row['tid'].'>'.$track.'</option>';
					
					}
				
					?>
                
                </select>
				</td>
	</tr>
	<tr>
	<td><input type="submit" name="get" value="Get Papers" class="btn btn-info btn-lg" /></td>
	</tr>
	
	
	
	</table></form>
	
	      <?php
         if(isset($_POST['update']))
         {
			 $paperid=$_POST['hidden'];
		$sql="SELECT paperid FROM papers WHERE pid='$paperid'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$paperid=$row["paperid"];
   		
       }
	$pfilename='plag-'.$paperid.'.pdf';

 $file = $pfilename;
 //$file = $pfilename."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];

 $folder="../../uploads/Plagreport/";
 
 move_uploaded_file($file_loc,$folder.$file);
			 /*
			 $pfilename=basename( $_FILES['file']['name']);
//$pfilename = $paperid."-".$ptitle."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
$folder="../../uploads/";
move_uploaded_file($file_loc,$folder.$pfilename);*/
          $statuschange =  "UPDATE papers SET plagcount='$_POST[name]',plagreport='$pfilename'  WHERE pid='$_POST[hidden]'";
         mysqli_query($db,$statuschange);
         }
 if(isset($_POST['get'])){
		$tid=$_POST['trackid'];
//   $sql= "SELECT * FROM papers WHERE ((trackid='$tid') AND ((pstatus1!='Rejected' AND pstatus2!='Rejected') OR (pstatus2!='Rejected' AND pstatus3!='Rejected') OR (pstatus1!='Rejected' AND pstatus3!='Rejected') OR (pstatus1!='Rejected' AND pstatus2!='Rejected' AND pstatus3!='Rejected')) AND (rewd1=1 AND rewd2=1 AND rewd3=1)) AND (plagcount=0) OR (pcameraready='DONE' AND trackid='$tid')";    //AND (plagcount='NULL')
 $sql= "SELECT * FROM papers WHERE ((trackid='$tid') AND ((pstatus1!='Rejected' AND pstatus2!='Rejected') OR (pstatus2!='Rejected' AND pstatus3!='Rejected') OR (pstatus1!='Rejected' AND pstatus3!='Rejected') OR (pstatus1!='Rejected' AND pstatus2!='Rejected' AND pstatus3!='Rejected')) AND ((rewd1=1 AND rewd2=1) OR (rewd2 = 1 AND rewd3=1) OR (rewd1 = 1 AND rewd3 = 1) OR (rewd1=1 AND rewd2=1 AND rewd3=1))) AND (plagcount=0) OR (pcameraready='DONE' AND trackid='$tid')";
          $result=mysqli_query($db,$sql);
          echo "<br/><br/><br/><br/><div class=container><div class=row>	<div class=span5>";
          echo "<table  WIDTH='50%' class=table table-striped table-condensed> <tr class=active><th>Paper ID</th>
<th>Paper Title</th>
<th>Plagiarism Count</th>
<th>Upload Plagiarism File</th>
<th></th></tr>";
          while($record=mysqli_fetch_array($result)){
         	 
         	 echo "<form action=plagiarism.php enctype='multipart/form-data' method=post>";
         	 echo "<tr>";
         	  echo "<td>" . $record['paperid'] . " </td>";
         	 echo "<td>" . $record['ptitle'] . " </td>";
         	 echo "<td>" . "<input type=text name=name value=" . $record['plagcount']. " /></td>";
   echo"  <td>    <input type='file'  name='file' size='512000' value=" . $record['plagreport']."  /> </td>      ";
         	 echo "<td>" . "<input type=hidden name=hidden value=" . $record['pid'] . " </td>";
         	 echo "<td><p data-placement='top' data-toggle='tooltip' title='Upload'><button class='btn btn-info btn-md' data-title='Upload' name=update>Upload</button></p></td>";
         	// echo "<td><p data-placement='top' data-toggle='tooltip' title='reject'><button class='btn btn-danger btn-md' data-title='Reject' name=delete > <span class='glyphicon glyphicon-trash'>Reject</span></button></p></td>";
         	 echo "</tr>";
         	 echo "</form>";
			
          }
          echo "</table></div></div>";
         }?>
        <!--<form class="form" method="post" enctype="multipart/form-data">       
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
</div></form>
<div name="sessionid" id="session-list">
</div>-->
	
</div>

</body>
</html>
