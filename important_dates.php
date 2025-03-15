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
        <li class="font-bold text-gray-800">Important Dates</li>
      </ol>
    </nav>
  </div>
</div>

<!-- Page Title -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold">Important Dates</h2>
  <hr class="my-4 border-t-2 border-gray-300">
</div>

<!-- Important Dates Table -->
<div class="container mx-auto px-4 mb-8">
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 mb-6">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border">Event</th>
                    <th class="px-4 py-2 border">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM important_dates";
                $result = mysqli_query($db, $sql);
                while($row = mysqli_fetch_array($result)) {
                        $event = $row['event'];
                        $date = $row['date'];
                        // Format the date using PHP
                        $formattedDate = date("F j, Y", strtotime($date));
                ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2 border"><?php echo htmlspecialchars($event); ?></td>
                    <td class="px-4 py-2 border text-center"><?php echo htmlspecialchars($formattedDate); ?></td>
                </tr>
                <?php } ?>
                <!-- Optional additional static row -->
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2 border">Dates of Conference</td>
                    <td class="px-4 py-2 border text-center">January 20-21, 2023</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
