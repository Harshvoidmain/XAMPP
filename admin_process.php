<?php
session_start();
include 'connection.php';

// Check if admin is logged in
if(!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit();
}

// Get admin ID
$admin_id = $_SESSION['admin_id'];

// Process the action
if(isset($_POST['action']) || isset($_GET['action'])) {
    $action = isset($_POST['action']) ? $_POST['action'] : $_GET['action'];
    
    switch($action) {
        case 'add_update':
            // Add a new update
            if(isset($_POST['update_text']) && isset($_POST['update_link'])) {
                $text = mysqli_real_escape_string($db, $_POST['update_text']);
                $link = mysqli_real_escape_string($db, $_POST['update_link']);
                
                $query = "INSERT INTO site_updates (text, link, created_by) VALUES ('$text', '$link', $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Update added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#updates');
            break;
            
        case 'edit_update':
            // Edit an existing update
            if(isset($_POST['update_id']) && isset($_POST['update_text']) && isset($_POST['update_link'])) {
                $id = mysqli_real_escape_string($db, $_POST['update_id']);
                $text = mysqli_real_escape_string($db, $_POST['update_text']);
                $link = mysqli_real_escape_string($db, $_POST['update_link']);
                
                $query = "UPDATE site_updates SET text = '$text', link = '$link' WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Update edited successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#updates');
            break;
            
        case 'delete_update':
            // Delete an update
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM site_updates WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Update deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#updates');
            break;
            
        case 'add_brochure':
            // Add a new brochure
            if(isset($_POST['brochure_title']) && isset($_FILES['brochure_file'])) {
                $title = mysqli_real_escape_string($db, $_POST['brochure_title']);
                $file = $_FILES['brochure_file'];
                
                // Check if file is a PDF
                $file_type = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                if($file_type != "pdf") {
                    $_SESSION['success_message'] = "Error: Only PDF files are allowed.";
                    header('Location: admin_dashboard.php#brochures');
                    exit();
                }
                
                // Create uploads directory if it doesn't exist
                $upload_dir = "upload/brochures/";
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate a unique filename
                $new_filename = uniqid() . '_' . $file['name'];
                $target_file = $upload_dir . $new_filename;
                
                // Upload the file
                if(move_uploaded_file($file['tmp_name'], $target_file)) {
                    // Insert into database
                    $query = "INSERT INTO site_brochures (title, file_path, created_by) VALUES ('$title', '$target_file', $admin_id)";
                    if(mysqli_query($db, $query)) {
                        $_SESSION['success_message'] = "Brochure uploaded successfully!";
                    } else {
                        $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                        // Delete the uploaded file if database insert fails
                        unlink($target_file);
                    }
                } else {
                    $_SESSION['success_message'] = "Error uploading file.";
                }
            }
            header('Location: admin_dashboard.php#brochures');
            break;
            
        case 'delete_brochure':
            // Delete a brochure
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                // Get the file path before deleting the record
                $query = "SELECT file_path FROM site_brochures WHERE id = $id";
                $result = mysqli_query($db, $query);
                if($row = mysqli_fetch_assoc($result)) {
                    $file_path = $row['file_path'];
                    
                    // Delete the record from the database
                    $query = "DELETE FROM site_brochures WHERE id = $id";
                    if(mysqli_query($db, $query)) {
                        // Delete the file from the server
                        if(file_exists($file_path)) {
                            unlink($file_path);
                        }
                        $_SESSION['success_message'] = "Brochure deleted successfully!";
                    } else {
                        $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                    }
                }
            }
            header('Location: admin_dashboard.php#brochures');
            break;
            
        case 'change_password':
            // Change admin password
            if(isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                
                // Validate that new passwords match
                if($new_password !== $confirm_password) {
                    $_SESSION['success_message'] = "Error: New passwords do not match.";
                    header('Location: admin_dashboard.php#settings');
                    exit();
                }
                
                // Get the current admin details
                $query = "SELECT password FROM admin_users WHERE id = $admin_id";
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_assoc($result);
                
                // Verify current password
                if(password_verify($current_password, $row['password'])) {
                    // Hash the new password
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    
                    // Update the password
                    $query = "UPDATE admin_users SET password = '$hashed_password' WHERE id = $admin_id";
                    if(mysqli_query($db, $query)) {
                        $_SESSION['success_message'] = "Password changed successfully!";
                    } else {
                        $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                    }
                } else {
                    $_SESSION['success_message'] = "Error: Current password is incorrect.";
                }
            }
            header('Location: admin_dashboard.php#settings');
            break;
            
        default:
            // Invalid action, redirect to dashboard
            header('Location: admin_dashboard.php');
            break;
    }
} else {
    // No action specified, redirect to dashboard
    header('Location: admin_dashboard.php');
}
?> 