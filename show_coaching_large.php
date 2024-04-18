<?php
include 'navbar.php';

?>
<link rel="stylesheet" href="show_coaching_large.css">  
<script src='Chart.min.js'></script>
    </head>
    <body>

<script>
  function toggleNav() {
    var navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('show');
  }
//   ............................enquery .......................
function openInquiryForm() {
        document.getElementById("inquiryContainer").style.display = "flex";
        document.body.style.overflow = "hidden"; /* Disable scrolling when the inquiry form is open */
    }

    function closeInquiryForm() {
        document.getElementById("inquiryContainer").style.display = "none";
        document.body.style.overflow = "auto"; /* Enable scrolling when the inquiry form is closed */
    }

    function submitInquiry() {
        // Handle form submission logic here
        // use JavaScript to collect the input values and send them to the server
        closeInquiryForm();
    }
</script>

<span class="inquiry-span" onclick="openInquiryForm()"><i class="fas fa-headset"></i> </span> 

<div class="inquiry-container" id="inquiryContainer">
    <div class="inquiry-form">
        <span class="close-btn" onclick="closeInquiryForm()">&times;</span>
        <label for="question">Your Question:</label>
        <input type="text" id="question" name="question" placeholder="Enter your question">

        <label for="mobile">Mobile Number:</label>
        <input type="text" id="mobile" name="mobile" placeholder="Enter your mobile number">
        <div class="btn-container">
            <button class="submit-btn" onclick="submitInquiry()">Submit</button>
            <button class="cancel-btn" onclick="closeInquiryForm()">Cancel</button>
        </div>
    </div>
</div>


<?php
include 'connection.php';

$id=$_GET['id'];
// Select all rows from my_table1

$result = mysqli_query($conn, "SELECT * FROM my_table1 where id=$id");


