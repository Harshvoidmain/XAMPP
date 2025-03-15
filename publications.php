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
        <li class="font-bold text-gray-800">Publication</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Publication</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Publications Content -->
<div class="container mx-auto px-4">
  <div class="bg-white shadow rounded p-6">
    <?php 
      include 'connection.php'; 
      $sql = "SELECT description FROM publications";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result)) {
        $description = $row["description"];
        echo "<p class='text-justify text-gray-800 mb-4'>" . htmlspecialchars($description) . "</p>";
      }
    ?>
  </div>
</div>

<?php include 'footer.php'; ?>
