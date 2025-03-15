<!DOCTYPE html>
<html lang="en">
  <?php include 'header.php'; ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="javascript::">Regsitration</a></li>
                        <li class="active">Registration Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php
include('connection.php');
//if we clicked on Upload button

if($_POST['Submit'] == 'Submit')
  {
        $fname=mysqli_real_escape_string($db,$_POST['fname']);
        $lname=mysqli_real_escape_string($db,$_POST['lname']);
        $address=mysqli_real_escape_string($db,$_POST['address']);
		$position=mysqli_real_escape_string($db,$_POST['position']);
		$dob=mysqli_real_escape_string($db,$_POST['dob']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $mobileno=mysqli_real_escape_string($db,$_POST['mobileno']);
        $category= mysqli_real_escape_string($db,$_POST['category_submission']);
        $transactionno=mysqli_real_escape_string($db,$_POST['transactionno']);
        $category = (int)$category;
        //insert to conference resgitration table
        $rew="INSERT INTO confregistration (fname,lname,address,position,dob,email,mobileno,category,transactionno) VALUES ( '$fname', '$lname', '$address','$position', '$dob','$email', '$mobileno', '$category', '$transactionno');";
        mysqli_query($db,$rew);

        $query = "SELECT * from confregistration WHERE email='$email'";
        $result = mysqli_query($db, $query);
        if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        $sr_no = $row['SNO'];
        

        if ($category == 1) {

            $tutorial = $_POST['tutorial'];

            $tutorials = '';
            foreach($tutorial as $var){
                $tutorials.=$var.',';
            }

            $preconf = "INSERT INTO preconf_registration (sr_no, tutorial) VALUES ('$sr_no','$tutorials')";
            mysqli_query($db, $preconf);
            
        } else if($category == 2) {
            $auth = mysqli_real_escape_string($db, $_POST['category_auth']);
            $member = mysqli_real_escape_string($db, $_POST['member']);

            $detail = $_POST['details'];
            $details = '';
            foreach($detail as $var){
                $details.=$var.',';
            }
            
            $tracks = $_POST['track'];
            $track = '';
            foreach($tracks as $t){
                $track.=$t.',';
            }


            $paperid = mysqli_real_escape_string($db, $_POST['paperid']);
            $ptitle = mysqli_real_escape_string($db, $_POST['ptitle']);

            $preconf = "INSERT INTO conf_oral (sr_no, is_author, is_member, details, track, paper_id, paper_title) VALUES ('$sr_no','$auth','$member','$details','$track','$paperid','$ptitle')";
            if(!mysqli_query($db, $preconf)){
                // header("location:confregister.php?sr_no=".$sr_no.'&'.$auth.'&'.$member.'&'.$details.'&'.$track.'&'.$paperid.'&'.$ptitle);
                // exit();

                echo "sr_no=".$sr_no.'&'.$auth.'&'.$member.'&'.$details.'&'.$track.'&'.$paperid.'&'.$ptitle;
            }

        } else if($category == 3) 
		
		{
			
            $poster_auth = mysqli_real_escape_string($db, $_POST['category_poster_auth']);
            $poster_member = mysqli_real_escape_string($db, $_POST['poster_member']);
            
            $poster_track = $_POST['poster_track'];
            $poster_tracks = '';
            foreach($poster_track as $var){
                $poster_tracks.=$var.',';
            }
            
            $poster_detail = $_POST['poster_details'];
            $poster_details = '';
            foreach($poster_detail as $var){
                $poster_details.=$var.',';
            }

            $posterid = mysqli_real_escape_string($db, $_POST['posterid']);
            $postertitle = mysqli_real_escape_string($db, $_POST['postertitle']);
		}
}
  
  echo '<script>alert("Registration is done successfully");</script>';
 }
?>
<?php include("footer.php");?>
</html>