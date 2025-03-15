<?php session_start();
require "../../connection.php";
//select sname from sessions WHERE tid='".$_POST["trackid"]."'   
	$query ="SELECT * FROM papers WHERE trackid = '" . $_POST["tid"] . "'";
	//$_SESSION['ttid']=$_POST["tid"];
	//$results = $dbhandle->query($query);
	$results=mysqli_query($db,$query);

?>
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
	 <table style='font-size:20px; WIDTH='50%' class='table table-striped table-condensed'>
	 <tr class=active ><th>Paper ID</th><th>Paper Title</th><th>Review</th><th>   </th>
</tr>
<?php
	while($rs=$results->fetch_assoc()) {
?>	
        			
        					<tr>
        					<td > <strong><?php echo $rs['paperid'];?></strong></td>
							<td > <strong><?php echo $rs['ptitle'];?></strong></td> 
							
					
				<td > <strong><?php  if(($rs['rewd1']==0)||($rs['rewd2']==0)||($rs['rewd3']==0)){echo "Pending";} else if(($rs['rewd1']==1)&&($rs['rewd2']==1)&&($rs['rewd3']==1)){echo "Done";}?></strong></td>
	
        					<td > <strong><?php  if(($rs['rewd1']==1)&&($rs['rewd2']==1)&&($rs['rewd3']==1)){echo "<button class='btn btn-info btn-md' data-title='View' name=view style='font-size:19px'>Send Decision</span></button>";}?></strong></td>
		<br><?php echo "<td>" . "<input type=hidden name=hidden value=" . $rs['pid'] . " </td>";?>	</tr>
        					
        				
        		
  
                        
<?php
}
?> </table>
</body>
</html>