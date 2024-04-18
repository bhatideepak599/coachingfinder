<?php
session_start();
include 'navbar.php';
?>
    <link rel="stylesheet" href="index.css">
    
    </head>
    <body>
        
    <div class="container432">
        <h2 style="text-align:center;">Coaching Center Registration</h2>
        <form id="registrationForm" enctype="multipart/form-data" onsubmit="onSubmitForm()">
        <!-- action="process_form.php" method="post" -->
        <!-- onsubmit="onSubmitForm()" -->
            <h3 id="pro">Coaching Center Name:</h3>
            <input type="text" id="coachingCenterName" name="coachingCenterName" required>
            <h3 for="coachingCenterId" id="pro">Coaching Center Id:</h3>
            <input type="number" name="registration_no" id="coachingCenterId" required>
   
<!-- ...............................location details.............................. -->
<div class="container123">

<h3 id="pro" id="pro">Select Country State and City (if you are not getting your place name write nearest area)</h3>

<div class="select_option">
    <select class="form-select country" aria-label="Default select example" onchange="loadStates()">
        <option selected>Select Country</option>
    </select>
    <select class="form-select state" aria-label="Default select example" onchange="loadCities()">
        <option selected>Select State</option>
    </select>
    <select class="form-select city" aria-label="Default select example">
        <option selected>Select City</option>
    </select>
</div>
<!-- <button id="searchButton" onclick="performSearch()">Search</button> -->

</div>

            <h3 for="location" id="pro" >Website if any</h3>
            <input type="text" id="coaching_website" name="coaching_website" required>
            <h3 for="location" id="pro">Mobile NO</h3>
            <input type="text" id="mobile_no" name="mobile_no" required>
            <h3 for="location" id="pro">Email Address</h3>
            <input type="text" id="email_id" name="email_id" required>
            <h3id="pro">Coaching centre brief detail</h3>
<textarea id="coachingCenterDetails"  placeholder="Your Coaching centre details details" style="max-width:54vw;width:54vw;" rows="8" required></textarea>
            <h3 for="coursesOffered"id="pro">Courses Offered:</h3>

           

<div>
    <select id="course" name="course" onchange="showInputContainers()">
        <option value="medical">Medical</option>
        <option value="9-10">9-10</option>
        <option value="neet">NEET</option>
        <option value="cat">CAT</option>
        <option value="clat">CLAT</option>
        <option value="5-6">5-6</option>
        <option value="navodaya">Navodaya</option>
        <option value="ias">IAS</option>
        <option value="ips">IPS</option>
        <option value="ifs">IFS</option>
        <option value="isro">ISRO</option>
        <option value="allen-cat">Allen CAT</option>
        <option value="Select more courses" disabled>Select more courses</option> 
         <!-- Add more options as needed -->
    </select>
    <div class="small-container" id="course_detail">

    <div id="feeInputContainer" style="display: none;">
                <label for="fee">Enter Fee:</label>
                <input type="text" id="fee" name="fee">
    </div>
    <div id="programInputContainer" style="display: none;">
        <label for="program">Enter Program Name:</label>
        <input type="text" id="program" name="program">
    </div>

    <div id="durationInputContainer" style="display: none;">
        <label for="duration">Enter Course Duration:</label>
        <input type="text" id="duration" name="duration">
    </div>

    <div id="strengthInputContainer" style="display: none;">
        <label for="strength">Enter Total Classroom Strength:</label>
        <input type="text" id="strength" name="strength">
    </div>

    <div id="locationInputContainer" style="display: none;">
        <label for="location">Enter Location:</label>
        <input type="text" id="location" name="location">
    </div>
            
    </div>
            <button type="button" id="add_more_course"onclick="addMore()">Add More</button>

            <div id="addedCourses" class="small-container"></div>

</div>


<!-- [    { course: 'CAT', fee: '5000' },    { course: 'Class 9-10', fee: '3000' },    { course: 'NEET', fee: '8000' }] -->



            <!-- Teachers Details -->
            <h3 id="pro">Teachers Details</h3>
