
<?php
session_start();
include 'navbar.php';
?>

<link rel="stylesheet" href="rating_coaching_center.css">  
<link rel="stylesheet" href="css/stylee.css">
    </head>
    <body>
    <h2>Write Review of your current Coaching Institute</h2>
    <form action="submit_review.php" method="post">
        <fieldset>
            <legend>Coaching Institute Details:</legend>
            <div class="kaho">
                <input type="text" id="coachingName" name="coachingName" placeholder="Search by Coaching Name">
                <div id="coachingList" ></div>
            </div>
        </fieldset>
        <!-- <label>Give Your Rating genuinly</label> -->
        <fieldset>
            <legend for="environment">Environment:</legend>
            <div class="rating" for="environment">
                <input type="hidden" id="environment" name="environment" value="0">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p id="rating_text_environment"></p>
        </fieldset>
        <fieldset>
            <legend for="study_material">Study Material Quality:</legend>
            <div class="rating" for="study_material">
                <input type="hidden" id="study_material" name="study_material" value="0">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p id="rating_text_study_material"></p>
        </fieldset>
        <fieldset>
            <legend for="success_ratio">Success Ratio:</legend>
            <div class="rating" for="success_ratio">
                <input type="hidden" id="success_ratio" name="success_ratio" value="0">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p id="rating_text_success_ratio"></p>
        </fieldset>
        <fieldset>
            <legend for="facilities">Facilities:</legend>
            <div class="rating" for="facilities">
                <input type="hidden" id="facilities" name="facilities" value="0">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p id="rating_text_facilities"></p>
        </fieldset>
        <!-- Repeat this block for other rating criteria -->
        <!-- Teachers Quality -->
        <fieldset>
            <legend for="teachers_quality">Teachers Quality:</legend>
            <div class="rating" for="teachers_quality">
                <input type="hidden" id="teachers_quality" name="teachers_quality" value="0">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <p id="rating_text_teachers_quality"></p>
        </fieldset>
        <!-- Repeat this block for other rating criteria -->
        <!-- Study Material, Success Ratio, Facilities, Teachers Quality -->
        <fieldset>
            <legend>Your Personal Details:</legend>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" ><br><br>
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" ><br><br>
            <label for="contact">Contact Number:</label>
            <input type="tel" id="contact" name="contact" ><br><br>
            <label for="city">City:</label>
            <input type="text" id="city" name="city" ><br><br>
        </fieldset>
        <fieldset>
            <legend>Additional Comments (Optional):</legend>
            <label for="positive_points">Positive Points:</label>
            <textarea id="positive_points" name="positive_points" rows="4" cols="50"></textarea><br><br>
            <label for="negative_points">Negative Points:</label>
            <textarea id="negative_points" name="negative_points" rows="4" cols="50"></textarea><br><br>
        </fieldset>
        <div id="main">
        <div id="content">
			<form id="submit_form">  
        <div class="form-group">  
         <h4 style="text-align:center;background-color:red;padding:.3vw;border-radius:.3vw;"> Please Upload any proof of your coaching identity</h4>
          <label>Select Image</label>  
          <input type="file" name="file" id="upload_file" />  
          <span class="help-block">Allowed File Type - jpg, jpeg, png, gif</span>  
        </div>  
       <input type="submit" name="upload_button" id="upload_btn" value="Upload"/>  
      </form>  
      <br />  
      <div id="preview">
        <h3>Image Preview</h3>  
        <div id="image_preview"></div> 
      </div> 
		</div>
            
        <input type="submit" id="review_final_button" value="Submit For Review">
    </form>

	</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    
    $("#submit_form").on("submit", function(e){
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        url : "upload.php",
        type : "POST",
        data : formData,
        contentType : false,
        processData: false,
        success: function(data){
          $("#preview").show();
          $("#image_preview").html(data);
          $("#upload_file").val('');
        }
      });
    });

    //Delete Image
    $(document).on("click","#delete_btn", function(){
      if(confirm("Are you sure you want to remove this image?")){
        var path = $("#delete_btn").data("path");

        $.ajax({
          url:'delete.php',
          type : "POST",
          data : {path : path},
          success: function(data){
            if(data != ""){
              $("#preview").hide();
              $("#image_preview").html('');
            }
          }
        });
      }
    });
    $(document).on("click","#confirm_btn", function(){
      if(confirm("Are you sure you want to upload permanently this image?")){
    
        $("#image_preview").html('your image uploaded succefully!');    
        $("#preview").hide();   

        
      }
    });
  });
        const fieldsets = document.querySelectorAll('fieldset');

        fieldsets.forEach(fieldset => {
            const stars = fieldset.querySelectorAll('.star');

            stars.forEach(star => {
                star.addEventListener('click', () => {
                    const value = star.getAttribute('data-value');
                    const ratingInput = fieldset.querySelector('input[type="hidden"]');
                    ratingInput.value = value;
                    highlightStars(stars, value);
                    showRatingText(value, fieldset);
                });
            });
        });

        function highlightStars(stars, value) {
            stars.forEach(star => {
                if (parseInt(star.getAttribute('data-value')) <= parseInt(value)) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        function showRatingText(value, fieldset) {
            const ratingText = fieldset.querySelector('p');
            switch (parseInt(value)) {
                case 1:
                    ratingText.textContent = "Bad Service";
                    break;
                case 2:
                    ratingText.textContent = "Satisfactory";
                    break;
                case 3:
                    ratingText.textContent = "Need Improvement";
                    break;
                case 4:
                    ratingText.textContent = "Excellent";
                    break;
                case 5:
                    ratingText.textContent = "Superb";
                    break;
                default:
                    ratingText.textContent = "";
            }
        }
    </script>
<?php
include 'footer.php';
?>
<script src="rating_coaching_center.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
