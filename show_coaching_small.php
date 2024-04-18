<?php
session_start();
include 'connection.php';
include 'navbar.php';
?>

<?php

if(isset($_GET['course'])) {
    $selectedCourse = urldecode($_GET['course']);
    $additionalData=2;
}else if(isset($_GET['category'])){
    $course_name=urlencode($_GET['category']);
    $location = urldecode($_GET['heading']);
    $additionalData=3;
}else{
$fetchedData = isset($_GET['fetchedData']) ? $_GET['fetchedData'] : null;
$fetchedData2 = isset($_GET['fetchedData2']) ? $_GET['fetchedData2'] : null;
$additionalData = isset($_GET['additionalData']) ? $_GET['additionalData'] : null;
$coachingName = json_decode($fetchedData2);

if($additionalData == 1){
    $sql2 = "SELECT * FROM tbl_coaching_name WHERE coaching_name = '$coachingName'";
    $result = mysqli_query($conn, $sql2);
    if (mysqli_num_rows($result) > 0){
     $row = mysqli_fetch_assoc($result); // Fetch the row from the result set
     // echo $coachingName;
     $sql = "SELECT * FROM my_table1 WHERE id = '" . $row['id'] . "'";
     }else{
        $_SESSION['status']="Please Insert Correct Coaching Name";
        header('Location: home.php');
        exit(0);
     }
    
};

};

// print_r($fetchedData);
?>

<link rel="stylesheet" href="show_coaching_smalll.css">  
    </head>
    <body>
   <div id="form_search">
    <div class="left_form">
    <form action="filtring_next.php" method="post">
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

        <button type="submit" id="apply_button">Apply Filters</button>
    </form>
    </div>
<div class="form_right">
<?php if($additionalData==0):?>
 <?php // searching by coaching name
 $sql = "SELECT * FROM my_table1 WHERE city = '$fetchedData'";
?>
<?php else : ?>
  <?php // searching by coaching location
  // echo "Coaching Location: " .$fetchedData. "<br>";
  if ($additionalData == 2) {
    $sql = "SELECT * FROM my_table1 WHERE JSON_CONTAINS(city, '\"$selectedCourse\"')";
}else if($additionalData==3){
    $sql = "SELECT * FROM my_table1 WHERE JSON_CONTAINS(city, '\"$location\"', '$') AND JSON_CONTAINS(course, '\"$course_name\"', '$')";

}
// else {
//     $sql = "SELECT * FROM my_table1 WHERE city = '$fetchedData'";
// }
   
  ?>
<?php endif; ?>



<?php
  $result = mysqli_query($conn, $sql);
?>
  <?php if (mysqli_num_rows($result) > 0) : ?>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
          <?php
          $allDetails = json_decode($row['brief_details'], true);
          $course_details = json_decode($row['course'], true);
          $id = $row['id'];
          $location=json_decode($row['city'], true);
          ?>
          <div class="coaching-container">
              <div class="coaching-info">
                  <div class="image_section">
                      <img src="images/backo.jpg" alt="Coaching Institute Logo">
                  </div>
              </div>
              <div class="coaching-details">
                  <p id='p_detail'><?= $allDetails[0] ?></p>
                  <!-- <p id='p_detail'><?= $allDetails[0] ?></p> -->
                  <p id='p_detail'> <?=$allDetails[2] ?></p>
                  <p id='p_detail'><?= $location[2].' , '.$location[1]?></p>
                  <div class="call-now-container">
                      <div class="phone-icon">&#x260E;</div> <!-- Unicode for phone icon -->
                      <div class="call-now-text">Call Now <span class="mobile_no">(91XXXXXXXX)</span></p></div>
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
                  <div class="fee" style="margin-bottom:1.2vw;">Fee: <span><?= $allDetails[3] ?></span> - <span><?= $allDetails[4] ?></span></div>
                  <a href="show_coaching_large.php?id=<?= $id ?>" class="know-more-button">See Details</a>
              </div>
          </div>
      <?php endwhile; ?>
  <?php else : ?>
    <h4 style="text-align:center;margin:3vw;font-weight:700;"> Oops No Data Found ! Try Searching Other Coaching Center</h4>
      <img src="images/no_data.png" id='no_data' alt="">
  <?php endif; ?>

  </div>
</div>
  <?php
  include 'footer.php';
  ?> 
</body>
</html>
