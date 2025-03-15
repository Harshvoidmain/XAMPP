<!--This is the page where the session name is dynamically fetched through AJAX call-->
<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
session_start();
require "../connection.php";//connect to database
//select sname from sessions WHERE tid='".$_POST["trackid"]."'   
	$query ="SELECT * FROM sessions WHERE tid = '" . $_POST["tid"] . "'";
	//$_SESSION['ttid']=$_POST["tid"];
	//$results = $dbhandle->query($query);
	$results=mysqli_query($db,$query);
?>
	<option value="">Select Session</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["sname"]; ?>"><?php echo $rs["sname"]; ?></option>
<?php
}
?>
</body>
</html>