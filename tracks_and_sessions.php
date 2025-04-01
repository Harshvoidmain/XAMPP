<!DOCTYPE html>
<html lang="en">

<?php include 'header.php'; ?>

<!-- ✅ Breadcrumb Navigation -->
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
          <a href="#" class="text-blue-600 hover:underline">Call For Papers</a>
        </li>
        <li>
          <span class="mx-2">/</span>
        </li>
        <li class="font-bold text-gray-800">Tracks and Sessions</li>
      </ol>
    </nav>
  </div>
</div>

<!-- ✅ Page Heading -->
<div class="container mx-auto px-4 my-8">
  <h2 class="text-center text-3xl font-bold text-gray-800">Tracks and Sessions</h2>
  <hr class="my-4 border-t-2 border-gray-300">
  
  <!-- ✅ Center the content -->
  <p class="text-center text-lg font-medium leading-relaxed">
    The deliberations in ICNTE 2023 are grouped into 14 Tracks which correspond to a specific research field.
  </p>
</div>

<!-- ✅ Tracks and Sessions -->
<div class="container mx-auto px-4 mb-20">
  <div class="space-y-4">
    <?php
    include 'connection.php';
    $sql = "SELECT * FROM tracks";
    $result = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_array($result)) {
        $tname = $row['trackname'];
        $tid = $row['tid'];
        $collapseID = "collapse" . $tid;
    ?>
    <div class="border border-gray-200 rounded-lg">
      <div class="bg-gray-100 px-4 py-2 flex justify-between items-center cursor-pointer toggle-panel" data-target="#<?php echo $collapseID; ?>">
        <h4 class="font-semibold text-gray-800"><?php echo htmlspecialchars($tname); ?></h4>
        <span class="toggle-icon transition-transform duration-300">▼</span>
      </div>

      <!-- ✅ Fix dropdown behavior with smooth animation -->
      <div id="<?php echo $collapseID; ?>" class="overflow-hidden max-h-0 transition-all duration-300 ease-in-out bg-white p-4 rounded-b-lg shadow-md">
    <ol class="list-decimal ml-6 text-gray-700 space-y-2">
    <?php
    $sessionQuery = "SELECT * FROM sessions WHERE tid='$tid'";
    $sessionResult = mysqli_query($db, $sessionQuery);
    while ($sessionRow = mysqli_fetch_array($sessionResult)) {
        $name = trim($sessionRow['sname']); // Trim to remove empty spaces
        if (!empty($name)) { // Only show non-empty items
        ?>
        <li class="py-2 px-3 bg-gray-100 rounded-md shadow-sm hover:bg-gray-200 transition">
            <?php echo htmlspecialchars($name); ?>
        </li>
        <?php }} ?>
    </ol>

    <?php if ($tid == 2) { ?>
        <p class="text-red-500 mt-4 text-center font-semibold">
            Acceptance of papers submitted in the Thermal Engineering and Fluid Control track does not guarantee publication in IEEE Xplore. Only papers within IEEE's scope will be sent for inclusion.
        </p>
    <?php } ?>
</div>

    </div>
    <?php } ?>
  </div>
</div>

<!-- ✅ JavaScript for Toggle Behavior -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const panels = document.querySelectorAll('.toggle-panel');

    panels.forEach(panel => {
      panel.addEventListener('click', () => {
        const target = document.querySelector(panel.getAttribute('data-target'));
        const icon = panel.querySelector('.toggle-icon');

        // ✅ Close other open panels
        document.querySelectorAll('[id^="collapse"]').forEach(openPanel => {
          if (openPanel !== target) {
            openPanel.style.maxHeight = '0px';
            openPanel.classList.remove('active');
            openPanel.previousElementSibling.querySelector('.toggle-icon').classList.remove('rotate-180');
          }
        });

        // ✅ Toggle current panel using dynamic height
        if (target.style.maxHeight && target.style.maxHeight !== '0px') {
          target.style.maxHeight = '0px';
          target.classList.remove('active');
          icon.classList.remove('rotate-180');
        } else {
          target.style.maxHeight = target.scrollHeight + 'px';
          target.classList.add('active');
          icon.classList.add('rotate-180');
        }
      });
    });
    
    // Open the first panel by default
    if (panels.length > 0) {
      const firstPanel = panels[0];
      const firstTarget = document.querySelector(firstPanel.getAttribute('data-target'));
      const firstIcon = firstPanel.querySelector('.toggle-icon');
      
      if (firstTarget) {
        firstTarget.style.maxHeight = firstTarget.scrollHeight + 'px';
        firstTarget.classList.add('active');
        firstIcon.classList.add('rotate-180');
      }
    }
  });
</script>

<?php include 'footer.php'; ?>

</html>