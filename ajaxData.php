<?php
//Include the database configuration file
include 'connection.php';

if(!empty($_POST["country_id"]))
{
    //Fetch all state data
    $query = $db->query("SELECT * FROM award_sub_category WHERE id = ".$_POST['country_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //State option list
    if($rowCount > 0){
        echo '<option value="">Select Sub Category</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value='.$row['sub_id'].'>'.$row['sub_category'].'</option>';
        }
    }else{
        echo '<option value="">data not available</option>';
    }
}
?>