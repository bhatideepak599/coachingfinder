<?php 
session_start();
$page_title="Book Your Fav Coaching Centre";
 include 'navbar.php';
 ?>
 <link rel="stylesheet" href="book_coachingg.css">  
    </head>
    <body>
               < <?php
                 if(isset($_SESSION['status'])){
                ?>
                <div class="alert alert-success">
                    <h5><?=$_SESSION['status'];?></h5>
                </div>
                 <?php
                 unset($_SESSION['status']);
                  }
                 ?>
    <div id="container">
    <h2 style="text-align:center">Quick Registration Form</h2>
    <form method="post" action="process_booking_form.php">
        <label for="coaching_institute">Name of the Coaching Institute:</label><br>
        <div class="kaho">
                <input type="text" id="coachingName" name="coachingName" placeholder="Search by Coaching Name">
                <div id="coachingList" ></div>
        </div>

        <label for="area">Enter your coaching institute area</label><br>
        <input type="text" name="location" id="">

        <label for="course">Select the course in which you are interested:</label><br>
        <select id="course" name="course" required>
            <option value="">Select Course</option>
            <option value="Course 1">1-5</option>
            <option value="Course 2">5-8</option>
            <option value="Course 3">8-12</option>
            <option value="">NEET</option>
            <option value="Course 1">JEE</option>
            <option value="Course 2">NDA</option>
            <option value="Course 3">BOARD</option>
            <option value="Course 1">Commerce</option>
            <option value="Course 2">Civil Service Exam</option>
            <option value="Course 3">Railway exams</option>
            <!-- Add more options as needed -->
        </select><br><br>
         <div class="student_details">
        <h3 style="text-align:center;">Student Details:</h3>
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <label for="mobile">Mobile no.:</label><br>
        <input type="text" id="mobile" name="mobile" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="temp_address">Temporary Address:</label><br>
        <input type="text" id="temp_address" name="temp_address" required><br><br>

        <label for="state">State:</label><br>
        <input type="text" id="state" name="state" required><br><br>

        <label for="district">District:</label><br>
        <input type="text" id="district" name="district" required><br><br>

        <label for="block">Block:</label><br>
        <input type="text" id="block" name="block" required><br><br>

        <label for="landmark">Landmark:</label><br>
        <input type="text" id="landmark" name="landmark"><br><br>

        <label for="pincode">Pin code:</label><br>
        <input type="text" id="pincode" name="pincode" required><br><br>
        </div>
        <input type="submit" value="Submit" class="submi_t">
    </form>
    </div>
    <?php include 'footer.php';?>
<script src="rating_coaching_center.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
