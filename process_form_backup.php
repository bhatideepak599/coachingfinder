<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you receive the form data in POST request
    $teacherData = $_POST['teacherData'];
    $selectedOptionsData = $_POST['selectedOptionsData'];
    $placementRecordsData = $_POST['placementRecordsData'];
    $courseData = $_POST['courseData'];
    $ModeOfAdmission=$_POST['ModeOfAdmission'];
    $scholarship=$_POST['scholarship'];
    $allDetail=$_POST['allDetail'];
    $coaching_centre_id=$_POST['coaching_centre_id'];
    $written_detail=$_POST['written_detail'];
    $uniqueCourseNames=$_POST['uniqueCourseNames'];
    $coaching_location=$_POST['selectedValues'];
    $basicDetailFrontArray=$_POST['basicDetailFrontArray'];
    $Basic_details = json_decode($allDetail, true);
    $coaching_location_encoded_data=json_decode($coaching_location, true);
    $coaching_centre_name=$Basic_details[0].', '.$coaching_location_encoded_data[2].', '.$coaching_location_encoded_data[1];



    // Insert into the database
    $sql = "INSERT INTO my_table1 (id,city,course,brief_details,teacherData, selectedOptionsData, placementRecordsData, courseData,ModeOfAdmission,Scholarship,basicData,detail) 
            VALUES ('$coaching_centre_id','$coaching_location','$uniqueCourseNames','$basicDetailFrontArray','$teacherData', '$selectedOptionsData', '$placementRecordsData', '$courseData','$ModeOfAdmission','$scholarship','$allDetail','$written_detail')";
    $sql2= "INSERT INTO tbl_coaching_name(id,coaching_name) VALUES ('$coaching_centre_id','$coaching_centre_name')";
    // Execute the query
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2)) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
