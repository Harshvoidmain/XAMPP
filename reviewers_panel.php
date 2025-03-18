<?php include 'header.php'; ?>

<!-- Breadcrumb Navigation -->
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
          <a href="#" class="text-blue-600 hover:underline">People</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">Reviewer's Panel</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Reviewer's Panel</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Search Bar -->
<div class="container mx-auto px-4 mb-4">
  <div class="relative">
    <input 
      type="text" 
      id="searchInput" 
      onkeyup="filterTable()" 
      placeholder="Search" 
      class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
    />
    <svg 
      xmlns="http://www.w3.org/2000/svg" 
      class="absolute right-4 top-3 h-5 w-5 text-gray-400 pointer-events-none" 
      viewBox="0 0 20 20" 
      fill="currentColor"
    >
      <path 
        fill-rule="evenodd" 
        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.472 4.472l3.504 3.504a1 1 0 01-1.414 1.414l-3.504-3.504A6 6 0 012 8z" 
        clip-rule="evenodd" 
      />
    </svg>
  </div>
</div>


<!-- Reviewers Table -->
<div class="container mx-auto px-4 mb-16">
  <div class="overflow-x-auto">
    <table id="reviewersTable" class="min-w-full bg-white border border-gray-200">
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
          $sql = "SELECT * FROM reviewer";
          $result = mysqli_query($db, $sql);
          while($row = mysqli_fetch_array($result)) {
            $salutation = $row['salutation'];
            $name = $row['rewname']; 
            $designation = $row['post'];
            $institute = $row['organization'];
        ?>
        <tr class="border-t hover:bg-gray-50">
          <td class="px-4 py-2"><?php echo htmlspecialchars($salutation . " " . $name); ?></td>
          <td class="px-4 py-2"><?php echo htmlspecialchars($designation); ?></td>
          <td class="px-4 py-2"><?php echo htmlspecialchars($institute); ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include 'footer.php'; ?>

<!-- JavaScript to Filter Table -->
<script>
  function filterTable() {
    const input = document.getElementById('searchInput');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('reviewersTable');
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
      let rowText = rows[i].textContent.toLowerCase();
      rows[i].style.display = rowText.includes(filter) ? '' : 'none';
    }
  }
</script>
