<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="ICNTE">
        <title>ICNTE</title>
        <!-- Bootstrap -->
        <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="../../css/sstyle.css" />
	<link rel="stylesheet" type="text/css" href="../../css/helper.css" />
	<link rel="stylesheet" type="text/css" href="../../css/pe-icon-line.css" />
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../../css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="../../css/owl.theme.css" />
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.vertical-tabs.css" />
<style>

.nav-tabs > li > a:hover  
  {        border-color: #5672af #5672af #5672af;   
  background-color: solid #5672af;
   }   
    .nav > li > a:hover, .nav > li > a:focus    
    {    text-decoration: none;    
        border-bottom: 5px solid #5672af;
        background-color: solid #5672af;
    }           


    .dropdown-menu    
    {               border: 1px solid #5672af;   
    }           

    .dropdown-submenu
    {               position: relative;   
    }           
      
    .dropdown-submenu .dropdown-menu            
    {               top: 0;             
        left: 100%;             
        margin-top: -1px;               
        border: 1px solid #5672af;          
    }            
    .header-top{               
     width:100%;            
 } 
    .header-top{
     width:100%;
 }

            .header-top img{

                width: 120px;

                margin-left: 35px;

            }

            .header-top .title{

                line-height: 28px;

                margin-top: 34px;



                font-size: 30px;

                word-spacing: 12px;



                margin-left: 40px;

                float: left;

                font-family: 'Dosis', sans-serif;

                text-transform: capitalize;

                text-align: center;



            }

            .header-top .title2{

                line-height: 28px;

                margin-top: 40px;



                font-size: 35px;

                word-spacing: 12px;



                margin-left: 30px;

                float: left;

                font-family: 'Dosis', sans-serif;

                text-transform: capitalize;

                text-align: center;







            }

        

        }

        .med-img img {

        height:100%;

    }

  @media (min-width:1700px) {

    .med-img img {

      width: 1200px;

      height:450px;

    }

  }

  .morecontent span {

    display: none;

    }

.morelink {

    display: block;

    color: #74C5FC;

}

 .agenda {  }

    th,td {

        padding: 15px !important;

    }

    /* Dates */

    .agenda .agenda-date { width: 300px; }

    .agenda .agenda-date .dayofmonth {

        width: 40px;

        font-size: 45px;

        line-height: 36px;

        float: left;

        text-align: right;

        margin-right: 10px; 

    }

    .agenda .agenda-date .shortdate {

        font-size: 0.75em; 

    }





    /* Times */

    .agenda .agenda-time { width: 140px; } 





    /* Events */

    .agenda .agenda-events {  } 

    .agenda .agenda-events .agenda-event {  } 



    @media (max-width: 767px) {



    }

        </style>
				 <script>
		 function gSession(val)
      {
	
	var selected=[];
	$('#track-list :selected').each(function(i, sel){
		
     selected[$(this).val()]= $(sel).val();
	 //alert( $(sel).val() );
    });	
	var newArray = $.map( selected, function(v){
  return v === "" ? null : v;
});
		var jsonString = JSON.stringify(newArray);

		$.ajax({
          type: "POST",
          url: "get_session.php",
          data:'tid='+jsonString,
          success: function(data){
			  
			  $("#session-list") .html("<option> select session </option>");
            $("#session-list").append(data);
			
          }
        }
              );
      } 
		 
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
    </head>
    <!-- header section -->
    <div class="header" style=";position: relative; height:150px;">
      <img src="../../images/bck.jpg" height="100%" width="100%" alt="" />
        <div class="container">
            <div class="header-top " style="position:absolute;top:5px;left:0;height:150px;">
              <div class="col-md-2">  

                  

                <!--    <span style="vertical-align:text-bottom;">ICNTE</span>

                </div>

                   <span style="font-family:'Cinzel', serif; color: #555;   vertical-align:central;height:100%;float:left;font-size:60px;padding-left:16%;padding-right:50%;padding-top:15px;padding-bottom: 20px;">2019</span>
