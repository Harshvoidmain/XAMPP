<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
if(isset($_POST['add']))
{
   $tid=$_POST['tid'];
   $taid=$_POST['taid'];
   $tname=$_POST['tname'];
   $dept=$_POST['tapwd'];
  
}



?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>

  <body style="font-size:20px">
    <div class="col-md-12" style="background-color: #fff;">
        <p></p>
        <p style="color: #000;"> <a style="color: #000;" href="tadmin.php"><b> Home</b></a> -> Updated </p>
    </div>
  <br>
    <br>
    <br>
    <div class="container">

<form class="form" method="post" >

<br><br>
<br>
<br>


    <table align="center">
           <tr>
                <td> Successfully Mailed To Reviewer</td>
                
           </tr>

    </table>
 
 </form>

 </div>
 <?php include("../../footer.php");?>
</body>
</html>