<div id="teachersDetails" class="small-container">

    <!-- Repeat similar blocks for Teacher 2 and Teacher 3 -->
</div>

<button type="button" id="add_more_teacher" onclick="addTeacher()">Add Teacher</button>

            <!-- Placement Records -->
            <h3 id="pro">Placement Records (Last 5 years)</h3>
        <div class="container123">
        <select id="recordType" onchange="selectRecordType()">
            <option value="none">Select Record Type</option>
            <option value="board">Board</option>
            <option value="competition">Competition</option>
        </select>
        <div id="placementRecords"></div>
        </div>






            
            <!-- Facilities Available -->
 <h3 for="facilities" id="pro">Facilities Available:</h3>
         <div class="container_facility">
        <label for="options">Select Options:</label>
        <select id="options" multiple>
            <option value="drinking-water">Drinking Water</option>
            <option value="parking-facility">Parking Facility</option>
            <option value="ac-classroom">AC Classroom</option>
            <option value="24x7-doubt-solving">24x7 Doubt Solving</option>
            <option value="dpp">DPP (Daily Practice Problems)</option>
            <option value="competitive-environment">Competitive Environment</option>
           
        </select>

        <div id="selectedOptions" class="selected-options-container"></div>
    </div>

<!-- ..............................mode of admission.......................... -->

<h3 id="pro" >Modes of admission</h3>
<label for="admissionModes">Enter Modes of Admission (comma-separated):</label>
<input type="text" id="admissionModes"> 
 <!-- ..............................scholarship facility..........................  -->

<h3  id="pro">Scholarship if any</h3>
<label>
        <input type="checkbox" id="scholarshipCheckbox" onchange="toggleScholarshipInput()"> 
        is there any scholarship ?
</label>

<script>
           function toggleScholarshipInput() {
            const scholarshipInputContainer = document.getElementById('scholarshipInputContainer');
            const scholarshipCheckbox = document.getElementById('scholarshipCheckbox');
            
            // Toggle the display of the scholarship input based on the checkbox state
            scholarshipInputContainer.style.display = scholarshipCheckbox.checked ? 'block' : 'none';
        }

</script>

    <div id="scholarshipInputContainer" style="display: none;">
        <label for="scholarshipModes">Enter Modes of Scholarship (comma-separated):</label>
        <input type="text" id="scholarshipModes">
    </div>

<!-- <button onclick="submitModes()">Submit</button> -->
    
 <!-- during form submission this data can be collected in an array and can be used for sending in backended -->

 <!------------------------------- Images Upload ---------------------------------->
            <!-- <h3 for="images">Upload Images :</h3>
            <input type="file" id="images" name="images[]" accept="image/*" multiple required> -->
            
            <button type="submit">Submit</button>
        </form>
       
    </div>
  <script>
    // Assuming this is part of your form submission logic


   // ................................Sample array to store teacher information.........................
   var teachersData = [];
   var selectedOptionsData = [];
   var placementRecordsData = [];
   var courseData = [];
   var courseData_side = [];
   var admissionModesArray = [];
   var scholarshipModesArray = [];
   var basicDetailArray=[];
   var basicDetailFrontArray=[];
   var selectedValues = [];

