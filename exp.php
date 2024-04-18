<?php

include 'connection.php';
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
        "Ranchi, Jharkhand",
    );

    return explode(', ', $indianCities[array_rand($indianCities)]);
}

// Function to generate random facilities
function getRandomFacilities() {
    $facilities = ["parking-facility", "ac-classroom", "24x7-doubt-solving", "dpp"];
    shuffle($facilities);
    $numFacilities = rand(1, count($facilities));
    return array_slice($facilities, 0, $numFacilities);
}

// Function to generate random courses
function getRandomCourses() {
    $courses = ["jee", "neet", "clat", "cat", "8-9", "pre schooling"];
    shuffle($courses);
    $numCourses = rand(1, count($courses));
    return array_slice($courses, 0, $numCourses);
}

// Generate and insert dummy data
for ($i = 0; $i <50; $i++) {
    list($city, $state) = getRandomIndianCityState();
    $country = "India";
    $id=rand(10, 99999);
    $cityDetails = json_encode([$country, $state, $city]);
    $course = json_encode(getRandomCourses());
    $coachingInstitute = [
        "Soul Catch Coaching", "Home of Inspiration", "Energy and Pride Coaching", "The Enhancement Station",
        "The Grooming Hub", "The Magic Wand", "Perfect Advisors Inc.", "Unlock Potential Station", "Impact Experts",
        "Harmony Collective", "Solution Coaching", "Progress Institute", "Wonder Academy", "Timeless Coaching",
        "The Pathfinders", "Success Gate Coaching", "A1 Institute", "Excellent Brains Station", "Confidence Boast Inc.",
        "King’s Mindset", "Positive Rebels", "Fortress of Glory", "Excellent Management", "The Stepping Stone Inc.",
        "The Cornerstone Project", "Bright Ideas LLC", "The Blue Zone", "The Clear Path Inc.", "Sky-blue Collective",
        "Pure Empowerment", "Transformative Future", "Inspiration Lounge", "The Knights Path", "Personified Success LLC",
        "Soul Consulting Hub", "Tiger Base Coaches", "Arrowhead Clique", "Ted and Partners", "Perfect Platform",
        "Lighthouse Squad", "Midas Touch Community", "Life Mastery Inc.", "Future Leaders Station", "Grand Circle LLC",
        "Soul Readers Bay", "Prime Legacy", "Executive Support Station", "Gold Bang LLC", "First Men Group",
        "Light and Flames"
    ];
    $instituteName = $coachingInstitute[array_rand($coachingInstitute)];
    $website = str_replace(' ', '', strtolower($instituteName)) . '.ac.in';
    $brief_details = json_encode([$instituteName, rand(1000000000, 9999999999), strtolower(str_replace(' ', '', $instituteName)) . '@gmail.com', rand(500, 10000), rand(100000, 200000)]);
    $teacherData = '[]';
    $selectedOptionsData = json_encode([getRandomFacilities()]);
    $placementRecordsData = json_encode([["type" => "competition", "records" => [["year" => "2024-03-23", "totalStudents" => rand(80, 150), "placedStudents" => rand(70, 120)]]]]);
    $courseData = json_encode(array_map(function($course) {
        return ["course" => $course, "programs" => [["program" => "alpha batch", "duration" => "2", "strength" => "100", "location" => "Location", "fee" => rand(500000, 800000)]]];
    }, json_decode($course)));
    $ModeOfAdmission = json_encode(["jee mains", "aiims entrance", "12th board percentile", "scholarship exam"]);
    $scholarship = json_encode(["90% in 12th then 50% scholarship", "95% in 12th then 75% scholarship"]);
    $basicData = json_encode([$instituteName, $website]);
    $detail = "Soul Catch Coaching is committed to providing the best coaching for students aspiring to excel in competitive exams like JEE, NEET, CLAT, CAT, and others. Our experienced faculty and comprehensive study materials ensure that students are well-prepared to achieve their goals.";
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