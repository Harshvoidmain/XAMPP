<?php  require "../connection.php"; 
  /*In this page dynamic editing of coauthors is done in the update page
     @author: sinimol
   */ 
 $id = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE coauthors SET ".$column_name."='".$text."' WHERE cid='".$id."'";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>