-->

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <img src="../../images/logo5.png" alt="Logo" height="140px" width="100%"  >
     
                 </div>



                <div class="" style="margin:0;padding:0;">


                <div class="title visible-lg" style="float: left; display:inline-block;text-transform: none; margin-top: 25px" >


                    <p style="text-align: center;margin:0px;word-spacing: 2px;font-size:23px;font-weight:900;"> 3rd Biennial International Conference on Nascent Technologies in Engineering </p>


                    <!--p style="text-align: left;margin:0px;word-spacing: 2px;font-size:20px;font-weight:800;"> An IEEE Technically Co-Sponsored Conference </p-->


                        <p style="text-align: center;margin:0px;word-spacing: 2px;font-weight:600;">Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</p>


                    <p style="text-align: center;margin:0px;word-spacing: 2px;font-weight:600;">     January 04-05, 2019  </p>


                </div>


                <div class="title visible-md " style="float: left; display:inline-block;" >


                    <p style="text-align: center;margin:0px;word-spacing: 2px;"> An IEEE Technically Co-Sponsored Conference </p>


                    <a href="/icnte/" class="activet" style="color:; text-decoration: none;"> Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</a>


                </div>





                <!--div class="title2 visible-xs" style="float: left; display:inline-block " >


                    <a href="/icnte/" class="activet" style="color:; text-decoration: none">F.C.R.I.T</a>


                </div-->


                <div style="float:left;display: inline-block;">


                   


                </div>


                <div class="title visible-sm" style="float: left; display:inline-block; font-size: 25px;" >


                    <a href="/icnte/" class="activet" style="color:white; text-decoration: none">FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a>


                </div>


              </div>





            </div>





    </div>


 </div>
    <div class="header">
        <div class="container-fluid"  style="background-color:white">



            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header"  style="width:100%;">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> <span style="background-color:black" class="icon-bar"></span> </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">                
                <ul class="nav navbar-nav">
                    <li><a href="tadmin.php" class="active">Home</a></li>
					
					        <li><a href="sendr.php"><span class="glyphicon glyphicon-send"></span> Send for Review</a></li>

		
		<li><a href="pending.php"><span class="glyphicon glyphicon-time"></span> Pending/Reassign</a></li>
		 
		<!-- <li><a href="reassign.php"><span class="glyphicon glyphicon-list-alt"></span>  Reassign</a></li>-->
		
		<li><a href="plagiarism.php"><span class="glyphicon glyphicon-check"></span> Plagiarism Check </a></li>
		 
		 
		<li><a href="overall.php"><span class="glyphicon glyphicon-check"></span> Overall Decision </a></li>

    	<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-pawn"></span>Plenary Session</a>
          <ul class="dropdown-menu">
            <li><a href="plenarysession1.php">Generate Plenary Session</a></li>
            <li><a href="plenarysession.php">Assign plenary Session</a></li>
            <li><a href="summary7.php">View Plenary Session</a></li>
          </ul>
        </li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-check"></span>Reports And Status</a>
          <ul class="dropdown-menu">
            <li><a href="status.php">Status</a></li>
            <li><a href="summary1.php">Track-Wise Paper Submission</a></li>
            <li><a href="summary2.php">Session-Wise Paper Submission</a></li>
            <li><a href="summary3.php">Accepted-Rejected Papers</a></li>
            <li><a href="summary4.php">Overall Review Summary</a></li>
            <li><a href="summary5.php">Overall Review Pending</a></li>
            <li><a href="summary8.php">Information For Souvenir</a></li>
          </ul>
        </li>
        
        	<li><a href="revreg.php"><span class="glyphicon glyphicon-user"></span>Add Reviewer</a></li>
    
           <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-check"></span>Send Email</a>
          <ul class="dropdown-menu">
            <li><a href="email.php">To Everyone</a></li>
            <li><a href="emailtospecfic.php">To Specific Paper</a></li>
            <li><a href="emailtoselect.php">To Accepted Paper</a></li>
          </ul>
        </li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><!-- <a href="#"><span class="glyphicon glyphicon-user"></span> Sign Out</a> -->
            <?php if(isset($_SESSION['id'])){ ?>
                  <a href="logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
                <?php }else{ ?>
                  <a href="index.php"><span class="glyphicon glyphicon-log-in"></span>Login</a>
                <?php } ?>
        </li>
      </ul>
					
        </div>
            <!-- /.navbar-collapse -->

        </div>
    </nav>
</div>
