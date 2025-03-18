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

<?php include 'footer.php'; ?>
