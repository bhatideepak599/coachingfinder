<!-- index.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add this CSS to your styles.css file or in a style tag within your HTML */

.record-container {
    border: 1px solid #ccc;
    margin-bottom: 20px;
    padding: 15px;
    display:flex;
    flex-wrap: wrap;
}

.section {
    margin-bottom: 20px;
    margin-right: 2vw;
    padding: 2vw;
    background-color: lightgoldenrodyellow;
    flex-basis: 27%;
}

h2{
    margin-left: 5vw;
}
form {
    display: inline-block;
    text-align: center;
    background-color:lightgrey;
    padding: 1vw;
    margin:auto;
    margin-left: 2vw;
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    margin-bottom: 10px;
    padding: 5px;
    width: 200px;
    /* margin-top: 2vw; */
}
#input_box{
    /* height:20vw; */
    max-width:17vw;
    width:17vw;
}

#innerValue,#teacher_detail{
    background-color: lightcyan;
    padding: 1vw;
}
input[type="submit"][value="Update"] {
    background-color:lightgreen;
    cursor:pointer;
    margin-top:1.4vw;
}
/* Add more styles based on your design preferences */
.course-container{
    margin-bottom: 1vw;
    background-color: grey;
    padding: 1vw;
}
    </style>
</head>
<body>

<?php
include 'connection.php';


// Select all rows from my_table1
$result = mysqli_query($conn, "SELECT * FROM my_table1 WHERE id='1234'");


