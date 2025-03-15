<?php session_start();

 /*In this page the uploading of papers occurs
     @author: sinimol
   */ 

require "../connection.php";//connect to database

if(!$_SESSION["auid"])
  {
  	header("location:login.php?notloggedin=You Are Not Logged In!");
  }
  else
  {
  	//Secure Home Page opens
  }
if(isset($_POST['submit']))
{

  function removeSpclChar($str) {
    $res = str_replace( array('\'', '"', ',', ';', '<', '>', ':', '.', '/', '-'), '', $str);
    return $res;
  }
  
$auid=$_SESSION['auid'];
///$pstatus="Under Review";

// $ptitle=mysqli_real_escape_string($db,$_POST['ptitle']);
$ptitle = $_POST['ptitle'];
$ptitle = removeSpclChar($ptitle);


$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
$sessionid=mysqli_real_escape_string($db,$_POST['sessionid']);

$pabstract= $_POST['pabstract'];
$pabstract = removeSpclChar($pabstract);

/*$a1name=mysqli_real_escape_string($db,$_POST['a1name']);
		$a2name=mysqli_real_escape_string($db,$_POST['a2name']);
		$a3name=mysqli_real_escape_string($db,$_POST['a3name']);
		$a4name=mysqli_real_escape_string($db,$_POST['a4name']);
		$a5name=mysqli_real_escape_string($db,$_POST['a5name']);
		$a6name=mysqli_real_escape_string($db,$_POST['a6name']);
		$a7name=mysqli_real_escape_string($db,$_POST['a7name']);
		$a8name=mysqli_real_escape_string($db,$_POST['a8name']);
		$a1email=mysqli_real_escape_string($db,$_POST['a1email']);
		$a2email=mysqli_real_escape_string($db,$_POST['a2email']);
		$a3email=mysqli_real_escape_string($db,$_POST['a3email']);
		$a4email=mysqli_real_escape_string($db,$_POST['a4email']);
		$a5email=mysqli_real_escape_string($db,$_POST['a5email']);
		$a6email=mysqli_real_escape_string($db,$_POST['a6email']);
		$a7email=mysqli_real_escape_string($db,$_POST['a7email']);
		$a8email=mysqli_real_escape_string($db,$_POST['a8email']);
		$a1affiliation=mysqli_real_escape_string($db,$_POST['a1affiliation']);
		$a2affiliation=mysqli_real_escape_string($db,$_POST['a2affiliation']);
		$a3affiliation=mysqli_real_escape_string($db,$_POST['a3affiliation']);
		$a4affiliation=mysqli_real_escape_string($db,$_POST['a4affiliation']);
		$a5affiliation=mysqli_real_escape_string($db,$_POST['a5affiliation']);
        $a6affiliation=mysqli_real_escape_string($db,$_POST['a6affiliation']);
		$a7affiliation=mysqli_real_escape_string($db,$_POST['a7affiliation']);
		$a8affiliation=mysqli_real_escape_string($db,$_POST['a8affiliation']);*/
$pfilename=basename( $_FILES['file']['name']);
$pdate=date("Y/m/d");
$ssql="SELECT sid FROM sessions WHERE sname='$sessionid'";
$result=mysqli_query($db,$ssql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$sessionid=$row["sid"];
}
/******************CODE FOR CUSTOM PAPER ID***********************/
/*if($trackid<=3)
{
	$id[0]='MECH';
}
else if($trackid>3 && $trackid<=6)
{
	$id[0]='ELEC';
}
else if($trackid>6 && $trackid<=9)
{
	$id[0]='EXTC';
}
else
{
$id[0]='COMP';	
}*/
$id[1]='T'.$trackid;
$id[2]='_S'.$sessionid;

						   $isql = "SHOW TABLE STATUS LIKE 'papers'";
$result=$db->query($isql);
$row = $result->fetch_assoc();

$curr=$row['Auto_increment'];
$id[3]='_P'.$curr;  //-00-9ie-0swutg08yhpt9gewy8hw5tgu59r8bgup9[sz]



$name=$_POST['name'];
 $email=$_POST['email'];
 $affiliation=$_POST['affiliation'];
 for($i=0;$i<count($name);$i++)
 {
  if($name[$i]!="NULL" && $email[$i]!="NULL" && $affiliation[$i]!="NULL")
  {
	  $q="INSERT INTO coauthors(pid,name,email,affiliation)  VALUES ('$curr','$name[$i]','$email[$i]','$affiliation[$i]');";
   mysqli_query($db,$q);	 
  }
 }






/*echo $id[0];
echo $id[1];
echo $id[2];
echo $id[3];*/




$paperid=$id[1].$id[2].$id[3];
/*$q="INSERT INTO dummy(paperid) VALUES('$paperid')";
mysqli_query($db,$q);*/
$pcameraready="-NA-"; 
if(empty($auid)||empty($pfilename)||empty($ptitle)||empty($trackid)||empty($sessionid)||empty($pabstract))
{
echo '<script language="javascript">';
echo 'alert("Please Fill All Fields!")';
echo '</script>';
exit();
}
else if(strlen($pabstract)>=1500)
			{
				echo '<script language="javascript">';
				echo 'alert("Abstract must be less than or equal to 1500 characters")';
				echo '</script>'; 
				exit();
			}
else
{

$extn = $_FILES["file"]['type'];
if($extn=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
  $extn = '.docx';
} 
else if ($extn=='application/msword'){
  $extn = '.doc';
}
else { 
  $extn = '.pdf';
}
	
$pfilename = $paperid."-".$ptitle;
$pfilename = substr($pfilename, 0, 200).$extn;
#$pfilename = $paperid."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];
// $tname='Track'.$trackid;
 //$sfname='Session'.$sessionid;
// $file_size = $_FILES['file']['size'];
// $file_type = $_FILES['file']['type'];
$folder="../uploads/Track".$trackid."/Session".$sessionid."/";

$sql="INSERT INTO papers(auid,paperid,ptitle,trackid,sessionid,pcameraready,pfilename,pdate,pabstract) 
VALUES('$auid','$paperid','$ptitle','$trackid','$sessionid','$pcameraready','$pfilename','$pdate','$pabstract')";

if (mysqli_query($db,$sql)) 
{
  if(move_uploaded_file($file_loc,$folder.$pfilename)){

  
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
  require '../PHPMailer-master/PHPMailerAutoload.php';      //A file from the PHPMailer-master file is referred. 
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

  header('location: paper.php?status=success');
  
  }else{
    header('location: paper.php?error=fileError&'.$file_loc.'&Folder='.$folder.$pfilename);
  }
} 
else
{
  echo("Error description: " . $db -> error);
  // header('location: paper.php?error=dbError');
}
/*
$sql="INSERT INTO coauthors(pid,cname,cemail,caffiliation) 
		VALUES
		('$curr','$a1name','$a1email','$a1affiliation'),
		('$curr','$a2name','$a2email','$a2affiliation'),
		('$curr','$a3name','$a3email','$a3affiliation'),
		('$curr','$a4name','$a4email','$a4affiliation'),
		('$curr','$a5name','$a5email','$a5affiliation'),
		('$curr','$a6name','$a6email','$a6affiliation'),
		('$curr','$a7name','$a7email','$a7affiliation'),
		('$curr','$a8name','$a8email','$a8affiliation')";
				mysqli_query($db,$sql);*/


}
}
// Check if the form was submitted/
/*if($_SERVER["REQUEST_METHOD"] == "POST"){
// Check if file was uploaded without errors
if(isset($_FILES["file"]) && $_FILES["file"]["error"] == 0){
//$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
$filename = $_FILES["file"]["name"];
$filetype = $_FILES["file"]["type"];
$filesize = $_FILES["file"]["size"];
// Verify file extension
$ext = pathinfo($filename, PATHINFO_EXTENSION);
//if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
// Verify file size - 5MB maximum
$maxsize = 5 * 1024 * 1024;
if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
// Verify MYME type of the file
//if(in_array($filetype, $allowed)){
// Check whether file exists before uploading it
//  if(file_exists("upload/" . $_FILES["file"]["name"])){
//    echo $_FILES["file"]["name"] . " is already exists.";
//} else{
move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
echo '<script language="javascript">';
echo 'alert("Your file was uploaded successfully")';
echo '</script>'; 
//echo "Your file was uploaded successfully.";
//} 
//} else{
//  echo "Error: There was a problem uploading your file. Please try again."; 
}
//    } 
else{
echo '<script language="javascript">';
echo 'alert(""FILE UPLOAD ERROR : " . $_FILES["file"]["error"]")';
echo '</script>';
//   echo "Error: " . $_FILES["file"]["error"];
}
}*/
?>
<!DOCTYPE html>
<html lang="en">
    <!-- header section -->
