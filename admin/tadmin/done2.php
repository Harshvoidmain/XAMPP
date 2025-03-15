<?php
 session_start();
    if(isset($_SESSION['id'])==null)
    {
        header("Location:../index.php"); 
    }
    if(isset($_POST['send1'])){  
        $track=$_SESSION['id'];
        $pdate = date('d/m/Y h:i:s');
        $rew1=$_POST['rew1'];
        $ptitle=$_POST['ptitle'];
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");         
        $sql= "UPDATE papers SET rew1='$rew1', trackid = '$track' WHERE ptitle='$ptitle'";        
        mysqli_query($db,$sql);
    }   
		if(isset($_POST['send2'])){  
        $track=$_SESSION['id'];
        $pdate = date('d/m/Y h:i:s');
        $rew2=$_POST['rew2'];
        $ptitle=$_POST['ptitle'];
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");         
        $sql= "UPDATE papers SET rew2='$rew2', trackid = '$track' WHERE ptitle='$ptitle'";        
        mysqli_query($db,$sql);
    }  
?>



<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
 
  <body style="font-size:20px">
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
 <?php include("../../footer.php");?>
</body>
</html>
