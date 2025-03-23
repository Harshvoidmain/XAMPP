<?php
session_start();
include 'connection.php';

$error = '';

// Check if admin is already logged in
if(isset($_SESSION['admin_id'])) {
    header('Location: admin_dashboard.php');
    exit();
}

// Process login form
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password'];
    
    // Validate input
    if(empty($username) || empty($password)) {
        $error = "Username and password are required";
    } else {
        // Get admin details from database
        $query = "SELECT id, username, password FROM admin_users WHERE username = '$username'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify password
            if(password_verify($password, $row['password'])) {
                // Password is correct, start a new session
                session_regenerate_id();
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['last_activity'] = time();
                
                // Redirect to admin dashboard
                header('Location: admin_dashboard.php');
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ICNTE 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-[Inter] bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">ICNTE 2025 Admin</h1>
            <p class="text-gray-600">Login to access the admin dashboard</p>
        </div>
        
        <?php if(!empty($error)): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                    Login
                </button>
            </div>
        </form>
        
        <div class="mt-6 text-center">
            <a href="index.php" class="text-blue-600 hover:underline">Back to Website</a>
        </div>
    </div>
</body>
</html> 