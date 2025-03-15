<?php session_start();
require "../../connection.php";
//select sname from sessions WHERE tid='".$_POST["trackid"]."'   
	$query ="SELECT * FROM papers WHERE trackid = '" . $_POST["tid"] ."' AND sessionid='".$_POST["sid"]."'";
	// $_SESSION['ttid']=$_POST["tid"];
	//$results = $dbhandle->query($query);
	$results=mysqli_query($db,$query);

?>
	<option value="">Select Paper</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["pid"]; ?>"><?php echo $rs["ptitle"]; ?></option>
<?php
}
?>
</body>
</html>