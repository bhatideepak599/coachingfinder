<h2 style="text-align: center;">New Users Registration</h2>

<!-- <div class="card">
<div class="alert alert-success">
                    <?php
                    if(isset($_SESSION['status'])){
                       echo "<h4 class='text-align-center'>".$_SESSION['status']."</h4>";
                       unset($_SESSION['status']);
                    }
                    ?>

</div>
</div>
   -->
<div class="main-continer90">
<div class="left_registtration">

<div class="diffrent-container">
 <div class="haha">
 <img src="organic-flat-feedback-concept-illustrated_23-2148951369.jpg" alt="">
 <div for="">rating and easy to use</div>
</div>
<div class="haha">
 <img src="organic-flat-feedback-concept-illustrated_23-2148951369.jpg" alt="">
 <div for="">rating and easy to use</div>
</div>
 <div class="haha">
 <img src="organic-flat-feedback-concept-illustrated_23-2148951369.jpg" alt="">
 <div for="">rating and easy to use</div>
 </div>
</div>
<div class="hi">

</div>

</div>


<div class="container898">
 
  <form id="student-form" action="student_signup_code.php" method="POST">
    <!-- Your form sections here -->
    <div id="form-section-1" class="form-section visible">
        <h2>Step 1: Personal Information</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" class="attractive-input" value="<?= $_SESSION['auth_user']['username'];?>" required onmouseover="this.disabled=true" onmouseout="this.disabled=false">

    
        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" class="attractive-input"  value="<?= $_SESSION['auth_user']['phone'];?>" required onmouseover="this.disabled=true" onmouseout="this.disabled=false">
    
        <div class="field-group">
       
          <div>
            <label for="gender" >Gender:</label>
            <select id="gender" class="attractive-input" name="gender" required>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>
          </div>
        </div>
    
        <div class="field-group">
          <div>
            <label for="course" >Course of Interest:</label>
            <input type="text" id="course" list="courseOptions" class="attractive-input" name="course" required>
            <datalist id="courseOptions" >
              <option value="JEE">
              <option value="9-10">
              <option value="10-11">
              <option value="Medical">
              <option value="CAT">
              <option value="CLAT">
              <option value="Banking">
              <option value="IAS">
            </datalist>
          </div>
    
  
        </div>
    
        <button type="button" onclick="nextSection(1)">Next</button>
      </div>
    
      <div id="form-section-2" class="form-section">
        <h2>Step 2: Location Information</h2>
        <label for="state" >State:</label>
        <input type="text" id="state" list="states" class="attractive-input" name="state" required>
        <datalist id="states">
          <!-- Add list of states here -->
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Delhi">Delhi</option>
<option value="Puducherry">Puducherry</option>
        </datalist>
    
        <label for="location" >district:</label>
        <input type="text" id="location"  name="district" class="attractive-input" required>
    
        <div>
          <label for="email" >Email Address:</label>
          <input type="email" id="email" name="email" class="attractive-input" value="<?= $_SESSION['auth_user']['email'];?>"  required onmouseover="this.disabled=true" onmouseout="this.disabled=false">
        </div>
  
        <button type="button" onclick="prevSection(2)">Previous</button>
        <button type="button" onclick="nextSection(2)">Next</button>
      </div>
    
      <div id="form-section-3" class="form-section">
        <h2>Step 3: Educational Information (10th)</h2>
        <label for="board" >Board Name:</label>
        <input type="text" id="board" class="attractive-input" name="board10" required>
    
        <label for="passingYear10" >Passing Year:</label>
        <input type="date" id="passingYear10" class="attractive-input" name="passingYear10" required>
    
        <label for="percentage10" >Percentage:</label>
        <input type="text" id="percentage10" class="attractive-input" name="percentage10" required>
    
        <button type="button" onclick="prevSection(3)">Previous</button>
        <button type="button" onclick="nextSection(3)">Next</button>
      </div>
    
      <div id="form-section-4" class="form-section">
        <h2>Step 4: Educational Information (12th)</h2>
        <label for="board" >Board Name:</label>
        <input type="text" id="board" class="attractive-input" name="board12" required>
    
        <label for="passingYear12" >Passing Year:</label>
        <input type="date" id="passingYear12" class="attractive-input" name="passingYear12" required>
    
        <label for="marksObtained12" >Marks Obtained:</label>
        <input type="text" id="marksObtained12" class="attractive-input" name="marksObtained12" required>
    
        <button type="button" onclick="prevSection(4)">Previous</button>
        <button type="button" onclick="nextSection(4)">Next</button>
      </div>
    
    
      <div id="form-section-5" class="form-section">
        <h2>Step 5: Year of Target</h2>
        <label for="yearOfTarget" >Year of Target:</label>
        <select id="yearOfTarget" class="attractive-input" name="yearOfTarget" required>
          <!-- Add your options here -->
          <option value="2023">2023</option>
          <option value="2024">2024</option>
          <!-- Add more years as needed -->
        </select>
      
      <label for="dob">Date of Birth:</label>
      <input type="date" id="dob" class="attractive-input"  name="dob" required>

        <button type="button" onclick="prevSection(5)">Previous</button>
        <button type="submit" name="student_submit_button" >Submit</button>
      </div>
    <!-- Step 6: Password -->
  
    <!-- Step 8: Google Login -->

  </form>
</div>

    
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
<script src="path/to/select2.js"></script>

<script>
  
  // Initialize Select2 for the searchable dropdown
  document.addEventListener('DOMContentLoaded', function () {
    $('#yearOfTarget').select2({
      placeholder: 'Select the Year',
      allowClear: true
    });
  });

  function nextSection(currentSection) {
    // Get the current form section
    var currentForm = document.getElementById('form-section-' + currentSection);

    // Check if all required fields in the current section are filled
    var requiredFields = currentForm.querySelectorAll('.attractive-input[required]');
    var allFieldsFilled = Array.from(requiredFields).every(function(field) {
      return field.value.trim() !== '';
    });

    if (!allFieldsFilled) {
      alert('Please fill out all required fields before proceeding.');
      return;
    }

    // Hide the current section
    currentForm.classList.remove('visible');
    
    // Show the next form section
    var nextSection = document.getElementById('form-section-' + (currentSection + 1));
    nextSection.classList.add('visible');
  }

  function prevSection(currentSection) {
    // Hide the current section
    var currentForm = document.getElementById('form-section-' + currentSection);
    currentForm.classList.remove('visible');

    // Show the previous form section
    var prevSection = document.getElementById('form-section-' + (currentSection - 1));
    prevSection.classList.add('visible');
  }
</script>


