<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $coachingName = $_POST['coachingName'];
    $location = $_POST['location'];
    $course = $_POST['course'];
    $full_name = $_POST['full_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $temp_address = $_POST['temp_address'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $block = $_POST['block'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO booking_data (coaching_name, location, course, full_name, mobile, email, temp_address, state, district, block, landmark, pincode) 
            VALUES ('$coachingName', '$location', '$course', '$full_name', '$mobile', '$email', '$temp_address', '$state', '$district', '$block', '$landmark', '$pincode')";

    if ($conn->query($sql) === TRUE) {
       $_SESSION['status']="Thanku your data has been saved successfully! Pay amount for confirm it";
       header('Location:payment.php');
       exist;
    } else {
        $_SESSION['status']="Something went wrong . Please try again";
       header('Location:payment.php');
       exist;
    }

    $conn->close();
} else {
    header("Location: book_coaching.php");
    exit;
}
?>