<?php include("../header1.php");?>

<?php include("navbar.php");?>
    <head>
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="jquery.toastmessage.js" type="text/javascript"></script>
    <link href="jquery.toastmessage.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function add_row()
{
 $rowno=$("#employee_table tr").length;
 $rowno=$rowno+1;
 $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td class='col-sm-4'><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span><input class='form-control'type='text' name='name[]' placeholder='Enter Name'></div></td><td class='col-sm-4'><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-envelope'></i></span><input class='form-control' type='email' name='email[]' placeholder='Enter Email'></div></td><td class='col-sm-4'><div class='input-group'><span class='input-group-addon'><i class='glyphicon glyphicon-education'></i></span><input class='form-control' type='text' name='affiliation[]' placeholder='Enter Affiliation'></div></td><td><button type='button' class='btn btn-danger btn-circle btn-lg' value='DELETE' onclick=delete_row('row"+$rowno+"')><i class='glyphicon glyphicon-remove'></i></button></td></tr>");
}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
 <script>
      function getSession(val)
      {
        $.ajax({
          type: "POST",
          url: "get_session.php",
          data:'tid='+val,
          success: function(data){
            $("#session-list").html(data);
			//$("#track-list").html(data);
          }
        }
              );
      }
	  function track(val)
	  {
		 $.ajax({
          type: "POST",
          url: "get_track.php",
          data:'tid='+val,
          success: function(data){
           
			$("#track-list").html(data);
          }
        }
              ); 
	  }
	 function gettrack(val)
      {
		  
		  var val=$('#track-list').val();
        $.ajax({
          type: "POST",
          url: "get_track.php",
          data:'tid='+val,
          success: function(data){
            $("#track1").html(data);
          }
        }
              );
      }
   
    </script>