if (mysqli_num_rows($result) > 0) {
    // Fetch each row
    $rowCounter = 0; 
    while ($row = mysqli_fetch_assoc($result)) {
     
        $decodedTeacherData = json_decode($row['teacherData'], true);
        $decodedSelectedOptionsData = json_decode($row['selectedOptionsData'], true);
        $decodedPlacementRecordsData = json_decode($row['placementRecordsData'], true);
        $decodedCourseData = json_decode($row['courseData'], true);
        $decodedModeOfAdmission = json_decode($row['ModeOfAdmission'], true);
        $decodedScholarship = json_decode($row['scholarship'], true);
        $Basic_details = json_decode($row['basicData'], true);
        $Brief_details= json_decode($row['brief_details'], true);
        $location = json_decode($row['city'], true);
        $written_detail=$row['detail'];
        $id=$row['id'];



        $rowCounter++;
        // echo "<div class='record-container' style='background-color: " . ($rowCounter % 2 == 0 ? '#f2f2f2' : '#ffffff') . "'>";

        
        if (!empty($Basic_details) && $Basic_details[0] !== "") {
            // echo "<div class='coaching_detail'>";
        
            // echo "<p style='font-weight:900;font-size:1.5vw;line-height:0vw;'>Name of the Coaching centre</p>";
            // echo "<p>$Basic_details[0]</p>";
            // echo "<p style='font-weight:900;font-size:1.5vw;line-height:0vw;'>Location of the Coaching centre</p>";
            // echo "<p>$Basic_details[1]</p>";
            // echo "<p style='font-weight:900;font-size:1.5vw;line-height:0vw;'>Coching Cnetre Website</p>";
            
            // echo "<p>$Basic_details[2]</p>";
            
            // echo "<p style='font-weight:900;font-size:1.5vw;'>About Institute</p>";
            // echo "<p style='line-height:1.8vw;'> $written_detail</p>";
            // foreach ($Basic_details as $index => $value) {
            //     echo "<p>$value</p>";
              
                
            // }
            // echo "</div>";
            $likeCount = 10; 
            echo "<div class='coaching-container'>";
            
            echo "<div class='coaching-sub-container'>";
            echo "<div class='coaching-name'>$Basic_details[0]</div>";
            echo "<div class='icon-container'>";
            echo "<i class='fas fa-map-marker-alt'></i> $location[2],  $location[1]";
            echo "<span style='margin: 0 10px;'>&nbsp;</span>"; // Add space between icons and text
            echo "<i class='fas fa-share'></i> Share";
            echo "<span style='margin: 0 10px;'>&nbsp;</span>"; // Add space between icons and text
            echo "<i class='fas fa-mobile-alt'></i> $Brief_details[1]";
            echo "<span style='margin: 0 10px;'>&nbsp;</span>"; // Add space between icons and text
            echo "<i class='fas fa-thumbs-up' id='likeIcon' onclick='likeClick()'></i><span id='likeCount'>$likeCount</span>&nbsp; Likes";
            echo "</div>";
            
            echo "<div class='website-info'>";
            echo "<img src='images/happy_man.jpg' alt='Website Icon' class='website-icon'> $Basic_details[1]";
            echo "</div>";
            echo "<div class='review-info'>Reviews: 9/10</div>";
            
            echo "<div class='course-info'>";
            
            foreach ($decodedCourseData as $course) {
                $courseName = $course['course'];
            
                foreach ($course['programs'] as $program) {
                    if ($courseName) {
                        $val = strtoupper($courseName);
                        echo "<div class='course-tag'>#$val</div>";
                        $courseName = null;
                    }
                }
            }
            
            echo "</div>";
            
            echo "</div>";
            
            echo "</div>";
            
            
   
        } else {
            echo "<p>No any Mode Of Admission available.</p>";
        }
echo "<nav class='nav1' style='width:100%;'>
  <a href='#' class='responsive-nav' onclick='toggleNav()'>☰ Menu</a>
  <div class='nav-links' style='width:100%;'>
    <a href='#'>Connectivity</a>
    <a href='#'>Admission</a>
    <a href='#'>Scholarship</a>
    <a href='#'>Courses</a>
    <a href='#'>Events & Gallery</a>
    <a href='#'>Fees</a>
    <a href='#'>Selection Rate</a>
    <a href='#'>Online Service</a>
    <a href='#'>Reviews</a>
    <a href='#'>Q&A</a>
  </div>
   </nav>";

   

// echo "<div class='coaching_main_body'>";



//...................................... Display Teacher Data................................ 


echo" <div class='coaching_sub_body_left'>";  

echo"<div id='left_part'>";
echo "<p style='line-height:2rem;padding:2vw;'>$written_detail</p>";



        echo "<h2>Teachers Details</h2>";
        if (!empty($decodedTeacherData)) {
            echo "<div id='teacher_detail'>";
            foreach ($decodedTeacherData as $teacher) {
                
                $name;
                $experience;
                $subject;
                $about;
                foreach ($teacher as $key => $value) {
                    

                    if($key == "name"){
                       $name=$value;  
                    }
                    if($key == "subject"){
                      $subject=$value; 
                    }
                    if($key == "experience"){
                      $experience=$value; 
                    }
                    if($key == "details"){
                      $about=$value; 
                    }    
                  
                }
                // echo "<p>$name</p>";
                // echo "<p> $subject</p>";
                // echo "<p> $experience</p>";
                echo "<div class='teacher-container'>
                <div class='teacher-logo'>$name[0]</div>
                <div class='teacher-details'>
                    <div class='teacher-name'>$name</div>
                    <div class='teacher-subjects'><b>Subjects:</b> $subject</div>
                    <div class='teacher-experience'> <b>$experience years </b> of teaching experience</div>
                    
                    <div class='teacher-about'>$about</div>
                    
                </div>
                </div>";
      
               
              
                
                echo "<br>";
                echo "<br>";
            }
            echo "</div>";
        } else {
            echo "<p>No details available.</p>";
        }


//.....................................end of teachers details.......................................
//................................... Display of Facilities ................................
echo "<span class='section'>";
        echo "<h2>Facilities</h2>";
        
        if (!empty($decodedSelectedOptionsData)) {
            echo "<table border='1'>";
            foreach ($decodedSelectedOptionsData as $optionsArray) {
                echo "<tr id='facilities'>";
                foreach ($optionsArray as $key => $value) {
                    
                    echo "<td><p>$value</p></td>";
                 
                }
                echo "</tr>";
                
            }
            
            echo "</table>";
        } else {
            echo "<p>No details available.</p>";
        }
        
 
//.....................................end of Facilities........................................      
//.................................... Displaying placement Records.............................

        // echo "<div class='section1'>";
      

        // if (!empty($decodedPlacementRecordsData)) {
        //     $up = array();
        //     $down = array();
            
        //     foreach ($decodedPlacementRecordsData as $index => $record) {
        //         if (is_array($record)) {
        //             foreach ($record as $key => $value) {
        //                 if ($key === 'records' && is_array($value)) {
                           
        //                     foreach ($value as $innerIndex => $innerRecord) {
        //                         echo "<div id='innerValue'>";
        //                         $year = $total_student = $placed_student = null;
        
        //                         foreach ($innerRecord as $innerKey => $innerValue) {
        //                             if ($innerKey == 'year') {
        //                                 $year = $innerValue;
        //                             } else if ($innerKey == 'totalStudents') {
        //                                 $total_student = $innerValue;
        //                             } else if ($innerKey == 'placedStudents') {
        //                                 $placed_student = $innerValue;
        //                             }
        //                         }
        
        //                         // echo "<p>$year</p>";
        //                         // echo "<p>$total_student</p>";
        //                         // echo "<p>$placed_student</p>";
        
        //                         // Format data for 'up' and 'down' arrays
        //                         $up[] = array("label" => $year, "y" => intval($total_student));
        //                         $down[] = array("label" => $year, "y" => intval($placed_student));
        
        //                         echo "</div>";
        //                         echo "<br>";
        //                     }
        //                 } 
        //             }
        //         }
        //     }
            // Echo the contents of the 'up' array
            // echo "<pre>";
            // print_r($up);
            // echo "</pre>";
            
            // Echo the contents of the 'down' array
            // echo "<pre>";
            // print_r($down);
            // echo "</pre>";
            
            // Echo the JavaScript variables
        //     echo "<script>var upData = " . json_encode($up) . ";</script>";
        //     echo "<script>var downData = " . json_encode($down) . ";</script>";
        // } else {
        //     echo "<p>No details available.</p>";
        // }
        
        // echo "</div>";
        
      
echo "</span>";



// .............................placement detail graph representation..........................
echo '<div id="chartContainer" style="height: 400px; width: 100%;"></div>';
echo "<div class='section'>";


//.......................................end of Placement Record................................
//.......................................Courses And Fee Details................................. 
  
echo "<span class='section'>";
echo "<h2>Courses Details</h2>";

// Assuming $courseDataJson contains the JSON string received from JavaScript
// $decodedCourseData = json_decode($courseDataJson, true);

// Display existing course containers
if (!empty($decodedCourseData)) {
    echo "<table class='course-table'>";
    echo "<tr><th style='text-align:center;'>Course Name</th><th>Program</th><th>Duration</th><th>Strength</th><th>Location</th><th>Fee</th></tr>";

    foreach ($decodedCourseData as $course) {
        $courseName = $course['course'];

        foreach ($course['programs'] as $program) {
            echo "<tr>";
            if ($courseName) {
                echo "<td style='text-align:center;' rowspan='" . count($course['programs']) . "'>$courseName</td>";
                $courseName = null; // To prevent printing course name for subsequent rows
            }
            echo "<td>{$program['program']}</td>";
            echo "<td>{$program['duration']}</td>";
            echo "<td>{$program['strength']}</td>";
            echo "<td>{$program['location']}</td>";
            echo "<td>{$program['fee']}</td>";
            echo "</tr>";
        }
    }

    echo "</table>";
} else {
    echo "<p>No details available.</p>";
}

//......................................end of course and fee data ...............................

//..................................... Display mode of admission  ...............................

    echo "<h2>Mode of admission</h2>";
   
    if (!empty($decodedModeOfAdmission) && $decodedModeOfAdmission[0] !== "") {
        echo "<ul>";
        foreach ($decodedModeOfAdmission as $index => $value) {
            echo "<li>$value</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No any Mode Of Admission available.</p>";
    }
    

//...................................end of  Display mode of admission  ...............................

// .........................................scholarship...................................
    echo "<h2>Scholarship Details </h2>";
   
    if (!empty($decodedScholarship) && $decodedScholarship[0] !== "") {
        echo "<ul>";
        foreach ($decodedScholarship as $value) {
            echo "<li>$value</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No scholarship data found.</p>";
    }
    
    
 
echo"</span>"; 
// .............................................end of scholarship..........................
echo "</div>"; // End of record-container
    }
} else {
    echo "No data found in my_table1";
}

// .............................chart system..................................

// Close the connection
mysqli_close($conn);
echo"</div>";

// echo" <div class='coaching_sub_body_right'>";  

//  echo "<div class='advertisement-container'>
//     <a href='apply-now.html' class='advertisement'>
//         <img src='images/happy_man.jpg' alt='Coaching Center 1'>
//         <div class='advertisement-info'>
//             <div class='offer-title'>Special Batch for Competitive Exams</div>
//             <div class='offer-description'>Enroll now and get personalized coaching for competitive exams with experienced faculty.</div>
//         </div>
//     </a>

//     <a href='apply-now.html' class='advertisement'>
//         <img src='images/happy_man.jpg' alt='Coaching Center 2'>
//         <div class='advertisement-info'>
//             <div class='offer-title'>Free Demo Classes</div>
//             <div class='offer-description'>Join us for free demo classes to experience our teaching methodology before making a decision.</div>
//         </div>
//     </a>

//     <a href='apply-now.html' class='advertisement'>
//         <img src='images/happy_man.jpg' alt='Coaching Center 3'>
//         <div class='advertisement-info'>
//             <div class='offer-title'>Early Bird Discounts</div>
//             <div class='offer-description'>Avail special discounts on course fees for early bird registrations. Limited seats available!</div>
//         </div>
//     </a>

//     <!-- Add more advertisements as needed -->

// </div>";
echo "<div>";
echo "<div class='advertisement-container'>
<a href='apply-now.html' class='advertisement'>
    <img src='images/happy_man.jpg' alt='Coaching Center 1'>
    <div class='advertisement-info'>
        <div class='offer-title'>Special Batch for Competitive Exams</div>
        <div class='offer-description'>Enroll now and get personalized coaching for competitive exams with experienced faculty.</div>
    </div>
</a>
<hr>
<a href='apply-now.html' class='advertisement'>
    <img src='images/happy_man.jpg' alt='Coaching Center 2'>
    <div class='advertisement-info'>
        <div class='offer-title'>Free Demo Classes</div>
        <div class='offer-description'>Join us for free demo classes to experience our teaching methodology before making a decision.</div>
    </div>
</a>
<hr>
<a href='apply-now.html' class='advertisement'>
    <img src='images/happy_man.jpg' alt='Coaching Center 3'>
    <div class='advertisement-info'>
        <div class='offer-title'>Early Bird Discounts</div>
        <div class='offer-description'>Avail special discounts on course fees for early bird registrations. Limited seats available!</div>
    </div>
</a>

<!-- Add more advertisements as needed -->

</div>";

echo" </div>";  
echo"</div>";


?>



<script src="chart.js"></script>



 <div class="faq-container">
 <div class="review-header"> Q&A</div>
    <div class="faq-question">1. What are the coaching center timings?</div>
    <div class="faq-answer">
        Our coaching center is open from Monday to Saturday, from 9:00 AM to 6:00 PM. We are closed on Sundays.
    </div>

    <div class="faq-question">2. Do you offer evening classes?</div>
    <div class="faq-answer">
        Yes, we do offer evening classes on weekdays. Please check our class schedule for specific timings.
    </div>

    <div class="faq-question">3. Are there any weekend batches available?</div>
    <div class="faq-answer">
        Yes, we have weekend batches available for certain courses. You can inquire at the front desk for more information.
    </div>

    <!-- Add more questions and answers as needed -->

</div>


 <div class="review-container">
    <div class="review-header"> Reviews</div>
    <div class="review-content">
        <div class="user-review">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="images/saurabh passport photo.jpg" alt="User Avatar">
                </div>
                <div class="user-name">John Doe</div>
            </div>
            <div class="user-rating">4.5</div>
            <div class="user-comment">
                "Great coaching center! The instructors are knowledgeable, and the study materials are comprehensive."
            </div>
        </div>

        <div class="user-review">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="images/saurabh passport photo.jpg" alt="User Avatar">
                </div>
                <div class="user-name">Jane Smith</div>
            </div>
            <div class="user-rating">5.0</div>
            <div class="user-comment">
                "I highly recommend this coaching center. The personalized attention and interactive classes make learning enjoyable."
            </div>
        </div>
        
    </div>
</div>

</div>
<div class="location-info">
   
    <div class="location-links">
        <a href="#">Civil Service</a>
        <a href="#">Medical</a>
        <a href="#">Engineering</a>
        <a href="#">Banking</a>
        <a href="#">Pre Schooling</a>
        <a href="#">Indian Government</a>
        <a href="#">Teacher</a>
        <a href="#">Railways</a>
        <a href="#">Civil Service</a>
        <a href="#">Medical</a>
        <a href="#">Engineering</a>
        <a href="#">Banking</a>
        <a href="#">Pre Schooling</a>
        <a href="#">Indian Government</a>
        <a href="#">Teacher</a>
        <a href="#">Railways</a>
        <a href="#">Indian Government</a>
        <a href="#">Teacher</a>
        <a href="#">Railways</a>
        <a href="#">Civil Service</a>
        <a href="#">Medical</a>
        <a href="#">Engineering</a>
        <a href="#">Banking</a>
        <a href="#">Pre Schooling</a>
        <a href="#">Indian Government</a>
        <a href="#">Teacher</a>
        <a href="#">Railways</a>
        
    </div>
   
</div>
<script>
    function likeClick(itemId) {
       
        var currentCount = parseInt(document.getElementById('likeCount').innerText);
        var newCount = currentCount + 1;

        document.getElementById('likeCount').innerText = newCount;

        // AJAX request to update the like count in the database
        fetch('update_like.php?id=' + itemId + '&newCount=' + newCount, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); 
        })
        .catch(error => {
            console.error('Error:', error);
            // You can handle errors or show a user-friendly message here
        });
    }
</script>

<?php
include 'footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript" src="jscript/graph.js"></script>
<?php
 
// $dataPoints = array( 
// 	array("y" => 7,"label" => "2019" ),
// 	array("y" => 12,"label" => "2020" ),
// 	array("y" => 28,"label" => "2021" ),
// 	array("y" => 18,"label" => "2022" ),
// 	array("y" => 41,"label" => "2023" )
// );
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>

// window.onload = function() {
 
// var chart = new CanvasJS.Chart("chartContainer", {
// 	animationEnabled: true,
// 	title:{
// 		text: "Selection Ratio of Last 5 years"
// 	},
// 	axisY: {
// 		title: "Percentage(%)",
// 		includeZero: true,
// 		prefix: " ",
// 		suffix:  " "
// 	},
// 	data: [{
// 		type: "bar",
// 		yValueFormatString: "$#,##0K",
// 		indexLabel: "{y}",
// 		indexLabelPlacement: "inside",
// 		indexLabelFontWeight: "bolder",
// 		indexLabelFontColor: "white",
// 		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
// 	}]
// });
// chart.render();
 
// }
</script>
</head>
<body>

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>  
