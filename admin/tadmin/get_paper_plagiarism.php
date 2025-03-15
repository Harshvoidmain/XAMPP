<?php session_start();
//connect to database
 require "../../connection.php";  
 
 

				



?>





<!DOCTYPE html >

<html >

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>

</head>

<script type="text/javascript">//alert("sdfsd");</script>

<body style="font-size:16px">
	 

	    <?php
     $sql= "SELECT * FROM papers WHERE ((trackid='" . $_POST["tid"] . "') AND ((pstatus1!='Rejected' AND pstatus2!='Rejected') OR (pstatus2!='Rejected' AND pstatus3!='Rejected') OR (pstatus1!='Rejected' AND pstatus3!='Rejected')))";
      $result=mysqli_query($db,$sql);
      
 echo "<table style='font-size:16px; WIDTH='50%' class=table table-striped table-condensed>
<tr class=active >
<th>Paper ID</th>
<th>Paper Title</th>
<th>Plagiarism Count</th>
<th>Upload Plagiarism File</th>
<th></th>
</tr>";
while($record=mysqli_fetch_array($result)){
    //$ptitle=$record['ptitle'];
    $id=$record['pid'];
    $title=$record['ptitle'];
    echo "<form action=plagiarism.php method=post>";
    echo "<tr>";
    echo "<td>" . $id . " </td>";
    echo "<td>" . $title . " </td>";
    echo "<td> <input type='text' style='font-size:16px' name='plagiarism' id='plagiarism' ></td>";
echo"<td><p data-placement='top' data-toggle='tooltip' title='upload'>
<button class='btn btn-info btn-md' data-title='upload' name=upload style='font-size:16px'>
<span class='glyphicon glyphicon-th-list'> Upload </span> </button> </p> </td>";
	echo "<td> <p data-placement='top' data-toggle='tooltip' title='submit'>
<button class='btn btn-info btn-md' data-title='submit' name=submit style='font-size:16px'>
<span class='glyphicon glyphicon-ok'> Submit </span> </button> </p> </td>";

    echo "<td>" . "<input type=hidden name=hidden value=" . $id . " </td>";
    echo "</tr>";
    echo "</form>"; 
}
    ?></div>
		 <br><br>
	<br><br>

	 

</body>

</html>