<?php session_start();
 $db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
//select sname from sessions WHERE tid='".$_POST["trackid"]."'   
				$sql="SELECT COUNT(pid)FROM papers where trackid = '" . $_POST["tid"] . "'";
	
	//$_SESSION['ttid']=$_POST["tid"];
	//$rs1 = $dbhandle->sql($sql);
				$rs1=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rew1 is NULL AND rew2 is NULL AND rew3 is NULL AND trackid  = '" . $_POST["tid"] . "' ";
				$rs2=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rew1 is not NULL AND rew2 is not NULL AND rew3 is not NULL and trackid = '" . $_POST["tid"] . "'";
				$rs3=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rewd1=1 and trackid = '" . $_POST["tid"] . "'";
				$rs4=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rewd2=1 and trackid = '" . $_POST["tid"] . "'";
				$rs5=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rewd3=1 and trackid = '" . $_POST["tid"] . "'";
				$rs6=mysqli_query($db,$sql);
				
				$sql="SELECT COUNT(pid)FROM papers where rewd1=1 AND rewd2=1 AND rewd3=1 AND trackid = '" . $_POST["tid"] . "'";
				$rs7=mysqli_query($db,$sql);

?>


<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
	 
	    <table align="center" border="1">
           <tr>
                <td align=center width='550' height='50'> No. of Paper Recevied = </td>
                <?php
				$result1 = mysqli_fetch_array($rs1);
					echo "<td align=center width='250'>".$result1[0]."</td>";
												
					?>
           </tr>
		   <tr>
                <td align=center height='50'> No. of Paper Send for Review = </td>
                <?php
				$result2 = mysqli_fetch_array($rs2);
					echo "<td align=center width='250'>".$result2[0]."</td>";
												
					?>
           </tr>
<tr>
                <td align=center height='50'> No. of Paper Not Send for Review = </td>
                <?php
				$result3 = mysqli_fetch_array($rs3);
					echo "<td align=center width='250'>".$result3[0]."</td>";
												
					?>
           </tr>

		   <tr>
                <td align=center height='50'> No. of Paper Reviewed by 1st = </td>
               <?php
				$result4 = mysqli_fetch_array($rs4);
					echo "<td align=center width='250'>".$result4[0]."</td>";
												
					?>
           </tr>
		   
		   
		    <tr>
                <td align=center height='50'> No. of Paper Reviewed by 2nd = </td>
               <?php
				$result5 = mysqli_fetch_array($rs5);
					echo "<td align=center width='250'>".$result5[0]."</td>";
												
					?>
           </tr>
			
			<tr>
                <td align=center height='50'> No. of Paper Reviewed by 3nd = </td>
               <?php
				$result6 = mysqli_fetch_array($rs6);
					echo "<td align=center width='250'>".$result5[0]."</td>";
												
					?>
           </tr>
			
			<tr>
                <td align=center height='50'> No. of Paper Completed Reviewed = </td>
                <?php
				$result7 = mysqli_fetch_array($rs7);
					echo "<td align=center width='250'>".$result6[0]."</td>";
												
					?>
           </tr>


    </table>
 
	 
</body>
</html>