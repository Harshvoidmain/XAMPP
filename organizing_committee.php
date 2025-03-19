<?php include 'header.php'; ?>

<!-- Breadcrumb Navigation -->
<div class="bg-gray-100 py-3">
  <div class="container mx-auto px-4">
    <nav aria-label="breadcrumb" class="text-sm">
      <ol class="list-reset flex text-gray-600">
        <li>
          <a href="./index.php" class="text-blue-600 hover:underline">Home</a>
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

<!-- Committees List -->
<div class="container mx-auto px-4 mb-20">
  <div class="max-w-5xl mx-auto space-y-8">
    <?php
      include 'connection.php'; 
      $sql = "SELECT * FROM organizing_committees ORDER BY organizing_committees.sr_no ASC";
      $result = mysqli_query($db, $sql);
      while($row = mysqli_fetch_array($result)) {
          $committeeName = $row['name'];
          $committeeId   = $row['id'];
    ?>
    <div class="mb-8">
      <!-- Committee Title -->
      <div class="max-w-md mx-auto border-2 border-blue-400 rounded-lg p-4 mb-4 text-center">
        <h3 class="text-xl font-semibold"><?php echo htmlspecialchars($committeeName); ?></h3>
      </div>
      <!-- Committee Members Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
          <tbody>
            <?php
              $sqlMembers = "SELECT * FROM committee_members WHERE organizing_committee_id='$committeeId' ORDER BY committee_members.sr_no ASC";
              $resultMembers = mysqli_query($db, $sqlMembers);
              while($member = mysqli_fetch_array($resultMembers)) {
                  $memberName = $member['name'];
                  $memberDesignation = $member['designation'];
            ?>
            <tr class="border-t">
              <td class="px-4 py-2 w-1/3 font-medium"><?php echo htmlspecialchars($memberName); ?></td>
              <td class="px-4 py-2"><?php echo htmlspecialchars($memberDesignation); ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<?php include 'footer.php'; ?>
