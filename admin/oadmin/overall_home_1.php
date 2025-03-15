<?php
//connect to database
require('fpdf/fpdf.php');
	  require "../../connection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("header.php");?>

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="overall_home_1.php.php">Home</a></li>
                        <!--    <li class="active">Camera Ready</li>
                    --></ol>
                </div>
            </div>
        </div>
    </div>
</div>
	
	<br/><center><h2>Reviewed Papers</h2></center><br/>
 <div>
 <table class="table">
 <th></th>
<th>T1</th>
<th>T2</th>
<th>T3</th>
<th>T4</th>
<th>T5</th>
<th>T6</th>
<th>T7</th>
<th>T8</th>
<th>T9</th>
<th>T10</th>
<th>T11</th>
<th>T12</th>
<th>T13</th>

<tr>
<td>S1</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 

<tr>
<td>S2</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 



<tr>
<td>S3</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 


<tr>
<td>S4</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td>--</td>
<td>--</td>
<td>--</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49 AND opstatus='Reviewed'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 
 </table> 
 
 </div>

 <br/><center><h2>Accepted Papers</h2></center><br/>
 <div>
 <table class="table">
 <th></th>
<th>T1</th>
<th>T2</th>
<th>T3</th>
<th>T4</th>
<th>T5</th>
<th>T6</th>
<th>T7</th>
<th>T8</th>
<th>T9</th>
<th>T10</th>
<th>T11</th>
<th>T12</th>
<th>T13</th>

<tr>
<td>S1</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 

<tr>
<td>S2</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 



<tr>
<td>S3</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 


<tr>
<td>S4</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td>--</td>
<td>--</td>
<td>--</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49 AND opstatus='Accepted'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 






 </table> 
 
 </div>
 
 
  <br/><center><h2>Rejected Papers</h2></center><br/>
 <div>
 <table class="table">
 <th></th>
<th>T1</th>
<th>T2</th>
<th>T3</th>
<th>T4</th>
<th>T5</th>
<th>T6</th>
<th>T7</th>
<th>T8</th>
<th>T9</th>
<th>T10</th>
<th>T11</th>
<th>T12</th>
<th>T13</th>

<tr>
<td>S1</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=1"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=5"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=9"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=13"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=17"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=21"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=25"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=28"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=31"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=34"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=38"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=42"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=46"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 

<tr>
<td>S2</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=2"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=6"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=10"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=14"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=18"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=22"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=26"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=29"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=32"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=35"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=39"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=43"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=47"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 



<tr>
<td>S3</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=3"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=7"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=11"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=15"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=19"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=23"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=7 AND sessionid=27"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=8 AND sessionid=30"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=9 AND sessionid=33"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=36"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=40"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=44"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=48"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 


<tr>
<td>S4</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=1 AND sessionid=4"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=2 AND sessionid=8"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=3 AND sessionid=12"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=4 AND sessionid=16"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=5 AND sessionid=20"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=6 AND sessionid=24"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td>--</td>
<td>--</td>
<td>--</td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=10 AND sessionid=37"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=11 AND sessionid=41"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=12 AND sessionid=45"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
<td><?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49 AND opstatus='Rejected'"); $data=mysqli_fetch_array($r1); echo $data['number'];?>
/<?php $r1=mysqli_query($db,"SELECT trackid , COUNT(*) as number FROM papers WHERE trackid=13 AND sessionid=49"); $data=mysqli_fetch_array($r1); echo $data['number'];?></td>
</tr> 






 </table> 
 </div>

 
 
 
  
  

<?php include("footer.php");?>

</body>
</html>
