<?php
//Include database configuration file
include('../../connection.php');

if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
	$tr=$_POST["country_id"];
    $query = $db->query("SELECT * FROM sessions WHERE  tid = ".$_POST['country_id']." ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display states list
    if($rowCount > 0){
        echo '<option value="">Select session</option>';
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['sid'].'">'.$row['sname'].'</option>';
        }
    }else{
        echo '<option value="">Session not available</option>';
    }
}

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM papers WHERE (sessionid = ".$_POST['state_id'].") AND (rew1 IS NULL) ");

	$se= $_POST['state_id'];
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
		  echo '<option value="">Select paper</option>';
       
        while($row = $query->fetch_assoc()){ 
		$tr=$row['trackid'];
             echo '<option value="'.$row['paperid'].'">'.$row['ptitle'].'</option>';
			 
        }
		
    }else{
        echo '<option value="">paper not available</option>';
    }
	 

}

if(isset($_POST["paper_id"]) && !empty($_POST["paper_id"])){
        //Get all city data
    /* foreach ($asd as $k)
    {
        if ($k == '8') echo "ok";
    }*/
    $paper=$_POST["paper_id"];
    $query ="SELECT * FROM papers WHERE paperid='$paper'";

    $results=mysqli_query($db,$query);
    
    while($row=mysqli_fetch_array($results))
    
    {
    $pid=$row['pid'];
    //$session=$row['sessionid'];
    $trackid=$row['trackid'];
    }
    //$row=mysqli_fetch_array($results); 
    //$pid=$row['pid'];
    
    //echo '<script>alert("'.$pid.'");</script>';
    //idhar
          $query = $db->query("SELECT * FROM reviewer WHERE rewname NOT IN (Select name From coauthors Where pid='$pid')");
          $rowCount = $query->num_rows;
          if($rowCount > 0){
               echo '<option value="">Select Reviewer</option>';
            while($row = $query->fetch_assoc()){ 
            $pref=$row['trackid'];
            $sess=explode(',',$pref);
            foreach ($sess as $k)
            {
                if ($k == $trackid) 
                     echo '<option value="'.$row['rewid'].'">'.$row['rewname'].'</option>';
                 else
                     echo 'no';
            }
                        
                 
            }
            
        }else{
            echo '<option value="">reviewer unavailable</option>';
        }
    
    }
/*
if(isset($_POST["pap_id"]) && !empty($_POST["pap_id"])){
    //Get all city data
   /* foreach ($asd as $k)
{
    if ($k == '8') echo "ok";
}*/
/*$paper=$_POST["pap_id"];
$query ="SELECT sessionid FROM papers WHERE paperid='$paper'";

$results=mysqli_query($db,$query);

while($row=mysqli_fetch_array($results))

{

$session=$row['sessionid'];
}

//idhar
	  $query = $db->query("SELECT * FROM reviewer  ");
	  $rowCount = $query->num_rows;
	  if($rowCount > 0){
		  
          echo '<option value="">Select Reviewer</option>';
        while($row = $query->fetch_assoc()){ 
		$pref=$row['sessionid'];
		$sess=explode(',',$pref);
		foreach ($sess as $k)
		{
			if ($k == $session) 
				 echo '<option value="'.$row['rewid'].'">'.$row['rewname'].'</option>';
			 else
				 echo 'no';
		}
					
			 
        }
		
    }else{
        echo '<option value="">reviewer unavailable</option>';
    }

}*/

if(isset($_POST["session_id"]) && !empty($_POST["session_id"])){
    //Get all city data
    $query = $db->query("SELECT * FROM papers WHERE (sessionid = ".$_POST['session_id'].") AND (rew1 IS NOT NULL) ");

	$se= $_POST['session_id'];
    //Count total number of rows
    $rowCount = $query->num_rows;
    
    //Display cities list
    if($rowCount > 0){
		echo '<option value="">Select paper</option>';
       
        while($row = $query->fetch_assoc()){ 
		$tr=$row['trackid'];
             echo '<option value="'.$row['paperid'].'">'.$row['ptitle'].'</option>';
			 
        }
		
    }else{
        echo '<option value="">paper not available</option>';
    }
	 

}

if(isset($_POST["reassign_paper_id"]) && !empty($_POST["reassign_paper_id"])){
    //Get all city data
   /* foreach ($asd as $k)
    {
        if ($k == '8') echo "ok";
    }*/
    $paper=$_POST["reassign_paper_id"];
    $query ="SELECT * FROM papers WHERE paperid='$paper'";

    $results=mysqli_query($db,$query);
    
    while($row=mysqli_fetch_array($results))
    {
        $pid=$row['pid'];
        //$session=$row['sessionid'];
        $trackid=$row['trackid'];
        $rewd1 = $row['rewd1'];
        $rewd2 = $row['rewd2'];
        $rewd3 = $row['rewd3'];
        $rew1 = $row['rew1'];
        $rew2 = $row['rew2'];
        $rew3 = $row['rew3'];
    }

    //$row=mysqli_fetch_array($results);
    //$pid=$row['pid'];

    //echo '<script>alert("'.$pid.'");</script>';
    //idhar
    $query = $db->query("SELECT * FROM reviewer WHERE rewname NOT IN (Select name From coauthors Where pid='$pid')");
    $rowCount = $query->num_rows;

    $rev_list_html = "";
    if($rowCount > 0){
        // $rev_list_html +='<option value="">Select Reviewer</option>';
            
        while($row = $query->fetch_assoc()){ 
            $pref=$row['trackid'];
            $trackid_arr=explode(',',$pref);
            // $rev_list_html += "--------";
            
            foreach ($trackid_arr as $k){
                if ($k == $trackid) 
                    $rev_list_html =$rev_list_html.'<option value="'.$row['rewid'].'">'.$row['rewname'].'</option>';
                else
                    $rev_list_html =$rev_list_html;
            }			 
        }	
    }
    else{
        $rev_list_html += '<option value="">reviewer unavailable</option>';
    }
    echo json_encode(
        array("rev_list_html" => $rev_list_html,
        "rewd1" => $rewd1,
        "rewd2" => $rewd2,
        "rewd3" => $rewd3,
        "rew1" => $rew1,
        "rew2" => $rew2,
        "rew3" => $rew3,
        )
    ); 

}


?>