if (mysqli_num_rows($result) > 0) {
    // Fetch each row
    $rowCounter = 0; 
    while ($row = mysqli_fetch_assoc($result)) {
        // Decode JSON strings into arrays
        $decodedTeacherData = json_decode($row['teacherData'], true);
        $decodedSelectedOptionsData = json_decode($row['selectedOptionsData'], true);
        $decodedPlacementRecordsData = json_decode($row['placementRecordsData'], true);
        $decodedCourseData = json_decode($row['courseData'], true);
        $decodedModeOfAdmission = json_decode($row['ModeOfAdmission'], true);
        $decodedScholarship = json_decode($row['scholarship'], true);



        $rowCounter++;
        echo "<div class='record-container' style='background-color: " . ($rowCounter % 2 == 0 ? '#f2f2f2' : '#ffffff') . "'>";



//...................................... Display Teacher Data................................ 
        echo "<div class='section'>";
        echo "<h2>Edit Teacher Data</h2>";
        echo "<form action='update_data.php' method='post'>";
       
        if (!empty($decodedTeacherData)) {
            $teacherId=0;
            foreach ($decodedTeacherData as $teacher) {
                echo "<div id='teacher_detail'>";
             
                foreach ($teacher as $key => $value) {
                    
                    echo "<label>$key:</label>";
                    if($key == "details"){
                        echo "<textarea id='input_box' name='teacherData[$teacherId][$key]'  rows='10'>".$value."</textarea>";
                       
                    }else{
                        echo "<input type='text' name='teacherData[$teacherId][$key]' value='$value'><br>";
                    }
                  
                }
               
                $teacherId=$teacherId+1;
              
                echo "</div>";
                echo "<br>";
                echo "<br>";
            }
        } else {
            echo "<p>No details available.</p>";
        }
        echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</div>";
//.....................................end of teachers details.......................................
//................................... Display of Facilities ................................
echo "<span class='section'>";
        echo "<h2>Facilities</h2>";
        echo "<form action='update_data.php' method='post'>";
        echo "<input type='hidden' name='formType' value='selectedOptionsData'>";
        
        // Add a recordId field if needed
        // echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
        
        if (!empty($decodedSelectedOptionsData)) {
            foreach ($decodedSelectedOptionsData as $optionsArray) {
                foreach ($optionsArray as $key => $value) {
                    echo "<input type='text' name='selectedOptionsData[$key][]' value='$value'><br>";
                }
            }
        } else {
            echo "<p>No details available.</p>";
        }
        echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
//.....................................end of Facilities........................................      
//.................................... Displaying placement Records.............................

        echo "<div class='section1'>";
        echo "<h2>Placement Records</h2>";
        echo "<form action='update_data.php' method='post'>";
        
        if (!empty($decodedPlacementRecordsData)) {
            foreach ($decodedPlacementRecordsData as $index => $record) {
                if (is_array($record)) {
                    foreach ($record as $key => $value) {
                        if ($key === 'records' && is_array($value)) {
                            echo "<strong>$key:</strong>";
                            foreach ($value as $innerIndex => $innerRecord) {
                                echo "<div id='innerValue'>";
                                foreach ($innerRecord as $innerKey => $innerValue) {
                                    echo "<label>$innerKey</label>";
                                    echo "<input type='text' name='placementRecordsData[$index][$key][$innerIndex][$innerKey]' value='$innerValue'><br>";
                                }
                                echo "</div>";
                                echo "<br>";
                            }
                        } else {
                            echo "<input type='text' name='placementRecordsData[$index][$key]' value='$value'><br>";
                            echo "<br>";
                        }
                    }
                } else {
                    echo "<li><strong>Placement Records Data:</strong> $record</li>";
                }
            }
        } else {
            echo "<p>No details available.</p>";
        }
        echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Update'>";
        echo "</form>";
        echo "</div>";
        
      
echo "</span>";
//.......................................end of Placement Record................................
//.......................................Courses And Fee Details................................. 
  
echo "<span class='section'>";
echo "<h2>Courses Details</h2>";
echo "<form action='update_data.php' method='post' id='courseForm'>";
echo "<input type='hidden' name='formType' value='courseData'>";

// Display existing course containers
if (!empty($decodedCourseData)) {
    foreach ($decodedCourseData as $index => $course) {
        echo "<div class='course-container' data-index='$index'>";
        foreach ($course as $key => $value) {
            echo "<input type='text' name='courseData[$index][$key]' value='$value'><br>";
        }
        // Add a delete button
        echo "<button type='button' onclick='removeCourse($index)'>Delete</button>";
        echo "</div>";
    }
} else {
    echo "<p>No details available.</p>";
}

// Add button to dynamically add a new course container
echo "<button type='button' onclick='showAddCourseForm()'>Add Course</button>";

// JavaScript function to show the form for adding a new course
echo "<script>";
echo "function showAddCourseForm() {";
echo "var formContainer = document.createElement('div');";
echo "formContainer.innerHTML = '<label for=\"newCourse\">New Course:</label>' +";
echo "'<select id=\"newCourse\" name=\"newCourse\">' +";
echo "'<option value=\"clat\">CLAT</option>' +";
echo "'<option value=\"cat\">CAT</option>' +";
echo "'<option value=\"9-10\">9-10</option>' +"; // Add more options as needed
echo "'</select>' +";
echo "'<label for=\"newFee\">Fee:</label>' +";
echo "'<input type=\"text\" id=\"newFee\" name=\"newFee\" required>' +";
echo "'<button type=\"button\" onclick=\"addNewCourse()\">OK</button>' +";
echo "'<button type=\"button\" onclick=\"cancelAddCourse()\">Cancel</button>';";
echo "document.querySelector('.section').appendChild(formContainer);";
echo "}";
echo "</script>";

// JavaScript function to add a new course
echo "<script>";
echo "function addNewCourse() {";
echo "var newCourseSelect = document.getElementById('newCourse');";
echo "var newFeeInput = document.getElementById('newFee');";

echo "var courseContainer = document.createElement('div');";
echo "courseContainer.className = 'course-container';";
echo "courseContainer.setAttribute('data-index', 0);";

// Create an input for the course name
echo "var courseNameInput = document.createElement('input');";
echo "courseNameInput.type = 'text';";
echo "courseNameInput.name = 'courseData[0][course]';";
echo "courseNameInput.value = newCourseSelect.value;";
echo "courseContainer.appendChild(courseNameInput);";

// Create an input for the course fee
echo "var feeInput = document.createElement('input');";
echo "feeInput.type = 'text';";
echo "feeInput.name = 'courseData[0][fee]';";
echo "feeInput.value = newFeeInput.value;";
echo "courseContainer.appendChild(feeInput);";

// Create a delete button
echo "var deleteButton = document.createElement('button');";
echo "deleteButton.type = 'button';";
echo "deleteButton.textContent = 'Delete';";
echo "deleteButton.onclick = function() { removeCourse(" . count($decodedCourseData) . "); };";
echo "courseContainer.appendChild(deleteButton);";

// Append the new course container to the .section element
echo "document.querySelector('.section').appendChild(courseContainer);";

// Hide the form after adding the new course
echo "cancelAddCourse();";
echo "}";
echo "</script>";

// JavaScript function to cancel adding a new course
echo "<script>";
echo "function cancelAddCourse() {";
echo "var formContainer = document.querySelector('.section div:last-child');";
echo "if (formContainer) {";
echo "formContainer.remove();";
echo "}";
echo "}";
echo "</script>";

echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
echo "<input type='submit' value='Update'>";
echo "</form>";
//......................................end of course and fee data ...............................

//..................................... Display mode of admission  ...............................

    echo "<h2>Mode of admission</h2>";
    echo "<form action='update_data.php' method='post'>";
    echo "<input type='hidden' name='formType' value='ModeOfAdmission'>";
    // echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
    if (!empty($decodedModeOfAdmission) && $decodedScholarship[0] !== "") {
        foreach ($decodedModeOfAdmission as $index => $value) {
            echo "<input type='text' name='ModeOfAdmission[]' value='$value'><br>";
        }
    } else {
        echo "<p>No any Mode Of Admission available.</p>";
    }
    
    echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
    echo "<input type='submit' value='Update'>";
    echo "</form>";
//...................................end of  Display mode of admission  ...............................

// .........................................scholarship...................................
    echo "<h2>Scholarship Details </h2>";
    echo "<form action='update_data.php' method='post'>";
    echo "<input type='hidden' name='formType' value='scholarship'>";

    if (!empty($decodedScholarship) && $decodedScholarship[0] !== "") {
        
        foreach ($decodedScholarship as $value) {
            echo "<textarea id='input_box' name='scholarship[]'  rows='5'>".$value."</textarea>";
            echo"<br>";
        }
        
    } else {
        echo "<p>No scholarship data found.</p>";
    }
    
    echo "<input type='hidden' name='recordId' value='" . $row['id'] . "'>";
    echo "<input type='submit' value='Update'>";
    echo "</form>"; 
echo"</span>"; 
// .............................................end of scholarship..........................
echo "</div>"; // End of record-container
    }
} else {
    echo "No data found in my_table1";
}

// Close the connection
mysqli_close($conn);
?>
 
</body>
</html>
