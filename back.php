<?php
include 'connection.php';
// Database connection details
// Function to generate random Indian city names and states
function getRandomIndianCityState() {
    $indianCities = array(
        "Mumbai, Maharashtra",
        "Delhi, Delhi",
        "Bangalore, Karnataka",
        "Kolkata, West Bengal",
        "Chennai, Tamil Nadu",
        "Hyderabad, Telangana",
        "Ahmedabad, Gujarat",
        "Pune, Maharashtra",
        "Surat, Gujarat",
        "Jaipur, Rajasthan",
        "Lucknow, Uttar Pradesh",
        "Kanpur, Uttar Pradesh",
        "Nagpur, Maharashtra",
        "Indore, Madhya Pradesh",
        "Thane, Maharashtra",
        "Bhopal, Madhya Pradesh",
        "Visakhapatnam, Andhra Pradesh",
        "Pimpri-Chinchwad, Maharashtra",
        "Patna, Bihar",
        "Vadodara, Gujarat",
        "Ranchi, Jharkhand"

    );

    return explode(', ', $indianCities[array_rand($indianCities)]);
}

// Generate and insert dummy data
for ($i = 0; $i <100; $i++) {
    list($city, $state) = getRandomIndianCityState();
    $country = "India";

    $cityDetails = json_encode([$country, $city, $state]);
    $id=rand(10, 99999);
    $course = json_encode(["jee", "neet", "clat", "cat", "8-9", "pre schooling","nda","banking","railway","police","civil service","board exams","1-5"]);
    $brief_details = json_encode(["Institute Name",rand(100000000, 1000000000), "email@example.com", rand(500000, 1000000), rand(1000000, 2000000)]);
    $teacherData = '[]';
    $selectedOptionsData = json_encode(["parking-facility", "ac-classroom", "24x7-doubt-solving", "dpp"]);
    $placementRecordsData = json_encode([["type" => "competition", "records" => [["year" => "2024-03-23", "totalStudents" => rand(80, 150), "placedStudents" => rand(70, 120)]]]]);
    $courseData = json_encode([
        ["course" => "jee", "programs" => [["program" => "alpha batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]],
        ["course" => "neet", "programs" => [["program" => "Bita batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]],
        ["course" => "clat", "programs" => [["program" => "Gamma batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]],
        ["course" => "cat", "programs" => [["program" => "Feghsy batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]],
        ["course" => "8-9", "programs" => [["program" => "alpha batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]],
        ["course" => "pre schooling", "programs" => [["program" => "alpha batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]]
    ]);
    $ModeOfAdmission = json_encode(["jee mains", "aiims entrance", "12th board percentile", "scholarship exam"]);
    $scholarship = json_encode(["90% in 12th then 50% scholarship", "95% in 12th then 75% scholarship"]);
    $basicData = json_encode(["Institute Name", "Website"]);
    $detail = "Dummy details";
    $image_path = '';

    $sql = "INSERT INTO my_table1 (id,city, course, brief_details, teacherData, selectedOptionsData, placementRecordsData, courseData, ModeOfAdmission, scholarship, basicData, detail, image_path) VALUES ('$id','$cityDetails', '$course', '$brief_details', '$teacherData', '$selectedOptionsData', '$placementRecordsData', '$courseData', '$ModeOfAdmission', '$scholarship', '$basicData', '$detail', '$image_path')";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "Dummy data inserted successfully";

// Close connection
$conn->close();

?>