function addTeacher() {
    // document.getElementsByClassName('small-container')[0].style.display = 'block';
    // document.getElementsByClassName('added-course')[0].style.display = 'block';

    const teachersDetails = document.getElementById('teachersDetails');
    const teacherBlock = document.createElement('div');
    teacherBlock.className = 'teacher-info';

    const teacherNumber = teachersDetails.children.length + 1;

    const teacherData = {}; // Object to store teacher information

    const teacherNameInput = document.createElement('input');
    teacherNameInput.type = 'text';
    teacherNameInput.name = `teacherNames[]`;
    teacherNameInput.placeholder = `Teacher ${teacherNumber} Name`;
    teacherData.name = ''; // Initialize name property in the object
    teacherNameInput.addEventListener('input', (event) => {
        teacherData.name = event.target.value; // Update name property in the object
    });
    teacherBlock.appendChild(teacherNameInput);

    const teacherSubjectInput = document.createElement('input');
    teacherSubjectInput.type = 'text';
    teacherSubjectInput.name = `teacherSubjects[]`;
    teacherSubjectInput.placeholder = `Subject`;
    teacherData.subject = ''; // Initialize subject property in the object
    teacherSubjectInput.addEventListener('input', (event) => {
        teacherData.subject = event.target.value; // Update subject property in the object
    });
    teacherBlock.appendChild(teacherSubjectInput);

    const teacherExperienceInput = document.createElement('input');
    teacherExperienceInput.type = 'number';
    teacherExperienceInput.name = `teacherExperiences[]`;
    teacherExperienceInput.placeholder = `Experience (in years)`;
    teacherData.experience = 0; // Initialize experience property in the object
    teacherExperienceInput.addEventListener('input', (event) => {
        teacherData.experience = parseInt(event.target.value) || 0; // Update experience property in the object
    });
    teacherBlock.appendChild(teacherExperienceInput);

    const teacherDetailsTextarea = document.createElement('textarea');
    teacherDetailsTextarea.name = `teacherDetails[]`;
    teacherDetailsTextarea.rows = 3;
    teacherDetailsTextarea.style.width='52vw';
    teacherDetailsTextarea.placeholder = `Details`;
    
    teacherData.details = ''; // Initialize details property in the object
    teacherDetailsTextarea.addEventListener('input', (event) => {
        teacherData.details = event.target.value; // Update details property in the object
    });
    teacherBlock.appendChild(teacherDetailsTextarea);

    // Add delete button
    const deleteButton = document.createElement('button');
    deleteButton.innerText = 'Delete';
    deleteButton.className='delete-button';
    deleteButton.addEventListener('click', () => {
        const index = teachersData.indexOf(teacherData);
        if (index !== -1) {
            // Remove data from the array
            teachersData.splice(index, 1);

            // Remove container from DOM
            teachersDetails.removeChild(teacherBlock);
        }
    });
    teacherBlock.appendChild(deleteButton);

    if (teacherNumber < 4) {
        // Store data in the array
        teachersData.push(teacherData);

        // Add container to DOM
        if(teacherNumber==1){
            document.getElementById('add_more_teacher').innerText = 'Add More Teacher';

        }
        if(teacherNumber==3){
            document.getElementById('add_more_teacher').innerText = 'Maximum Limit Reached';

        }
        teachersDetails.style.display = 'block';

        //  document.getElementsByClassName('small-container').style.display = 'relative';
        teachersDetails.appendChild(teacherBlock);
    }
}
// teacherData looks like [
//     { name: "Teacher 1 Name", subject: "Subject 1", experience: 5, details: "Details 1" },
//     { name: "Teacher 2 Name", subject: "Subject 2", experience: 8, details: "Details 2" },
//     { name: "Teacher 3 Name", subject: "Subject 3", experience: 3, details: "Details 3" }
// ]
// ............................... Facilities selection..........................................

