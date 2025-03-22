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
        <li class="font-bold text-gray-800">Organizing Committees</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Title -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Organizing Committees</h2>
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

<!-- Committees List -->
<div class="container mx-auto px-4 mb-20">
  <div class="max-w-5xl mx-auto space-y-10">
    <?php
      include 'connection.php'; 
      $sql = "SELECT * FROM organizing_committees ORDER BY sr_no ASC";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result)) {
          $committeeName = $row['name'];
          $committeeId   = $row['id'];
    ?>
    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
      
      <!-- Committee Title -->
      <div class="text-center border-b-2 border-blue-400 pb-4 mb-4">
        <h3 class="text-xl font-semibold text-gray-800"><?php echo htmlspecialchars($committeeName); ?></h3>
      </div>

      <!-- Committee Members Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 committeeTable">
          <thead>
            <tr class="bg-gray-200">
              <th class="px-4 py-3 text-left">Name</th>
              <th class="px-4 py-3 text-left">Designation</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sqlMembers = "SELECT * FROM committee_members WHERE organizing_committee_id='$committeeId' ORDER BY sr_no ASC";
              $resultMembers = mysqli_query($db, $sqlMembers);
              while($member = mysqli_fetch_array($resultMembers)) {
                  $memberName = $member['name'];
                  $memberDesignation = $member['designation'];
            ?>
            <tr class="border-t hover:bg-gray-50">
              <td class="px-4 py-3 font-medium text-gray-800"><?php echo htmlspecialchars($memberName); ?></td>
              <td class="px-4 py-3 text-gray-700"><?php echo htmlspecialchars($memberDesignation); ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
    <?php } ?>
  </div>
</div>

<!-- Extra Padding for Layout -->
<div class="pb-12"></div>

<?php include 'footer.php'; ?>

<!-- JavaScript to Filter Table -->
<script>
  function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const tables = document.querySelectorAll('.committeeTable');

    tables.forEach((table) => {
      const rows = table.getElementsByTagName('tr');
      let hasVisibleRow = false;

      for (let i = 1; i < rows.length; i++) {
        const rowText = rows[i].textContent.toLowerCase();
        if (rowText.includes(input)) {
          rows[i].style.display = '';
          hasVisibleRow = true;
        } else {
          rows[i].style.display = 'none';
        }
      }

      // Show or hide the whole committee section based on visibility
      const committeeContainer = table.closest('.bg-white');
      if (hasVisibleRow) {
        committeeContainer.style.display = '';
      } else {
        committeeContainer.style.display = 'none';
      }
    });
  }
</script>