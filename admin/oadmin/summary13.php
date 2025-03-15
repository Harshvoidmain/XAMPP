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
                        <li><a href="summary13.php">Excellence Awards</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
     
<div>
<div style="font-size:16px" class="container">	 
<br/><br/>	<center><h2><label  class="label" name="cameraready" value="" style="color:black">Excellence Awards</label></h2></center>
 <form class="form-group" method="post" action="summary13.php">
     <div >
        <table style="font-size:16px" class="table table-responsive">
            <tr><td style="padding:30px">Select Category:</td>
            <td><select class="form-control" name="category">
                <option value="">Select Category</option>
                <option value="Research Excellence">Research Excellence</option>
                <option value="Academic Excellence">Academic Excellence</option>
                <option value="Industry Excellence">Industry Excellence</option>
                <option value="Start Up Excellence">Start Up Execellence</option>
            </select></td></tr>
            <tr>
                <td ><center><input colspan="2" type="submit" class="btn btn-info" Value="Get Requests" name="get"></center></td>
                </tr>
        </table></form>
        
     <?php
       if(isset($_POST['get'])){
       $category=$_POST['category'];
        $query="SELECT * FROM excellence_awards WHERE category_id IN(SELECT id FROM award_category WHERE category='$category' )";
        $result=mysqli_query($db,$query);
       


		echo '<form class="form-group" method="get" action="export.php">
		<table style="font-size:16px" class="table table-bordered table-responsive-xl" >
		<tr><th hidden></th><th>ID</th>
		<th>First Name</th>
		<th>Last name</th>
		<th>Organization Name</th>
		<th>Email</th>
		<th>Phone</th>
		<th>Transaction_ID</th></tr>';
        while($data1=mysqli_fetch_array($result)){
        echo '<tr><input type="hidden" name="id" value="'.$data1['ID'].'"><td>'.$data1['ID'].'</td>
            <td>'.$data1['fname'].'</td>
            <td>'.$data1['lname'].'</td>
			<td>'.$data1['oname'].'</td>
			<td>'.$data1['email'].'</td>
			<td>'.$data1['phone'].'</td>
			<td>'.$data1['transaction_id'].'</td>
			<td><a href="../../uploads/excellence_awards_submission/images/ '.$data1['attach_declaration'].'"><input type="submit" class="btn btn-info btn-lg" name="down" Value="Download"></a></td></tr>';
        }
	
        echo '</table></form>';}
			
        ?>
       <!--<input style="font-size:16px" type="submit" name="print" value="Generate Word Document" class="btn btn-info btn-lg"/>
    </center>
	<td><input type="submit" class="btn btn-info btn-lg" name="printex" Value="Print Form"></td>-->
    
    

</div>
</div>

<?php include("../../footer.php");?>
</html>
