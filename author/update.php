<?php session_start();
//connect to database
  /* This is the page where the updating of papers occurs
     @author: sinimol
   */ 

require "../connection.php";
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
	$pid=$_SESSION['papid'];
$auid=$_SESSION['auid'];
$pstatus="Under Review";
$ptitle=mysqli_real_escape_string($db,$_POST['ptitle']);
$trackid=mysqli_real_escape_string($db,$_POST['trackid']);
$sessionid=mysqli_real_escape_string($db,$_POST['sessionid']);
$pfilename=$_FILES['file']['name'];
//$pfilename=basename( $_FILES['file']['name']);
 
if(empty($pfilename)||empty($ptitle)||empty($trackid)||empty($sessionid))
{
echo '<script language="javascript">';
echo 'alert("Please Fill All Fields!")';
echo '</script>';
exit();
}
else
{
	//UPDATE `papers` SET `ptitle` = 'Topgsagdjas' WHERE `papers`.`pid` = 71;
	
// $file_size = $_FILES['file']['size'];
// $file_type = $_FILES['file']['type'];


$pdate=date("Y/m/d");
$ssql="SELECT sid FROM sessions WHERE sname='$sessionid'";
$result=mysqli_query($db,$ssql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$sessionid=$row["sid"];
}
$id[1]='T'.$trackid;
$id[2]='_S'.$sessionid;
$id[3]='_P'.$pid;
$paperid=$id[1].$id[2].$id[3];
$pfilename = $paperid."-".$ptitle."-".$_FILES['file']['name'];
$file_loc = $_FILES['file']['tmp_name'];

$folder="..uploads/Track".$trackid."/Session".$sessionid."/";
move_uploaded_file($file_loc,$folder.$pfilename);
$pcameraready="-NA-";
$sql="UPDATE papers SET paperid='$paperid',ptitle='$ptitle',trackid='$trackid',sessionid='$sessionid',pfilename='$pfilename',pdate='$pdate' WHERE papers.pid=$pid";
mysqli_query($db,$sql);
/*$statuschange = " UPDATE coauthors SET caffiliation='$_POST[caffiliation]', cname='$_POST[cname]',cemail='$_POST[cemail]' WHERE cid='$_POST[hidden]'";
         mysqli_query($db,$statuschange);*/
$sql="SELECT auemail FROM author WHERE auid='$auid'"; //Here the selection of the email of the current user is done
$result=mysqli_query($db,$sql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$auemail=$row["auemail"];                         // email has been fetched into 'auemail' variable
}
$mailto = $auemail;                //receiver
$mailSub = "Paper Updated";
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
header('location: update.php?upstatus=success');
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
$pid=$_SESSION['papid'];
$data = 'SELECT * FROM papers WHERE pid = "'.$pid.'"'; 
  $query = mysqli_query($db,$data) or die("Couldn't execute query. ". mysql_error()); 
  $data2 = mysqli_fetch_array($query,MYSQLI_ASSOC); 
  /*$tno=$data2["trackid"];
  $query1 ="SELECT trackname FROM tracks WHERE tid='$tno'";
$results=mysqli_query($db,$query1);
while($row=mysqli_fetch_array($results))
{
$tname=$row['trackname'];
}
$sno=$data2["sessionid"];
$query ="SELECT sname FROM sessions WHERE sid='$sno'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
$sname=$row['sname'];
}*/
?>
<!DOCTYPE html>
<html lang="en">


<?php include("../header1.php");?><script type="text/javascript" src="../js/jquery.js"></script>

<script type="text/javascript" src="js/jquery-tabledit-master/jquery.tabledit.js"></script>
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
	/*  function track(val)
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
	  }*/
	 function gettrack(val)
      {
		  
		  var val=$('#track-list').val();
        $.ajax({
          type: "POST",
          url: "get_track.php",
          data:'tid='+val,
          success: function(data){
            $("#track").html(data);
          }
        }
              );
      }
    </script>
<script>
/*function viewData()
{
	$.ajax({
		url: 'process.php?p=view',
		method: 'GET'
	}).done(function(data){
		$('tbody').html(data)
	})
	tableData()
}
function tableData()
{
	$('#tabledit').Tabledit({
    url: 'process.php',
	 eventType: 'dblclick',
    editButton: true,
	deleteButton: true,
	  hideIdentifier: false,
	 buttons: {
    edit: {
        class: 'btn btn-sm btn-default',
        html: '<span class="glyphicon glyphicon-pencil">Edit</span>',
        action: 'edit'
    },
    delete: {
        class: 'btn btn-sm btn-default',
        html: '<span class="glyphicon glyphicon-trash">Delete</span>',
        action: 'delete'
    },
    save: {
        class: 'btn btn-sm btn-success',
        html: 'Save'
    },
    restore: {
        class: 'btn btn-sm btn-warning',
        html: 'Restore',
        action: 'restore'
    },
    confirm: {
        class: 'btn btn-sm btn-danger',
        html: 'Confirm'
    }
},
    columns: {
        identifier: [0, 'id'],
        editable: [[1, 'name'],[2, 'email', '{"1": "Red", "2": "Green", "3": "Blue"}'], [3, 'affiliation']]
    }
	,
  
    onSuccess: function(data, textStatus, jqXHR) {
        viewData()
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
   
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
});
}*/
</script>
<?php include("navbar.php");?>
           
   <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="upload.php">Home</a></li>
                        <li><a href="withdraw.php">Withdraw/Update</a></li>
                        <li class="active"><a href="update.php">Update</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
  
  
  
  <body style="font-size:16px" onload="viewData()">
    <br>
    <br>
    <br>
    <div class="container">
	 <?php if(!empty($_GET['upstatus'])){
          echo '<div class="panel panel-success" id="close3">
      <div class="panel-heading" style="font-size:20px">Paper Updated Successfully<button type="button" class="close" data-target="#close3" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>

    </div>';
   }?>
      <div class="well well-lg">
        <form action="update.php" method="post" enctype="multipart/form-data">
          <label class="cols-sm-2 control-label">Paper ID:
            </label> 
			<?php
			$as=$_SESSION['papid'];
			$_SESSION['sini']=$as;
			?>
			
  <?php $p=$_SESSION['papid']; 
  $query ="SELECT paperid FROM papers WHERE pid='$pid'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
$paper=$row['paperid'];
}	
  echo $paper;
  ?><br><br>
		  
		  <div class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Track
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true">
                  </i>
                </span>
                <select style="font-size:16px" class="form-control input-lg" name="trackid" id="track-list" onChange="getSession(this.value);" >
                  			<?php
							$trid=$data2["trackid"];
							$st="select trackname from tracks WHERE tid='$trid'";
							$q=mysqli_query($db,$st);
