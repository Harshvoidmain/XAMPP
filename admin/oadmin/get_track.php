<?php session_start();
require "../connection.php";

$ids = json_decode($_POST["tid"], true);
$elementCount  = count($ids);

//select sname from sessions WHERE tid='".$_POST["trackid"]."'  

$total_results  =array();
 for($i=0;$i<$elementCount;$i++){
	 
	 //$query ="SELECT * FROM sessions WHERE tid = '" . $ids[$i] . "'";
	 $query ="INSERT INTO reviewer(trackid,sessionid)VALUES('$tid','$sid')";
	 
	 $results=mysqli_query($db,$query);
	 
	 
	 while($row = mysqli_fetch_assoc($results)){
		 
		array_push($total_results,$row);
	 }
 }

for($j=0;$j<sizeof($total_results);$j++){
	echo "<option value=".$total_results[$j]["sid"].">".$total_results[$j]["sname"]."</option>";	
}
?>