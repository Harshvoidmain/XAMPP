<!--Author Navbar
@author: sinimol
-->
<div class="header">
        <div class="container-fluid"  style="background-color:white">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  style="width:100%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
				<li ><a href="home.php" class="active">Home</a></li>
        <li ><a href="http://tiny.cc/icnteposter2021" class="active">Poster Submission</a></li>
				    <!-- Disabled as submission date is over -->
                    <!--<li><a href="upload.php" class="active">Upload</a></li>-->
					<!--<li> <a href="withdraw.php" >Withdraw/Update</a>-->
                        
                    </li>
					
                   </ul>
                 <ul class="nav navbar-nav navbar-right">
<li><a href="paper.php" >My Papers</a></li>
            <!--   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-tasks">
                </span>My Papers
              </a>
             <div class="dropdown-menu" style="width:700px;">
                <div class="panel panel-info">
                  <div class="panel-heading">
                    <div style="font-size:20px" class="row">
                      <div  class="col-md-3">PID
                      </div>
                      <div class="col-md-3">Track  
                      </div>
                      <div class="col-md-3">Session 
                      </div>
                      <div class="col-md-3">Overall Status
                      </div>
                    </div>
                  </div>
                  <div class="panel-body">
                    <?php/*
$uid=$_SESSION['auid'];
//  $paperstatus="SELECT tracks.trackname FROM tracks,papers WHERE tracks.tid = papers.trackid";
//     $r=mysqli_query($db,$paperstatus);
$sql= "SELECT paperid,trackid,sessionid,pstatus,pcameraready FROM papers WHERE auid='$uid'";
$result=mysqli_query($db,$sql);
echo "";
while($record=mysqli_fetch_array($result))
{
$pid=$record["paperid"];
 
$trackid=$record["trackid"];
$sessionid=$record["sessionid"];
$pstatus=$record["pstatus"];
$pcamera=$record["pcameraready"];
echo "<div style='font-size:20px' class='col-md-3'>$pid</div>";
$query ="SELECT trackname FROM tracks WHERE tid='$trackid'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo"<div style='font-size:20px' class='col-md-3'>$row[trackname]</div>";
}
$query ="SELECT sname FROM sessions WHERE sid='$sessionid'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
echo"<div style='font-size:20px' class='col-md-3'>$row[sname]</div>";
}
echo
"<div style='font-size:20px' class='row'>
<div class='col-md-3'>$pstatus</div>";
if($pcamera=="YES")
{
	
$query ="SELECT pid FROM papers WHERE paperid='$pid'";
$results=mysqli_query($db,$query);
while($row=mysqli_fetch_array($results))
{
$paper=$row['pid'];
}	
	 $_SESSION['paperid1']=$paper;
echo "<div class='col-md-3'><a href='cameraready.php' class='btn btn-info' role='button'>Upload Camera <br>Ready Paper</a></div>";
}
echo "</div><br>";
}*/
?>
                  </div>
                </div>
              </div>
            </li>

                   

                <!--    <li ><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['auname']; ?></a></li>
		   -->
<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['auname']; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php">Update Profile</a></li>
                                <li><a href="password.php">Change Password</a></li>
                            </ul>
                        </li>
                                     
                    <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
               
                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
    
</div>
   