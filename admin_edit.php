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
if($type === 'update') {
    $query = "SELECT * FROM site_updates WHERE id = $id";
    $result = mysqli_query($db, $query);
    
    if(mysqli_num_rows($result) == 1) {
        $item = mysqli_fetch_assoc($result);
        $page_title = "Edit Update";
        $form_action = "admin_process.php";
    } else {
        header('Location: admin_dashboard.php');
        exit();
    }
} else {
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
</head>
<body class="font-[Inter] bg-gray-100 min-h-screen">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-900"><?php echo $page_title; ?></h1>
            <a href="admin_dashboard.php#<?php echo $type; ?>s" class="text-blue-600 hover:text-blue-800">
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
            <?php endif; ?>
        </div>
    </div>
</body>
</html> 