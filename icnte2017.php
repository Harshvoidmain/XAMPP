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

                        <li class="active">ICNTE 2017</li>

                    </ol>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="row">

    <h2 style="text-align:center;">ICNTE 2017</h2>

    <hr class="style17">

</div>

<div class="container" style="padding-bottom: 40px;text-align: justify;padding-left: 80px;padding-right: 80px;">
<span class="more">
    Fr. C. Rodrigues Institute of Technology, Vashi, under the patronage of Rev. Fr. S. Almeida (Managing Director) and Rev. Dr. Ivon D’Almeida (Asst. Director), and leadership of Dr. S.M. Khot (Principal) and Dr. Nitesh P. Yelve (Conference Chair and Dean, PG Studies), organized its 2nd Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2017) in its campus on January 27-28, 2017. Fr. C. Rodrigues Institute of Technology was established in 1994 with the aim of providing quality technical education in addition to inculcating moral values in its students. Apart from academic excellence, the Institute is also reputed for its extensive facilities that have led to it being awarded an “A” grade by the Directorate of Technical Education, Maharashtra (INDIA) right from its inception. The Institute has, within a short span of time, established itself as a leading engineering college in the Mumbai University.  

<br><br>

	ICNTE 2017 was organized with the objective of bringing together practitioners in the forefront of technologies, from different parts of the world, to share their research findings. Similar to ICNTE 2015, this Conference was also technically cosponsored by IEEE and had technical support from ISTE, ISHRAE, CSI, and IETE. The major financial sponsors of this Conference were BRNS, TCS, CSIR, Jamboree Solutions, FRAMES, and San Instruments. The research papers were invited from a diverse variety of engineering fields segregated in 13 distinct Tracks. The Conference received a wide response of 322 papers from authors in India and abroad. The papers were reviewed by experts from eminent technical institutes, industries, and research centres like IIT, BARC, TCS, etc. The final acceptance had been based on the plagiarism count and reviewers’ suggestions which were based mainly on the relevance of topic and quality of manuscript. Out of 322 received papers, 114 papers had been selected for presenting in the Conference and have been sent to the IEEE Xplore for publication.  

<br><br>

	The Inaugural Function of ICNTE 2017 was graced by the august presence of Prof. Sandip Trivedi, Director (Tata Institute of Fundamental Research) as the Chief Guest, Dr. J.N. Tiwari, Former Executive Director (OCL INDIA) as the Guest of Honour and Key Note Speaker, Dr. S.K. Ukarande,  Former Dean (FOT, Mumbai University), and Dr. Rollin Fernandes, Former Principal (Fr.CRIT, Vashi). The keynote speaker mainly talked about the routine problems faced by common people and discussed how an engineer can provide solutions to those problems. He also emphasized that an engineer should provide methods/ideas for solving day-to-day problems through ‘Internet of Things’ (IOT). The ideas were well appreciated and audience promised that they would take up these problems through students’ projects.

<br><br>

	Dr. Sunil Kumar Kopparapu, Principal Scientist (TCS) and Head (TCS Mumbai Innovation Laboratory) presided as the Chief Guest at the Valedictory Function of the Conference. The representatives of various Professional Bodies such as IETE (Dr. S.S. Mande), ISHRAE (Mr. Sanjay Verma), CSI (Mr. Ajit Joshi) and FRAMES (Mr. Manish Punjabi) were also invited for the Valedictory Function. The Chief Guest focused on problems in India and stated that the engineers have a huge number of problem statements to think of for their research and development (R&D).  The speech was concluded in a common consensus that this R&D would definitely bring India to the forefront among all developed countries. 

<br><br>

	Few papers were selected after meticulous evaluation based on various technical parameters, for Best Paper and Young Researcher Awards. The recipients of Best Paper Award are Mr. Mahesh Shewale, Mr. Nitin Chavan, Mr. Ajay Kumar Yadav, Mr. Ashish Nilangekar, Ms. Nandini Nag, Dr. Milind Shah, Mr. Chhagan Charan, and Ms. Jyoti Deshmukh. The participants who earned the Young Researcher Award are  Mr. Mahesh Shewale, Mr. Ajay Kumar Yadav, Mr. Ashish Nilangekar, and Ms. Jyoti Deshmukh. 

<br><br>

	The Conference was highly appreciated by the Participants, Session Chairs, and Dignitaries for its smooth execution, hospitality, and notable standard. The thrust of the ICNTE 2017 was not on the quantity but on the quality of the research work, which was very well seen through the presentations made in the Conference. The Institute is hopeful that the information disseminated through the technical interactions during ICNTE 2017, will introduce the newcomers and knowledge seekers in various engineering fields to the advancements in latest technologies.  


</span>
</div>

<div class="row">

  <div class="column">

      <img src="./images/17a.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(1)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/17b.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(2)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/17c.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(3)" class="hover-shadow" >

  </div>

   <div class="column">

      <img src="./images/17d.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(4)" class="hover-shadow" >

  </div>

     <div class="column">

      <img src="./images/17e.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(5)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/17f.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(6)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/17g.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(7)" class="hover-shadow" >

  </div>

  <div class="column">

      <img src="./images/17h.jpg" style=" width:100%;margin-bottom: 15px;"  onclick="openModal();currentSlide(8)" class="hover-shadow" >

  </div>

</div>



<div id="myModal" class="modal">

  <span class="close cursor" onclick="closeModal()">&times;</span>

  <div class="modal-content">



    <div class="mySlides">

      <div class="numbertext">1 / 8</div>

        <img src="./images/17a.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">2 / 8</div>

        <img src="./images/17b.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">3 / 8</div>

        <img src="./images/17c.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">4 / 8</div>

        <img src="./images/17d.jpg" style="width:100%">

    </div>

    <div class="mySlides">

      <div class="numbertext">5 / 8</div>

        <img src="./images/17e.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">6 / 8</div>

        <img src="./images/17f.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">7 / 8</div>

        <img src="./images/17g.jpg" style="width:100%">

    </div>

	<div class="mySlides">

	<div class="numbertext">8 / 8</div>

        <img src="./images/17h.jpg" style="width:100%">

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

  if (n > slides.length) {slideIndex = 1}

  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {

    slides[i].style.display = "none";

  }

  for (i = 0; i < dots.length; i++) {

    dots[i].className = dots[i].className.replace(" active", "");

  }

  slides[slideIndex-1].style.display = "block";

  dots[slideIndex-1].className += " active";

  captionText.innerHTML = dots[slideIndex-1].alt;

}

    </script>

	

	    <?php include 'footer.php'; ?>

</html>