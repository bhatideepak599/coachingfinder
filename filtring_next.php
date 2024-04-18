<?php
session_start();
$page_title="Login Form";
include 'connection.php';
include 'navbar.php';

?>
<link rel="stylesheet" href="show_coaching_smalll.css">  
    </head>
    <body>
    <?php
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "SELECT * FROM my_table1";
$result = $conn->query($sql);

        $coachingCenters = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coachingCenters[] = $row; // Assuming each row contains JSON data
    }
}

        $filteredCenters = [];

        foreach ($coachingCenters as $center) {

            $centerData = json_decode($center['course'], true);

            // Apply filters
            $passesCourseFilter = empty($_POST['course']) || strpos($center['course'], $_POST['course']) !== false;
            // $passesFeeFilter = empty($_POST['fee']) || $_POST['fee'] >= floatval($center['feeData'] ?? 0); // Assuming fee is directly in the row
            // $passesStarFilter = empty($_POST['stars']) || $_POST['stars'] == $center['stars'] ?? '';

            if ($passesCourseFilter ) {
                $filteredCenters[] = $center;
            }
        }
        
        foreach ($filteredCenters as $center) {
            // Decode JSON data for each coaching center
            $centerData = json_decode($center['course'], true);
            $allDetails = json_decode($center['brief_details'], true);
            $course_details = json_decode($center['course'], true);
            $id = $center['id']; // No need to decode
            $location = json_decode($center['city'], true);
        ?>
            <div class="coaching-container">
                <div class="coaching-info">
                    <div class="image_section">
                        <img src="images/backo.jpg" alt="Coaching Institute Logo">
                    </div>
                </div>
                <div class="coaching-details">
                    <p id='p_detail'><?= $allDetails[0] ?></p>
                    <p id='p_detail'><?= $allDetails[2] ?></p>
                    <p id='p_detail'><?= $location[2].' , '.$location[1]?></p>
                    <div class="call-now-container">
                        <div class="phone-icon">&#x260E;</div> <!-- Unicode for phone icon -->
                        <div class="call-now-text">Call Now <span class="mobile_no">(91XXXXXXXX)</span></div>
                    </div>
                </div>
                <div class="coaching-details1">
                    <div class="rating">Rating: 4.5</div>
                    <div class="likes">Likes: 1200</div>
                    <div class="courses">
                        <div class="tag-container">
                            <?php if (!empty($course_details) && $course_details[0] !== "") : ?>
                                <div class="tag">
                                    <?php foreach ($course_details as $index => $value) : ?>
                                        <p id='p_detail'><?= ucfirst($value) ?></p>
                                    <?php endforeach; ?>
                                </div>
                            <?php else : ?>
                                <p id='p_detail'>No any Course Details available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="fee" style="margin-bottom:1.2vw;">Fee: <span><?= $allDetails[2] ?></span> - <span><?= $allDetails[3] ?></span></div>
                    <a href="show_coaching_large.php?id=<?= $id ?>" class="know-more-button">See Details</a>
                </div>
            </div>
        <?php
            echo "<hr>";
        }
    }
    ?>;

<?php
include 'footer.php';
?>
<script>
        let feeSlider = document.getElementById("fee");
        let feeValueDisplay = document.getElementById("fee-value");
        feeValueDisplay.textContent = feeSlider.value;

        feeSlider.oninput = function() {
            feeValueDisplay.textContent = this.value;
        };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
