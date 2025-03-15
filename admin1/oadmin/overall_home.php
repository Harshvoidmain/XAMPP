<?php
session_start();
if(isset($_SESSION['id'])==null)
{
    header("Location:../index.php"); 
}
//connect to database
require "../../connection.php";

$sql="SELECT * FROM tracks WHERE dept='mech'";
$result1=mysqli_query($db,$sql);
$sql="SELECT * FROM tracks WHERE dept='elec'";
$result8=mysqli_query($db,$sql);
$sql="SELECT * FROM tracks WHERE dept='extc'";
$result9=mysqli_query($db,$sql);
$sql="SELECT * FROM tracks WHERE dept='cs/it'";
$result7=mysqli_query($db,$sql);



?>


<!DOCTYPE html>
<html lang="en">
    <?php include("header.php"); ?>
<style>
.trytable{
	margin:30px;
	right:20%;
}
.trytable .table tr td{
	padding-right:-30px;
	width:100px;
}
.graph{
	margin:25px;
}

</style>
<div class="trytable">
         <br><br><center><b>Overall Statistics</b></center><br>
         <table class="table table-condensed table-bordered" style="padding-left:0px;">
             <tr class="info">
                <th>Track Name</th>
                <th>No. of papers Received</th>
             </tr>
             <?php
                $track=mysqli_query($db,"SELECT * FROM tracks");
                while($row=mysqli_fetch_array($track))
                {
                    $tid=$row['tid'];
                    $pcount=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(pid) as COUNT FROM papers WHERE trackid='$tid'"));
                
                    echo '<tr><td>'.$row['trackname'].'</td><td>'.$pcount['COUNT'].'</td></tr>';
                }
                $pcount=mysqli_fetch_array(mysqli_query($db,"SELECT COUNT(pid) as COUNT FROM papers"));
                echo '<tr class="info"><td><b>Total Papers</td><td>'.$pcount['COUNT'].'</td></b></tr>';
             ?>
        </table>
        
     </div>
     
     
 <div class="graph">
     <br>
	 <center><h4 style="font-size:"><b>Mechanical Department</b></h4></center>
<div class="row">
    
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
        <div> 
        <table class="table" style="border-collapse: collapse;" border="1" Cellpadding = "5">
 <?php
 $t=0;
 $t1=0;$t2=0;$t3=0;
 $ta1=" ";$ta2=" ";$ta3=" ";
 echo '';
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
						echo "<th>".$sessions."</th>";
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
						
							echo "<tr>";
						echo "<th>"."Under Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Under Review' OR opstatus='Sent' "); 
					$data=mysqli_fetch_array($r5);
					$r6=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r6);
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
						echo "</tr>";
						
							echo "<tr>";
						echo "<th>"."Pending For Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL "); 
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
           </script>  


		<div class="col-md-6" style="">
   
 <div id="piechart1" style="width: 900px; height: 450px;"></div>

					
 <div id="piechart2" style="width: 900px; height: 420px;"></div>

        
 <div id="piechart3" style="width: 900px; height: 420px;"></div>
	</div>

        
</div>
 
 </div>
 
  <div class="graph">

     <br>
	 <center><h4 style="font-size:"><b>Electrial Department</b></h4></center>
<div class="row">
    
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
        <div> 
        <table class="table" style="border-collapse: collapse;" border="1" Cellpadding = "5">
 <?php
 $t=0;
 $t1=0;$t2=0;$t3=0;
 $ta1=" ";$ta2=" ";$ta3=" ";
 echo '';
 				while($row = mysqli_fetch_array($result8))
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
						echo "<th>".$sessions."</th>";
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
						
							echo "<tr>";
						echo "<th>"."Under Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Under Review' OR opstatus='Sent'"); 
					$data=mysqli_fetch_array($r5);
					$r6=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r6);
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
						echo "</tr>";
						
							echo "<tr>";
						echo "<th>"."Pending For Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL "); 
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart4'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart5'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart6'));  
                chart.draw(data, options);  
           }
           </script>  


		<div class="col-md-6" style="padding: 20px;">
     
 <div id="piechart4" style="width: 900px; height: 420px;"></div>

 <div id="piechart5" style="width: 900px; height: 420px;"></div>

 <div id="piechart6" style="width: 900px; height: 420px;"></div>
	</div>

</div>
  </div>
 
 <div class="graph">
     <br>
	 <center><h4 style="font-size:"><b>EXTC Department</b></h4></center>
<div class="row">
    
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
        <div> 
        <table class="table" style="border-collapse: collapse;" border="1" Cellpadding = "5">
 <?php
 $t=0;
 $t1=0;$t2=0;$t3=0;
 $ta1=" ";$ta2=" ";$ta3=" ";
 echo '';
 				while($row = mysqli_fetch_array($result9))
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
						echo "<th>".$sessions."</th>";
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
						
							echo "<tr>";
						echo "<th>"."Under Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Under Review' OR opstatus='Sent'"); 
					$data=mysqli_fetch_array($r5);
					$r6=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r6);
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
						echo "</tr>";
						
							echo "<tr>";
						echo "<th>"."Pending For Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL "); 
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart7'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart8'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart9'));  
                chart.draw(data, options);  
           }
           </script>  


		<div class="col-md-6" style="padding: 20px;">
     
 <div id="piechart7" style="width: 850px; height: 350px;"></div>

 <div id="piechart8" style="width: 850px; height: 350px;"></div>

 <div id="piechart9" style="width: 850px; height: 350px;"></div>
	</div>

        
</div>
 
 </div>
 
 
   <div class="graph">

     <br>
	 <center><h4 style="font-size:"><b>Computer Department</b></h4></center>
<div class="row">
    <div class="col-md-6" style="padding: 20px;border-right: 1px solid lightskyblue;">
        <div> 
        <table class="table" style="border-collapse: collapse;" style="width:100%" border="1" Cellpadding = "5">
 <?php
 $t=0;
 $t1=0;$t2=0;$t3=0;$t4=0;
 $ta1=" ";$ta2=" ";$ta3=" ";$ta4=" ";
 				while($row = mysqli_fetch_array($result7))
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
						
					    echo "<th>"."Under Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus='Under Review' OR opstatus='Sent'"); 
					$data=mysqli_fetch_array($r5);
					$r6=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid'"); 
					$data1=mysqli_fetch_array($r6);
					echo "<td>".$data['number']."/".$data1['number']."</td>";
					}
					echo "</tr>";
					
					echo "<th>"."Pending for Review"."</th>";
						$sql="SELECT * FROM sessions WHERE tid='$tid'";
						$result5=mysqli_query($db,$sql);
						while($row = mysqli_fetch_array($result5))
					{
						$sid=$row['sid'];						
					$r5=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid='$tid' AND sessionid='$sid' AND opstatus IS NULL"); 
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart10'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart11'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart12'));  
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
                var chart = new google.visualization.PieChart(document.getElementById('piechart13'));  
                chart.draw(data, options);  
           }
           </script>  


		<div class="col-md-6" style="padding: 20px;">
     
 <div id="piechart10" style="width: 900px; height: 420px;"></div>

					
 <div id="piechart11" style="width: 900px; height: 420px;"></div>

        
 <div id="piechart12" style="width: 900px; height: 420px;"></div>
 
 <div id="piechart13" style="width: 900px; height: 420px;"></div>
	</div>

        
</div>
 
 </div>
 
 
 <?php include("../../footer.php");?>
</body>
</html>
