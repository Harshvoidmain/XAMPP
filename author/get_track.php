<!--This is the page where the track name is dynamically fetched through AJAX call for the modal-->
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
	$query ="SELECT * FROM tracks WHERE tid = '" . $_POST["track"] . "'";
	//$_SESSION['ttid']=$_POST["tid"];
	//$results = $dbhandle->query($query);
	$results=mysqli_query($db,$query);
?>
	
<?php
	while($rs=$results->fetch_assoc()) {

	echo $rs["trackname"];
}
?>
</body>
</html>