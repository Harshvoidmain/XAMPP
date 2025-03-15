<?php   require "../connection.php";
  /*In this page dynamic deletion of coauthors is done in the update page
     @author: sinimol
   */ 
 $sql = "DELETE FROM coauthors WHERE cid = '".$_POST["id"]."'";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>