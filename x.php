<?php session_start();
require "../connection.php";

   //connect to database
   $rewid=$_SESSION['rewid'];
   $pid=$_SESSION['pid'];
    if(isset($_POST['review']))
   {
		$status=mysqli_real_escape_string($db,$_POST['status']);
		$remark=mysqli_real_escape_string($db,$_POST['remark']);
		if(empty($status))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Accept or Reject!")';
			echo '</script>';
			exit();
		}
		else
		{

				//$sql="UPDATE papers SET pstatus='$status',premark='$remark' WHERE pid='$pid'";
				//mysqli_query($db,$sql); 
				$rsql="SELECT * FROM papers WHERE pid='$pid'";
				$res=mysqli_query($db,$rsql);
				if(mysqli_num_rows($res)==1)
                {				
                $row = mysqli_fetch_array($res);
                $rw1=$row['rew1'];
                $rw2=$row['rew2'];
                $rw3=$row['rew3'];
            
                if($rw1==$rewid)
                    {
                        $sql="UPDATE papers SET rewd1=1,pstatus1='$status',premark1='$remark' WHERE pid='$pid'";
                        mysqli_query($db,$sql);
                    }	
                else if($rw2==$rewid)
                    {
                        $sql="UPDATE papers SET rewd2=1,pstatus2='$status',premark2='$remark' WHERE pid='$pid'";
                        mysqli_query($db,$sql);
                    }
                else if($rw3==$rewid)
                    {
                        $sql="UPDATE papers SET rewd3=1,pstatus3='$status',premark3='$remark' WHERE pid='$pid'";
                        mysqli_query($db,$sql);
                    }
                
                    $sql="SELECT * FROM papers WHERE pid='$pid';";

                    $result=mysqli_query($db,$sql);

                    if(mysqli_num_rows($result)>0){

                        $row = mysqli_fetch_assoc($result);
                        $revd1 = $row['rewd1'];
                        $revd2 = $row['rewd2'];
                        $revd3 = $row['rewd3'];

                        if(($revd1 == 1 && $revd2 == 1) || ($revd1 == 1 && $revd3 == 1) || ($revd3 == 1 && $revd2 == 1)){
                            
                            $sq = "UPDATE papers SET opstatus = 'reviewed' WHERE pid = '$pid'";
                            mysqli_query($db,$sq);

                        }else if($revd1 == 1 || $revd2 == 1 || $revd3 == 1){
                            
                            $sq = "UPDATE papers SET opstatus = 'Under Review' WHERE pid = '$pid'";
                            mysqli_query($db,$sq);
                        }
    
                    }
                

                    // -------------------------UNDER_REVIEW is same as REVIEWED---------------------------------//

                    
                }
		
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
   
    <?php include("../header1.php");?>

<?php include("navbar.php");?>



<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Reviewer</a></li>
                        <li><a href="waiting.php">Papers</a></li>
                        <li class="active"> Review</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="font-size: 16px  ;">
	<div class="row">
		<div class="col-md-12">
			<body>
				<br/>
				<h3><b><center> Enter your remarks </center></h3>

				<form method='post' action='remark.php' class='col-md-12 center-block'>
											
					<!--<div class='btn-group' data-toggle='buttons'>
					<label class='btn btn-primary active btn-lg'><span class='glyphicon glyphicon-ok'>
						<input type='radio' name='status' value='Accepted' id='option1' autocomplete='off' checked> Accept
						</span>
					</label>
					
					<label class='btn btn-danger btn-lg'><span class='glyphicon glyphicon-remove'>
						<input type='radio' name='status' value='Rejected' autocomplete='off'> Reject
					</span>
					</label>
					</div> -->
					
						
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label"></label>
							<div class="cols-sm-10">
								<div class="input-group">
									<input type='radio' name='status' value='Accepted' id='option1' autocomplete='off' checked">  Accept as it is<br><br>
									<input type='radio' name='status' value='Accepted with minor changes' autocomplete='off'>  Accept with minor revision<br><br>
									<input type='radio' name='status' value='Accepted with major changes' autocomplete='off'>  Accept with major revision<br><br>
									<input type='radio' name='status' value='Rejected' autocomplete='off'>  Reject<br>									
								</div>
							</div>
					</div>
						
									
					<br><br>
				
					<div class='form-group'>
						<label style='font-size: 16px  ;font-weight: bold;' for=''>Comments</label>
						<textarea  style='font-size: 16px  ;font-weight: bold;'name='remark' class='form-control' rows='5' cols='5' required='required' placeholder='Comments or Suggestions'></textarea>
					</div>
                 
					<div class='form-group'>
						<input style='font-size: 16px  ;font-weight: bold;' type='submit' class='btn btn-lg btn-primary' name='review' value='Submit' class='Log In'>
					</div>
				</form>
				
			</body></center>
		</div>
	</div>
</div><?php include("../footer.php");?>
</html>