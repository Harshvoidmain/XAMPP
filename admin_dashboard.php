<?php
session_start();
include 'connection.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Check for session timeout (30 minutes)
if(isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    header('Location: admin_login.php?timeout=1');
    exit();
}
$_SESSION['last_activity'] = time();

// Process logout
if(isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: admin_login.php');
    exit();
}

// Get admin username
$admin_username = $_SESSION['admin_username'];

// Success message handling
$success_message = '';
if(isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

// Get updates for display
$updates_query = "SELECT * FROM site_updates ORDER BY created_at DESC";
$updates_result = mysqli_query($db, $updates_query);

// Get brochures for display
$brochures_query = "SELECT * FROM site_brochures ORDER BY created_at DESC";
$brochures_result = mysqli_query($db, $brochures_query);

// Get tracks for display
$tracks_query = "SELECT * FROM tracks ORDER BY tid DESC";
$tracks_result = mysqli_query($db, $tracks_query);

// Get important dates for display
$dates_query = "SELECT * FROM important_dates ORDER BY date ASC";
$dates_result = mysqli_query($db, $dates_query);

// Get publications information
$publications_query = "SELECT * FROM publications LIMIT 1";
$publications_result = mysqli_query($db, $publications_query);
$publications_data = mysqli_fetch_assoc($publications_result);

// Get advisory committee members
$advisory_query = "SELECT * FROM advisory_committees ORDER BY name ASC";
$advisory_result = mysqli_query($db, $advisory_query);

// Get organizing committee members
$organizing_query = "SELECT * FROM organizing_committees ORDER BY name ASC";
$organizing_result = mysqli_query($db, $organizing_query);

// Get reviewers panel
$reviewers_query = "SELECT * FROM reviewer ORDER BY rewname ASC";
$reviewers_result = mysqli_query($db, $reviewers_query);

// Get registration fees content
$fees_query = "SELECT * FROM registration_fees LIMIT 1";
$fees_result = mysqli_query($db, $fees_query);
$fees_data = mysqli_fetch_assoc($fees_result);

// Check if payment_instructions table exists
$table_exists_query = "SHOW TABLES LIKE 'payment_instructions'";
$table_exists_result = mysqli_query($db, $table_exists_query);
$payment_data = null;

if(mysqli_num_rows($table_exists_result) > 0) {
    // Get payment instructions if table exists
    $payment_query = "SELECT * FROM payment_instructions LIMIT 1";
    $payment_result = mysqli_query($db, $payment_query);
    $payment_data = mysqli_fetch_assoc($payment_result);
}

// Check if site_downloads table exists
$downloads_exists_query = "SHOW TABLES LIKE 'site_downloads'";
$downloads_exists_result = mysqli_query($db, $downloads_exists_query);
$downloads_result = null;

if(mysqli_num_rows($downloads_exists_result) > 0) {
    // Get downloads if table exists
    $downloads_query = "SELECT * FROM site_downloads ORDER BY created_at DESC";
    $downloads_result = mysqli_query($db, $downloads_query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - ICNTE 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-[Inter] bg-gray-100 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="bg-blue-900 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-6 bg-blue-800">
                <h2 class="text-xl font-bold">ICNTE Admin</h2>
                <p class="text-sm text-blue-200">Welcome, <?php echo htmlspecialchars($admin_username); ?></p>
            </div>
            <nav class="mt-6">
                <ul>
                    <li class="mb-1">
                        <a href="#dashboard" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors active-nav-link" data-tab="dashboard">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#updates" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="updates">
                            <i class="fas fa-bullhorn mr-2"></i> Updates
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#brochures" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="brochures">
                            <i class="fas fa-file-pdf mr-2"></i> Brochures
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#tracks" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="tracks">
                            <i class="fas fa-project-diagram mr-2"></i> Tracks & Sessions
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#dates" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="dates">
                            <i class="fas fa-calendar-alt mr-2"></i> Important Dates
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#publications" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="publications">
                            <i class="fas fa-book mr-2"></i> Publications
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#committees" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="committees">
                            <i class="fas fa-users mr-2"></i> Committees
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#reviewers" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="reviewers">
                            <i class="fas fa-user-check mr-2"></i> Reviewers Panel
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#fees" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="fees">
                            <i class="fas fa-money-bill-wave mr-2"></i> Registration Fees
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#downloads" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="downloads">
                            <i class="fas fa-download mr-2"></i> Downloads
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#settings" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors" data-tab="settings">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="absolute bottom-0 w-64 bg-blue-800 p-4">
                <a href="admin_dashboard.php?logout=1" class="block w-full py-2 px-4 bg-red-600 hover:bg-red-700 text-white text-center rounded transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="md:hidden bg-blue-900 text-white w-full p-4 flex justify-between items-center">
            <h2 class="text-xl font-bold">ICNTE Admin</h2>
            <button id="mobile-menu-button" class="text-white focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Sidebar (hidden by default) -->
        <div id="mobile-sidebar" class="md:hidden fixed inset-0 z-40 bg-blue-900 text-white w-64 transform -translate-x-full transition-transform duration-300 ease-in-out">
            <div class="p-6 bg-blue-800 flex justify-between">
                <div>
                    <h2 class="text-xl font-bold">ICNTE Admin</h2>
                    <p class="text-sm text-blue-200">Welcome, <?php echo htmlspecialchars($admin_username); ?></p>
                </div>
                <button id="close-sidebar" class="text-white">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mt-6">
                <ul>
                    <li class="mb-1">
                        <a href="#dashboard" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="dashboard">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#updates" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="updates">
                            <i class="fas fa-bullhorn mr-2"></i> Updates
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#brochures" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="brochures">
                            <i class="fas fa-file-pdf mr-2"></i> Brochures
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#tracks" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="tracks">
                            <i class="fas fa-project-diagram mr-2"></i> Tracks & Sessions
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#dates" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="dates">
                            <i class="fas fa-calendar-alt mr-2"></i> Important Dates
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#publications" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="publications">
                            <i class="fas fa-book mr-2"></i> Publications
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#committees" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="committees">
                            <i class="fas fa-users mr-2"></i> Committees
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#reviewers" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="reviewers">
                            <i class="fas fa-user-check mr-2"></i> Reviewers Panel
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#fees" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="fees">
                            <i class="fas fa-money-bill-wave mr-2"></i> Registration Fees
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#downloads" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="downloads">
                            <i class="fas fa-download mr-2"></i> Downloads
                        </a>
                    </li>
                    <li class="mb-1">
                        <a href="#settings" class="block py-3 px-6 text-blue-200 hover:bg-blue-800 hover:text-white transition-colors mobile-nav-link" data-tab="settings">
                            <i class="fas fa-cog mr-2"></i> Settings
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="absolute bottom-0 w-64 bg-blue-800 p-4">
                <a href="admin_dashboard.php?logout=1" class="block w-full py-2 px-4 bg-red-600 hover:bg-red-700 text-white text-center rounded transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <?php if(!empty($success_message)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded m-4 flex justify-between items-center" id="success-alert">
                    <span><?php echo $success_message; ?></span>
                    <button class="text-green-700" onclick="document.getElementById('success-alert').style.display='none'">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Dashboard Tab -->
            <div class="p-6 tab-content" id="dashboard-content">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Dashboard</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-blue-100 p-3 rounded-full mr-4">
                                <i class="fas fa-bullhorn text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Updates</h3>
                                <p class="text-3xl font-bold text-gray-900"><?php echo mysqli_num_rows($updates_result); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-green-100 p-3 rounded-full mr-4">
                                <i class="fas fa-file-pdf text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Brochures</h3>
                                <p class="text-3xl font-bold text-gray-900"><?php echo mysqli_num_rows($brochures_result); ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-full mr-4">
                                <i class="fas fa-users text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Admins</h3>
                                <p class="text-3xl font-bold text-gray-900">
                                    <?php 
                                    $admin_count_query = "SELECT COUNT(*) as count FROM admin_users";
                                    $admin_count_result = mysqli_query($db, $admin_count_query);
                                    $admin_count = mysqli_fetch_assoc($admin_count_result)['count'];
                                    echo $admin_count;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Recent Updates</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Text</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Link</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Reset the result pointer
                                mysqli_data_seek($updates_result, 0);
                                $count = 0;
                                while($update = mysqli_fetch_assoc($updates_result)) {
                                    if($count >= 5) break; // Show only 5 recent updates
                                    $count++;
                                ?>
                                <tr class="border-b">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($update['text']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($update['link']); ?></td>
                                    <td class="py-2 px-4"><?php echo date('M d, Y', strtotime($update['created_at'])); ?></td>
                                </tr>
                                <?php } ?>
                                <?php if($count == 0): ?>
                                <tr>
                                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">No updates found</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Updates Tab -->
            <div class="p-6 tab-content hidden" id="updates-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Updates</h1>
                    <button id="add-update-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Update
                    </button>
                </div>
                
                <!-- Add Update Form (Hidden by default) -->
                <div id="add-update-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add New Update</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="add_update">
                        
                        <div class="mb-4">
                            <label for="update_text" class="block text-gray-700 text-sm font-bold mb-2">Update Text</label>
                            <input type="text" id="update_text" name="update_text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="update_link" class="block text-gray-700 text-sm font-bold mb-2">Link (URL)</label>
                            <input type="text" id="update_link" name="update_link" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="cancel-update" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Update</button>
                        </div>
                    </form>
                </div>
                
                <!-- Updates List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Text</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Link</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Date Added</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Reset the result pointer
                                mysqli_data_seek($updates_result, 0);
                                while($update = mysqli_fetch_assoc($updates_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo $update['id']; ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($update['text']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($update['link']); ?></td>
                                    <td class="py-2 px-4"><?php echo date('M d, Y', strtotime($update['created_at'])); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=update&id=<?php echo $update['id']; ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_update&id=<?php echo $update['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this update?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if(mysqli_num_rows($updates_result) == 0): ?>
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">No updates found</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Brochures Tab -->
            <div class="p-6 tab-content hidden" id="brochures-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Brochures</h1>
                    <button id="add-brochure-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Brochure
                    </button>
                </div>
                
                <!-- Add Brochure Form (Hidden by default) -->
                <div id="add-brochure-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add New Brochure</h2>
                    <form action="admin_process.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_brochure">
                        
                        <div class="mb-4">
                            <label for="brochure_title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" id="brochure_title" name="brochure_title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="brochure_file" class="block text-gray-700 text-sm font-bold mb-2">Brochure File (PDF)</label>
                            <input type="file" id="brochure_file" name="brochure_file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf" required>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="cancel-brochure" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Upload Brochure</button>
                        </div>
                    </form>
                </div>
                
                <!-- Brochures List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Title</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">File Path</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Date Added</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Reset the result pointer
                                mysqli_data_seek($brochures_result, 0);
                                while($brochure = mysqli_fetch_assoc($brochures_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo $brochure['id']; ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($brochure['title']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($brochure['file_path']); ?></td>
                                    <td class="py-2 px-4"><?php echo date('M d, Y', strtotime($brochure['created_at'])); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="<?php echo $brochure['file_path']; ?>" target="_blank" class="text-green-600 hover:text-green-800">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_brochure&id=<?php echo $brochure['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this brochure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php if(mysqli_num_rows($brochures_result) == 0): ?>
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">No brochures found</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="p-6 tab-content hidden" id="settings-content">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Settings</h1>
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Change Password</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="change_password">
                        
                        <div class="mb-4">
                            <label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Current Password</label>
                            <input type="password" id="current_password" name="current_password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="new_password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="confirm_password" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tracks & Sessions Tab -->
            <div class="p-6 tab-content hidden" id="tracks-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Tracks & Sessions</h1>
                    <button id="add-track-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Track
                    </button>
                </div>
                
                <!-- Add Track Form (Hidden by default) -->
                <div id="add-track-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add New Track</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="add_track">
                        
                        <div class="mb-4">
                            <label for="track_name" class="block text-gray-700 text-sm font-bold mb-2">Track Name</label>
                            <input type="text" id="track_name" name="track_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="cancel-track" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Track</button>
                        </div>
                    </form>
                </div>
                
                <!-- Tracks List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Track Name</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Sessions</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tracks-table-body">
                                <?php 
                                if(mysqli_num_rows($tracks_result) > 0) {
                                    while($track = mysqli_fetch_assoc($tracks_result)) { 
                                        // Get sessions for this track
                                        $track_id = $track['tid'];
                                        $sessions_query = "SELECT * FROM sessions WHERE tid = $track_id";
                                        $sessions_result = mysqli_query($db, $sessions_query);
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo $track['tid']; ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($track['trackname']); ?></td>
                                    <td class="py-2 px-4">
                                        <button onclick="toggleSessions(<?php echo $track['tid']; ?>)" class="text-blue-600 hover:text-blue-800">
                                            <span id="session-count-<?php echo $track['tid']; ?>"><?php echo mysqli_num_rows($sessions_result); ?></span> Sessions
                                            <i class="fas fa-chevron-down ml-1" id="session-chevron-<?php echo $track['tid']; ?>"></i>
                                        </button>
                                    </td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=track&id=<?php echo $track['tid']; ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_track&id=<?php echo $track['tid']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this track?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Sessions section for this track -->
                                <tr id="sessions-<?php echo $track['tid']; ?>" class="hidden">
                                    <td colspan="4" class="py-4 px-6 bg-gray-50">
                                        <div class="mb-4">
                                            <button onclick="toggleAddSession(<?php echo $track['tid']; ?>)" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors text-sm">
                                                <i class="fas fa-plus mr-2"></i> Add Session
                                            </button>
                                        </div>
                                        
                                        <!-- Add Session Form -->
                                        <div id="add-session-form-<?php echo $track['tid']; ?>" class="mb-4 hidden">
                                            <form action="admin_process.php" method="POST" class="bg-white p-4 rounded-md shadow-sm">
                                                <input type="hidden" name="action" value="add_session">
                                                <input type="hidden" name="track_id" value="<?php echo $track['tid']; ?>">
                                                
                                                <div class="mb-4">
                                                    <label class="block text-gray-700 text-sm font-bold mb-2">Session Name</label>
                                                    <input type="text" name="session_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                                </div>
                                                
                                                <div class="flex justify-end">
                                                    <button type="button" onclick="toggleAddSession(<?php echo $track['tid']; ?>)" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors text-sm">Cancel</button>
                                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors text-sm">Save Session</button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                        <!-- Sessions Table -->
                                        <table class="min-w-full bg-white rounded-md shadow-sm">
                                            <thead>
                                                <tr>
                                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Session Name</th>
                                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if(mysqli_num_rows($sessions_result) > 0) {
                                                    while($session = mysqli_fetch_assoc($sessions_result)) { 
                                                        // Properly escape the session name for JavaScript
                                                        $escaped_name = str_replace('"', '&quot;', $session['sname']);
                                                ?>
                                                <tr class="border-b">
                                                    <td class="py-2 px-4"><?php echo $session['sid']; ?></td>
                                                    <td class="py-2 px-4"><?php echo htmlspecialchars($session['sname']); ?></td>
                                                    <td class="py-2 px-4">
                                                        <div class="flex space-x-2">
                                                            <button onclick="editSession('<?php echo $session['sid']; ?>', '<?php echo $escaped_name; ?>', <?php echo $track['tid']; ?>)" class="text-blue-600 hover:text-blue-800">
                                                                <i class="fas fa-edit"></i>
                                                            </button>
                                                            <a href="admin_process.php?action=delete_session&id=<?php echo $session['sid']; ?>&track_id=<?php echo $track['tid']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this session?')">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php 
                                                    }
                                                } else {
                                                ?>
                                                <tr>
                                                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">No sessions found for this track</td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">No tracks found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Important Dates Tab -->
            <div class="p-6 tab-content hidden" id="dates-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Important Dates</h1>
                    <button id="add-date-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Date
                    </button>
                </div>
                
                <!-- Add Date Form (Hidden by default) -->
                <div id="add-date-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add Important Date</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="add_date">
                        
                        <div class="mb-4">
                            <label for="event_name" class="block text-gray-700 text-sm font-bold mb-2">Event Name</label>
                            <input type="text" id="event_name" name="event_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="event_date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                            <input type="date" id="event_date" name="event_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="is_highlighted" class="block text-gray-700 text-sm font-bold mb-2">Highlight</label>
                            <select id="is_highlighted" name="is_highlighted" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="cancel-date" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Date</button>
                        </div>
                    </form>
                </div>
                
                <!-- Dates List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Event</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Date</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Highlighted</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="dates-table-body">
                                <?php 
                                if(mysqli_num_rows($dates_result) > 0) {
                                    while($date = mysqli_fetch_assoc($dates_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo isset($date['id']) ? $date['id'] : ''; ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($date['event']); ?></td>
                                    <td class="py-2 px-4"><?php echo date('M d, Y', strtotime($date['date'])); ?></td>
                                    <td class="py-2 px-4">
                                        <?php echo (isset($date['is_highlighted']) && $date['is_highlighted'] == 1) ? '<span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Yes</span>' : 'No'; ?>
                                    </td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=date&id=<?php echo $date['id']; ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_date&id=<?php echo $date['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this date?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">No dates found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Publications Tab -->
            <div class="p-6 tab-content hidden" id="publications-content">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Manage Publications</h1>
                
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Publication Information</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="update_publications">
                        
                        <div class="mb-4">
                            <label for="publication_info" class="block text-gray-700 text-sm font-bold mb-2">Publication Information</label>
                            <textarea id="publication_info" name="publication_info" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required><?php echo isset($publications_data['content']) ? $publications_data['content'] : ''; ?></textarea>
                            <p class="text-sm text-gray-500 mt-1">You can use HTML tags for formatting</p>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update Publication Info</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Committees Tab -->
            <div class="p-6 tab-content hidden" id="committees-content">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Manage Committees</h1>
                
                <!-- Advisory Committee Section -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Advisory Committee</h2>
                        <button id="add-advisory-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Member
                        </button>
                    </div>
                    
                    <!-- Add Advisory Member Form (Hidden by default) -->
                    <div id="add-advisory-form" class="p-4 bg-gray-50 rounded-md mb-4 hidden">
                        <form action="admin_process.php" method="POST">
                            <input type="hidden" name="action" value="add_advisory_member">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="advisory_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                    <input type="text" id="advisory_name" name="advisory_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div>
                                    <label for="advisory_designation" class="block text-gray-700 text-sm font-bold mb-2">Designation</label>
                                    <input type="text" id="advisory_designation" name="advisory_designation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <label for="advisory_affiliation" class="block text-gray-700 text-sm font-bold mb-2">Affiliation</label>
                                <input type="text" id="advisory_affiliation" name="advisory_affiliation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            
                            <div class="flex justify-end mt-4">
                                <button type="button" id="cancel-advisory" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Member</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Name</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Designation</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Affiliation</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="advisory-table-body">
                                <?php 
                                if(mysqli_num_rows($advisory_result) > 0) {
                                    while($member = mysqli_fetch_assoc($advisory_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($member['name']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($member['designation']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($member['institute']); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=advisory&id=<?php echo $member['id']; ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_advisory_member&id=<?php echo $member['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this member?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">No advisory committee members found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Organizing Committee Section -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Organizing Committee</h2>
                        <button id="add-organizing-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Member
                        </button>
                    </div>
                    
                    <!-- Add Organizing Member Form (Hidden by default) -->
                    <div id="add-organizing-form" class="p-4 bg-gray-50 rounded-md mb-4 hidden">
                        <form action="admin_process.php" method="POST">
                            <input type="hidden" name="action" value="add_organizing_member">
                            
                            <div>
                                <label for="organizing_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" id="organizing_name" name="organizing_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            
                            <div class="flex justify-end mt-4">
                                <button type="button" id="cancel-organizing" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Member</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Name</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="organizing-table-body">
                                <?php 
                                if(mysqli_num_rows($organizing_result) > 0) {
                                    while($member = mysqli_fetch_assoc($organizing_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($member['name']); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=organizing&id=<?php echo $member['id']; ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_organizing_member&id=<?php echo $member['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this member?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="2" class="py-4 px-4 text-center text-gray-500">No organizing committee members found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Reviewers Panel Tab -->
            <div class="p-6 tab-content hidden" id="reviewers-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Reviewers Panel</h1>
                    <button id="add-reviewer-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Reviewer
                    </button>
                </div>
                
                <!-- Add Reviewer Form (Hidden by default) -->
                <div id="add-reviewer-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add Reviewer</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="add_reviewer">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="reviewer_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" id="reviewer_name" name="reviewer_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="reviewer_specialty" class="block text-gray-700 text-sm font-bold mb-2">Specialty</label>
                                <input type="text" id="reviewer_specialty" name="reviewer_specialty" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label for="reviewer_institution" class="block text-gray-700 text-sm font-bold mb-2">Institution</label>
                            <input type="text" id="reviewer_institution" name="reviewer_institution" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="flex justify-end mt-4">
                            <button type="button" id="cancel-reviewer" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Reviewer</button>
                        </div>
                    </form>
                </div>
                
                <!-- Reviewers List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Name</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Specialty</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Institution</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="reviewers-table-body">
                                <?php 
                                if(mysqli_num_rows($reviewers_result) > 0) {
                                    while($reviewer = mysqli_fetch_assoc($reviewers_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($reviewer['rewname']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($reviewer['post']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($reviewer['organization']); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="admin_edit.php?type=reviewer&id=<?php echo isset($reviewer['id']) ? $reviewer['id'] : (isset($reviewer['rid']) ? $reviewer['rid'] : '0'); ?>" class="text-blue-600 hover:text-blue-800">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_reviewer&id=<?php echo isset($reviewer['id']) ? $reviewer['id'] : (isset($reviewer['rid']) ? $reviewer['rid'] : '0'); ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this reviewer?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">No reviewers found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Registration Fees Tab -->
            <div class="p-6 tab-content hidden" id="fees-content">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Manage Registration Fees</h1>
                
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold text-gray-900">Registration Fees</h2>
                        <button id="add-fee-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add Fee Category
                        </button>
                    </div>
                    
                    <!-- Add Fee Form (Hidden by default) -->
                    <div id="add-fee-form" class="p-4 bg-gray-50 rounded-md mb-4 hidden">
                        <form action="admin_process.php" method="POST">
                            <input type="hidden" name="action" value="add_fee">
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="fee_category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                    <input type="text" id="fee_category" name="fee_category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                <div>
                                    <label for="fee_amount" class="block text-gray-700 text-sm font-bold mb-2">Fee Amount (Excld. GST)</label>
                                    <input type="text" id="fee_amount" name="fee_amount" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                            </div>
                            
                            <div class="flex justify-end mt-4">
                                <button type="button" id="cancel-fee" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Fee</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Fees List -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Category</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Fee Amount</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $fees_list_query = "SELECT * FROM registration_fees ORDER BY id ASC";
                                $fees_list_result = mysqli_query($db, $fees_list_query);
                                
                                if(mysqli_num_rows($fees_list_result) > 0) {
                                    while($fee = mysqli_fetch_assoc($fees_list_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($fee['category']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($fee['costrs']); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="#" class="text-blue-600 hover:text-blue-800 edit-fee-btn" 
                                               data-id="<?php echo $fee['id']; ?>"
                                               data-category="<?php echo htmlspecialchars($fee['category']); ?>"
                                               data-amount="<?php echo htmlspecialchars($fee['costrs']); ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_fee&id=<?php echo $fee['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this fee category?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="3" class="py-4 px-4 text-center text-gray-500">No fee categories found</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Edit Fee Modal (Hidden by default) -->
                    <div id="edit-fee-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
                        <div class="bg-white rounded-lg p-6 w-full max-w-md">
                            <h3 class="text-xl font-semibold mb-4">Edit Fee</h3>
                            <form action="admin_process.php" method="POST">
                                <input type="hidden" name="action" value="edit_fee">
                                <input type="hidden" id="edit_fee_id" name="fee_id" value="">
                                
                                <div class="mb-4">
                                    <label for="edit_fee_category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                    <input type="text" id="edit_fee_category" name="fee_category" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="edit_fee_amount" class="block text-gray-700 text-sm font-bold mb-2">Fee Amount</label>
                                    <input type="text" id="edit_fee_amount" name="fee_amount" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                </div>
                                
                                <div class="flex justify-end">
                                    <button type="button" id="close-edit-fee" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update Fee</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Payment Instructions -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Payment Instructions</h2>
                    <form action="admin_process.php" method="POST">
                        <input type="hidden" name="action" value="update_payment_instructions">
                        
                        <div class="mb-4">
                            <label for="payment_instructions" class="block text-gray-700 text-sm font-bold mb-2">Payment Instructions</label>
                            <textarea id="payment_instructions" name="payment_instructions" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required><?php echo isset($payment_data['content']) ? $payment_data['content'] : ''; ?></textarea>
                            <p class="text-sm text-gray-500 mt-1">You can use HTML tags for formatting</p>
                            <?php if(mysqli_num_rows($table_exists_result) == 0): ?>
                            <p class="text-sm text-red-500 mt-1">Note: The payment_instructions table doesn't exist yet. It will be created when you save.</p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update Payment Instructions</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Downloads Tab -->
            <div class="p-6 tab-content hidden" id="downloads-content">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Manage Downloads</h1>
                    <button id="add-download-btn" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add Download Item
                    </button>
                </div>
                
                <!-- Add Download Form (Hidden by default) -->
                <div id="add-download-form" class="bg-white rounded-lg shadow-md p-6 mb-6 hidden">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Add Download Item</h2>
                    <form action="admin_process.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_download">
                        
                        <div class="mb-4">
                            <label for="download_title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                            <input type="text" id="download_title" name="download_title" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="download_description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                            <textarea id="download_description" name="download_description" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                        
                        <div class="mb-4">
                            <label for="download_file" class="block text-gray-700 text-sm font-bold mb-2">File</label>
                            <input type="file" id="download_file" name="download_file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="button" id="cancel-download" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Upload Item</button>
                        </div>
                    </form>
                </div>
                
                <!-- Downloads List -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">ID</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Title</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Description</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">File</th>
                                    <th class="py-2 px-4 bg-gray-100 text-left text-gray-600 font-semibold text-sm">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="downloads-table-body">
                                <?php 
                                if(isset($downloads_result) && mysqli_num_rows($downloads_result) > 0) {
                                    while($download = mysqli_fetch_assoc($downloads_result)) { 
                                ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4"><?php echo $download['id']; ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($download['title']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($download['description']); ?></td>
                                    <td class="py-2 px-4"><?php echo htmlspecialchars($download['file_path']); ?></td>
                                    <td class="py-2 px-4">
                                        <div class="flex space-x-2">
                                            <a href="<?php echo $download['file_path']; ?>" target="_blank" class="text-green-600 hover:text-green-800">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="admin_process.php?action=delete_download&id=<?php echo $download['id']; ?>" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure you want to delete this download item?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else { 
                                ?>
                                <tr>
                                    <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                        <?php 
                                        if(mysqli_num_rows($downloads_exists_result) == 0) {
                                            echo "Downloads table doesn't exist yet. Add an item to create it.";
                                        } else {
                                            echo "No download items found";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Session Modal -->
    <div id="edit-session-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Edit Session</h3>
                <form action="admin_process.php" method="POST">
                    <input type="hidden" name="action" value="edit_session">
                    <input type="hidden" name="session_id" id="edit-session-id">
                    <input type="hidden" name="track_id" id="edit-session-track-id">
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Session Name</label>
                        <input type="text" name="session_name" id="edit-session-name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <button type="button" onclick="closeEditSessionModal()" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Tab Navigation
        document.addEventListener('DOMContentLoaded', function() {
            const tabLinks = document.querySelectorAll('[data-tab]');
            const tabContents = document.querySelectorAll('.tab-content');
            
            function setActiveTab(tabName) {
                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Remove active class from all tab links
                tabLinks.forEach(link => {
                    link.classList.remove('active-nav-link', 'bg-blue-800', 'text-white');
                    link.classList.add('text-blue-200');
                });
                
                // Show the selected tab content
                const selectedContent = document.getElementById(tabName + '-content');
                if (selectedContent) {
                    selectedContent.classList.remove('hidden');
                }
                
                // Set the selected tab link as active
                const selectedLinks = document.querySelectorAll(`[data-tab="${tabName}"]`);
                selectedLinks.forEach(link => {
                    link.classList.add('active-nav-link', 'bg-blue-800', 'text-white');
                    link.classList.remove('text-blue-200');
                });
            }
            
            // Set initial active tab
            setActiveTab('dashboard');
            
            // Tab click event handlers
            tabLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const tabName = this.getAttribute('data-tab');
                    setActiveTab(tabName);
                    
                    // Hide mobile sidebar if a tab is clicked on mobile
                    if (this.classList.contains('mobile-nav-link')) {
                        document.getElementById('mobile-sidebar').classList.remove('translate-x-0');
                        document.getElementById('mobile-sidebar').classList.add('-translate-x-full');
                    }
                    
                    // Update URL hash
                    window.location.hash = tabName;
                });
            });
            
            // Handle URL hash for direct tab access
            if (window.location.hash) {
                const tabName = window.location.hash.substring(1);
                setActiveTab(tabName);
            }
            
            // Fee Management
            const addFeeBtn = document.getElementById('add-fee-btn');
            const addFeeForm = document.getElementById('add-fee-form');
            const cancelFeeBtn = document.getElementById('cancel-fee');
            
            if (addFeeBtn) {
                addFeeBtn.addEventListener('click', function() {
                    addFeeForm.classList.remove('hidden');
                });
            }
            
            if (cancelFeeBtn) {
                cancelFeeBtn.addEventListener('click', function() {
                    addFeeForm.classList.add('hidden');
                });
            }
            
            // Fee Edit Modal
            const editFeeModal = document.getElementById('edit-fee-modal');
            const editFeeButtons = document.querySelectorAll('.edit-fee-btn');
            const closeEditFeeBtn = document.getElementById('close-edit-fee');
            
            if (editFeeButtons) {
                editFeeButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        // Get data from data attributes
                        const id = this.getAttribute('data-id');
                        const category = this.getAttribute('data-category');
                        const amount = this.getAttribute('data-amount');
                        
                        // Set values in the form
                        document.getElementById('edit_fee_id').value = id;
                        document.getElementById('edit_fee_category').value = category;
                        document.getElementById('edit_fee_amount').value = amount;
                        
                        // Show modal
                        editFeeModal.classList.remove('hidden');
                    });
                });
            }
            
            if (closeEditFeeBtn) {
                closeEditFeeBtn.addEventListener('click', function() {
                    editFeeModal.classList.add('hidden');
                });
            }
            
            // Also close modal when clicking outside of it
            if (editFeeModal) {
                editFeeModal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.classList.add('hidden');
                    }
                });
            }
        });
        
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
        });
        
        // Close Mobile Menu
        document.getElementById('close-sidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
        });
        
        // Form Toggles for all sections
        document.addEventListener('DOMContentLoaded', function() {
            // Update Form
            const addUpdateBtn = document.getElementById('add-update-btn');
            const addUpdateForm = document.getElementById('add-update-form');
            const cancelUpdateBtn = document.getElementById('cancel-update');
            
            if(addUpdateBtn && addUpdateForm && cancelUpdateBtn) {
                addUpdateBtn.addEventListener('click', function() {
                    addUpdateForm.classList.remove('hidden');
                });
                
                cancelUpdateBtn.addEventListener('click', function() {
                    addUpdateForm.classList.add('hidden');
                });
            }
            
            // Brochure Form
            const addBrochureBtn = document.getElementById('add-brochure-btn');
            const addBrochureForm = document.getElementById('add-brochure-form');
            const cancelBrochureBtn = document.getElementById('cancel-brochure');
            
            if(addBrochureBtn && addBrochureForm && cancelBrochureBtn) {
                addBrochureBtn.addEventListener('click', function() {
                    addBrochureForm.classList.remove('hidden');
                });
                
                cancelBrochureBtn.addEventListener('click', function() {
                    addBrochureForm.classList.add('hidden');
                });
            }
            
            // Tracks & Sessions Form Toggle
            const addTrackBtn = document.getElementById('add-track-btn');
            const addTrackForm = document.getElementById('add-track-form');
            const cancelTrackBtn = document.getElementById('cancel-track');
            
            if(addTrackBtn && addTrackForm && cancelTrackBtn) {
                addTrackBtn.addEventListener('click', function() {
                    addTrackForm.classList.remove('hidden');
                });
                
                cancelTrackBtn.addEventListener('click', function() {
                    addTrackForm.classList.add('hidden');
                });
            }
            
            // Dates Form Toggle
            const addDateBtn = document.getElementById('add-date-btn');
            const addDateForm = document.getElementById('add-date-form');
            const cancelDateBtn = document.getElementById('cancel-date');
            
            if(addDateBtn && addDateForm && cancelDateBtn) {
                addDateBtn.addEventListener('click', function() {
                    addDateForm.classList.remove('hidden');
                });
                
                cancelDateBtn.addEventListener('click', function() {
                    addDateForm.classList.add('hidden');
                });
            }
            
            // Advisory Committee Form Toggle
            const addAdvisoryBtn = document.getElementById('add-advisory-btn');
            const addAdvisoryForm = document.getElementById('add-advisory-form');
            const cancelAdvisoryBtn = document.getElementById('cancel-advisory');
            
            if(addAdvisoryBtn && addAdvisoryForm && cancelAdvisoryBtn) {
                addAdvisoryBtn.addEventListener('click', function() {
                    addAdvisoryForm.classList.remove('hidden');
                });
                
                cancelAdvisoryBtn.addEventListener('click', function() {
                    addAdvisoryForm.classList.add('hidden');
                });
            }
            
            // Organizing Committee Form Toggle
            const addOrganizingBtn = document.getElementById('add-organizing-btn');
            const addOrganizingForm = document.getElementById('add-organizing-form');
            const cancelOrganizingBtn = document.getElementById('cancel-organizing');
            
            if(addOrganizingBtn && addOrganizingForm && cancelOrganizingBtn) {
                addOrganizingBtn.addEventListener('click', function() {
                    addOrganizingForm.classList.remove('hidden');
                });
                
                cancelOrganizingBtn.addEventListener('click', function() {
                    addOrganizingForm.classList.add('hidden');
                });
            }
            
            // Reviewers Form Toggle
            const addReviewerBtn = document.getElementById('add-reviewer-btn');
            const addReviewerForm = document.getElementById('add-reviewer-form');
            const cancelReviewerBtn = document.getElementById('cancel-reviewer');
            
            if(addReviewerBtn && addReviewerForm && cancelReviewerBtn) {
                addReviewerBtn.addEventListener('click', function() {
                    addReviewerForm.classList.remove('hidden');
                });
                
                cancelReviewerBtn.addEventListener('click', function() {
                    addReviewerForm.classList.add('hidden');
                });
            }
            
            // Downloads Form Toggle
            const addDownloadBtn = document.getElementById('add-download-btn');
            const addDownloadForm = document.getElementById('add-download-form');
            const cancelDownloadBtn = document.getElementById('cancel-download');
            
            if(addDownloadBtn && addDownloadForm && cancelDownloadBtn) {
                addDownloadBtn.addEventListener('click', function() {
                    addDownloadForm.classList.remove('hidden');
                });
                
                cancelDownloadBtn.addEventListener('click', function() {
                    addDownloadForm.classList.add('hidden');
                });
            }
        });

        function toggleSessions(trackId) {
            const sessionsRow = document.getElementById(`sessions-${trackId}`);
            const chevron = document.getElementById(`session-chevron-${trackId}`);
            
            if (sessionsRow.classList.contains('hidden')) {
                sessionsRow.classList.remove('hidden');
                chevron.classList.remove('fa-chevron-down');
                chevron.classList.add('fa-chevron-up');
            } else {
                sessionsRow.classList.add('hidden');
                chevron.classList.remove('fa-chevron-up');
                chevron.classList.add('fa-chevron-down');
            }
        }

        function toggleAddSession(trackId) {
            const form = document.getElementById(`add-session-form-${trackId}`);
            form.classList.toggle('hidden');
        }

        function editSession(sessionId, sessionName, trackId) {
            const modal = document.getElementById('edit-session-modal');
            const sessionNameInput = document.getElementById('edit-session-name');
            const sessionIdInput = document.getElementById('edit-session-id');
            const trackIdInput = document.getElementById('edit-session-track-id');
            
            // Decode HTML entities in the session name
            const decodedName = sessionName.replace(/&quot;/g, '"').replace(/&#039;/g, "'");
            
            sessionNameInput.value = decodedName;
            sessionIdInput.value = sessionId;
            trackIdInput.value = trackId;
            
            modal.classList.remove('hidden');
        }

        function closeEditSessionModal() {
            const modal = document.getElementById('edit-session-modal');
            modal.classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('edit-session-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditSessionModal();
            }
        });
    </script>
</body>
</html> 