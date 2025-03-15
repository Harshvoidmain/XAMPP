<?php include 'header.php'; ?>

<!-- Breadcrumb Navigation -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav class="text-sm" aria-label="Breadcrumb">
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
        <li class="text-gray-800 font-bold">Instructions</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Instructions</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Instructions Table -->
<div class="container mx-auto px-4">
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <tbody>
        <?php
        include 'connection.php'; 
        $sql = "SELECT * FROM instructions";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $id = $row['id']; 
          $instruction = $row['instruction'];
        ?>
        <tr class="border-b">
          <td class="px-4 py-2 text-center w-5 border-r"><?php echo htmlspecialchars($id); ?></td>
          <td class="px-4 py-2 text-justify"><?php echo htmlspecialchars($instruction); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Proceed Button -->
<div class="container mx-auto px-4 my-8">
  <form action="https://cmt3.research.microsoft.com/ICNTE2023" method="get">
    <button type="submit" class="w-full bg-blue-800 hover:bg-blue-900 text-white font-semibold py-2 px-4 rounded transition">
      Proceed to Paper Submission Portal
    </button>
  </form>
</div>

<?php include 'footer.php'; ?>
</html>