<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn) {
        $formType = $_POST['formType'];
        $recordId= $_POST['recordId'];
        // echo $recordId;

        $formTypeToColumn = [
            'teacherData' => 'teacherData',
            'selectedOptionsData' => 'selectedOptionsData',
            'placementRecordsData' => 'placementRecordsData',
            'courseData' => 'courseData',
            'ModeOfAdmission' => 'ModeOfAdmission',
            'scholarship' => 'scholarship'
           
        ];

        if (array_key_exists($formType, $formTypeToColumn)) {
            // Get the submitted JSON data from the form
            $updatedData = $_POST[$formType];

            // Convert the updatedData to JSON format
            $updatedJsonData = json_encode($updatedData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

            // Update the existing JSON data in the database
            $query = "UPDATE my_table1 SET {$formTypeToColumn[$formType]} = ? WHERE id = '$recordId'";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Bind the parameter
                mysqli_stmt_bind_param($stmt, "s", $updatedJsonData);

              
                $result = mysqli_stmt_execute($stmt);

                if ($result) {
                  
                    echo "Data updated successfully.";
                } else {
                   
                    echo "Error updating data: " . mysqli_error($conn);
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Handle the statement preparation failure
                echo "Statement preparation failed: " . mysqli_error($conn);
            }

            // Close the database connection
            mysqli_close($conn);

            exit();
        } else {
            
            echo "Unknown form type.";
        }
    } else {
     
        echo "Error connecting to the database.";
    }
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
