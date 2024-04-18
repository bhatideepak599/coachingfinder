<?php
include 'connection.php';
$sql = "SELECT * FROM my_table1";
$result = $conn->query($sql);

$coachingCenters = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coachingCenters[] = $row; // Assuming each row contains JSON data
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Advanced Filtering</title>
    <style>
        .slider-container {
            margin-top: 20px;
            width: 300px;
        }
        .slider-label {
            display: inline-block;
            width: 100px;
        }
    </style>
</head>
<body>
    <h1>Filtering System</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="course">Select Course:</label>
        <select name="course" id="course">
            <option value="">Select Course</option>
            <option value="neet">NEET</option>
            <option value="jee">CLAT</option>
            <!-- Add more options as needed -->
        </select>

        <div class="slider-container">
            <label class="slider-label" for="fee">Fee Range:</label>
            <input type="range" id="fee" name="fee" min="1" max="1500000" value="1" step="1000">
            <span id="fee-value">1</span>
        </div>

        <label for="stars">Star Rating:</label>
        <select name="stars" id="stars">
            <option value="">Select Star Rating</option>
            <?php for ($i = 3; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?> Star</option>
            <?php endfor; ?>
        </select>

        <button type="submit">Apply Filters</button>
    </form>

    <?php
    // Step 3: Apply filtering based on user selections
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filteredCenters = [];

        foreach ($coachingCenters as $center) {
            // Decode JSON data for each coaching center
            $centerData = json_decode($center['course'], true);

            // Apply filters
            $passesCourseFilter = empty($_POST['course']) || strpos($center['course'], $_POST['course']) !== false;
            // $passesFeeFilter = empty($_POST['fee']) || $_POST['fee'] >= floatval($center['feeData'] ?? 0); // Assuming fee is directly in the row
            // $passesStarFilter = empty($_POST['stars']) || $_POST['stars'] == $center['stars'] ?? '';

            if ($passesCourseFilter ) {
                $filteredCenters[] = $center;
            }
        }

        // Step 4: Display filtered results
        echo "<h2>Filtered Results:</h2>";
        foreach ($filteredCenters as $center) {
            // Decode JSON data for each coaching center
            $centerData = json_decode($center['course'], true);

            echo "<p>Name: " . json_decode($center['brief_details'],true)[1] . "</p>";
            echo "<p>Course: " . $center['course'] . "</p>";
            // echo "<p>Email: " . $center['email'] . "</p>";
            // echo "<p>Fee: $" . number_format($center['fee'] ?? 0) . "</p>";
            // echo "<p>Stars: " . $center['stars'] ?? 'Unknown' . "</p>";
            // Add more fields as needed
            echo "<hr>";
        }
    }
    ?>
    
    <script>
        // Display current value of fee range slider
        let feeSlider = document.getElementById("fee");
        let feeValueDisplay = document.getElementById("fee-value");
        feeValueDisplay.textContent = feeSlider.value;

        feeSlider.oninput = function() {
            feeValueDisplay.textContent = this.value;
        };
    </script>
</body>
</html>

<?php
// Step 5: Close database connection
// $conn->close();
?>