<?php
session_start();
 /*In this page the cameraready paper is uploaded along with copyright document
     @author: sinimol
   */ 
//connect to database

require "../connection.php";
if(!$_SESSION["auid"])
  {
  	header("location:login.php?notloggedin=You Are Not Logged In!");
  }
if(isset($_POST['sform']))
   {
	   $tid=mysqli_real_escape_string($db,$_POST['tid']);
	   $ptitle=mysqli_real_escape_string($db,$_POST['ptitle']);
		$pid=$_SESSION['papid'];
		$ssql="SELECT * FROM papers WHERE pid='$pid'";
$result=mysqli_query($db,$ssql);
if(mysqli_num_rows($result)==1)
{
$row = mysqli_fetch_array($result);
$trackid=$row["trackid"];
$paperid=$row["paperid"];
$sessionid=$row["sessionid"];
}
$id[1]='T'.$trackid;
$id[2]='_S'.$sessionid;
$id[3]='_P'.$pid;
$paperid=$id[1].$id[2].$id[3];
		$abstract=mysqli_real_escape_string($db,$_POST['abstract']);
	$filename='copyright-'.$paperid.'-'.$ptitle;
	$filename1=$paperid.'-'.$ptitle;
 $file = $filename."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file1 = $filename1."-".$_FILES['file1']['name'];
 $file1_loc = $_FILES['file1']['tmp_name'];

 $folder="../uploads/Cameraready/Track".$trackid."/";
 move_uploaded_file($file_loc,$folder.$file);
 move_uploaded_file($file1_loc,$folder.$file1);
	if(empty($abstract)||empty($file)||empty($file1))
		{
			echo '<script language="javascript">';
			echo 'alert("Please Fill All Fields!")';
			echo '</script>';
			exit();
		}
		
		else{
		$sql="UPDATE papers SET ptitle='$ptitle',pabstract='$abstract',pfilename='$file',copyright='$file1',pcameraready='DONE',tid='$tid' WHERE papers.pid=$pid";
mysqli_query($db,$sql);
		$auid=$_SESSION['auid'];
				$sql="SELECT auemail FROM author WHERE auid='$auid'";
       $result=mysqli_query($db,$sql);
       if(mysqli_num_rows($result)==1)
       {
			$row = mysqli_fetch_array($result);
   		$auemail=$row["auemail"];
   		
       }
	$mailto = $auemail;                //receiver
$mailSub = "Camera Ready Paper Received";
$mailMsg = "We got your Final Draft! You will be further provided the Session Details!";
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
header('location: paper.php');
		}
   }
   $auid=$_SESSION['auid'];
$data = 'SELECT * FROM `author` WHERE `auid` = "'.$auid.'"'; 
  $query = mysqli_query($db,$data) or die("Couldn't execute query. ". mysql_error()); 
  $data2 = mysqli_fetch_array($query,MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- header section -->

<?php include("../header1.php");?>

<?php include("navbar.php");?>
     
 <div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="upload.php">Upload</a></li>
                        <li class="active">Camera Ready</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<body style="font-size:16px">
<br><br><br>


<div class="container">

<div class="well well-lg">
<form action="cameraready.php" method="post"  enctype="multipart/form-data">
 <p style="font-size:16px"><label class="cols-sm-2 control-label"style="font-size:16px">Paper ID:
            </label>
  <?php $p=$_SESSION['papid']; 
  $query ="SELECT paperid FROM papers WHERE pid='$p'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
$paper=$row['paperid'];
}	
  echo $paper;
  ?></p><?php
			
			$_SESSION['sini']=$p;
			?>
			 <div class="form-group" style="font-size:16px">
            <label style="font-size:16px" for="Description" class="cols-sm-2 control-label">Transaction ID</label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-book fa" aria-hidden="true">
                  </i>
                </span>
                <input style="font-size:16px" type="text" class="form-control input-lg" name="tid" id=""  placeholder="Transaction ID"/>
              </div>
            </div>
          </div>
 <div class="form-group" style="font-size:16px">
            <label style="font-size:16px" for="Description" class="cols-sm-2 control-label">Title
            </label>
            <div class="cols-sm-10">
              <div class="input-group">
                <span class="input-group-addon">
                  <i class="fa fa-book fa" aria-hidden="true">
                  </i>
                </span>
                <input style="font-size:16px" type="text" class="form-control input-lg" name="ptitle" id=""  placeholder="Title"/>
              </div>
            </div>
          </div>
	<div class="form-group">
															<label for="benefits" style="font-size:16px">Abstract</label>
															<textarea style="font-size: 16px  ;"onkeyup="textCounter(this,'counter1',1500);" id="message1" name="abstract"  class="form-control" rows="9" cols="25" required="required"
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
      <input id="email" type="email" class="form-control" value=' <?php echo $data2["auemail"];?>' name="a1email" placeholder="Email">
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
 </div>

 
							
	-->					
 
  <div style="font-size:16px" class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Copyright Document
            </label>
            </p>
          <div class="cols-sm-10">
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
              <input type="file" name="file" />
            </div>
          </div>
          </div>
  <div style="font-size:16px" class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Final Draft 
            </label>
            </p>
          <div class="cols-sm-10">
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
            <input type="file" name="file1" />
            </div>
          </div>
          </div>
    <?php
	
/*//echo "$pid";
	$sql= "SELECT cid,name,email,affiliation FROM coauthors WHERE pid=$p ";
          $result=mysqli_query($db,$sql);
          echo "<div class=container><div class=row>	<div>";
          echo "<table  > <tr class=active><th>Name</th><th>Email</th><th>Affiliation</th>
          </tr>";
          while($record=mysqli_fetch_array($result))
		  {
         	 
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
?>	
   <!-- <div class="form-group ">
							<input type="file" class="btn  btn-lg btn-primary" name="fileToUpload" id="fileToUpload">
							
	</div><br>
	-->
	<!--<div class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Upload Copyright   
            </label>( Only .doc, .docx formats allowed to a max size of .)
            </p>
          <div class="cols-sm-10">
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
              <input type="file"  name="copyright" size="512000"/>
              <!-- rename it 
            </div>
          </div>
          </div>
		  <div class="form-group">
            <label for="Description" class="cols-sm-2 control-label">Upload Final Paper   
            </label>( Only .doc, .docx formats allowed to a max size of .)
            </p>
          <div class="cols-sm-10">
            <div class="btn btn-default file-preview-input"> 
              <span class="glyphicon glyphicon-folder-open">
              </span> 
              <span class="file-preview-input-title">Browse
              </span>
              <input type="file"  name="pfinal" size="512000"/>
              <!-- rename it 
            </div>
          </div>
          </div>--> 
		   <label class="cols-sm-2 control-label">Co-authors:
            </label> 
		   <div class="table-responsive">  
                    <div id="live_data"></div>                 
                </div>  
	<div class="form-group">
                  <input type="submit" name="sform" value="Upload" class="btn btn-info btn-block login"  value="Upload">
                </div></form>
	


		


 </div>
 </div>	
  <?php include("../footer.php");?>	
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
</body>
</html>