</head>
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol style="font-size:16px" class="breadcrumb">
                        <li style="font-size:16px"><a href="home.php">Home</a></li>
                       <li class="active" style="font-size:16px"><a href="upload.php">Upload Paper</a> </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
 
  <!--
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="home.php">ICNTE</a>
</div>
<div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">	 
<li><a href="upload.php"><span class=" glyphicon glyphicon-th-list"></span>Upload</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tasks"></span>My Papers</a>
<div class="dropdown-menu" style="width:500px;">
<div class="panel panel-info">
<div class="panel-heading">
<div class="row">
<div class="col-md-3">Paper ID</div>
<div class="col-md-3">Track Status </div>
<div class="col-md-3">Session Status</div>
<div class="col-md-3">Overall Status</div>
</div>
</div>
</div>
</div>
</li>
<!--   <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['auname']; ?></a></li>
--> 
  <!--<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
</ul>
</div>
</div>
</div>
</nav>-->
  <body style="font-size:16px">
  
    <br>
    <br>
    <div class="container">
      <?php if(!empty($_GET['status'])){
          echo '<div class="panel panel-success" id="close1">
      <div class="panel-heading" style="font-size:16px">Paper Uploaded Successfully<button type="button" class="close" data-target="#close1" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }?>
      <div class="well well-lg">
      <marquee behavior="alternate"><font size="4">For Poster Submission, kindly click on the following Link :   <a href="http://tiny.cc/icnteposter2021">http://tiny.cc/icnteposter2021</a></font></marquee>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label style="font-size:16px" for="Description" class="cols-sm-2 control-label">Track
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-th-list  fa" aria-hidden="true">
                  </i>
                </span>
                <select  style="font-size:16px" class="form-control input-lg" name="trackid" id="track-list" onChange="getSession(this.value);"  >
                  <option value="">Select Track
                  </option>
                  <?php 
