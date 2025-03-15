<?php
 session_start();
    // if(isset($_SESSION['id'])==null)
    // {
    //     header("Location:../index.php"); 
    // }
    if(isset($_POST['send'])){  
        $track=$_SESSION['id'];        
        $reviewed="Reviewed";
        // $rew1=$_POST['rew1'];
        // $rew2=$_POST['rew2'];
        $ptitle=$_POST['ptitle'];
        $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");                 
        $sql= "SELECT auemail from author where auid=(SELECT auid from papers where ptitle='$ptitle' and rewd1 = '1' and rewd2 = '1')";
        $result9=mysqli_query($db,$sql);
        $result9=mysqli_fetch_array($result9);
        $result9=$result9['auemail'];    

        
    }   
?>



<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
 
  <body style="font-size:20px">
    <div class="col-md-12" style="background-color: #fff;">
        <p></p>
        <p style="color: #000;"> <a style="color: #000;" href="tadmin.php">Home</a> -> <b>Notified</b> </p>
    </div>
<div class="container">

<form class="form" method="post" >

<br><br>
<br>
<br>
    

    <table align="center">
           <tr>
                <td> Notified Successfully</td>
                
           </tr>

    </table>
 
 </form>

 </div>
 <?php include("../../footer.php");?>
</body>
</html>
