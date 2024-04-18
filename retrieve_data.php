<?php
include 'connection.php';

// Select all rows from my_table1
$result = mysqli_query($conn, "SELECT * FROM my_table1");

// Check if there are any rows
if (mysqli_num_rows($result) > 0) {
    // Fetch each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Decode JSON strings into arrays
        $decodedTeacherData = json_decode($row['teacherData'], true);
        $decodedSelectedOptionsData = json_decode($row['selectedOptionsData'], true);
        $decodedPlacementRecordsData = json_decode($row['placementRecordsData'], true);
        $decodedCourseData = json_decode($row['courseData'], true);
        $decodedModeOfAdmission=json_decode($row['ModeOfAdmission'],true);
        $decodedScholarship=json_decode($row['scholarship'],true);
        $allDetails=json_decode($row['basicData'],true);

        // Display the decoded data in a formatted way
        echo "<div class='record-container'>";
        //display all data
        echo "<div class='section'>";
        echo "<h2>All Basic Details</h2>";
        if (!empty($allDetails)) {
            echo "<ul>";
            foreach ($allDetails as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No details available.</p>";
        }
        
        echo "</div>";

        // Display Teacher Data
        echo "<div class='section'>";
        echo "<h2>Teacher Data</h2>";
        if(!empty($decodedTeacherData)){
            foreach ($decodedTeacherData as $teacher) {
                echo "<ul>";
                foreach ($teacher as $key => $value) {
                    echo "<strong>$key:</strong> $value <br>";
                }
                echo "</ul>";
            }
        }else{
            echo "<p>No details available.</p>";
        }
       
        echo "</div>";

        // Display Selected Options Data
        echo "<div class='section'>";
        echo "<h2>Selected Options Data</h2>";
        if(!empty($decodedSelectedOptionsData)){
            echo "<ul>";
            foreach ($decodedSelectedOptionsData[0] as $option) {
                echo "<li>$option</li>";
            }
            echo "</ul>";
        }else{
            echo "<p>No details available.</p>";

        }
       
        echo "</div>";

        // Display Placement Records Data
        echo "<div class='section'>";
        echo "<h2>Placement Records Data</h2>";
        if(!empty($decodedPlacementRecordsData)){
        foreach ($decodedPlacementRecordsData as $record) {
            if (is_array($record) ) {
                echo "<ul>";
                foreach ($record as $key => $value) {
                    if ($key === 'records' && is_array($value) ) {
                        echo "<li><strong>$key:</strong>"."</li>";
                        echo "<ul>";
                        foreach ($value as $innerRecord ) {
                            
                            foreach ($innerRecord as $innerKey => $innerValue) {
                                echo "<strong>$innerKey:</strong> $innerValue | ";
                            }
                            echo "<br>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<li><strong>$key:</strong> $value</li>";
                    }
                }
                echo "</ul>";
            } else {
                echo "<li><strong>Placement Records Data:</strong> $record</li>";
            }
        }
    }else{
        echo "<p>No details available.</p>";

    }

        echo "</div>";

        // Display Course Data
        echo "<div class='section'>";
        echo "<h2>Course Data</h2>";
        if(!empty($decodedCourseData)){

        
        foreach ($decodedCourseData as $course) {
            echo "<ul>";
            foreach ($course as $key => $value) {
                echo "<li><strong>$key:</strong> $value</li>";
            }
            echo "</ul>";
        }}else{
            echo "<p>No details available.</p>"; 
        }
       
        echo "</div>";
         //display mode of admission
        echo "<div class='section'>";
        echo "<h2>Mode Of Admission</h2>";
        if(!empty($decodedModeOfAdmission) && $decodedScholarship[0] !== ""){
            echo "<ul>";
            foreach ($decodedModeOfAdmission as $key => $value) {
                
            echo "<li> $value</li>";
               
            }
        echo "</ul>"; 
        }else{
            echo "<p>No any Mode Of Admission available.</p>";

        }

        echo "</div>";


     //display scholarship
     echo "<div class='section'>";
     echo "<h2>Scholarship Details</h2>";
     
     if (!empty($decodedScholarship) && $decodedScholarship[0] !== "") {
         echo "<ul>";
         foreach ($decodedScholarship as $value) {
             echo "<li>$value</li>";
         }
         echo "</ul>";
     } else {
         echo "<p>No scholarship data found.</p>";
     }
     
     echo "</div>";
     
        
        echo "</div>"; // End of record-container
    }
} else {
    echo "No data found in my_table1";
}

// Close the connection
mysqli_close($conn);
?>