document.addEventListener('DOMContentLoaded', function () {
    var optionsDropdown = document.getElementById('options');
    var selectedOptionsContainer = document.getElementById('selectedOptions');
    

    optionsDropdown.addEventListener('change', function () {
        updateSelectedOptions();
    });

    function updateSelectedOptions() {
        var selectedOptions = [];

        for (var i = 0; i < optionsDropdown.options.length; i++) {
            var option = optionsDropdown.options[i];

            if (option.selected) {
                selectedOptions.push(option.value);

                // Disable the selected option
                option.disabled = true;
            }
        }

        displaySelectedOptions(selectedOptions);
    }

    function displaySelectedOptions(selectedOptions) {
        // Create a new div for the set of selected options
        var selectedOptionSetDiv = document.createElement('div');
        selectedOptionSetDiv.className = 'selected-option-set';

        selectedOptions.forEach(function (selectedOption) {
            var selectedOptionDiv = document.createElement('div');
            selectedOptionDiv.className = 'selected-option';
            selectedOptionDiv.textContent = selectedOption;

            // Add a delete button to remove the selected option
            var deleteButton = document.createElement('span');
            deleteButton.className = 'delete-button';
            deleteButton.textContent = '×';
            deleteButton.onclick = function () {
                removeSelectedOption(selectedOption, selectedOptionSetDiv);
            };

            selectedOptionDiv.appendChild(deleteButton);
            selectedOptionSetDiv.appendChild(selectedOptionDiv);
        });

        // Append the new div to the container
        selectedOptionsContainer.appendChild(selectedOptionSetDiv);

        // Add the set of selected options to the array
        selectedOptionsData.push(selectedOptions);

        // Log the array of arrays using console.table
        console.table(selectedOptionsData);
    }

    function removeSelectedOption(selectedOption, selectedOptionSetDiv) {
        // Find the corresponding option in the dropdown
        var optionToRemove = document.querySelector(`#options option[value="${selectedOption}"]`);
        if (optionToRemove) {
            optionToRemove.disabled = false;
        }

        // Remove the set of selected options from the array
        var indexToRemove = selectedOptionsData.findIndex(function (set) {
            return set.includes(selectedOption);
        });
        if (indexToRemove !== -1) {
            selectedOptionsData.splice(indexToRemove, 1);
        }

        // Remove the selected option set from the display
        selectedOptionsContainer.removeChild(selectedOptionSetDiv);

        // Log the updated array of arrays using console.table
        console.table(selectedOptionsData);
    }
});
// facilities looksm like this [["drinking water"],["dpp"],["24X7 support"]]

// ..........................................placement record................................



function selectRecordType() {
    var recordTypeDropdown = document.getElementById('recordType');
    var placementRecordsContainer = document.getElementById('placementRecords');

    if (recordTypeDropdown.value === 'none') {
        placementRecordsContainer.innerHTML = '';
        return;
    }

    var recordType = recordTypeDropdown.value;
    var recordContainer = createRecordContainer(recordType);
    placementRecordsContainer.innerHTML = ''; // Clear previous content
    placementRecordsContainer.appendChild(recordContainer);
    recordTypeDropdown.disabled = true;
}
function createRecordContainer(recordType) {
    var recordContainer = document.createElement('div');
    recordContainer.className = 'small-container';

    var records = [];

    for (var i = 0; i < 5; i++) {
        var smallContainer = createSmallContainer(recordType, i);
       
            records.push(smallContainer.data);
        
        
        recordContainer.appendChild(smallContainer);
    }

    // Push the records array to placementRecordsData
    if (records.length > 0) {
    placementRecordsData.push({ type: recordType, records: records });
}

    return recordContainer;
}

function createSmallContainer(recordType, index) {
    var smallContainer = document.createElement('div');
    smallContainer.className = 'small-container';

    // Add delete button only for containers other than the first one
    if (index > 0) {
        var deleteButton = document.createElement('button');
        deleteButton.className = 'delete-button';
        deleteButton.innerHTML = 'Delete';
        deleteButton.onclick = function () {
            // Remove the element from the DOM
            smallContainer.remove();

            // Find the index of the container in the array
            var containerIndex = placementRecordsData.findIndex(data => data.type === recordType);
            
            // Remove the corresponding container from the array
            placementRecordsData[containerIndex].records.splice(index, 1);
        };

        smallContainer.appendChild(deleteButton);
    }

    var yearInput = document.createElement('input');
    yearInput.type = 'date';
    yearInput.className = 'year-picker';

    var valueInput1 = document.createElement('input');
    valueInput1.type = 'text';
    valueInput1.placeholder = 'Total Number of Students';

    var valueInput = document.createElement('input');
    valueInput.type = 'text';
    valueInput.placeholder = (recordType === 'board') ? 'Number of Passed Students' : 'Placed Students (Number)';

    smallContainer.appendChild(yearInput);
    smallContainer.appendChild(valueInput1);
    smallContainer.appendChild(valueInput);

    // Add data property to smallContainer
    smallContainer.data = {}; // Initialize data object

    // Update data object when input values change
    yearInput.addEventListener('input', function () {
        smallContainer.data.year = yearInput.value;
    });

    valueInput1.addEventListener('input', function () {
        smallContainer.data.totalStudents = valueInput1.value;
    });

    valueInput.addEventListener('input', function () {
        smallContainer.data.placedStudents = valueInput.value;
    });

    return smallContainer;
}

