<?php
include 'conection.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Define variables and initialize with empty values
    $coaching_institute = $environment = $study_material = $success_ratio = $facilities = $teachers_quality = $name = $email = $contact = $city = $positive_points = $negative_points = "";

    // Process form data when form is submitted
    $coaching_institute = $_POST["coaching_institute"];
    $environment = $_POST["environment"];
    $study_material = $_POST["study_material"];
    $success_ratio = $_POST["success_ratio"];
    $facilities = $_POST["facilities"];
    $teachers_quality = $_POST["teachers_quality"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $city = $_POST["city"];
    $positive_points = $_POST["positive_points"];
    $negative_points = $_POST["negative_points"];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO reviews (coaching_institute, environment, study_material, success_ratio, facilities, teachers_quality, name, email, contact, city, positive_points, negative_points) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $coaching_institute, $environment, $study_material, $success_ratio, $facilities, $teachers_quality, $name, $email, $contact, $city, $positive_points, $negative_points);

    // Attempt to execute the prepared statement
    if ($stmt->execute() === TRUE) {
        // Redirect to thank you page after successful submission
        header("location: thank_you.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
