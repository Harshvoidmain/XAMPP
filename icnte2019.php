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

                        <li class="active">ICNTE 2019</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <h2 style="text-align:center;">ICNTE 2019</h2>

    <hr class="style17">

    <div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
      <span class="more">
        The 3rd IEEE Technically Co-Sponsored Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2019) was held on January 4-5, 2019 . The conference had technical support from IEI, IETE, and CSI. The major financial sponsors of this Conference were Jamboree, FRAMES, IETE, IEI, and NETZSCH. The conference was dignified by the presence of Dr. Rakesh Kumar, Director, National Environmental Engineering Research Institute (NEERI) as the Chief Guest, Dr. K.T. V. Reddy, President IETE, Delhi, as the Guest of Honour, Keynote speakers Dr. Nathani Basavaiah, Professor, Indian Institute of Geomagnetism and Dr. Sheldon Williamson, University of Ontario, Canada. Out of 181 papers received, 124 papers were selected for presenting in the Conference and were published in IEEE explore. Additionally IEI-FCRIT excellence award was also constituted as a part of the conference for recognising and appreciating the excellence of Students, Academicians and Industry persons in their respective domains.

      <br><br>

      </span>

      <hr class="style17">

      <!-- <p style="text-align:centre;">          Please click below link for ICNTE-2019 Photos</p>
      <li style="text-align:centre;"><a href="../download/ICNTE Photos" target="_blank">ICNTE 2019 Photos</a></li> -->

    </div>

    <div class="row">

  <div class="column">

      <img src="./images/19a.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/19b.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(2)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/19c.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(3)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/19d.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(4)" class="hover-shadow" >

  </div>

     <div class="column">

      <img src="./images/19e.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(5)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/19f.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(6)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/19a.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(7)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/19b.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(8)" class="hover-shadow" >

  </div>

</div>



<div id="myModal" class="modal">

  <span class="close cursor" onclick="closeModal()">&times;</span>

  <div class="modal-content">



    <div class="mySlides">

      <div class="numbertext">1 / 8</div>

        <img src="./images/19a.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">2 / 8</div>

        <img src="./images/19b.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">3 / 8</div>

        <img src="./images/19c.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">4 / 8</div>

        <img src="./images/19d.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">5 / 8</div>

        <img src="./images/19e.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">6 / 8</div>

        <img src="./images/19f.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">7 / 8</div>

        <img src="./images/19a.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">8 / 8</div>

        <img src="./images/19b.jpg" style="width:100%">

    </div>



    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>

    <a class="next" onclick="plusSlides(1)">&#10095;</a>



    <div class="caption-container">

      <p id="caption"></p>

    </div>



    

  </div>

    
	
	
	
	<!--<script>                                            
    window.location ="https://fcrit-my.sharepoint.com/personal/niteshyelve_fcrit_ac_in/Documents/Forms/All.aspx?slrid=35ceb59e-d0a6-0000-1b43-c4f39a667116&RootFolder=%2Fpersonal%2Fniteshyelve_fcrit_ac_in%2FDocuments%2FICNTE%20Photos&FolderCTID=0x01200079837E1B1EC446468FD15B1868ADE008";
    </script>-->
	 
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