while($row=mysqli_fetch_array($q))
{ 
                 $trname=$row['trackname']; 
                 
}
							?>
				  <option selected="true" ><?php echo $trname; ?></option>
                  <?php 
$s="select * from tracks";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ ?>
                  <option  value="<?php echo $row['tid'];  ?>">
                    <?php echo $row['trackname']; //$tid=$row['tid'];?>
                  </option>
                  <?php 
//$_SESSION['tid']=$tid;
}
?>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label for="Description" class="cols-sm-3 control-label">Session
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true">
                  </i>
                </span>
				<?php
				$sessid=$data2["sessionid"];
				$s="select sname from sessions WHERE sid='$sessid'";
$q=mysqli_query($db,$s);
while($row=mysqli_fetch_array($q))
{ 
                 $sessname=$row['sname']; 
                 
}
				
				?>
                <select  style="font-size:16px" class="form-control input-lg" name="sessionid" id="session-list" >
                  <option selected="true" ><?php echo $sessname;?></option>
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
          <div class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Title
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-envelope fa" aria-hidden="true">
                  </i>
                </span>
                <input style="font-size:16px" type="text" class="form-control input-lg" name="ptitle" id="" value='<?php echo $data2["ptitle"]; ?>' placeholder="Title"/>
              </div>
            </div>
          </div>
		  <?php
	
	/*$pid=$_SESSION['papid'];
	//echo "$pid";
	$sql= "SELECT cid,name,email,affiliation FROM coauthors WHERE pid='$pid'";
          $result=mysqli_query($db,$sql);
          echo "<div class=container><div class=row>	<div>";
          echo "<table  > <tr class=active><th>Name</th><th>Email</th><th>Affiliation</th>
          </tr>";
          while($record=mysqli_fetch_array($result)){
         	 
         	 echo "<form action=update.php method=post>";
         	 echo "<tr>";
         	  echo "<td>" . "<input type=text name=cname value=" . $record['name']." </td>";
			   echo "<td>" . "<input type=text name=cemail value=" . $record['email']." </td>";
         	 echo "<td>" . "<input type=text name=caffiliation value=" . $record['affiliation']." </td>";
         	
         	 echo "<td>" . "<input type=hidden name=hidden value=" . $record['cid'] . " </td>";
			 echo "<td><p data-placement='top' data-toggle='tooltip' title='book'><button class='btn btn-info btn-md' data-title='Book'  name=update><span class='glyphicon glyphicon-pencil'>Update</span></button></p></td>";
         	 
         	  echo "</tr>";
         	 echo "</form>";
          }
          echo "</table></div></div></div>";
		  if(isset($_POST['update']))
         {
         $statuschange = " UPDATE coauthors SET caffiliation='$_POST[caffiliation]', cname='$_POST[cname]',cemail='$_POST[cemail]' WHERE cid='$_POST[hidden]'";
         mysqli_query($db,$statuschange);
         }*/
