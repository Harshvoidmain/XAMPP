<?php include 'header.php'; ?>

<!-- Breadcrumb -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav aria-label="breadcrumb" class="text-sm">
      <ol class="list-reset flex text-gray-600">
        <li>
          <a href="index.php" class="text-blue-600 hover:underline">Home</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li>
          <a href="#" class="text-blue-600 hover:underline">Archives</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">ICNTE 2023</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">ICNTE 2023</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Description with "Read More" -->
<div class="container mx-auto px-4 pb-10 text-justify">
  <span class="more">
    Agnel charities’ Fr. C. Rodrigues Institute of Technology hosted the 5th Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2023) during 20-21 January 2023. Similar to ICNTE 2015, ICNTE 2017, ICNTE 2019, ICNTE 2021, and ICNTE 2023, this conference was also technically cosponsored by IEEE and the Industrial Application Society (IAS) of IEEE. The ICNTE 2023 was financially sponsored by AICTE, BRNS, and Campus Credentials. The Conference received 129 papers from authors in India and abroad for 14 different tracks. Out of 129 papers, 89 were selected for presentation in the conference and the presented papers were sent to IEEE for possible inclusion into IEEE Xplore – a Scopus Indexed digital library. Additionally, 20% of the selected papers were recommended for further review to IEEE Transactions in Industrial Applications. Poster presentations were also held on the first day of the conference. Best Paper Award and Best Poster Award were given in each track.
  </span>
</div>

<!-- Gallery Grid -->
<div class="container mx-auto px-4 pb-10">
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <img src="./images/ICNTE23_1.png" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(1)" alt="ICNTE 2023 Image 1">
    <img src="./images/ICNTE23_2.png" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(2)" alt="ICNTE 2023 Image 2">
    <img src="./images/ICNTE23_3.png" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(3)" alt="ICNTE 2023 Image 3">
    <img src="./images/ICNTE23_4.png" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(4)" alt="ICNTE 2023 Image 4">
    <img src="./images/21f.jpg" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(5)" alt="ICNTE 2023 Image 5">
    <img src="./images/21d.jpg" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(6)" alt="ICNTE 2023 Image 6">
    <img src="./images/21g.jpg" class="w-full cursor-pointer hover:shadow-lg" onclick="openModal(); currentSlide(7)" alt="ICNTE 2023 Image 7">
  </div>
</div>

<!-- Modal Lightbox Gallery -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-95 hidden z-50">
  <span class="absolute top-4 right-8 text-white text-4xl cursor-pointer" onclick="closeModal()">&times;</span>
  <div class="relative mx-auto my-8 max-w-4xl">
    <div class="modal-content relative">
      <!-- Each slide -->
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">1 / 8</div>
        <img src="./images/19a.jpg" class="w-full" alt="Slide 1">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">2 / 8</div>
        <img src="./images/19b.jpg" class="w-full" alt="Slide 2">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">3 / 8</div>
        <img src="./images/19c.jpg" class="w-full" alt="Slide 3">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">4 / 8</div>
        <img src="./images/19d.jpg" class="w-full" alt="Slide 4">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">5 / 8</div>
        <img src="./images/19e.jpg" class="w-full" alt="Slide 5">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">6 / 8</div>
        <img src="./images/19f.jpg" class="w-full" alt="Slide 6">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">7 / 8</div>
        <img src="./images/19a.jpg" class="w-full" alt="Slide 7">
      </div>
      <div class="mySlides hidden">
        <div class="numbertext text-white text-sm absolute top-2 left-2">8 / 8</div>
        <img src="./images/19b.jpg" class="w-full" alt="Slide 8">
      </div>
      
      <!-- Next/Previous Buttons -->
      <a class="prev absolute left-0 top-1/2 transform -translate-y-1/2 text-white text-3xl px-4 cursor-pointer" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next absolute right-0 top-1/2 transform -translate-y-1/2 text-white text-3xl px-4 cursor-pointer" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <div class="caption-container text-center mt-4">
      <p id="caption" class="text-white"></p>
    </div>
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
}

function closeModal() {
  document.getElementById("myModal").classList.add('hidden');
}
</script>

<?php include 'footer.php'; ?>
