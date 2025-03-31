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
            
        // Tracks & Sessions actions
        case 'add_track':
            if(isset($_POST['track_name']) && isset($_POST['track_description'])) {
                $name = mysqli_real_escape_string($db, $_POST['track_name']);
                $description = mysqli_real_escape_string($db, $_POST['track_description']);
                
                $query = "INSERT INTO site_tracks (name, description, created_by) VALUES ('$name', '$description', $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Track added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#tracks');
            break;
            
        case 'edit_track':
            if(isset($_POST['track_id']) && isset($_POST['track_name']) && isset($_POST['track_description'])) {
                $id = mysqli_real_escape_string($db, $_POST['track_id']);
                $name = mysqli_real_escape_string($db, $_POST['track_name']);
                $description = mysqli_real_escape_string($db, $_POST['track_description']);
                
                $query = "UPDATE site_tracks SET name = '$name', description = '$description' WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Track updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#tracks');
            break;
            
        case 'delete_track':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM site_tracks WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Track deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#tracks');
            break;
            
        // Important Dates actions
        case 'add_date':
            if(isset($_POST['event_name']) && isset($_POST['event_date'])) {
                $event_name = mysqli_real_escape_string($db, $_POST['event_name']);
                $event_date = mysqli_real_escape_string($db, $_POST['event_date']);
                $is_highlighted = isset($_POST['is_highlighted']) ? intval($_POST['is_highlighted']) : 0;
                
                $query = "INSERT INTO site_dates (event_name, event_date, is_highlighted, created_by) 
                          VALUES ('$event_name', '$event_date', $is_highlighted, $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Date added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#dates');
            break;
            
        case 'edit_date':
            if(isset($_POST['date_id']) && isset($_POST['event_name']) && isset($_POST['event_date'])) {
                $id = mysqli_real_escape_string($db, $_POST['date_id']);
                $event_name = mysqli_real_escape_string($db, $_POST['event_name']);
                $event_date = mysqli_real_escape_string($db, $_POST['event_date']);
                $is_highlighted = isset($_POST['is_highlighted']) ? intval($_POST['is_highlighted']) : 0;
                
                $query = "UPDATE site_dates SET event_name = '$event_name', event_date = '$event_date', 
                          is_highlighted = $is_highlighted WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Date updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#dates');
            break;
            
        case 'delete_date':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM site_dates WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Date deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#dates');
            break;
            
        // Publications action
        case 'update_publications':
            if(isset($_POST['publication_info'])) {
                $publication_info = $_POST['publication_info']; // Not escaping to allow HTML
                
                // Check if record exists
                $check_query = "SELECT id FROM site_publications LIMIT 1";
                $check_result = mysqli_query($db, $check_query);
                
                if(mysqli_num_rows($check_result) > 0) {
                    $row = mysqli_fetch_assoc($check_result);
                    $query = "UPDATE site_publications SET content = '$publication_info', updated_by = $admin_id, 
                              updated_at = NOW() WHERE id = " . $row['id'];
                } else {
                    $query = "INSERT INTO site_publications (content, created_by) VALUES ('$publication_info', $admin_id)";
                }
                
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Publications information updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#publications');
            break;
            
        // Advisory Committee actions
        case 'add_advisory_member':
            if(isset($_POST['advisory_name']) && isset($_POST['advisory_designation']) && isset($_POST['advisory_affiliation'])) {
                $name = mysqli_real_escape_string($db, $_POST['advisory_name']);
                $designation = mysqli_real_escape_string($db, $_POST['advisory_designation']);
                $affiliation = mysqli_real_escape_string($db, $_POST['advisory_affiliation']);
                
                $query = "INSERT INTO advisory_committee (name, designation, affiliation, created_by) 
                          VALUES ('$name', '$designation', '$affiliation', $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Advisory committee member added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        case 'edit_advisory_member':
            if(isset($_POST['advisory_id']) && isset($_POST['advisory_name']) && isset($_POST['advisory_designation']) && isset($_POST['advisory_affiliation'])) {
                $id = mysqli_real_escape_string($db, $_POST['advisory_id']);
                $name = mysqli_real_escape_string($db, $_POST['advisory_name']);
                $designation = mysqli_real_escape_string($db, $_POST['advisory_designation']);
                $affiliation = mysqli_real_escape_string($db, $_POST['advisory_affiliation']);
                
                $query = "UPDATE advisory_committee SET name = '$name', designation = '$designation', 
                          affiliation = '$affiliation' WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Advisory committee member updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        case 'delete_advisory_member':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM advisory_committee WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Advisory committee member deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        // Organizing Committee actions
        case 'add_organizing_member':
            if(isset($_POST['organizing_name']) && isset($_POST['organizing_role']) && isset($_POST['organizing_department'])) {
                $name = mysqli_real_escape_string($db, $_POST['organizing_name']);
                $role = mysqli_real_escape_string($db, $_POST['organizing_role']);
                $department = mysqli_real_escape_string($db, $_POST['organizing_department']);
                
                $query = "INSERT INTO organizing_committee (name, role, department, created_by) 
                          VALUES ('$name', '$role', '$department', $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Organizing committee member added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        case 'edit_organizing_member':
            if(isset($_POST['organizing_id']) && isset($_POST['organizing_name']) && isset($_POST['organizing_role']) && isset($_POST['organizing_department'])) {
                $id = mysqli_real_escape_string($db, $_POST['organizing_id']);
                $name = mysqli_real_escape_string($db, $_POST['organizing_name']);
                $role = mysqli_real_escape_string($db, $_POST['organizing_role']);
                $department = mysqli_real_escape_string($db, $_POST['organizing_department']);
                
                $query = "UPDATE organizing_committee SET name = '$name', role = '$role', 
                          department = '$department' WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Organizing committee member updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        case 'delete_organizing_member':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM organizing_committee WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Organizing committee member deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#committees');
            break;
            
        // Reviewers Panel actions
        case 'add_reviewer':
            if(isset($_POST['reviewer_name']) && isset($_POST['reviewer_specialty']) && isset($_POST['reviewer_institution'])) {
                $name = mysqli_real_escape_string($db, $_POST['reviewer_name']);
                $specialty = mysqli_real_escape_string($db, $_POST['reviewer_specialty']);
                $institution = mysqli_real_escape_string($db, $_POST['reviewer_institution']);
                
                $query = "INSERT INTO reviewers_panel (name, specialty, institution, created_by) 
                          VALUES ('$name', '$specialty', '$institution', $admin_id)";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Reviewer added successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#reviewers');
            break;
            
        case 'edit_reviewer':
            if(isset($_POST['reviewer_id']) && isset($_POST['reviewer_name']) && isset($_POST['reviewer_specialty']) && isset($_POST['reviewer_institution'])) {
                $id = mysqli_real_escape_string($db, $_POST['reviewer_id']);
                $name = mysqli_real_escape_string($db, $_POST['reviewer_name']);
                $specialty = mysqli_real_escape_string($db, $_POST['reviewer_specialty']);
                $institution = mysqli_real_escape_string($db, $_POST['reviewer_institution']);
                
                $query = "UPDATE reviewers_panel SET name = '$name', specialty = '$specialty', 
                          institution = '$institution' WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Reviewer updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#reviewers');
            break;
            
        case 'delete_reviewer':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                $query = "DELETE FROM reviewers_panel WHERE id = $id";
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Reviewer deleted successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#reviewers');
            break;
            
        // Registration Fees actions
        case 'update_fees':
            if(isset($_POST['fees_info'])) {
                $fees_info = $_POST['fees_info']; // Not escaping to allow HTML
                
                // Check if record exists
                $check_query = "SELECT id FROM registration_fees LIMIT 1";
                $check_result = mysqli_query($db, $check_query);
                
                if(mysqli_num_rows($check_result) > 0) {
                    $row = mysqli_fetch_assoc($check_result);
                    $query = "UPDATE registration_fees SET content = '$fees_info', updated_by = $admin_id, 
                              updated_at = NOW() WHERE id = " . $row['id'];
                } else {
                    $query = "INSERT INTO registration_fees (content, created_by) VALUES ('$fees_info', $admin_id)";
                }
                
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Registration fees information updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#fees');
            break;
            
        case 'update_payment_instructions':
            if(isset($_POST['payment_instructions'])) {
                $payment_instructions = $_POST['payment_instructions']; // Not escaping to allow HTML
                
                // Check if record exists
                $check_query = "SELECT id FROM payment_instructions LIMIT 1";
                $check_result = mysqli_query($db, $check_query);
                
                if(mysqli_num_rows($check_result) > 0) {
                    $row = mysqli_fetch_assoc($check_result);
                    $query = "UPDATE payment_instructions SET content = '$payment_instructions', updated_by = $admin_id, 
                              updated_at = NOW() WHERE id = " . $row['id'];
                } else {
                    $query = "INSERT INTO payment_instructions (content, created_by) VALUES ('$payment_instructions', $admin_id)";
                }
                
                if(mysqli_query($db, $query)) {
                    $_SESSION['success_message'] = "Payment instructions updated successfully!";
                } else {
                    $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                }
            }
            header('Location: admin_dashboard.php#fees');
            break;
            
        // Downloads actions
        case 'add_download':
            if(isset($_POST['download_title']) && isset($_POST['download_description']) && isset($_FILES['download_file'])) {
                $title = mysqli_real_escape_string($db, $_POST['download_title']);
                $description = mysqli_real_escape_string($db, $_POST['download_description']);
                $file = $_FILES['download_file'];
                
                // Create uploads directory if it doesn't exist
                $upload_dir = "upload/downloads/";
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }
                
                // Generate a unique filename
                $new_filename = uniqid() . '_' . $file['name'];
                $target_file = $upload_dir . $new_filename;
                
                // Upload the file
                if(move_uploaded_file($file['tmp_name'], $target_file)) {
                    // Insert into database
                    $query = "INSERT INTO site_downloads (title, description, file_path, created_by) 
                              VALUES ('$title', '$description', '$target_file', $admin_id)";
                    if(mysqli_query($db, $query)) {
                        $_SESSION['success_message'] = "Download item added successfully!";
                    } else {
                        $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                        // Delete the uploaded file if database insert fails
                        unlink($target_file);
                    }
                } else {
                    $_SESSION['success_message'] = "Error uploading file.";
                }
            }
            header('Location: admin_dashboard.php#downloads');
            break;
            
        case 'delete_download':
            if(isset($_GET['id'])) {
                $id = mysqli_real_escape_string($db, $_GET['id']);
                
                // Get the file path before deleting the record
                $query = "SELECT file_path FROM site_downloads WHERE id = $id";
                $result = mysqli_query($db, $query);
                if($row = mysqli_fetch_assoc($result)) {
                    $file_path = $row['file_path'];
                    
                    // Delete the record from the database
                    $query = "DELETE FROM site_downloads WHERE id = $id";
                    if(mysqli_query($db, $query)) {
                        // Delete the file from the server
                        if(file_exists($file_path)) {
                            unlink($file_path);
                        }
                        $_SESSION['success_message'] = "Download item deleted successfully!";
                    } else {
                        $_SESSION['success_message'] = "Error: " . mysqli_error($db);
                    }
                }
            }
            header('Location: admin_dashboard.php#downloads');
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