<?php session_start();
require "../../connection.php";
//Include database configuration file
require '../../connection.php';

 
if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM sessions WHERE  tid = ".$_POST['country_id']."  ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select Session</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sid'].'">'.$row['sname'].'</option>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM papers WHERE sessionid = ".$_POST['state_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
 ?>    <div class="form-group">   <table style='font-size:16px;' WIDTH='50%' class='table table-striped table-condensed'>
<tr class=active>
   <th>PID</th><th>Paper Title</th><th>Date</th><th>Review</th><th>   </th>
                       <!-- <td width="150" align=center><strong>DateAssigned</strong></td>-->
        			</tr>
  <?php      while($row = $query->fetch_assoc()){ ?>
            <form action="overall.php" method="post"> <tr>
					 
					<td > <strong><?php echo $row['paperid'];?></strong></td>
        					<td > <strong><?php echo $row['ptitle'];?></strong></td>
							<td > <strong><?php echo $row['pdate'];?></strong></td>
					<?php echo "<td>" . "<input type='hidden' name='hidden' value=" . $row['pid'] . " </td>";?>	
					
			<td > <strong><?php  if(($row['rewd1']==0)||($row['rewd2']==0)||($row['rewd3']==0)){echo "Pending";} else if(($row['rewd1']==1)&&($row['rewd2']==1)&&($row['rewd3']==1)){echo "Done";}?></strong></td>
	
        					<td > <strong><?php  if(($row['rewd1']==1)&&($row['rewd2']==1)&&($row['rewd3']==1)){
								echo "<p data-placement='top' data-toggle='tooltip' title='view1'>
								<button class='btn btn-info btn-md' data-title='View' data-value=".$row['pid']." name=view1 style='font-size:19px' value=".$row['pid'].">Send Decision</span></button></p>";
								}?></strong></td>
		
		<br>
		</tr></form>
      <?php  }
    }else{
        echo '<p>No Papers For Current Session</p>';
    }
}
?></table></div>