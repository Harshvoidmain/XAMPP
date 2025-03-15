<!DOCTYPE html>

<html lang="en">

<?php include 'header.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
  // Configure/customize these variables.
  var showChar = 1500; // How many characters are shown by default
  var ellipsestext = ".......";
  var moretext = "Show more >";
  var lesstext = "Show less";

  $(".more").each(function() {
    var content = $(this).html();

    if (content.length > showChar) {
      var c = content.substr(0, showChar);
      var h = content.substr(showChar, content.length - showChar);

      var html =
          c +
          '<span class="moreellipses">' +
          ellipsestext +
          '&nbsp;</span><span class="morecontent"><span>' +
          h +
          '</span>&nbsp;&nbsp;<a href="" class="morelink">' +
          moretext +
          "</a></span>";

      $(this).html(html);
    }
  });

  $(".morelink").click(function() {
    if ($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this)
      .parent()
      .prev()
      .toggle();
    $(this)
      .prev()
      .toggle();
    return false;
  });
});

</script>
        <style>

    .row > .column {

        padding: 0 8px;

    }



    .row:after {

        content: "";

        display: table;

        clear: both;

    }



    .column {

        float: left;

        width: 25%;

		height:260px;

		margin-bottom:15px

    }



		.column img{

			height:100%;

			width:100%;

		}

		

    /* The Modal (background) */

    .modal {

        display: none;

        position: fixed;

        z-index: 1;

        padding-top: 100px;

        left: 0;

        top: 0;

        width: 100%;

        height: 100%;



        background: rgba(25,25,25,0.95);

    }



    /* Modal Content */

    .modal-content {

        position: relative;

        background-color: #fefefe;

        margin: auto;

        padding: 0;

        width: 70%;

        max-width: 1200px;

    }



    /* The Close Button */

    .close {

        color: white;

        position: absolute;

        top: 10px;

        right: 25px;

        font-size: 35px;

        font-weight: bold;

    }



    .close:hover,

    .close:focus {

        color: #999;

        text-decoration: none;

        cursor: pointer;

    }



    .mySlides {

        display: none;

    }



    /* Next & previous buttons */

    .prev,

    .next {

        cursor: pointer;

        position: absolute;

        top: 50%;

        width: auto;

        padding: 16px;

        margin-top: -50px;

        color: white;

        font-weight: bold;

        font-size: 20px;

        transition: 0.6s ease;

        border-radius: 0 3px 3px 0;

        user-select: none;

        -webkit-user-select: none;

    }



    /* Position the "next button" to the right */

    .next {

        right: 0;

        border-radius: 3px 0 0 3px;

    }



    /* On hover, add a black background color with a little bit see-through */

    .prev:hover,

    .next:hover {

        background-color: rgba(0, 0, 0, 0.8);

    }



    /* Number text (1/3 etc) */

    .numbertext {

        color: #f2f2f2;

        font-size: 12px;

        padding: 8px 12px;

        position: absolute;

        top: 0;

    }



    .caption-container {

        text-align: center;

        background-color: black;

        padding: 2px 16px;

        color: white;

    }



    img.demo {

        opacity: 0.6;

    }



    .active,

    .demo:hover {

        opacity: 1;

    }



    img.hover-shadow {

        transition: 0.3s

    }



    .hover-shadow:hover {

        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)

    }

.morecontent span {
    display: none;
}
.morelink {
    display: block;
}

</style>

<div class="banner">

    <div class="">

        <div class="" style="margin-left:0 !important;padding:0 !important;margin-right:0 !important;">

            <div class="row" style="padding:0 !important;">

                <div class="col-md-12" style="padding:0 !important;">



                    <ol class="breadcrumb">

                        <li><a href="./index.php">Home</a></li>

                        <li><a href="javascript::">Archives</a></li>

                        <li class="active">ICNTE 2015</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <h2 style="text-align:center;">ICNTE 2015</h2>

    <hr class="style17">

</div>

<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
<span class="more">
    In order to impart high quality technical education and to expose the young faculty members to R&D, Fr. C. Rodrigues Institute of Technology, Vashi (India) organized its first IEEE technically cosponsored International Conference on Nascent Technologies in Engineering (ICNTE-2015) on January 9-10, 2015, in which faculty, scientists, R&D personnel, practicing engineers, and students from leading institutions and engineering colleges presented papers in their respective fields.  With an objective to motivate researchers in each of the engineering fields, the certificates of excellence were awarded to the best papers. The Conference received a wide response of more than 200 papers from authors. The papers were reviewed by the experts from the eminent technical institutes, industries, and research centres like IIT, BARC, TCS, etc. The final acceptance of papers was based on the reviewers’ suggestions which were based mainly on the relevance of the topic and quality of the manuscript. Out of the presented 95 papers, 42 papers were published in IEEE Xplore and 53 papers were published in ICNTE - IJERT conference proceedings.

<br><br>



