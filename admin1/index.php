<?php
   session_start();
   //connect to database
   require "../connection.php";
     
	 if(isset($_POST['alogin_btn']))
   {
	   $oemail=mysqli_real_escape_string($db,$_POST['oid']);
       $opwd=mysqli_real_escape_string($db,$_POST['opwd']);
       $sql="SELECT * FROM overall_admin WHERE oemail='$oemail' AND opwd='$opwd'";
       $result1=mysqli_query($db,$sql);
	   $row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
       $count = mysqli_num_rows($result1);
       if($count == 1)
       {	 	
            $id=$row["oid"];
            $_SESSION["id"]=$id;
			header("location:./oadmin/overall_home.php");
		}   	
      else
      {
   		header("location:index.php?combo=wrong");
      }
   }
	   
   if(isset($_POST['talogin_btn']))
   {
	   $id=mysqli_real_escape_string($db,$_POST['id']);
       $pwd=mysqli_real_escape_string($db,$_POST['pwd']);
       $sql="SELECT * FROM track_admin WHERE tausername='$id' AND tapwd='$pwd'";
       $result=mysqli_query($db,$sql);
	   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $count = mysqli_num_rows($result);
       if($count == 1)
       {	 	
            $id=$row["tadept"];
            $_SESSION["id"]=$id;
			header("location:./tadmin/tadmin.php");
		}   	
      else
      {
   		header("location:index.php?combo=wrong");
      }
   }   
?>

<!DOCTYPE html>
<html lang="en">
   
<!-- header section end -->
<?php include '../head1.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- banner start -->
<!--  page header section -->
<div class="banner">
    <div class="">
        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">
            <div class="row" style="padding:0 !important;">
                <div class="col-md-12" style="padding:0 !important;">

                    <ol class="breadcrumb">
                        <li><a href="../index.php">Home</a></li>
                        <li class="active">Portals</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--banner start-->
<div class="container">
  <div class="col-md-6" style="height:500px;margin-left:px;margin-top:30px;border-right:1px solid lightskyblue;">
    <div style="vertical-align:middle;width:380px;margin:auto;">
      	  
 <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('alogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
         Admin Login
        </div>
        <div class="bimg">
          <img src="../images/rvwr.png" alt="FCRIT" height="90%" width="100%" margin-bottom="0" />        </div>
      </div></a>
	 
	 <a href="javascript::" onclick="document.getElementById('activediv').innerHTML=document.getElementById('talogin').innerHTML;">
      <div class="loginbtn">
        <div class="btxt">
         Track Admin Login
        </div>
        <div class="bimg">
          <img src="../images/admn.png" alt="FCRIT" height="90%" width="100%" margin-bottom="0" />        </div>
      </div></a>
    </div>
  </div>
  <div class="col-md-6" style="height:500px;display:table;margin-top:10px;" id="activediv">
    <!--respective login-->
    
           
            
           

</div></div>

<div style="display:none;" id="alogin">
<div class="login-container">
            <div id="output"></div>
            <div class="avatar">
                <img src="../images/rvwr.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="index.php">
                    <input name="oid" type="text" placeholder="UserEmail">
                    <input name="opwd" type="password" placeholder="Password">
                    <button class="btn btn-info btn-block login" type="submit" name="alogin_btn">Login</button>
                </form>
            </div>
        </div>
 
</div>

<div style="display:none;" id="talogin">
     <?php if(!empty($_GET['combo'])){
          echo '<div class="panel panel-danger" id="close6">
      <div class="panel-heading" style="font-size:16px">Incorrect E-mail and password combination<button type="button" class="close" data-target="#close6" data-dismiss="alert">
                            <span class="pull-right" aria-hidden="true">&times;</span>
                        </button></div>
    </div>';
   }
   ?>
  <div class="login-container">
            <div class="avatar">
                <img src="../images/admn.png" alt="FCRIT" height="100%" width="100%" />            </div>
            <div class="form-box">
                <form method="post" action="index.php">
                    <input name="id" type="text" placeholder="Username">
                    <input name="pwd" type="password" placeholder="password">
                    <button class="btn btn-info btn-block login" type="submit" name="talogin_btn">Login</button>
                </form>
            </div>
        </div>
</div>
<!--banner end-->
<!-- banner end -->

<!--  footer section -->

<!--  footer section ending -->
<!-- sub-footer -->
<?php include '../foot.php'; ?>
<!-- sub-footer ending -->

</body>
</html>
