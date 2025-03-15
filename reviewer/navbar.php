<div class="header">
        <div class="container-fluid"  style="background-color:white">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  style="width:100%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span><span style="background-color:black" class="icon-bar"></span></button>
            </div>
			
			
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="home.php" class="active">Home</a></li>
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Papers<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="waiting.php">Waiting for Review</a></li>
                                <li><a href="history.php">Review History</a></li>
                            </ul>
                    </li>
					<li><a href="download.php" >Download Certificate</a></li>
				
					
                </ul>
				   
                <ul class="nav navbar-nav navbar-right">	  
					<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['salutation'];?> &nbsp <?php echo $_SESSION['rname']; ?><b class="caret"></b></a>
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
   