$s="select * from tracks";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ ?>
                  <option  value="<?php echo $row['tid'];  ?>">
                    <?php echo $row['trackname']; //$tid=$row['tid'];?>
                  </option>
                  <?php 
//$_SESSION['tid']=$tid;$_SESSION['tid']=$row['tid'];

}

?>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label style="font-size:16px" for="Description" class="cols-sm-3 control-label">Session
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-list  fa" aria-hidden="true">
                  </i>
                </span>
			
                <select style="font-size:16px" class="form-control input-lg" name="sessionid" id="session-list" >
                  <option class="form-control input-lg"  value="">Select Session
                  </option>
                  <?php /*
$trid=mysqli_real_escape_string($db,$_POST['trackid']);
//$tid=$_SESSION['tid'];
$s="select sname from sessions WHERE tid='".$_POST["trackid"]."'";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ ?>
                  <option value="<?php echo $row['sname']; ?>">
                    <?php echo $row['sname']; ?>
                  </option>
                  <?php 
}*/
?>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group" style="font-size:16px">
            <label style="font-size:16px" for="Description" class="cols-sm-2 control-label">Title
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-book fa" aria-hidden="true">
                  </i>[]
                </span>
                <input style="font-size:16px" type="text" class="form-control input-lg" name="ptitle" id=""  placeholder="Title"/>
              </div>
            </div>
          </div>
		   <div class="form-group">
															<label for="benefits" style="font-size:16px">Abstract</label>
															<textarea style="font-size: 16px  ;"onkeyup="textCounter(this,'counter1',1500);" id="message1" name="pabstract"  class="form-control" rows="9" cols="25" required="required"
                                placeholder="Decribe Your Paper Within 1500 Characters"></textarea><input disabled  maxlength="1" size="1" value="1500" id="counter1">
														
														
<script>
function textCounter(field,field2,maxlimit)
{
 var countfield = document.getElementById(field2);
 if ( field.value.length > maxlimit ) {
  field.value = field.value.substring( 0, maxlimit );
  return false;
 } else {
  countfield.value = maxlimit - field.value.length;
 }
}
</script>
														
													</div>
          <div class="form-group">
           
            </p>
          <div class="cols-sm-10"><label style="font-size:16px" for="Description" class="cols-sm-2 control-label">File   
            </label>
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
              <input type="file" accept="application/msword,
                                         application/pdf,
                                         application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="file" size="512000"/>
              <!-- rename it --> 
              <!-- <input type="file" name="foo" accept=
"application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*"> -->
            </div>
			
          </div>
          </div> <p style="font-size:16px">( Only .docx, .pdf format allowed for Paper Submission.   )</p><!-- to a max size of .)-->
          <p style="font-size:16px">( Upload the paper with your name as Filename and it should not consists any special characters like "-, +, /, .")</p>
        <br> 
        <!-- front end for Keep filename as author name and should not have any spcl character-->
		<div id="wrapper">
		<div id="form_div">
		<table id="employee_table" align=center><label style="font-size:16px" class="cols-sm-2 control-label">Co Authors   
            </label>
   <tr id="row1">
    <td class="col-sm-4"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" class="form-control" value=' <?php echo $_SESSION['auname'];?>' name="name[]" placeholder="Enter Name"></div></td>
    <td class="col-sm-4"><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span><input type="email" class="form-control" value=' <?php echo $_SESSION["auemail"];?>' name="email[]" placeholder="Enter Email"></div></td>
    <td class="col-sm-4"> <div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span><input type="text" class="form-control" name="affiliation[]" placeholder="Enter Affiliation"></div></td>
   </tr>
  </table>
  <button type="button" class="btn  btn-circle btn-lg b1" onclick="add_row();" value="ADD ROW"><i class="glyphicon glyphicon-plus"></i></button>
  
  <!--<input type="submit" name="submit_row" value="SUBMIT">
		--></div>
		</div><br>
		<!--
		<div class="panel panel-default clearfix" >
                            
  <div class="panel panel-default toggle-header  " >
  <div class="panel-body"   data-toggle="collapse" data-target="#demo">Click To Add Authors <span class="glyphicon glyphicon-check"></span></div>
