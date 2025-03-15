<?php  session_start();
  /*In this page dynamic updation of coauthors is done in the update page
     @author: sinimol
   */ 
 $pid=$_SESSION['sini'];
require "../connection.php";
 $sql = "INSERT INTO coauthors(pid, name,email, affiliation) VALUES($pid,'".$_POST["name"]."','".$_POST["email"]."', '".$_POST["affiliation"]."')";  
 if(mysqli_query($db, $sql))  
 {  
      echo 'Data Inserted';  
 }  
 ?> 