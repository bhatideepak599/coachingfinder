<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $email = $_POST['email'];
    $board10 = $_POST['board10'];
    $passingYear10 = $_POST['passingYear10'];
    $percentage10 = $_POST['percentage10'];
    $board12 = $_POST['board12'];
    $passingYear12 = $_POST['passingYear12'];
    $marksObtained12 = $_POST['marksObtained12'];
    $yearOfTarget = $_POST['yearOfTarget'];
    $dob = $_POST['dob'];

    // Prepare and bind SQL statement for updating
    $status="1";
    $update_query = "UPDATE login SET gender=?, course=?, state=?, district=?, board10=?, passingYear10=?, percentage10=?, board12=?, passingYear12=?, marksObtained12=?, yearOfTarget=?, dob=?, all_detailed_filled=? WHERE email=?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssssssssssss", $gender, $course, $state, $district, $board10, $passingYear10, $percentage10, $board12, $passingYear12, $marksObtained12, $yearOfTarget, $dob,$status, $email);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>
