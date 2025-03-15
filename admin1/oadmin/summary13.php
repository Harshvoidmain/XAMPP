<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../login.php"); 
}
 require "../../connection.php";
 require('fpdf/fpdf.php');

?>
<!DOCTYPE html>
<html lang="en">
<script src=icjs.js></script>

     <?php include("header.php");?>
     
     <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home.php">Home</a></li>
                        <li><a href="summary11.php">Information for Souvenir</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
<div>
<div class="container">	 
<br/><br/>	<center><h2><label  class="label" name="cameraready" value="" style="color:black">Excellence Awards</label></h2></center>
 <form class="form-group" method="post" action="export.php">
     <?php
        $query="SELECT * FROM excellence_awards";
        $result1=mysqli_query($db,$query);
       


		echo '<table style="font-size:16px" class="table table-bordered table-responsive-xl" >
		<tr><th hidden></th><th>ID</th>
		<th>First Name</th>
		<th>Last name</th>
		<th>Organization Name</th>
		<th>Email</th>
		<th>Phone</th></tr>';
        while($data1=mysqli_fetch_array($result1)){
        echo '<tr><td><input type="hidden" name="id" value="'.$data1['ID'].'" ><td>'.$data1['ID'].'</td>
            <td>'.$data1['fname'].'</td>
            <td>'.$data1['lname'].'</td>
			<td>'.$data1['oname'].'</td>
			<td>'.$data1['email'].'</td>
			<td>'.$data1['phone'].'</td>
			<td><input type="submit" class"btn btn-success" name="printex" Value="Print"></td></tr>';
        }
        echo '</table>';
        ?>
       <!--<input style="font-size:16px" type="submit" name="print" value="Generate Word Document" class="btn btn-info btn-lg"/>
    </center>-->
    
    
</form>

</div>
</div>

<?php include("../../footer.php");?>
</html>
