<?php
// Database connection
$db = mysqli_connect("localhost", "sql_icnte", "3MACYSHR2tJjejsZ", "chatbot_db");

// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// List of website pages to fetch
$pages = [
    "https://icnte.fcrit.ac.in/index.php" => "Home",
    "https://icnte.fcrit.ac.in/tracks_and_sessions.php" => "Tracks and Sessions",
    "https://icnte.fcrit.ac.in/important_dates.php" => "Important Dates",
    "https://icnte.fcrit.ac.in/venue.php" => "Venue",
    "https://icnte.fcrit.ac.in/publications.php" => "Publications",
    "https://icnte.fcrit.ac.in/advisory_committee.php" => "Advisory Committee",
    "https://icnte.fcrit.ac.in/organizing_committee.php" => "Organizing Committee",
    "https://icnte.fcrit.ac.in/reviewers_panel.php" => "Reviewers Panel",
    "https://icnte.fcrit.ac.in/instructions.php" => "Instructions",
    "https://icnte.fcrit.ac.in/fees.php" => "Registration Fees",
    "https://icnte.fcrit.ac.in/contact.php" => "Contact Us",
];

foreach ($pages as $url => $page_name) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignore SSL verification issues
    $content = curl_exec($ch);
    curl_close($ch);

    if ($content) {
        // Remove HTML tags and trim content
        $content = strip_tags($content);
        $content = substr($content, 0, 8000); // Increased limit

        // Prepare SQL query to insert/update content
        $stmt = mysqli_prepare($db, "INSERT INTO website_content (page_url, page_name, content) 
            VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE content=?");
        mysqli_stmt_bind_param($stmt, "ssss", $url, $page_name, $content, $content);
        if (!mysqli_stmt_execute($stmt)) {
            error_log("Database error for $page_name: " . mysqli_error($db));
        }
    } else {
        error_log("Failed to fetch content from: $url");
    }
}

// Close database connection
mysqli_close($db);
echo "Website content fetched and stored successfully.";
?>
