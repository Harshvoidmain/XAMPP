<?php
include 'connection.php';

// Check if setup is already completed
$setup_check_query = "SELECT 1 FROM admin_users LIMIT 1";
$setup_already_done = false;

if(mysqli_query($db, $setup_check_query)) {
    if(mysqli_num_rows(mysqli_query($db, $setup_check_query)) > 0) {
        $setup_already_done = true;
    }
}

// Message to display
$message = "";

// Process setup form
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['setup_admin'])) {
    $admin_username = mysqli_real_escape_string($db, $_POST['admin_username']);
    $admin_password = $_POST['admin_password'];
    $admin_email = mysqli_real_escape_string($db, $_POST['admin_email']);
    
    // Validate input
    if(empty($admin_username) || empty($admin_password) || empty($admin_email)) {
        $message = "All fields are required";
    } elseif(strlen($admin_password) < 8) {
        $message = "Password must be at least 8 characters long";
    } else {
        // Hash the password
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);
        
        // Create admin_users table
        $admin_table = "CREATE TABLE IF NOT EXISTS admin_users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            email VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            last_login TIMESTAMP NULL
        )";
        
        if(!mysqli_query($db, $admin_table)) {
            $message = "Error creating admin_users table: " . mysqli_error($db);
        } else {
            // Create site_updates table
            $updates_table = "CREATE TABLE IF NOT EXISTS site_updates (
                id INT AUTO_INCREMENT PRIMARY KEY,
                text VARCHAR(255) NOT NULL,
                link VARCHAR(255) NOT NULL,
                created_by INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (created_by) REFERENCES admin_users(id)
            )";
            
            if(!mysqli_query($db, $updates_table)) {
                $message = "Error creating site_updates table: " . mysqli_error($db);
            } else {
                // Create site_brochures table
                $brochures_table = "CREATE TABLE IF NOT EXISTS site_brochures (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(100) NOT NULL,
                    file_path VARCHAR(255) NOT NULL,
                    created_by INT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (created_by) REFERENCES admin_users(id)
                )";
                
                if(!mysqli_query($db, $brochures_table)) {
                    $message = "Error creating site_brochures table: " . mysqli_error($db);
                } else {
                    // Create tracks table
                    $tracks_table = "CREATE TABLE IF NOT EXISTS site_tracks (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        name VARCHAR(100) NOT NULL,
                        description TEXT NOT NULL,
                        created_by INT NOT NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        FOREIGN KEY (created_by) REFERENCES admin_users(id)
                    )";
                    
                    if(!mysqli_query($db, $tracks_table)) {
                        $message = "Error creating site_tracks table: " . mysqli_error($db);
                    } else {
                        // Create important dates table
                        $dates_table = "CREATE TABLE IF NOT EXISTS site_dates (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            event_name VARCHAR(100) NOT NULL,
                            event_date DATE NOT NULL,
                            is_highlighted TINYINT(1) DEFAULT 0,
                            created_by INT NOT NULL,
                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            FOREIGN KEY (created_by) REFERENCES admin_users(id)
                        )";
                        
                        if(!mysqli_query($db, $dates_table)) {
                            $message = "Error creating site_dates table: " . mysqli_error($db);
                        } else {
                            // Create publications table
                            $publications_table = "CREATE TABLE IF NOT EXISTS site_publications (
                                id INT AUTO_INCREMENT PRIMARY KEY,
                                content TEXT NOT NULL,
                                created_by INT NOT NULL,
                                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                updated_by INT NULL,
                                updated_at TIMESTAMP NULL,
                                FOREIGN KEY (created_by) REFERENCES admin_users(id),
                                FOREIGN KEY (updated_by) REFERENCES admin_users(id)
                            )";
                            
                            if(!mysqli_query($db, $publications_table)) {
                                $message = "Error creating site_publications table: " . mysqli_error($db);
                            } else {
                                // Create advisory committee table
                                $advisory_table = "CREATE TABLE IF NOT EXISTS advisory_committee (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    name VARCHAR(100) NOT NULL,
                                    designation VARCHAR(100) NOT NULL,
                                    affiliation VARCHAR(200) NOT NULL,
                                    created_by INT NOT NULL,
                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                    FOREIGN KEY (created_by) REFERENCES admin_users(id)
                                )";
                                
                                if(!mysqli_query($db, $advisory_table)) {
                                    $message = "Error creating advisory_committee table: " . mysqli_error($db);
                                } else {
                                    // Create organizing committee table
                                    $organizing_table = "CREATE TABLE IF NOT EXISTS organizing_committee (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        name VARCHAR(100) NOT NULL,
                                        role VARCHAR(100) NOT NULL,
                                        department VARCHAR(100) NOT NULL,
                                        created_by INT NOT NULL,
                                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                        FOREIGN KEY (created_by) REFERENCES admin_users(id)
                                    )";
                                    
                                    if(!mysqli_query($db, $organizing_table)) {
                                        $message = "Error creating organizing_committee table: " . mysqli_error($db);
                                    } else {
                                        // Create reviewers panel table
                                        $reviewers_table = "CREATE TABLE IF NOT EXISTS reviewers_panel (
                                            id INT AUTO_INCREMENT PRIMARY KEY,
                                            name VARCHAR(100) NOT NULL,
                                            specialty VARCHAR(100) NOT NULL,
                                            institution VARCHAR(200) NOT NULL,
                                            created_by INT NOT NULL,
                                            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                            FOREIGN KEY (created_by) REFERENCES admin_users(id)
                                        )";
                                        
                                        if(!mysqli_query($db, $reviewers_table)) {
                                            $message = "Error creating reviewers_panel table: " . mysqli_error($db);
                                        } else {
                                            // Create registration fees table
                                            $fees_table = "CREATE TABLE IF NOT EXISTS registration_fees (
                                                id INT AUTO_INCREMENT PRIMARY KEY,
                                                content TEXT NOT NULL,
                                                created_by INT NOT NULL,
                                                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                                updated_by INT NULL,
                                                updated_at TIMESTAMP NULL,
                                                FOREIGN KEY (created_by) REFERENCES admin_users(id),
                                                FOREIGN KEY (updated_by) REFERENCES admin_users(id)
                                            )";
                                            
                                            if(!mysqli_query($db, $fees_table)) {
                                                $message = "Error creating registration_fees table: " . mysqli_error($db);
                                            } else {
                                                // Create payment instructions table
                                                $payment_table = "CREATE TABLE IF NOT EXISTS payment_instructions (
                                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                                    content TEXT NOT NULL,
                                                    created_by INT NOT NULL,
                                                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                                    updated_by INT NULL,
                                                    updated_at TIMESTAMP NULL,
                                                    FOREIGN KEY (created_by) REFERENCES admin_users(id),
                                                    FOREIGN KEY (updated_by) REFERENCES admin_users(id)
                                                )";
                                                
                                                if(!mysqli_query($db, $payment_table)) {
                                                    $message = "Error creating payment_instructions table: " . mysqli_error($db);
                                                } else {
                                                    // Create downloads table
                                                    $downloads_table = "CREATE TABLE IF NOT EXISTS site_downloads (
                                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                                        title VARCHAR(100) NOT NULL,
                                                        description TEXT NOT NULL,
                                                        file_path VARCHAR(255) NOT NULL,
                                                        created_by INT NOT NULL,
                                                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                                        FOREIGN KEY (created_by) REFERENCES admin_users(id)
                                                    )";
                                                    
                                                    if(!mysqli_query($db, $downloads_table)) {
                                                        $message = "Error creating site_downloads table: " . mysqli_error($db);
                                                    } else {
                                                        // Insert admin user
                                                        $admin_insert = "INSERT INTO admin_users (username, password, email) VALUES ('$admin_username', '$hashed_password', '$admin_email')";
                                                        
                                                        if(!mysqli_query($db, $admin_insert)) {
                                                            $message = "Error creating admin user: " . mysqli_error($db);
                                                        } else {
                                                            // Get the admin ID
                                                            $admin_id = mysqli_insert_id($db);
                                                            
                                                            // Insert default updates
                                                            $default_updates = [
                                                                ["text" => "Download ICNTE-2025 Conference Brochure.", "link" => "download/ICNTE_2025.pdf"],
                                                                ["text" => "Conference is open for paper submission.", "link" => "instructions.php"],
                                                                ["text" => "Winners of IEI BLC-FCRIT excellence awards announced soon.", "link" => "#"],
                                                                ["text" => "Important dates updated.", "link" => "important_dates.php"],
                                                                ["text" => "Early bird registration deadline approaching!", "link" => "fees.php"],
                                                                ["text" => "New keynote speaker announced for ICNTE-2025.", "link" => "keynote_speakers.php"]
                                                            ];
                                                            
                                                            foreach($default_updates as $update) {
                                                                $update_text = mysqli_real_escape_string($db, $update["text"]);
                                                                $update_link = mysqli_real_escape_string($db, $update["link"]);
                                                                $update_insert = "INSERT INTO site_updates (text, link, created_by) VALUES ('$update_text', '$update_link', $admin_id)";
                                                                mysqli_query($db, $update_insert);
                                                            }
                                                            
                                                            // Create upload directories
                                                            if(!file_exists("upload")) {
                                                                mkdir("upload", 0777);
                                                            }
                                                            
                                                            if(!file_exists("upload/brochures")) {
                                                                mkdir("upload/brochures", 0777);
                                                            }
                                                            
                                                            $message = "Setup completed successfully! You can now <a href='admin_login.php' class='text-blue-600 hover:underline'>login</a> with your admin account.";
                                                            $setup_already_done = true;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Setup - ICNTE 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-[Inter] bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-900">ICNTE 2025 Admin Setup</h1>
            <p class="text-gray-600">Initialize the admin system</p>
        </div>
        
        <?php if(!empty($message)): ?>
            <div class="<?php echo strpos($message, 'Error') !== false ? 'bg-red-100 border-red-400 text-red-700' : 'bg-green-100 border-green-400 text-green-700'; ?> px-4 py-3 rounded mb-4 border">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        
        <?php if($setup_already_done): ?>
            <div class="text-center">
                <p class="mb-4">Admin system is already set up.</p>
                <a href="admin_login.php" class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                    Go to Admin Login
                </a>
            </div>
        <?php else: ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="mb-4">
                    <label for="admin_username" class="block text-gray-700 text-sm font-bold mb-2">Admin Username</label>
                    <input type="text" id="admin_username" name="admin_username" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div class="mb-4">
                    <label for="admin_password" class="block text-gray-700 text-sm font-bold mb-2">Admin Password</label>
                    <input type="password" id="admin_password" name="admin_password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <p class="text-xs text-gray-500 mt-1">Password must be at least 8 characters long</p>
                </div>
                
                <div class="mb-6">
                    <label for="admin_email" class="block text-gray-700 text-sm font-bold mb-2">Admin Email</label>
                    <input type="email" id="admin_email" name="admin_email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                
                <div>
                    <button type="submit" name="setup_admin" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition-colors">
                        Set Up Admin System
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center">
                <a href="index.php" class="text-blue-600 hover:underline">Back to Website</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>