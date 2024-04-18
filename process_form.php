<?php
include 'connection.php';
$coachingCenterName = $_POST['coachingCenterName'] ?? '';
$location = $_POST['location'] ?? '';
$teachersData = $_POST['teacherDetails'] ?? [];
$selectedOptionsData = $_POST['options'] ?? [];
$placementRecordsData = $_POST['placementRecords'] ?? [];
$courseData = $_POST['addedCourses'] ?? [];

// Combine all arrays into a single associative array
$allData = [
    'coachingCenterName' => $coachingCenterName,
    'location' => $location,
    'teachersData' => $teachersData,
    'selectedOptionsData' => $selectedOptionsData,
    'placementRecordsData' => $placementRecordsData,
    'courseData' => $courseData,
];

// Convert the array to a JSON string
$jsonData = json_encode($allData, JSON_UNESCAPED_UNICODE);


// Escape and insert the JSON string into your MySQL table
$sql = "INSERT INTO my_table (Data) VALUES ('" . $conn->real_escape_string($jsonData) . "')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error inserting data: " . $conn->error;
}

// Close connection
$conn->close();
?>
