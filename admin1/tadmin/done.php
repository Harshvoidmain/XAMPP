<?php
 session_start();
    if(isset($_SESSION['id'])==null)
    {
        header("Location:../index.php"); 
    }
    if(isset($_POST['send'])){  
        $track=$_SESSION['id'];
        $pdate = date('d/m/Y h:i:s');
        $rew1=$_POST['rew1'];
        $rew2=$_POST['rew2'];
        $ptitle=$_POST['ptitle'];
        $pdate = date('Y-m-d H:i:s');
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
        // $sql="insert into papers(auid, pstatus, ptitle, trackid, pdate, pcameraready, pfilename, rew1, rew2 ) values('2', 'Reviewed', '$ptitle', '$track', CURRENT_TIMESTAMP, '-NA-', 'hello world', '$rew1', '$rew2')";      
        $sql= "UPDATE papers SET rew1='$rew1', pstatus='Sent', rew2='$rew2', trackid = '$track', DateAssigned = '$pdate' WHERE ptitle='$ptitle'";        
        mysqli_query($db,$sql);
            // header("Location:../index.php"); 
        mysqli_query($db,$sql);
    }   
?>



<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
 
  <body style="font-size:20px">
    <div class="col-md-12" style="background-color: #fff;">
        <p></p>
        <p style="color: #000;"> <a style="color: #000;" href="tadmin.php">Home</a> -> <b>Send For Review</b> </p>
    </div>
<div class="container">

<form class="form" method="post" >

<br><br>
<br>
<br>


    <table align="center">
           <tr>
                <td> Successfully Assigned</td>
                
           </tr>

    </table>
 
 </form>

 </div>
 <?php include("../../foot.php");?>
</body>
</html>
