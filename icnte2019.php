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

<!-- Enhanced Breadcrumb -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav aria-label="breadcrumb" class="text-sm text-gray-500 mb-6 bg-gray-50 p-3 rounded-lg shadow-sm animate-fadeIn">
      <ol class="list-reset flex items-center">
        <li><a href="index.php" class="text-blue-600 hover:text-blue-800 transition">Home</a></li>
        <li><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
        <li><a href="#" class="text-blue-600 hover:text-blue-800 transition">Archives</a></li>
        <li><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
        <li class="font-semibold text-gray-700">ICNTE 2019</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Improved Page Heading -->
<div class="container mx-auto px-4 my-8 text-center animate-fadeIn">
  <h2 class="text-4xl font-bold text-gray-800 mb-2">ICNTE 2019</h2>
  <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
  <p class="text-gray-600 mt-3 italic">International Conference on Nascent Technologies in Engineering</p>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Enhanced Description with "Read More" -->
<div class="container mx-auto px-4 pb-10 text-justify leading-relaxed text-gray-700 p-6 bg-white rounded-xl shadow-md border border-gray-100 mb-10 animate-fadeIn">
  <span class="more">
    The 3rd IEEE Technically Co-Sponsored Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2019) was held on January 4-5, 2019. The conference had technical support from IEI, IETE, and CSI. The major financial sponsors of this Conference were Jamboree, FRAMES, IETE, IEI, and NETZSCH. The conference was dignified by the presence of Dr. Rakesh Kumar, Director, National Environmental Engineering Research Institute (NEERI) as the Chief Guest, Dr. K.T. V. Reddy, President IETE, Delhi, as the Guest of Honour, Keynote speakers Dr. Nathani Basavaiah, Professor, Indian Institute of Geomagnetism and Dr. Sheldon Williamson, University of Ontario, Canada. Out of 181 papers received, 124 papers were selected for presenting in the Conference and were published in IEEE explore. Additionally IEI-FCRIT excellence award was also constituted as a part of the conference for recognising and appreciating the excellence of Students, Academicians and Industry persons in their respective domains.
  </span>
</div>

<!-- Enhanced Gallery Grid -->
<div class="container mx-auto px-4 pb-10">
  <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Conference Gallery</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(1)">
      <img src="./images/19a.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(2)">
      <img src="./images/19b.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(3)">
      <img src="./images/19c.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(4)">
      <img src="./images/19d.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(5)">
      <img src="./images/19e.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(6)">
      <img src="./images/19f.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(7)">
      <img src="./images/19a.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(8)">
      <img src="./images/19b.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Modal Lightbox Gallery -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center">
  <div class="relative w-11/12 md:w-3/4 max-w-5xl bg-white p-1 md:p-2 rounded-lg animate-scaleIn">
    <button class="absolute -top-10 right-0 text-white text-3xl hover:text-gray-300 transition" onclick="closeModal()">&times;</button>
    <div class="mySlides hidden"><img src="./images/19a.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19b.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19c.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19d.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19e.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19f.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19a.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/19b.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <button class="prev absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-3 rounded-full transition" onclick="plusSlides(-1)">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </button>
    <button class="next absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white p-3 rounded-full transition" onclick="plusSlides(1)">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>
    <div class="text-center mt-2 text-sm text-gray-600">Click or use arrow keys to navigate</div>
  </div>
</div>

<!-- Vanilla JS Scripts -->
<script>
// "Read More" Toggle Functionality
document.addEventListener("DOMContentLoaded", function(){
  var showChar = 1500;
  var ellipsestext = ".......";
  var moretext = "Show more >";
  var lesstext = "Show less";

  document.querySelectorAll('.more').forEach(function(el){
    var content = el.innerHTML;
    if(content.length > showChar){
      var visibleText = content.substr(0, showChar);
      var hiddenText = content.substr(showChar);
      var html = visibleText +
          '<span class="moreellipses">' + ellipsestext + '&nbsp;</span>' +
          '<span class="morecontent hidden"><span>' + hiddenText + '</span>&nbsp;&nbsp;' +
          '<a href="#" class="morelink text-blue-600 hover:underline">' + moretext + '</a></span>';
      el.innerHTML = html;
    }
  });

  document.querySelectorAll('.morelink').forEach(function(link){
    link.addEventListener('click', function(e){
      e.preventDefault();
      var moreContent = this.parentElement;
      var ellipses = moreContent.previousElementSibling;
      if(this.classList.contains('less')){
        this.classList.remove('less');
        this.textContent = moretext;
        ellipses.classList.remove('hidden');
        moreContent.classList.add('hidden');
      } else {
        this.classList.add('less');
        this.textContent = lesstext;
        ellipses.classList.add('hidden');
        moreContent.classList.remove('hidden');
      }
    });
  });
});

// Modal Gallery Functionality
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = slides.length }
  for (var i = 0; i < slides.length; i++) {
    slides[i].classList.add('hidden');
  }
  slides[slideIndex - 1].classList.remove('hidden');
  // Optionally, update caption text here if desired:
  document.getElementById("caption").innerText = "";
}

function openModal() {
  document.getElementById("myModal").classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  document.getElementById("myModal").classList.add('hidden');
  document.body.style.overflow = 'auto';
}

// Keyboard navigation
document.addEventListener('keydown', function(e) {
  if (document.getElementById('myModal').classList.contains('hidden')) return;
  
  if (e.key === 'ArrowLeft') {
    plusSlides(-1);
  } else if (e.key === 'ArrowRight') {
    plusSlides(1);
  } else if (e.key === 'Escape') {
    closeModal();
  }
});

// Close modal when clicking outside the image
document.getElementById('myModal').addEventListener('click', function(e) {
  if (e.target === this) {
    closeModal();
  }
});

// Add animations to elements as they come into view
document.addEventListener('DOMContentLoaded', function() {
  // Add the animation classes to your stylesheet
  const style = document.createElement('style');
  style.textContent = `
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes scaleIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.7s ease-out forwards;
    }
    .animate-scaleIn {
      animation: scaleIn 0.3s ease-out forwards;
    }
  `;
  document.head.appendChild(style);
});
</script>

<?php include 'footer.php'; ?>