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
        <?php echo $this->Html->css(array('bootstrap', 'sstyle', 'helper', 'pe-icon-line', 'font-awesome.min', 'owl.carousel', 'owl.theme','bootstrap.vertical-tabs')); ?>


        <!-- Include js plugin -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
              <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
        <!--[if IE 9]>
       <link href="css/ie.css" rel="stylesheet">
    <![endif]-->
        <!--[if IE 10]>
           <link href="css/ie.css" rel="stylesheet">
        <![endif]-->
        <!--[if IE 11]>
           <link href="css/ie.css" rel="stylesheet">
        <![endif]-->
        <script>
//$(document).ready(function() {
//
//  var owl = $("#owl-demo");
//
//  owl.owlCarousel({
//      navigation :false,
//      items : 10, //10 items above 1000px browser width
//      itemsDesktop : [1000,5], //5 items between 1000px and 901px
//      itemsDesktopSmall : [900,3], // betweem 900px and 601px
//      itemsTablet: [600,2], //2 items between 600 and 0
//      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
//      autoPlay : false,
//  });
//
//  // Custom Navigation Events
//  $(".next").click(function(){
//    owl.trigger('owl.next');
//  })
//  $(".prev").click(function(){
//    owl.trigger('owl.prev');
//  })
//  $(".play").click(function(){
//    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
//  })
//  $(".stop").click(function(){
//    owl.trigger('owl.stop');
//  })
//
//});
</script>
        <style>
            .header-top{
                width:100%;
            }
            .header-top img{
                width: 70px;
                margin-left: 20px;
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
        </style>
    </head>
    <!-- header section -->

    <div class="header" style=";position: relative; height:150px;">

      <?php echo $this->html->image('bck.jpg' , array('height' => '100%' , 'width' => '100%' )); ?>

        <div class="container">
            <div class="header-top " style="position:absolute;top:5px;left:0;height:150px;">
              <div class="col-md-2">  
                <div class="" style="font-family:'Cinzel', serif;color: #555;height:100%;float:left;font-size:60px;padding:12px;">
                    <span style="vertical-align:text-bottom;">ICNTE</span>
                </div>
                   <span style="font-family:'Cinzel', serif; color: #555;   vertical-align:central;height:100%;float:left;font-size:60px;padding-left:16%;padding-right:50%;padding-top:15px;padding-bottom: 20px;">2019</span>
                 </div>
                
                <div class="" style="margin:0;padding:0;">
                <div class="title visible-lg" style="float: left; display:inline-block;text-transform: none; margin-top: 25px" >
                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-size:23px;font-weight:900;"> 3rd Biennial International Conference on Nascent Technologies in Engineering </p>
<!--                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-size:20px;font-weight:800;"> An IEEE Technically Co-Sponsored Conference </p>-->
                        <p style="text-align: left;margin:0px;word-spacing: 2px;font-weight:600;">Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</p>
                    <p style="text-align: left;margin:0px;word-spacing: 2px;font-weight:600;">     January 04-05, 2019  </p>
                </div>
                <div class="title visible-md " style="float: left; display:inline-block;" >
<!--                    <p style="text-align: left;margin:0px;word-spacing: 2px;"> An IEEE Technically Co-Sponsored Conference </p>-->
                    <a href="<?php echo $this->Html->url('/'); ?>" class="activet" style="color:; text-decoration: none;"> Fr. C. Rodrigues Institute of Technology, Vashi, Navi Mumbai, India</a>
                </div>

                <!--div class="title2 visible-xs" style="float: left; display:inline-block " >
                    <a href="<?php echo $this->Html->url('/'); ?>" class="activet" style="color:; text-decoration: none">F.C.R.I.T</a>
                </div-->
                <div style="float:left;display: inline-block;">
                   
                </div>
                <div class="title visible-sm" style="float: left; display:inline-block; font-size: 25px;" >
                    <a href="<?php echo $this->Html->url('/'); ?>" class="activet" style="color:white; text-decoration: none">FR. C. RODRIGUES INSTITUTE OF TECHNOLOGY</a>
                </div>
              </div>

            </div>

    </div>


<!--    <div class="main-text  visible-lg" style="float:right;margin-left:900px">
        <div class="text-center" >

            <div  style="padding-left:70px;margin-top:60px;">
                <a class="btn btn-clear btn-sm btn-min-block " style="margin-bottom:5px"
                    href="#">Contact-us</a><a class="btn btn-clear btn-sm btn-min-block"  href="<?php echo $this->Html->url('/redirectportal'); ?>">Login</a></div>
        </div>
  </div>-->

<!--  <div class="main-text  visible-xs visible-sm" style="float:right;margin-left:100px;">
      <div class="text-center" >

          <div  style="padding-left:0px;margin-top:0px;margin-left: 125px;padding: 0px;">
                <a class="btn btn-clear btn-sm btn-min-block" style="margin-bottom:5px;"
                    href="#">Contact-us</a><a class="btn btn-clear btn-sm btn-min-block"  href="<?php echo $this->Html->url('/redirectportal'); ?>">Login</a></div>
        </div>
</div>-->

<div class="main-text  visible-md" style="float:right;margin-left:650px;">
    <div class="text-center" style="padding-left:100px;margin-top:50px">

        <div  style="padding-left:70px;margin-top:60px;">
                <a class="btn btn-clear btn-sm btn-min-block" style="margin-bottom:5px"
                    href="#">Contact-us</a><a class="btn btn-clear btn-sm btn-min-block"  href="<?php echo $this->Html->url('/redirectportal'); ?>">Login</a></div>
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
                    <li><a href="<?php echo $this->Html->url('/'); ?>" class="active">Home</a></li>
                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Call For Papers<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/tracks_and_sessions'); ?>">Tracks and Sessions</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"> <a href="<?php echo $this->Html->url('#'); ?>" class="dropdown-toggle" data-toggle="dropdown">Conference Details<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/ConferenceDetails/important_dates'); ?>">Important Dates</a></li>
                            <li><a href="<?php echo $this->Html->url('/ConferenceDetails/venue'); ?>">Venue</a></li>
                            <li><a href="<?php echo $this->Html->url('/ConferenceDetails/publications'); ?>">Publications</a></li>
                            <li><a href="<?php echo $this->Html->url('/ConferenceDetails/instructions'); ?>">Instructions</a></li>

                        </ul>
                    </li>


                    <li class="dropdown"> <a href="<?php echo $this->Html->url('#'); ?>" class="dropdown-toggle" data-toggle="dropdown">People<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/people/advisory_committee'); ?>">Advisory Committe</a></li>
                            <li><a href="<?php echo $this->Html->url('/people/organizing_committee'); ?>">Organizing Committee</a></li>
                            
                              <li><a href="<?php echo $this->Html->url('/people/reviewers_panel'); ?>">Reviewers Panel</a></li>
                              <li><a href="<?php echo $this->Html->url('/people/keynote_speakers'); ?>">Keynote Speakers</a></li>

                        </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Registration <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/Registration/fees'); ?>">Registration Fees</a></li>
                            <li><a href="<?php echo $this->Html->url('#'); ?>">Online Registration</a></li>
                            <li><a href="<?php echo $this->Html->url('/Registration/instructions'); ?>">Instructions</a></li>

                        </ul>
                    </li>
                    <li class="dropdown"> <a href="<?php echo $this->Html->url('/about-us'); ?>" class="dropdown-toggle" data-toggle="dropdown">Archives<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/Archives/icnte2017/'); ?>">ICNTE 2017</a></li>
                            <li><a href="<?php echo $this->Html->url('/Archives/icnte2015/'); ?>">ICNTE 2015</a></li>
                           </ul>
                    </li>


                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Partners<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                         <li><a href="<?php echo $this->Html->url('/technical_partner'); ?>">Technical </a></li>
                         <li><a href="<?php echo $this->Html->url('/financial_partner'); ?>">Financial </a></li>

                        </ul>
                    </li>

                    <li class="dropdown" style="margin-left:130px;"> <a href="<?php echo $this->Html->url('/contact_us'); ?>" ><span class="glyphicon glyphicon-globe"></span>Contact-Us</a>
                        
                    </li>
                    
                     <li class="dropdown" style="margin-left:5px"> <a href="<?php echo $this->Html->url('/redirectportal'); ?>" ><span class="glyphicon glyphicon-log-in"></span>Login</a>
                        
                    </li>
                    
               
                </ul>

            </div>
            <!-- /.navbar-collapse -->

        </div>
    </nav>
</div>
<!-- header section end -->

<!-- banner start -->
<?php
echo $this->Session->flash();
echo $content_for_layout;
?>
<!-- banner end -->

<!--  footer section -->

<!--  footer section ending -->
<!-- sub-footer -->
<div class="sub-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <p>© 2014 FCRIT, Vashi. All rights reserved.</p>
            </div>
            <div class="col-md-1-and-half">
                <a href="#"><i class="fa fa-facebook-square"></i></a>
                <a href="#"><i class="fa fa-twitter-square"></i></a>
                <a href="#"><i class="fa fa-flickr"></i></a>
                <a href="#"><i class="fa fa-youtube-square"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- sub-footer ending -->
<!-- section -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo $this->Html->script(array('jquery-1.9.1.min', 'bootstrap','owl.carousel', 'scripts','jquery.carouFredSel-6.2.1-packed','jquery.carouFredSel-6.2.1','pdfobject.js', 'http://code.highcharts.com/highcharts.js', 'https://code.highcharts.com/modules/drilldown.js','http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js','jquery.bootstrap.newsbox.min')); ?>
<!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
