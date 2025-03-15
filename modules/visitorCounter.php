<!-- Visitor Counter -->
<?php
    include 'connection.php'; 
    $sqlst = "SELECT * FROM `visitor_details`;";

    $result=mysqli_query($db,$sqlst);
    $row=mysqli_fetch_array($result);
    $count=$row["user_count"];
    $count++;

    $sql="UPDATE `visitor_details` SET `user_count` = '$count';";
                            if (mysqli_query($db, $sql)) {
                            echo "";} else {
    $message = "Database Error";
    echo "<script type='text/javascript'>alert('$message');</script>";}
							
?>