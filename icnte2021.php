<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<div class="container mx-auto px-4 py-8 max-w-6xl">
  <!-- Enhanced Breadcrumb -->
  <nav class="text-sm text-gray-500 mb-6 bg-gray-50 p-3 rounded-lg shadow-sm animate-fadeIn">
    <ol class="list-reset flex items-center">
      <li><a href="./index.php" class="text-blue-600 hover:text-blue-800 transition">Home</a></li>
      <li><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
      <li><a href="javascript::" class="text-blue-600 hover:text-blue-800 transition">Archives</a></li>
      <li><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
      <li class="font-semibold text-gray-700">ICNTE 2021</li>
    </ol>
  </nav>

  <!-- Improved Heading -->
  <div class="text-center mb-10 animate-fadeIn">
    <h2 class="text-4xl font-bold text-gray-800 mb-2">ICNTE 2021</h2>
    <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
    <p class="text-gray-600 mt-3 italic">International Conference on Nascent Technologies in Engineering</p>
  </div>

  <!-- Enhanced Content Box -->
  <div class="text-justify leading-relaxed text-gray-700 p-6 bg-white rounded-xl shadow-md border border-gray-100 mb-10 animate-fadeIn">
    <span class="block">
      The Institute organized the 4th Biennial International Conference on Nascent Technologies in Engineering (ICNTE 2021) virtually on 15-16 January 2021. Similar to ICNTE 2015, 2017, and 2019, this conference was technically cosponsored by IEEE and supported by IEI, IETE, CSI, and IEEE IAS. The major financial sponsor was Campus Credentials.
      <br><br>
      The Conference received 283 papers from India and abroad for 14 tracks. Out of these, 189 papers were selected for presentation, with potential inclusion in IEEE Xplore (Scopus Indexed). Additionally, 20% of selected papers were recommended for further review in IEEE Transactions in Industrial Applications.
    </span>
  </div>

  <!-- Gallery Section -->
  <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Conference Gallery</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(1)">
      <img src="./images/21a.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(2)">
      <img src="./images/21b.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(3)">
      <img src="./images/21c.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(4)">
      <img src="./images/21e.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
  </div>
</div>

<!-- Enhanced Modal -->
<div id="myModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center">
  <div class="relative w-11/12 md:w-3/4 max-w-5xl bg-white p-1 md:p-2 rounded-lg animate-scaleIn">
    <button class="absolute -top-10 right-0 text-white text-3xl hover:text-gray-300 transition" onclick="closeModal()">&times;</button>
    <div class="mySlides hidden"><img src="./images/21a.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/21b.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/21c.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
    <div class="mySlides hidden"><img src="./images/21e.jpg" class="w-full rounded object-contain max-h-[80vh]"></div>
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

<script>
  // Handle "Show more" functionality
  document.querySelectorAll('.morelink').forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      let content = this.previousElementSibling;
      if (content.style.maxHeight) {
        content.style.maxHeight = null;
        this.innerText = "Show more >";
      } else {
        content.style.maxHeight = content.scrollHeight + "px";
        this.innerText = "Show less";
      }
    });
  });

  // Enhanced modal functionality
  function openModal() { 
    document.getElementById('myModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
  }
  
  function closeModal() { 
    document.getElementById('myModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
  }
  
  function currentSlide(n) {
    showSlides(n-1);
  }
  
  function plusSlides(n) {
    let slides = document.querySelectorAll('.mySlides');
    let index = [...slides].findIndex(slide => !slide.classList.contains('hidden'));
    showSlides(index + n);
  }
  
  function showSlides(n) {
    let slides = document.querySelectorAll('.mySlides');
    slides.forEach(slide => slide.classList.add('hidden'));
    let newIndex = ((n % slides.length) + slides.length) % slides.length;
    slides[newIndex].classList.remove('hidden');
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

</html>
