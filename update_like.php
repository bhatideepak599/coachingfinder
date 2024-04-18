<?php
// Include your database connection file here if needed
include 'connection.php';
// Get item ID and new like count from the URL and form data
$itemId = $_GET['id']; // Get item ID from the URL
$newCount = $_POST['newCount']; // Get new like count from form data

// Validate and sanitize input as needed
$itemId = intval($itemId); // Convert to integer for security (assuming it's an integer ID)


 mysqli_query($conn, "UPDATE my_table1 SET like_count = $newCount WHERE id = $itemId");

// Send a response (You can customize this response accordingly)
echo 'Like count updated successfully';
?>