// this will look like 
// placementRecordsData = [
//     {
//         type: 'board',
//         records: [
//             {
//                 year: '2023-01-01',
//                 totalStudents: '500',
//                 placedStudents: '400'
//             },
//             // ... 4 more entries
//         ]
//     },
//     {
//         type: 'university',
//         records: [
//             {
//                 year: '2023-01-01',
//                 totalStudents: '1000',
//                 placedStudents: '800'
//             },
           
//         ]
//     },
    
// ];


//................................. courses and its respective fee...........................

var uniqueCourseNames = [];
// Define variables to store the lowest and highest fees
var lowestFee = Number.MAX_VALUE;
var highestFee = Number.MIN_VALUE;

function showInputContainers() {
    document.getElementById('course_detail').style.display='block';
    var courseSelect = document.getElementById('course');
    var feeInputContainer = document.getElementById('feeInputContainer');
    var programInputContainer = document.getElementById('programInputContainer');
    var durationInputContainer = document.getElementById('durationInputContainer');
    var strengthInputContainer = document.getElementById('strengthInputContainer');
    var locationInputContainer = document.getElementById('locationInputContainer');

    if (courseSelect.value !== 'reset') {
        feeInputContainer.style.display = 'block';
        programInputContainer.style.display = 'block';
        durationInputContainer.style.display = 'block';
        strengthInputContainer.style.display = 'block';
        locationInputContainer.style.display = 'block';
    } else {
        feeInputContainer.style.display = 'none';
        programInputContainer.style.display = 'none';
        durationInputContainer.style.display = 'none';
        strengthInputContainer.style.display = 'none';
        locationInputContainer.style.display = 'none';
    }
}

function addMore() {
    var courseSelect = document.getElementById('course');
    var feeInput = document.getElementById('fee');
    var programInput = document.getElementById('program');
    var durationInput = document.getElementById('duration');
    var strengthInput = document.getElementById('strength');
    var locationInput = document.getElementById('location');

    var addedCoursesContainer = document.getElementById('addedCourses');

    if (courseSelect.value !== 'reset' && feeInput.value !== '' && programInput.value !== '' && durationInput.value !== '' && strengthInput.value !== '' && locationInput.value !== '') {
        // Check if the course already exists in the array
        var existingCourseIndex = courseData.findIndex(item => item.course === courseSelect.value);
        var existingCourseIndex1 = uniqueCourseNames.indexOf(courseSelect.value);

// Create a new course object if it doesn't exist
if (existingCourseIndex1 === -1) {
    document.getElementById('add_more_course').innerText = 'Click One More Time ';
    uniqueCourseNames.push(courseSelect.value);
    existingCourseIndex = uniqueCourseNames.length - 1;
}
document.getElementById('add_more_course').innerText = 'Add More Courses ';
 // Update the lowest and highest fees
        var currentFee = parseFloat(feeInput.value);
        lowestFee = Math.min(lowestFee, currentFee);
        highestFee = Math.max(highestFee, currentFee);


        // Create a new course object if it doesn't exist
        if (existingCourseIndex === -1) {
            var newCourse = {
                course: courseSelect.value,
                programs: []
            };
            courseData.push(newCourse);
            existingCourseIndex = courseData.length - 1;
        }

        // Add the program details to the existing or new course
        courseData[existingCourseIndex].programs.push({
            program: programInput.value,
            duration: durationInput.value,
            strength: strengthInput.value,
            location: locationInput.value,
            fee: feeInput.value
        });

        // Display the added courses
        displayAddedCourses();

        // Clear input values
        courseSelect.value = 'Select more courses';
        feeInput.value = '';
        programInput.value = '';
        durationInput.value = '';
        strengthInput.value = '';
        locationInput.value = '';

        document.getElementById('feeInputContainer').style.display = 'none';
        document.getElementById('programInputContainer').style.display = 'none';
        document.getElementById('durationInputContainer').style.display = 'none';
        document.getElementById('strengthInputContainer').style.display = 'none';
        document.getElementById('locationInputContainer').style.display = 'none';
    } else {
        alert('Please fill in all fields before adding more.');
    }
}

