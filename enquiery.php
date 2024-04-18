<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "INSERT INTO enquiry (name, mobile, class, coaching, question) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'siiis', $name, $mobile, $class, $coaching, $question);
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $class = $_POST['class'];
    $coaching = $_POST['coaching'];
    $question = $_POST['question'];

    mysqli_stmt_execute($stmt);

    if(mysqli_stmt_affected_rows($stmt) > 0) {
        $_SESSION['status']="Record inserted successfully";
        header('Location:home.php');
        exist(0);
       
    } else {
        $_SESSION['status'] = "Form submitted successfully!";
        header('Location: home.php#container321');
        exist(0);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
