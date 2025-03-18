<<<<<<< HEAD
<?php
$page_title = "Advisory Committee";
include 'header.php';
?>

<main class="container mx-auto px-4 py-8">
    <!-- Breadcrumb Navigation -->
    <nav class="text-sm mb-6">
        <ul class="flex space-x-2 text-gray-600">
            <li><a href="./icnte.php" class="hover:underline">Home</a></li>
            <li>/</li>
            <li><span class="text-gray-500">People</span></li>
            <li>/</li>
            <li class="text-blue-600 font-semibold">Advisory Committee</li>
        </ul>
    </nav>

    <!-- Page Title -->
    <h2 class="text-center text-3xl font-bold text-gray-800 mb-4">Advisory Committee</h2>
    <hr class="border-t-2 border-blue-500 w-32 mx-auto mb-8">

    <!-- Table Section -->
    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="w-full table-auto border-collapse bg-white shadow-lg">
            <thead>
                <tr class="bg-blue-600 text-white text-left">
                    <th class="py-3 px-4">Name</th>
                    <th class="py-3 px-4">Designation</th>
                    <th class="py-3 px-4">Institute</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                include 'connection.php'; 
                $sql = "SELECT * FROM advisory_committees";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr class='hover:bg-gray-100'>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($row['designation']) . "</td>";
                    echo "<td class='py-3 px-4'>" . htmlspecialchars($row['institute']) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
=======
<?php include 'header.php'; ?>

<!-- Breadcrumb Navigation -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav aria-label="breadcrumb" class="text-sm">
      <ol class="list-reset flex text-gray-600">
        <li>
          <a href="icnte.php" class="text-blue-600 hover:underline">Home</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li>
          <a href="#" class="text-blue-600 hover:underline">People</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">Advisory Committee</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Advisory Committee</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Advisory Committee Table -->
<div class="container mx-auto px-4">
  <div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
      <thead class="bg-gray-200">
        <tr>
          <th class="px-4 py-2 text-left">Name</th>
          <th class="px-4 py-2 text-left">Designation</th>
          <th class="px-4 py-2 text-left">Organization</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'connection.php'; 
          $sql = "SELECT * FROM advisory_committees";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {
            $name = $row['name']; 
            $designation = $row['designation'];
            $institute = $row['institute'];
        ?>
        <tr class="border-t hover:bg-gray-50">
          <td class="px-4 py-2"><?php echo htmlspecialchars($name); ?></td>
          <td class="px-4 py-2"><?php echo htmlspecialchars($designation); ?></td>
          <td class="px-4 py-2"><?php echo htmlspecialchars($institute); ?></td>
        </tr>
        
        <?php } ?>
      </tbody>
    </table>
    <br></br>
  </div>
</div>
>>>>>>> Harsh

<?php include 'footer.php'; ?>