function displayAddedCourses() {
    var addedCoursesContainer = document.getElementById('addedCourses');
    addedCoursesContainer.innerHTML = '';

    courseData.forEach(course => {
        var addedCourseDiv = document.createElement('div');
        addedCourseDiv.className = 'added-course';

        var courseText = document.createElement('span');
        courseText.innerHTML = `<strong>${course.course}:</strong>`;
        addedCourseDiv.appendChild(courseText);

        course.programs.forEach(program => {
            var programText = document.createElement('p');
            programText.innerHTML = `Program - ${program.program}, Duration - ${program.duration}, Strength - ${program.strength}, Location - ${program.location}, Fee - ${program.fee}`;
            addedCourseDiv.appendChild(programText);
        });

        var removeButton = document.createElement('button');
        removeButton.className = 'delete-button123';
        removeButton.innerHTML = 'Delete';
        removeButton.onclick = function () {
            // Find the index of the course to be removed
            var indexToRemove = courseData.findIndex(item => item.course === course.course);
            var indexToRemove1 = uniqueCourseNames.indexOf( course.course);
           
    if (indexToRemove !== -1) {
        // Remove the course from the array
        uniqueCourseNames.splice(indexToRemove1, 1);
        recalculateFees();
        console.log('Updated uniqueCourseNames after removal:', uniqueCourseNames);
    } else {
        console.log('Course not found in uniqueCourseNames.');
    }
            if (indexToRemove !== -1) {
                // Remove the course from the array
                courseData.splice(indexToRemove, 1);

                // Enable the corresponding option in the dropdown
                var optionToRemove = document.querySelector(`#course option[value="${course.course}"]`);
                optionToRemove.disabled = false;

                // Remove the corresponding addedCourseDiv
                addedCoursesContainer.removeChild(addedCourseDiv);

                // Log the updated array to the console
                console.log('Updated courseData after removal:', courseData);
            } else {
                console.log('Course not found in courseData.');
            }
        };

        addedCourseDiv.appendChild(removeButton);
        addedCoursesContainer.style.display='block';
        addedCoursesContainer.appendChild(addedCourseDiv);
    });
}
function recalculateFees() {
    // Reset lowest and highest fees
    lowestFee = Number.MAX_VALUE;
    highestFee = Number.MIN_VALUE;

    // Loop through the courses and programs to recalculate fees
    courseData.forEach(course => {
        course.programs.forEach(program => {
            var currentFee = parseFloat(program.fee);
            lowestFee = Math.min(lowestFee, currentFee);
            highestFee = Math.max(highestFee, currentFee);
        });
    });

    console.log('Recalculated fees - Lowest:', lowestFee, 'Highest:', highestFee);
}
// .................................course and its details will look like this ....................
// var courseData = [
//     {
//         course: "neet",
//         programs: [
//             {
//                 program: "alpha batch",
//                 duration: "4 year",
//                 strength: "50 students",
//                 location: "ranchi",
//                 fee: "40000"
//             },
//             {
//                 program: "beta batch",
//                 duration: "2 year",
//                 strength: "200 students",
//                 location: "lohardaga",
//                 fee: "30000"
//             }
//         ]
//     },
//     {
//         course: "cat",
//         programs: [
//             {
//                 program: "gamma batch",
//                 duration: "3 year",

