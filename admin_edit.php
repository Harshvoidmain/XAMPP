<?php
session_start();
include 'connection.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Check if type and ID are provided
if(!isset($_GET['type']) || !isset($_GET['id'])) {
    header('Location: admin_dashboard.php');
    exit();
}

$type = $_GET['type'];
$id = mysqli_real_escape_string($db, $_GET['id']);

// Variables to store data
$item = null;
$page_title = "";
$form_action = "";

// Get item data based on type
switch($type) {
    case 'update':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'site_updates'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Updates table doesn't exist";
            header('Location: admin_dashboard.php#updates');
            exit();
        }
        
        $query = "SELECT * FROM site_updates WHERE id = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Update";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#updates');
            exit();
        }
        break;
        
    case 'track':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'tracks'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Tracks table doesn't exist";
            header('Location: admin_dashboard.php#tracks');
            exit();
        }
        
        $query = "SELECT * FROM tracks WHERE tid = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Track";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#tracks');
            exit();
        }
        break;
        
    case 'date':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'important_dates'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Important dates table doesn't exist";
            header('Location: admin_dashboard.php#dates');
            exit();
        }
        
        $query = "SELECT * FROM important_dates WHERE id = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Important Date";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#dates');
            exit();
        }
        break;
        
    case 'advisory':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'advisory_committees'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Advisory committees table doesn't exist";
            header('Location: admin_dashboard.php#committees');
            exit();
        }
        
        $query = "SELECT * FROM advisory_committees WHERE id = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Advisory Committee Member";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#committees');
            exit();
        }
        break;
        
    case 'organizing':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'organizing_committees'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Organizing committees table doesn't exist";
            header('Location: admin_dashboard.php#committees');
            exit();
        }
        
        $query = "SELECT * FROM organizing_committees WHERE id = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Organizing Committee Member";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#committees');
            exit();
        }
        break;
        
    case 'reviewer':
        // Check if table exists
        $table_check_query = "SHOW TABLES LIKE 'reviewer'";
        $table_check_result = mysqli_query($db, $table_check_query);
        
        if(mysqli_num_rows($table_check_result) == 0) {
            $_SESSION['success_message'] = "Error: Reviewers table doesn't exist";
            header('Location: admin_dashboard.php#reviewers');
            exit();
        }
        
        $query = "SELECT * FROM reviewer WHERE id = $id";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $item = mysqli_fetch_assoc($result);
            $page_title = "Edit Reviewer";
            $form_action = "admin_process.php";
        } else {
            header('Location: admin_dashboard.php#reviewers');
            exit();
        }
        break;
        
    default:
        // Invalid type
        header('Location: admin_dashboard.php');
        exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - ICNTE 2025 Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="font-[Inter] bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900"><?php echo $page_title; ?></h1>
            <a href="admin_dashboard.php#<?php echo $type === 'advisory' || $type === 'organizing' ? 'committees' : $type.'s'; ?>" class="text-blue-600 hover:text-blue-800">
                &larr; Back to Dashboard
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow-md p-6">
            <?php if($type === 'update'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_update">
                    <input type="hidden" name="update_id" value="<?php echo $item['id']; ?>">
                    
                    <div class="mb-4">
                        <label for="update_text" class="block text-gray-700 text-sm font-bold mb-2">Update Text</label>
                        <input type="text" id="update_text" name="update_text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['text']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="update_link" class="block text-gray-700 text-sm font-bold mb-2">Link (URL)</label>
                        <input type="text" id="update_link" name="update_link" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['link']); ?>" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#updates" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
            
            <?php elseif($type === 'track'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_track">
                    <input type="hidden" name="track_id" value="<?php echo $item['tid']; ?>">
                    
                    <div class="mb-4">
                        <label for="track_name" class="block text-gray-700 text-sm font-bold mb-2">Track Name</label>
                        <input type="text" id="track_name" name="track_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['trackname']); ?>" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#tracks" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
                
            <?php elseif($type === 'date'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_date">
                    <input type="hidden" name="date_id" value="<?php echo $item['id']; ?>">
                    
                    <div class="mb-4">
                        <label for="event_name" class="block text-gray-700 text-sm font-bold mb-2">Event Name</label>
                        <input type="text" id="event_name" name="event_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['event']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="event_date" class="block text-gray-700 text-sm font-bold mb-2">Date</label>
                        <input type="date" id="event_date" name="event_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo date('Y-m-d', strtotime($item['date'])); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="is_highlighted" class="block text-gray-700 text-sm font-bold mb-2">Highlight</label>
                        <select id="is_highlighted" name="is_highlighted" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="0" <?php echo (!isset($item['is_highlighted']) || $item['is_highlighted'] == 0) ? 'selected' : ''; ?>>No</option>
                            <option value="1" <?php echo (isset($item['is_highlighted']) && $item['is_highlighted'] == 1) ? 'selected' : ''; ?>>Yes</option>
                        </select>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#dates" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
                
            <?php elseif($type === 'advisory'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_advisory_member">
                    <input type="hidden" name="advisory_id" value="<?php echo $item['id']; ?>">
                    
                    <div class="mb-4">
                        <label for="advisory_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="advisory_name" name="advisory_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="advisory_designation" class="block text-gray-700 text-sm font-bold mb-2">Designation</label>
                        <input type="text" id="advisory_designation" name="advisory_designation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['designation']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="advisory_affiliation" class="block text-gray-700 text-sm font-bold mb-2">Affiliation</label>
                        <input type="text" id="advisory_affiliation" name="advisory_affiliation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['institute']); ?>" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#committees" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
                
            <?php elseif($type === 'organizing'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_organizing_member">
                    <input type="hidden" name="organizing_id" value="<?php echo $item['id']; ?>">
                    
                    <div class="mb-4">
                        <label for="organizing_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="organizing_name" name="organizing_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['name']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="organizing_role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                        <input type="text" id="organizing_role" name="organizing_role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['role']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="organizing_department" class="block text-gray-700 text-sm font-bold mb-2">Department</label>
                        <input type="text" id="organizing_department" name="organizing_department" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['department']); ?>" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#committees" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
                
            <?php elseif($type === 'reviewer'): ?>
                <form action="<?php echo $form_action; ?>" method="POST">
                    <input type="hidden" name="action" value="edit_reviewer">
                    <input type="hidden" name="reviewer_id" value="<?php echo $item['id']; ?>">
                    
                    <div class="mb-4">
                        <label for="reviewer_name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input type="text" id="reviewer_name" name="reviewer_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['rewname']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="reviewer_specialty" class="block text-gray-700 text-sm font-bold mb-2">Specialty</label>
                        <input type="text" id="reviewer_specialty" name="reviewer_specialty" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['post']); ?>" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="reviewer_institution" class="block text-gray-700 text-sm font-bold mb-2">Institution</label>
                        <input type="text" id="reviewer_institution" name="reviewer_institution" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo htmlspecialchars($item['organization']); ?>" required>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="admin_dashboard.php#reviewers" class="mr-2 bg-gray-300 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-400 transition-colors inline-block">Cancel</a>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition-colors">Update</button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 