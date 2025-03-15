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
$session=$row['sessionid'];
}
//$row=mysqli_fetch_array($results);
//$pid=$row['pid'];
echo '<script>alert("'.$pid.'");</script>';
//idhar
	  $query = $db->query("SELECT * FROM reviewer WHERE rewname NOT IN (Select name From coauthors Where pid='$pid')");
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
?>