// ...................................sending data to backended........................
function showToast(message,status) {
   // Create a toast element and append it to the body
   var toast = $('<div class="toast">' + message + '</div>');
  
   if(status=='success'){
     toast.addClass('success');
   }else{
     toast.addClass('error');
   }

   $('body').append(toast);
   toast.fadeIn(400).delay(2000).fadeOut(400, function() {
       // After fading out, remove the toast from the DOM
       $(this).remove();
   });
   
   return;
  
}
function displayPlacementRecordsData(coaching_centre_id, written_detail) {
    var formData = new FormData();
    formData.append('teacherData', JSON.stringify(teachersData));
    formData.append('selectedOptionsData', JSON.stringify(selectedOptionsData));
    formData.append('placementRecordsData', JSON.stringify(placementRecordsData));
    formData.append('courseData', JSON.stringify(courseData));
    formData.append('ModeOfAdmission', JSON.stringify(admissionModesArray));
    formData.append('scholarship', JSON.stringify(scholarshipModesArray));
    formData.append('allDetail', JSON.stringify(basicDetailArray));
    formData.append('coaching_centre_id', coaching_centre_id);
    formData.append('written_detail', written_detail);
    // formData.append('coaching_location',coaching_location);
    formData.append('uniqueCourseNames', JSON.stringify(uniqueCourseNames));
    formData.append('basicDetailFrontArray', JSON.stringify(basicDetailFrontArray));
    formData.append('selectedValues', JSON.stringify(selectedValues));

    // Create an AJAX request
    $.ajax({
        url: 'process_form_backup.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            showToast("Data added successfully we will show it in our website after verification",'success');
            alert("Data added successfully we will show it in our website after verification");
        },
        error: function (xhr, status, error) {
            alert('Error: ' + status);
        }
    });
}


function onSubmitForm() {
    // Other form submission logic...

    // Alert the teachersData array
    // alert("Teachers Data:\n" + JSON.stringify(teachersData, null, 2));//pass
    // alert("courseData Data:\n" + JSON.stringify(courseData, null, 2)); //pass
    // alert("facilities Data:\n" + JSON.stringify(selectedOptionsData, null, 2));//pass
 
    // alert("placementRecordsData Data:\n" + JSON.stringify(placementRecordsData, null, 2));
     
            const admissionInputModes = document.getElementById('admissionModes').value;
            const admissionModes = admissionInputModes.split(',').map(mode => mode.trim());

            // Add the admission modes to the existing array
            admissionModesArray = admissionModesArray.concat(admissionModes);

            // Get the scholarship modes input value and split it into an array
            const scholarshipInputModes = document.getElementById('scholarshipModes').value;
            const scholarshipModes = scholarshipInputModes.split(',').map(mode => mode.trim());

            // Add the scholarship modes to the existing array
            scholarshipModesArray = scholarshipModesArray.concat(scholarshipModes);
            basicDetailArray.push(document.getElementById('coachingCenterName').value);
            basicDetailFrontArray.push(document.getElementById('coachingCenterName').value);
            basicDetailFrontArray.push(document.getElementById('mobile_no').value);
            basicDetailFrontArray.push(document.getElementById('email_id').value);
            basicDetailFrontArray.push(lowestFee.toString());
            basicDetailFrontArray.push(highestFee.toString());
            // basicDetailArray.push(document.getElementById('coachingCenterLocation').value);
            basicDetailArray.push(document.getElementById('coaching_website').value);

            var written_detail=document.getElementById('coachingCenterDetails').value;
            var coaching_centre_id=document.getElementById('coachingCenterId').value;
            // var coaching_location=document.getElementById('coachingCenterLocation').value;
            // You can use admissionModesArray and scholarshipModesArray for further processing or send them to the server

    // alert("Mod Of Admission:\n" + JSON.stringify(admissionModesArray, null, 2))//pass;
    // alert("Scholarship:\n" + JSON.stringify(scholarshipModesArray, null, 2))//pass;
    // alert("All Details:\n" + JSON.stringify(basicDetailArray, null, 2))//pass;
    //  alert("All Details:\n" + JSON.stringify(uniqueCourseNames, null, 2))//pass;
    //  alert("All Details:\n" + JSON.stringify(basicDetailFrontArray, null, 2))//pass;
    // alert("Location Details:\n" + JSON.stringify(selectedValues, null, 2))//pass;
    performSearch();
     var lowest_highest_fee=[];

     if(lowestFee==Number.MAX_VALUE){
        lowstFee=0;
     }else if(highestFee == Number.MIN_VALUE){
        lowstFee=9999999;
     }
         lowest_highest_fee = [lowestFee, highestFee];
    //  alert('Lowest Fee: ' + lowestFee + '\nHighest Fee: ' + highestFee);

     displayPlacementRecordsData(coaching_centre_id,written_detail);
     


}

    var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}