</div>

<div id="demo" class="collapse clearfix">
Author 1 
<div class="row">
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" value=' <?php echo $_SESSION['auname'];?>' name="a1name" placeholder="Name">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" value=' <?php echo $_SESSION["auemail"];?>' name="a1email" placeholder="Email">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
      <input id="email" type="text" class="form-control" name="a1affiliation" placeholder="Affiliation">
    </div></div>
  </div>
Author 2 
<div class="row">
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="a2name" placeholder="Name">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" name="a2email" placeholder="Email">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
      <input id="email" type="text" class="form-control" name="a2affiliation" placeholder="Affiliation">
    </div></div>
  </div>
Author 3 
<div class="row">
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="a3name" placeholder="Name">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" name="a3email" placeholder="Email">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
      <input id="email" type="text" class="form-control" name="a3affiliation" placeholder="Affiliation">
    </div></div>
  </div>
Author 4
<div class="row">
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="a4name" placeholder="Name">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" name="a4email" placeholder="Email">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
      <input id="email" type="text" class="form-control" name="a4affiliation" placeholder="Affiliation">
    </div></div>
  </div>
Author 5
<div class="row">
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="a5name" placeholder="Name">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="email" type="email" class="form-control" name="a5email" placeholder="Email">
    </div></div>
  <div class="col-sm-4"><div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
      <input id="email" type="text" class="form-control" name="a5affiliation" placeholder="Affiliation">
    </div></div>
  </div>
</div>
<br>
 </div>-->

        <!-- <div class="form-group ">
<input type="file" class="btn  btn-lg btn-primary" name="fileToUpload" id="fileToUpload">
</div><br>
-->
        <div class="form-group ">
          <input style="font-size:16px" class="btn btn-info btn-block upload"  name="sform" data-toggle="modal" 
          data-target="#myModal" id="submitBtn"   value="Upload "> 
          <!--data-toggle="modal" data-target="#myModal">-->
        </div>
        <script>
          $('#submitBtn').click(function() 
                                {
            /* when the button in the form, display the entered values in the modal */
            $('#session').text($('#session-list').val());
            $('#track').text($('#track-list').val());
			/*var val=$('#track-list').val();
			switch(val)
			{
			case 1:
			$('#track').text("STructure");
			break;
			case 2:
			break;
			}*/
          }
                               );
        </script>
        <div  id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
              </div>
              <div style="font-size:16px"class="modal-body">
                Are you sure it’s the correct track and session ?
                <!-- We display the details entered by the user here -->
                <table class="table">
                  <tr>
                    <th style="font-size:16px">Session
                    </th>
                    <td id="session">
                    </td>
                  </tr>
                  <tr>
                    <th style="font-size:16px">Track
                    </th>
                    <td id="track">
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                <a href="javascript:showSuccessToast();"> <input type="submit" name="submit" value="Upload" class="btn btn-info btn-block login" name="add_btn" value="Upload">
                </a> 
				</div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <?php
// $allowedExts = array( "doc", "docx");
// $extension = end(explode(".", $_FILES["fileToUpload"]["name"]));
/* if (( ($_FILES["fileToUpload"]["type"] == "application/msword") || ($_FILES["fileToUpload"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") && ($_FILES["fileToUpload"]["size"] < 20000000) && in_array($extension, $allowedExts)))
{
if ($_FILES["fileToUpload"]["error"] > 0)
{
echo "Upload In doc docx format only";
}
else
{
echo "Success";
}
}
else
{
echo "Upload In doc docx format only";
}*/
?>
    </div>
  </div>
  <script>
  /*$(document).on('click', '#submitBtn', function(){  
			 var tr = $('#track').val(); 
           
           $.ajax({  
                url:"get_track.php",  
                method:"POST",  
                data:'track='+track,  
                  
                success:function(data)  
                {  
                      $("#tname").html(data);
                }  
           })  
      });  
 */
  </script>
  <?php include("../footer.php");?>
  </body>
</html>
