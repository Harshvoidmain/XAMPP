<?php session_start();
 /*In this page the list of papers which have not been sent for review are shown. They can be withdrawn and updated here.
     @author: sinimol
   */ 
//connect to database
require "../connection.php";
if(!$_SESSION["auid"])
  {
  	header("location:login.php?notloggedin=You Are Not Logged In!");
  }
  else
  {
  	//Secure Home Page opens
  }
  $uid=$_SESSION['auid'];
  if (isset($_POST['update'])){
			$_SESSION['papid']=$_POST['hidden'];
			header("location:update.php");
		}
  if (isset($_POST['withdraw'])){

  $pid=$_POST['hidden'];
$ssql="SELECT * FROM papers WHERE pid='$pid'";
$result=mysqli_query($db,$ssql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$trackid=$row["trackid"];
$pfilename=$row["pfilename"];
$sessionid=$row["sessionid"];
}
/*$id[1]='T'.$trackid;
$id[2]='_S'.$sessionid;
$id[3]='_P'.$pid;
$paperid=$id[1].$id[2].$id[3];
$pfilename = $paperid."-".$ptitle."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];

$folder="..uploads/Track".$trackid."/Session".$sessionid."/";
move_uploaded_file($file_loc,$folder.$pfilename);
*/	
		/*	 $data=$pfilename;
    $dir = "..uploads/Track".$trackid."/Session".$sessionid."";
	$dirHandle = opendir($dir);
    $thefile="..uploads/Track".$trackid."/Session".$sessionid."/".$pfilename;
	while ($file = readdir($dirHandle)) {
                                         if($file==$data) {
                                                    unlink($thefile);
                                         }
    }*/
	$path = $_SERVER['DOCUMENT_ROOT'].'/icnte/uploads/Track'.$trackid.'/Session'.$sessionid.'/'.$pfilename.'';
unlink($path);
			

  $del="DELETE FROM papers WHERE pid=$pid";
			mysqli_query($db,$del);
			header('location: withdraw.php?delstatus=success');
		}
if(isset($_POST['submit']))
{
$auid=$_SESSION['auid'];
$pstatus="Waiting";
//$pfilename=basename( $_FILES['file']['name']);
$pfilename = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 
// $file_size = $_FILES['file']['size'];
// $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$pfilename);
$ptitle=mysqli_real_escape_string($db,$_POST['ptitle']);
$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
$sessionid=mysqli_real_escape_string($db,$_POST['sessionid']);
$pdate=date("Y/m/d");
$ssql="SELECT sid FROM sessions WHERE sname='$sessionid'";
$result=mysqli_query($db,$ssql);


$sql="SELECT auemail FROM author WHERE auid='$auid'"; //Here the selection of the email of the current user is done
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$auemail=$row["auemail"];                         // email has been fetched into 'auemail' variable
}
$mailto = $auemail;                //receiver
$mailSub = "Paper Received";
$mailMsg = "Your Paper Has Been Received By Us! You will be further notified About it's status!";
$mailMsg = wordwrap($mailMsg,100);
require 'PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
$mail = new PHPMailer();
$mail ->IsSmtp();
$mail ->SMTPDebug = 0;
$mail ->SMTPAuth = true;
$mail ->SMTPSecure = 'STARTTLS';
$mail ->Host = "smtp.office365.com";
$mail ->Port = 587; 
$mail ->IsHTML(true);
$mail ->Username = "icnte@fcrit.ac.in";
$mail ->Password = "conf@2019";
$mail ->SetFrom("icnte@fcrit.ac.in");
$mail ->Subject = $mailSub;
$mail ->Body = $mailMsg;
$mail ->AddAddress($mailto);
if(!$mail->Send())
{
// echo "Mail Not Sent";
}
else
{
//echo "Mail Sent";
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
                        <li><a href="upload.php">Home</a></li>
                        <li><a class="active" href="withdraw.php" >Withdraw</a></li>
                     <!-- <li><a class="active" href="withdraw.php" >Withdraw/Update</a></li>-->
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
  
  <body style="font-size:16px">
      
   <?php
         $sql= "SELECT pid,paperid,ptitle,trackid,sessionid,opstatus FROM papers WHERE rew1 IS NULL AND  auid='$uid'";
          $result=mysqli_query($db,$sql);
echo "<br/><br/><div class=container><div class=row>	<div class=span5>";
if(!empty($_GET['delstatus'])){
          echo '<div class="panel panel-success" id="close2">
      <div class="panel-heading" style="font-size:16px">Paper Deleted Successfully<button type="button" class="close" data-target="#close2" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }
echo "<table WIDTH='50%' class=table table-striped table-condensed><tr class=active ><th>Paper ID</th><th>Paper Title</th>
<th> Track</th><th>Session</th></tr>";
while($record=mysqli_fetch_array($result))
{
	
	echo "<form action=withdraw.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['paperid'] . " </td>";
	echo "<td>" . $record['ptitle'] . " </td>";
$query ="SELECT trackname FROM tracks WHERE tid=$record[trackid]";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo "<td>" . $row['trackname'] . " </td>";
}
$query ="SELECT sname FROM sessions WHERE sid=$record[sessionid]";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo"<td>".$row['sname']."</td>";
}
echo"<td><p data-placement='top' data-toggle='tooltip' title='withdraw'><button class='btn btn-info btn-md' data-title='withdraw' name=withdraw style='font-size:16px'>Withdraw</button></p></td>";
	#echo"<td><p data-placement='top' data-toggle='tooltip' title='update'><button class='btn btn-info btn-md' data-title='update' name=update style='font-size:16px'>Update</button></p></td>";
	
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['pid'] . " </td>";
	echo "</tr>";
	echo "</form>";
          }
echo "</table></div></div>";
         ?></div>
	<br><br>
<br><br>
<br><br>
<br><br>
<?php include("../footer.php");?>

  </body>
</html>
