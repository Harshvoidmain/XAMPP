<?php
   //connect to database
   //require "../../connection.php";
   //$db=mysqli_connect("localhost", "id3446588_root","icnte123", "id3446588_icnte2");
   $db=mysqli_connect("localhost","root","","icnte");
   session_start();
   
   $user_check = $_SESSION['dept'];
   
   $ses_sql = mysqli_query($db,"select tid from tracks where dept = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['dept'];
   
   if(!isset($_SESSION['dept'])){
      header("location:../index.php");
   }
?>