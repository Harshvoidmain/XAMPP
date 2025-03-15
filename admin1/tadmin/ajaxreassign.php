<?php 
require '../../connection.php';

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = $db->query("SELECT * FROM sessions WHERE  tid = ".$_POST['country_id']."  ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select session</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sid'].'">'.$row['sname'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM papers WHERE sessionid = ".$_POST['state_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
 ?>       <table style='font-size:16px;' WIDTH='50%' class='table table-striped table-condensed'>
<tr class=active>
   <th>PID</th><th>Paper Title</th><th>Date</th><th>Review 1</th><th>Review 2</th><th>Review 3</th>
                       <!-- <td width="150" align=center><strong>DateAssigned</strong></td>-->
        			</tr>
  <?php      while($row = $query->fetch_assoc()){ ?>
            <tr>
							<td > <strong><?php echo $row['paperid'];?></strong></td>
        					<td > <strong><?php echo $row['ptitle'];?></strong></td>
							<td > <strong><?php echo $row['pdate'];?></strong></td>
						
					
		<td > <strong><?php  if($row['rewd1']==0){echo"<button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:16px'>Reassign</button>";}else if($row['rewd1']==1){echo"Done";}?></strong></td>
	
		<td > <strong><?php if($row['rewd2']==0){echo "<button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:16px'>Reassign</button>";}else if ($row['rewd2']==1){echo "Done";}?></strong></td>
		<td > <strong><?php if($row['rewd3']==0){echo "<button class='btn btn-info btn-md' type='submit' data-title='submit' name='submit' style='font-size:16px'>Reassign</button>";}else if ($row['rewd3']==1){echo "Done";}?></strong></td>
		
		<br><?php echo "<td>" . "<input type=hidden name=hidden value=" . $row['pid'] . " </td>";?>
		</tr>
      <?php  }
    }else{
        echo '<p>No Papers For Current Session</p>';
    }
}
?></table>