var countrySelect = document.querySelector('.country'),
    stateSelect = document.querySelector('.state'),
    citySelect = document.querySelector('.city')

// Array to store selected values

function loadCountries() {

    let apiEndPoint = config.cUrl

    fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(Response => Response.json())
    .then(data => {
        console.log(data);

        data.forEach(country => {
            const option = document.createElement('option')
            option.value = country.iso2
            option.textContent = country.name 
            if(country.name=="India"){
                countrySelect.appendChild(option)
            }
            
        })
    })
    .catch(error => console.error('Error loading countries:', error))

    stateSelect.disabled = true
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'none'
    citySelect.style.pointerEvents = 'none'
}


function loadStates() {
    stateSelect.disabled = false
    citySelect.disabled = true
    stateSelect.style.pointerEvents = 'auto'
    citySelect.style.pointerEvents = 'none'

    const selectedCountryCode = countrySelect.value
    // console.log(selectedCountryCode);
    stateSelect.innerHTML = '<option value="">Select State</option>' // for clearing the existing states
    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        console.log(data);

        data.forEach(state => {
            const option = document.createElement('option')
            option.value = state.iso2
            option.textContent = state.name 
            stateSelect.appendChild(option)
        })
    })
    .catch(error => console.error('Error loading countries:', error))
}


function loadCities() {
    citySelect.disabled = false
    citySelect.style.pointerEvents = 'auto'

    const selectedCountryCode = countrySelect.value
    const selectedStateCode = stateSelect.value
     console.log(selectedCountryCode, selectedStateCode);

    citySelect.innerHTML = '<option value="">Select City</option>' // Clear existing city options

    fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, {headers: {"X-CSCAPI-KEY": config.ckey}})
    .then(response => response.json())
    .then(data => {
        console.log(data);

        data.forEach(city => {
            const option = document.createElement('option')
            option.value = city.iso2
            option.textContent = city.name 
            citySelect.appendChild(option)
        })
    })
     // Store selected values in the array
    //  console.log(citySelect.options[citySelect.selectedIndex].text)

     const selectedCountry = countrySelect.options[countrySelect.selectedIndex].text;
     const selectedState = stateSelect.options[stateSelect.selectedIndex].text;
     const selectedCity = citySelect.options[citySelect.selectedIndex].text;
 
     
 
     // Display selected values
    //  document.getElementById('selectedValues').innerHTML = `Selected Country: ${selectedValues[0]}, Selected State: ${selectedValues[1]}, Selected City: ${selectedValues[2]}`;
}





function performSearch() {
    // You can perform your search logic here using the selectedValues array
    const selectedCountry = countrySelect.options[countrySelect.selectedIndex].text;
    const selectedState = stateSelect.options[stateSelect.selectedIndex].text;
    const selectedCity = citySelect.options[citySelect.selectedIndex].text;
    selectedValues = [selectedCountry, selectedState, selectedCity];
    console.log("Selected Country:", selectedCountry);
    console.log("Selected State:", selectedState);
    console.log("Selected City:", selectedCity);
    console.log("Performing search:", selectedValues);
    
}
window.onload = loadCountries;
  </script>

<?php
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
