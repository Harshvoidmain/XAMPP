<?php
    session_start();
    if(isset($_SESSION['id'])==null)
    {
        header("Location:../index.php"); 
    }
    $track=$_SESSION['id'];
        //connect to database
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
        //insert  reviewer to papers
        // $sql="SELECT ptitle FROM papers where trackid='$track'";
        // $result=mysqli_query($db,$sql);
        // $sql="SELECT rewid,rewname FROM reviewer2";
        // $result1=mysqli_query($db,$sql);
        // $sql="SELECT rewid,rewname FROM reviewer2";
        // $result=mysqli_query($db,$sql);

        $sql="SELECT ptitle FROM papers WHERE trackid='$track' and rew1 != 'NULL' and rew2 != 'NULL'";
        $result=mysqli_query($db,$sql);
        $sql="SELECT rewid,rewname FROM reviewer";
        $result1=mysqli_query($db,$sql);
        $sql="SELECT rewid,rewname FROM reviewer";
        $result3=mysqli_query($db,$sql);

        $sql="SELECT pid,ptitle,pdate,rewd1,rewd2,DateAssigned FROM papers where trackid='$track' and rew1 != 'NULL'";
        $result2=mysqli_query($db,$sql);    	
  ?>


<!DOCTYPE html>
<html lang="en">
      <?php include 'header.php'; ?>

  <body style="font-size:20px">
    <div class="col-md-12" style="background-color: #fff;">
        <p></p>
        <p style="color: #000;"> <a style="color: #000;" href="tadmin.php">Home</a> -> <b> Reassign</b> </p>
    </div>
  <br>
    <br>
    <br>
    <div class="container">
      <div class="well well-lg">
<form action="done2.php" class="form" method="post" enctype="multipart/form-data"> 
  <center>
	<table cellpadding='25' cellspacing='25' border='1' >
       <tr>
              
        <td width="120" align=center><strong>Paper ID</strong></td>
        <td width="250" align=center><strong>Paper Title</strong></td>
        <td width="200" align=center><strong>Date</strong></td>
        <td width="150" align=center><strong>Reviewed1</strong></td>
        <td width="150" align=center><strong>Reviewed2</strong></td>
		<td width="150" align=center><strong>DateAssigned</strong></td>
      </tr>
      <tr>
        <?php
        $result;
          while($row = mysqli_fetch_array($result2))
          {
          echo "<tr>";
          echo "<td  align=center> <strong>".$row['pid']."</strong></td>";
          echo "<td  align=center> <strong>".$row['ptitle']."</strong></td>";
          echo "<td  align=center> <strong>".$row['pdate']."</strong></td>";
          echo "<td align=center> <strong>".$row['rewd1']."</strong></td>";
          echo "<td align=center> <strong>".$row['rewd2']."</strong></td>";
          echo "<td align=center> <strong>".$row['DateAssigned']."</strong></td>";
		  echo "</tr>";
          }
        
    
          ?>
           </tr>
 </table>  </center>
 
        
		   <br>
        	<label for="Description" class="cols-sm-2 control-label">Select Paper:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:20px" class="form-control input-lg" name="ptitle" >
                 <?php
				echo '<option value="null">'.'Select Paper'.'</option>';
					while($row = mysqli_fetch_array($result))
					{
						$ptitle=$row['ptitle'];
						echo '<option >'.$ptitle.'</option>';
					
					}
				
					?>
                
                </select></div></div>
  <br>
		   	<label for="Description" class="cols-sm-2 control-label">Reviewer 1:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:20px" class="form-control input-lg" name="rew1" >
                 <?php
				echo '<option value="null">'.'Select Reviewer'.'</option>';
					while($row = mysqli_fetch_array($result1))
					{
						$rew1=$row['rewname'];
						echo '<option value='.$row['rewid'].'>'.$rew1.'</option>';
					
					}
				
					?>
                
                </select></div></div>
				
				<div class="form-group ">
     <br><input class="btn btn-info btn-block login" type="submit" name="send1" value="Reassign Reviewer"  class="submit"/>
        </div> 
				
				<br>
		<label for="Description" class="cols-sm-2 control-label">Reviewer 2:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:20px" class="form-control input-lg" name="rew2" >
                 <?php
				echo '<option value="null">'.'Select Reviewer'.'</option>';
					while($row = mysqli_fetch_array($result3))
					{
						$rew2=$row['rewname'];
						echo '<option value='.$row['rewid'].'>'.$rew2.'</option>';
					
					}
				
					?>
                     </select></div></div>	   
    
				
				
				<div class="form-group ">
     <br><input class="btn btn-info btn-block login" type="submit" name="send2" value="Reassign Reviewer"  class="submit"/>
        </div> 
     
           
   
 </form>

 </div>
 </div>
 <?php include("../../footer.php");?>
</body>
</html>