?>	<!--
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
					  Edit Coauthor
				</button>
				<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Coauthor</h4>
		      </div>


		      <div class="modal-body">
		      		<form data-toggle="validator" action="api/update.php" method="put">
		      			<input type="hidden" name="id" class="edit-id">


		      			<div class="form-group">
							<label class="control-label" for="title">Name</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>


						<div class="form-group">
							<label class="control-label" for="title">Email:</label>
							<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>

<div class="form-group">
							<label class="control-label" for="title">Affiliation:</label>
							<textarea name="aff" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-success crud-submit-edit">Submit</button>
						</div>


		      		</form>


		      </div>
		    </div>
		  </div>
		</div>-->
		<!--<div>
		<table id="tabledit"class="table table-bordered table-striped" ><thead> <tr ><th>Name</th><th>Email</th><th>Affiliation</th>
          </tr>
		  </thead>
		  <tbody></tbody>
		  </table></div>-->
		  <label class="cols-sm-2 control-label">Co-authors:
            </label> 
		   <div class="table-responsive">  
                    <div id="live_data"></div>                 
                </div>  
          <div class="form-group">
            <label for="Description" class="cols-sm-2 control-label">File   
            </label>( Only  .docx format allowed)
            </p>
          <div class="cols-sm-10">
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span><?php echo $data2["pfilename"];?>
              <input type="file" accept="application/msword,
                                         application/vnd.openxmlformats-officedocument.wordprocessingml.document"  name="file" size="512000"/>
              <!-- rename it --> 
            </div>
          </div>
          </div>
        <br>
        <!-- <div class="form-group ">
<input type="file" class="btn  btn-lg btn-primary" name="fileToUpload" id="fileToUpload">
</div><br>
-->
        <div class="form-group ">
          <input class="btn btn-info btn-block login"  name="sform" data-toggle="modal" data-target="#myModal" id="submitBtn"    value="Upload "> 
          <!--data-toggle="modal" data-target="#myModal">-->
        </div>
        <script>
          $('#submitBtn').click(function() 
                                {
            /* when the button in the form, display the entered values in the modal */
            $('#session').text($('#session-list').val());
            $('#track').text($('#track-list').val());
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
              <div style="font-size:20px"class="modal-body">
                Are you sure it’s the correct track and session ?
                <!-- We display the details entered by the user here -->
                <table class="table">
                  <tr>
                    <th style="font-size:20px">Session
                    </th>
                    <td id="session">
                    </td>
                  </tr>
                  <tr>
                    <th style="font-size:20px">Track
                    </th>
                    <td id="track" onload="gettrack(this.value);">
                    </td>
                  </tr>
                </table>
                <div class="form-group">
                  <input type="submit" name="submit" value="Upload" class="btn btn-info btn-block login" name="add_btn" value="Upload">
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
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
			 var name = $('#name1').text(); 
           var email = $('#email').text();  
           var affiliation = $('#affiliation').text(); 
			if(name == '')  
           {  
                alert("Enter Name");  
                return false;  
           } 		   
           if(email == '')  
           {  
                alert("Enter Email");  
                return false;  
           }  
           if(affiliation == '')  
           {  
                alert("Enter Affiliation");  
                return false;  
           }  
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{name:name, email:email, affiliation:affiliation},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                    // alert(data);  
                }  
           });  
      }  
	  $(document).on('blur', '.name1', function(){  
           var id = $(this).data("id3");  
           var name = $(this).text();  
           edit_data(id, name, "name");  
      }); 
      $(document).on('blur', '.email', function(){  
           var id = $(this).data("id1");  
           var email = $(this).text();  
           edit_data(id, email, "email");  
      });  
      $(document).on('blur', '.affiliation', function(){  
           var id = $(this).data("id2");  
           var affiliation = $(this).text();  
           edit_data(id,affiliation, "affiliation");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id4");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>
   <?php include("../footer.php");?>
  </body>
</html>
