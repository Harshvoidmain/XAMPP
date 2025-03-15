<?php

   session_start();
   if(isset($_SESSION['id'])==null)
    {
        header("Location:../index.php"); 
    }
   $db=mysqli_connect("localhost","id3446588_root","icnte123","id3446588_icnte2");    
   $trackid="";
    if (isset($_POST['notify'])){
			header("location:accept.php");
		}
$tracksession=$_SESSION['id'];

if(isset($_POST['send'])){
					$trackid=$_POST['trackid'];

}
   
				//select the papers
				$sql="SELECT * FROM papers where trackid='$tracksession' and pstatus='Reviewed'";
				$result=mysqli_query($db,$sql);
				$sql="SELECT auid FROM author";
				$result1=mysqli_query($db,$sql);

                $sql="SELECT ptitle FROM papers WHERE trackid='$tracksession' and pstatus='Reviewed'";
                $result9=mysqli_query($db,$sql);
                $sql="SELECT pid FROM papers where trackid='$tracksession' and pstatus='Reviewed'";
                $result2=mysqli_query($db,$sql);
                // $sql="SELECT auid FROM papers where trackid='$tracksession' and pstatus='Reviewed'";
                // $result3=mysqli_query($db,$sql);
                // $sql="SELECT rewid,rewname FROM reviewer";
                // $result1=mysqli_query($db,$sql);
                // $sql="SELECT rewid,rewname FROM reviewer";
                // $result2=mysqli_query($db,$sql);

                // $sql="SELECT pid,ptitle,pdate,rewd1,rewd2 FROM papers where trackid='$tracksession'";
                // $result2=mysqli_query($db,$sql);   

?>




<!DOCTYPE html>
<html lang="en">
     <?php include 'header.php'; ?>

  <body style="font-size:20px">
    <div class="col-md-12" style="background-color: #fff;">
        <p></p>
        <p style="color: #000;"> <a style="color: #000;" href="tadmin.php">Home</a> -> <b>Update</b> </p>
    </div>
  <br>
    <br>
    <br>
    <div class="container">
      <div class="well well-lg">
<form class="form" action="maila.php" method="post" enctype="multipart/form-data"> 
    <table align="center">
            <!-- <tr>
                <td>Select Track id:</td>
				<td><select  name="trackid">
				<option>Select Track id</option>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				</select></td>
           </tr>
            <tr>
               <td><input type="submit" name="send" value="Submit"  class="submit"/></td>
           </tr> -->
		 
		   </table>
		   
		     <br><br><br> 
		    <table align="center" border="1">
		   <tr>
                
              
				<td width="100" align=center>Paper ID</td>
				<td width="400" align=center>Title</td>
				<td width="150" align=center>Status</td>
				
				<?php
				while($row1 = mysqli_fetch_array($result1))
				{while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td align=center>".$row['pid']."</td>";
					echo "<td align=center>".$row['ptitle']."</td>";
					echo "<td align=center>".$row['pstatus']."</td>";				
					// echo"<td align=center><p data-placement='top' data-toggle='tooltip' title='notify'>
					// <button class='btn btn-primary btn-md' data-title='notify' name=review style='font-size:19px'>
					// <span class='glyphicon glyphicon-th-list'>Notify</span></button></p></td>";
					// echo "<td>" . "<input type=hidden name=hidden value=" . $row1['auid'] . " </td>";
					echo "</tr>";
				}}
				
		
					?>

           </tr>

    </table>
    <p>&nbsp;</p>
	
	<label for="Description" class="cols-sm-2 control-label">Select Paper:</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true"> </i>
                </span>
                <select  style="font-size:20px" class="form-control input-lg" name="ptitle" >
                 <?php
				echo '<option value="null">'.'Select Paper'.'</option>';
					while($row = mysqli_fetch_array($result9))
					{
						$ptitle=$row['ptitle'];
						echo '<option >'.$ptitle.'</option>';
					
					}
				
					?>
                
                </select></div></div>
    
      
        <div class="form-group ">
     <br><input class="btn btn-info btn-block login" type="submit" name="send" value="Send"  class="submit"/>
        </div>  
           
		   
</form>

 </div>
 </div>
 <?php include("../../footer.php");?>
</body>
</html>