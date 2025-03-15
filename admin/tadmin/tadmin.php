<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
$dept=$_SESSION['id'];
//connect to database
//$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
//connect to database
 require "../../connection.php";  
$sql="SELECT * FROM tracks WHERE dept='$dept'";
$result1=mysqli_query($db,$sql);
?>


<!DOCTYPE html>
<html lang="en">
    <?php include("header.php"); ?>

 <div>
     <br>
	 
<div class="row">
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
        <div> 
        <table class="table" style="border-collapse: collapse;" style="width:100%" border="1" Cellpadding = "5">
 <?php
 $t=0;
 $t1=0;$t2=0;$t3=0;$t4=0;
 $ta1=" ";$ta2=" ";$ta3=" ";$ta4=" ";
 				while($row = mysqli_fetch_array($result1))
 				{
					    echo "<tr>";
					   	$track=$row['trackname'];
						$tid=$row['tid'];
						if($t==0)
						{
						    $t1=$row['tid'];
						    $ta1=$row['trackname'];
						}
						elseif ($t==1)
						{
						    $t2=$row['tid'];
						    $ta2=$row['trackname'];
						}
						elseif ($t==2)
						{
						    $t3=$row['tid'];
						    $ta3=$row['trackname'];
						}
						elseif ($t==3)
						{
						    $t4=$row['tid'];
						    $ta4=$row['trackname'];
						}
					    echo "<td colspan ='20'>"."</td>";
						echo "<tr>".""."</tr>";
						echo "<th colspan ='20' align='center'>".$track."</th>";
						echo "</tr>";
					
                    $sql="SELECT * FROM sessions WHERE tid='$tid'";
				    $result2=mysqli_query($db,$sql);
						echo "<tr>";
						echo "<td>"."</td>";
						while($row = mysqli_fetch_array($result2))
					{
						$sessions=$row['sname'];
						echo "<th width:'50px'>".$sessions."</th>";
					}	
					echo "</tr>";
					echo "<tr>";
						echo "<th>"."Reviewed"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
				    $result3=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result3))
					{
						$sid=$row['sid'];						
					$r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Reviewed'"); 
					$data=mysqli_fetch_array($r1); 
					$r2=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r2); 
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
					    echo "</tr>";
					    
						echo "<tr>";
						echo "<th>"."Accepted"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result4=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result4))
					{
						$sid=$row['sid'];						
					$r3=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Accepted'");
					$data=mysqli_fetch_array($r3); 
					$r4=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'");
					$data1=mysqli_fetch_array($r4); 
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
						echo "</tr>";
						
						echo "<tr>";
						echo "<th>"."Rejected"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Rejected'"); 
					$data=mysqli_fetch_array($r5);
					$r6=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r6);
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
						echo "</tr>";
					echo "</tr>";
		$t++;
		}
				
 ?></table>	</div></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script>  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart1);  
           google.charts.setOnLoadCallback(drawChart2);
           google.charts.setOnLoadCallback(drawChart3);
           google.charts.setOnLoadCallback(drawChart4);
           function drawChart1()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['opstatus', 'number'],  
                          <?php  
                    $query = "SELECT opstatus, count(*) as number FROM papers where trackid='$t1' GROUP BY opstatus";  
                             $res2 = mysqli_query($db, $query); 
                          while($row = mysqli_fetch_array($res2))  
                          {  
                               echo "['".$row["opstatus"]."', ".$row["number"]."],";  
                          }  
 	                      ?>  
                     ]);  
                var options = {  
                      title: '<?php echo "$ta1"?> ',  
                      is3D:true,  
                     
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }
           
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['opstatus', 'number'],  
                          <?php  
                        $query = "SELECT opstatus, count(*) as number FROM papers where trackid= '$t2' GROUP BY opstatus";  
                             $res4 = mysqli_query($db, $query); 
                          while($row = mysqli_fetch_array($res4))  
                          {  
                               echo "['".$row["opstatus"]."', ".$row["number"]."],";  
                          }  
 
                                                 ?>   
                     ]);  
                var options = {  
                      title: '<?php echo "$ta2"?> ',  
                      is3D:true,  
                     
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data, options);  
           }
           
          function drawChart3()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['opstatus', 'number'],  
                          <?php  
                           $query = "SELECT opstatus, count(*) as number FROM papers where trackid='$t3' GROUP BY opstatus";  
                             $res6 = mysqli_query($db, $query); 
                          while($row = mysqli_fetch_array($res6))  
                          {  
                               echo "['".$row["opstatus"]."', ".$row["number"]."],";  
                          }  
					
                          ?>  
                     ]);  
                var options = {  
                      title: '<?php echo "$ta3"?>',  
                      is3D:true,  
                     
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
           }
            function drawChart4()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['opstatus', 'number'],  
                          <?php  
                           $query = "SELECT opstatus, count(*) as number FROM papers where trackid='$t4' GROUP BY opstatus";  
                             $res8 = mysqli_query($db, $query); 
                          while($row = mysqli_fetch_array($res8))  
                          {  
                               echo "['".$row["opstatus"]."', ".$row["number"]."],";  
                          }  
					
                          ?>  
                     ]);  
                var options = {  
                      title: '<?php echo "$ta4"?>',  
                      is3D:true,  
                     
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));  
                chart.draw(data, options);  
           }
           </script>  


 <div class="col-md-6" style="padding: 20px;">
     
 <div id="piechart1" style="width: 900px; height: 350px;"></div>
				
 <div id="piechart2" style="width: 900px; height: 350px;"></div>
        
 <div id="piechart3" style="width: 900px; height: 350px;"></div>
 
 <div id="piechart4" style="width: 900px; height: 350px;"></div>
	</div>

        
</div>
 
 </div>
 <?php include("../../footer.php");?>
</body>
</html>
