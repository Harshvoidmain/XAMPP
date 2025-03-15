<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<!-- Breadcrumb -->
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
          <a href="registrations.php" class="text-blue-600 hover:underline">Registrations</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="text-gray-800 font-bold">Fees</li>
      </ol>
    </nav>
  </div>
</div>

<main class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold mb-4">Registration Fees</h2>
  <hr class="my-4 border-t-2 border-gray-300">

  <!-- Registration Fees Table -->
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <thead>
        <tr class="bg-gray-200">
          <th class="px-4 py-2 border-b">Category</th>
          <th class="px-4 py-2 border-b">Fee (Excld. GST *)</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'connection.php'; 
        $sql = "SELECT * FROM registration_fees";
        $result = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($result)) {
          $category = $row['category']; 
          $costrs = $row['costrs'];
          ?>
          <tr class="hover:bg-gray-100">
            <td class="px-4 py-2 border-b text-justify"><?php echo htmlspecialchars($category); ?></td>
            <td class="px-4 py-2 border-b text-left"><?php echo htmlspecialchars($costrs); ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- Additional Registration Details -->
  <div class="mt-6 space-y-2 text-gray-700">
    <p>* Goods and Service Tax (GST) will be applied as per Government directives.</p>
    <p>* Registration of at least one author is mandatory for each paper or poster.</p>
    <p>For subsequent registration, authors of the same paper can avail a discount of 20% in the corresponding registration amount.</p>
    <p>* IEEE members can avail a discount of 20% in the corresponding registration amount.</p>
    <p>* For more details of Registration, visit the ICNTE 2023 conference website.</p>
    <p>* Accommodation can be arranged for few participants on a first-come, first-served basis at a nominal cost on campus.</p>
    <p>* Students and IEEE members need to produce proof for claiming discount in the registration amount.</p>
  </div>
</main>

<?php include 'footer.php'; ?>
</html>