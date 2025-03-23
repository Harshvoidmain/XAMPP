<?php include 'header.php'; ?>

<!-- Breadcrumb Navigation -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav aria-label="Breadcrumb" class="text-sm">
      <ol class="list-reset flex text-gray-600">
        <li>
          <a href="index.php" class="text-blue-600 hover:underline">Home</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li>
          <a href="#" class="text-blue-600 hover:underline">Conference Details</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">Venue</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Title -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Conference Venue</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Venue Information Section -->
<div class="container mx-auto px-4 mb-12">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    
    <!-- Venue Details Card -->
    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
      <h3 class="text-center text-xl font-semibold mb-4">Venue Details</h3>
      <hr class="mb-4 border-t-2 border-blue-400">
      
      <table class="w-full text-left">
        <tr>
          <th class="py-3 pr-4 text-right align-top text-gray-700">Address</th>
          <td class="py-3 pl-4 text-gray-800">
            Agnel Charities’<br>
            Fr. C. Rodrigues Institute of Technology<br>
            Agnel Technical Education Complex<br>
            Sector-9A, Vashi<br>
            Navi Mumbai, Maharashtra<br>
            Pin-400703
          </td>
        </tr>
        <tr>
          <th class="py-3 pr-4 text-right text-gray-700">Phone</th>
          <td class="py-3 pl-4 text-blue-600">
            <a href="tel:+912227771000" class="hover:underline">+91-22-27771000</a>
          </td>
        </tr>
        <tr>
          <th class="py-3 pr-4 text-right text-gray-700">Fax</th>
          <td class="py-3 pl-4 text-gray-800">+91-22-27660619</td>
        </tr>
        <tr>
          <th class="py-3 pr-4 text-right text-gray-700">Website</th>
          <td class="py-3 pl-4">
            <a href="https://www.fcrit.ac.in" class="text-blue-600 hover:underline" target="_blank">www.fcrit.ac.in</a>
          </td>
        </tr>
      </table>
    </div>

    <!-- Google Maps Embed -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
      <h3 class="text-center text-xl font-semibold py-4">Location Map</h3>
      <iframe 
        width="100%" 
        height="400px" 
        frameborder="0" 
        class="rounded-b-lg" 
        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJq8XY4MrG5zsR2KIsZh1I9Ls&key=AIzaSyBdsMKM1ESJ0Kc03i9Tnt_mU6KfNWvY5mY" 
        allowfullscreen>
      </iframe>
    </div>
    
  </div>
</div>

<!-- Extra Padding for Better Layout -->
<div class="pb-12"></div>

<?php include 'footer.php'; ?>
