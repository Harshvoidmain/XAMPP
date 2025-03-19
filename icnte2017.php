<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<div class="container mx-auto px-4 py-8 max-w-6xl">
  <!-- Enhanced Breadcrumb -->
  <nav class="text-sm text-gray-500 mb-6 bg-gray-50 p-3 rounded-lg shadow-sm animate-fadeIn">
    <ol class="list-reset flex items-center">
      <li>
        <a href="./index.php" class="relative text-blue-600 hover:text-blue-800 transition">
          Home
          <span class="absolute left-0 bottom-0 h-0.5 bg-blue-600 origin-left scale-x-0 transition-transform duration-300 hover:scale-x-100 w-full"></span>
        </a>
      </li>
      <li>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </li>
      <li>
        <a href="javascript::" class="relative text-blue-600 hover:text-blue-800 transition">
          Archives
          <span class="absolute left-0 bottom-0 h-0.5 bg-blue-600 origin-left scale-x-0 transition-transform duration-300 hover:scale-x-100 w-full"></span>
        </a>
      </li>
      <li>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </li>
      <li class="font-semibold text-gray-700">ICNTE 2017</li>
    </ol>
  </nav>

  <!-- Improved Heading -->
  <div class="text-center mb-10 animate-fadeIn">
    <h2 class="relative inline-block text-4xl font-bold text-gray-800 mb-2">
      ICNTE 2017
      <span class="absolute left-0 bottom-0 h-0.5 bg-blue-600 origin-left scale-x-0 transition-transform duration-300 hover:scale-x-100 w-full"></span>
    </h2>
    <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
    <p class="text-gray-600 mt-3 italic">International Conference on Nascent Technologies in Engineering, 2017</p>
  </div>

  <!-- Enhanced Content Box -->
  <div class="text-justify leading-relaxed text-gray-700 p-6 bg-white rounded-xl shadow-md border border-gray-100 mb-10 animate-fadeIn">
    <span class="block">
    Fr. C. Rodrigues Institute of Technology, Vashi, under the patronage of the Society of Jesus, proudly hosted the 3rd edition of the International Conference on Nascent Technologies in Engineering (ICNTE) in 2017. The conference aimed to provide a platform for researchers, academicians, and industry professionals to share their knowledge and innovations in emerging engineering fields. The conference featured keynote sessions from distinguished speakers, paper presentations, and panel discussions across various disciplines, including Electronics and Telecommunications, Computer Engineering, Information Technology, Mechanical Engineering, and Electrical Engineering. ICNTE 2017 attracted participants from across the globe, facilitating knowledge exchange and collaborative opportunities. It also provided a valuable opportunity for students and young researchers to interact with industry experts and enhance their understanding of cutting-edge technologies. The organizing committee extends heartfelt gratitude to all the participants, sponsors, and volunteers who contributed to making ICNTE 2017 a grand success.
    </span>
  </div>

  <!-- Gallery Section -->
  <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Conference Gallery</h3>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-10">
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(1)">
      <img src="./images/17a.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(2)">
      <img src="./images/17b.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(3)">
      <img src="./images/17c.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
    <div class="group relative overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300" onclick="openModal();currentSlide(4)">
      <img src="./images/17d.jpg" class="w-full h-64 object-cover transform group-hover:scale-105 transition-transform duration-300 cursor-pointer">
      <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity">
        <span class="text-white text-lg font-medium">View Larger</span>
      </div>
    </div>
  </div>
</div>

<!-- Smooth Hover Effect -->
<script>
  document.querySelectorAll('a, h2').forEach((el) => {
    el.addEventListener('mouseenter', () => {
      el.querySelector('span').style.transform = 'scaleX(1)';
    });
    el.addEventListener('mouseleave', () => {
      el.querySelector('span').style.transform = 'scaleX(0)';
    });
  });
</script>

</html>