The Computer and Information Technology track received papers in grid computing, advanced networking, data mining, biometric technologies, social networks and social aspects of Information Technology. The papers received in Mechanical track were mainly in the areas of robotics and mechatronics, advances in manufacturing technology, modelling and simulation of mechanical systems, recent trends in refrigeration and air conditioning, energy conservation and alternative fuels and advances in vibration control and its techniques. The contributions from authors of  Electrical  track include research areas like power generation, transmission, and distribution,  energy management and energy efficiency, applications of power electronics and solid state  devices, renewable energy technology, distributed generation and micro grid, drives, controls, and automation, and power quality. The Electronics and Telecommunication track received good response in the fields of wired and wireless communication, advanced communications, digital signal processing and its applications, optical and microwave communication, embedded and VLSI technology, microelectronics and nanotechnology, antenna applications, and solid state devices.

<br><br>

The inaugural ceremony of ICNTE 2015 featured several illustrious luminaries from the academic arena: Padmashree Dr. P.V.S. Rao, Adviser, TCS, Mumbai, Dr. S. V Kota Reddy Academic President, Manipal University, Dubai, Dr. B. Satyanarayana, TIFR, Mumbai, and Dr. Sureshchandra Gupta, Vise Chairman CSI, Mumbai. The Chief  Guest, Dr. Arun Nigavekar, Sr. Advisor and Trustee, Science and Technology Park, University of Pune,  emphasized   the need  for a change  in our  educational focus   from  mere content based learning to talent based learning  where students are encouraged  not only understand  the basic  and  advanced  concepts   of engineering but  also to apply them  for developing  new, useful technologies. The keynote speech by  Dr. Subhasis Chaudhuri  centred on bringing  out a  completely new perspective  of image processing based surveillance  where  algorithms   evolve  from various social scenarios  with  a new  dimension as 2.5 D. The Principal, Dr. Rollin Fernandes, gave the welcome   address and the M.D. Rev Fr. Saturnino Almeida in his speech, commended the efforts of the organizers. The event saw the presence of 160 delegates. The function ended with the vote of thanks delivered by the Conference Chair Dr. K.T. V. Reddy.




</span>
</div>

<div class="row">



    <div class="column">

        <img src="./images/15a.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >

    </div>

    <div class="column">

        <img src="./images/15b.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(2)" class="hover-shadow" >

    </div>

    <div class="column">

        <img src="./icnte/images/15c.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(3)" class="hover-shadow" >

    </div>

    <div class="column">

        <img src="./icnte/images/15d.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(4)" class="hover-shadow" >

    </div>

    <div class="column">

        <img src="./icnte/images/15e.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(5)" class="hover-shadow" >

    </div>

	<div class="column">

        <img src="./icnte/images/15f.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(6)" class="hover-shadow" >

    </div>

	<div class="column">

        <img src="./icnte/images/15g.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(7)" class="hover-shadow" >

    </div>

	<div class="column">

        <img src="./icnte/images/15h.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(8)" class="hover-shadow" >

    </div>

</div>



<div id="myModal" class="modal" >

    <span class="close cursor" onclick="closeModal()">&times;</span>

    <div class="modal-content">



        <div class="mySlides">

            <div class="numbertext">1 / 8</div>

            <img src="./icnte/images/15a.jpg" style="width:100%">

        </div>



        <div class="mySlides">

            <div class="numbertext">2 / 8</div>

            <img src="./images/15b.jpg" style="width:100%">

        </div>



        <div class="mySlides">

            <div class="numbertext">3 / 8</div>

            <img src="./images/15c.jpg" style="width:100%">

        </div>



        <div class="mySlides">

            <div class="numbertext">4 / 8</div>

            <img src="./images/15d.jpg" style="width:100%">

        </div>



        <div class="mySlides">

            <div class="numbertext">5 / 8</div>

            <img src="./images/15e.jpg" style="width:100%">

        </div>

		

		<div class="mySlides">

            <div class="numbertext">6 / 8</div>

            <img src="./images/15f.jpg" style="width:100%">

        </div>

		

		<div class="mySlides">

            <div class="numbertext">7 / 8</div>

            <img src="./images/15g.jpg" style="width:100%">

        </div>

		

		<div class="mySlides">

            <div class="numbertext">8 / 8</div>

            <img src="./images/15h.jpg" style="width:100%">

        </div>



        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

        <a class="next" onclick="plusSlides(1)">&#10095;</a>



        <div class="caption-container">

            <p id="caption"></p>

        </div>





    </div>

</div>

<script>

    function openModal() {

        document.getElementById('myModal').style.display = "block";

    }



    function closeModal() {

        document.getElementById('myModal').style.display = "none";

    }



    var slideIndex = 1;

    showSlides(slideIndex);



    function plusSlides(n) {

        showSlides(slideIndex += n);

    }



    function currentSlide(n) {

        showSlides(slideIndex = n);

    }



    function showSlides(n) {

        var i;

        var slides = document.getElementsByClassName("mySlides");

        var dots = document.getElementsByClassName("demo");

        var captionText = document.getElementById("caption");

        if (n > slides.length) {

            slideIndex = 1

        }

        if (n < 1) {

            slideIndex = slides.length

        }

        for (i = 0; i < slides.length; i++) {

            slides[i].style.display = "none";

        }

        for (i = 0; i < dots.length; i++) {

            dots[i].className = dots[i].className.replace(" active", "");

        }

        slides[slideIndex - 1].style.display = "block";

        dots[slideIndex - 1].className += " active";

        captionText.innerHTML = dots[slideIndex - 1].alt;

    }

</script> 

  

  	    <?php include 'footer.php'; ?>

</html>