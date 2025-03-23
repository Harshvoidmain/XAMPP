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
          <a href="#" class="text-blue-600 hover:underline">Downloads</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">IEEE Copyright Form</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Title -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">IEEE Copyright Form</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Download Section -->
<div class="container mx-auto px-4 text-center mb-8">
  <a href="download/IEEE_Copyright_Form.pdf" download class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
    Download IEEE Copyright Form
  </a>
</div>

<!-- PDF Preview -->
<div class="container mx-auto px-4 mb-8">
  <embed src="download/IEEE_Copyright_Form.pdf" type="application/pdf" width="100%" height="800px" />
</div>

<?php include 'footer.php'; ?>
