<?php
session_start();
include 'navbar.php';
include 'connection.php';

?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="navbarr.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="home.css">  
    <link rel="stylesheet" href="pop_up.css">  
    </head>
    <body>

<?php
$courses = array(
    array("image" => "images/gateway-of-india.png", "name" => "Ranchi"),
    array("image" => "images/hawa-mahal.png", "name" => "Jaipur"),
    array("image" => "images/tajmahal.png", "name" => "Agra"),
    array("image" => "images/victoria-memorial.png", "name" => "Kolkata"),
    array("image" => "images/india-gate.png", "name" => "Delhi"),
    array("image" => "images/surat-municipal-corporation.png", "name" => "Gujrat"),
    array("image" => "images/chennai.png", "name" => "Chennai"),
    array("image" => "images/gateway-of-india.png", "name" => "Mumbai"),
    array("image" => "images/hawa-mahal.png", "name" => "Jaipur"),
    array("image" => "images/tajmahal.png", "name" => "Agra"),
    array("image" => "images/victoria-memorial.png", "name" => "Kolkata"),
    array("image" => "images/india-gate.png", "name" => "Delhi"),
    array("image" => "images/surat-municipal-corporation.png", "name" => "Gujrat"),
    array("image" => "images/chennai.png", "name" => "Chennai"),
);

?>
<div class="below_nav_bar">

<div class="slider-container">
    <div class="slider">
        <?php for ($i = 0; $i < count($courses); $i += 1) : ?>
            <div class="slidep">
                <?php for ($j = $i; $j < $i + 6; $j++) : ?>
                    <?php if (isset($courses[$j])) : ?>
                        <div class="course-item">
                            <img src="<?php echo $courses[$j]['image']; ?>" alt="Course Image">
                            <div class="course-name"><?php echo $courses[$j]['name']; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
    <button class="navigation-button prev" onclick="prevSlide()">&#10094;</button>
    <button class="navigation-button next" onclick="nextSlide()">&#10095;</button>
</div>

<script>
    let currentSlide = 0;
    const slidesp = document.querySelectorAll('.slidep');
    const coursesCount = <?php echo count($courses); ?>;

    function showSlide(index) {
        if (index >= slidesp.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slidesp.length - 1;
        } else {
            currentSlide = index;
        }

        const translateValue = -currentSlide * (100 / Math.ceil(coursesCount / 7)) + '%';
        document.querySelector('.slider').style.transform = 'translateX(' + translateValue + ')';
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var courseNames = document.querySelectorAll('.course-name');
        courseNames.forEach(function(courseName) {
            courseName.addEventListener('click', function() {
                var selectedCourse = this.textContent;
                
                // Encode the selected location name for URL
                var encodedCourse = encodeURIComponent(selectedCourse);
                
                // Redirect to coaching_small.php with the selected course name as a query parameter
                window.location.href = 'show_coaching_small.php?course=' + encodedCourse;
            });
        });
    });
</script>


    <div class="container">
        <!-- <header>
            <h1>Coaching Center Search</h1>
        </header> -->

        <div class="search-bar">
            <!-- <div class="logo">
              
                <img src="newlogo.jpg" alt="Logo">
            </div> -->
              <?php
                 if(isset($_SESSION['status'])){
                ?>
                <div class="alert alert-success">
                    <h5><?=$_SESSION['status'];?></h5>
                </div>
                 <?php
                 unset($_SESSION['status']);
                  }
                 ?>
            <div class="search-fields">
                <select class="country" name="country" onchange="loadStates()">
                    <option value=""style="width:5vw;" disabled selected >Select Country</option>
                    <!-- Add country options here -->
                </select>

                <select class="state" name="state"  onchange="loadCities()">
                    <option value="" disabled selected>Select State</option>
                    <!-- Add state options here -->
                </select>

                <select class="city" name="city">
                    <option value="" disabled selected>Select City</option>
                    <!-- Add city options here -->
                </select>
              <span><p style="font-size: 1.7vw;margin: 1vw 2vw;">or</p></span>
              <div class="kaho">
                <input type="text" id="coachingName" name="coachingName" placeholder="Search by Coaching Name">
                <div id="coachingList" ></div>
              </div>
                <button class="search-button" type="button" onclick="performSearch()">Search</button>
            </div>
            
        </div>
        
    </div>
  </div>
 
  <!-- <div class="brief-detail-container">
        <div class="brief-detail">
            <img src="registered.gif"  alt="Image 1" class="image">
            <div class="text-content">
                <h2>12000+</h2>
                <p class="number">Registed Coaching Centers</p>
            </div>
        </div>
        
        <div class="brief-detail">
            <img src="students.gif"  alt="Image 2" class="image">
            <div class="text-content">
                <h2>100000+</h2>
                <p class="number">Trusted by students</p>
            </div>
        </div>
        
        <div class="brief-detail">
            <img src="ask_question.gif" alt="Image 3" class="image">
            <div class="text-content">
                <h2>50000+</h2>
                <p class="number">Queries Cleared</p>
            </div>
        </div>
    </div>
   -->
    <!-- ................................. enquery.................................. -->
   

    <!-- ...........................................continue................................. -->
  <!-- <img src="images/meri_padhaiVSothers.png" style="max-width:100%;margin:auto;" alt=""> -->
  <div class="book">
<div class="details">
  <h1> <span  id="are_you_scared">Are you scared of loosing your money</span> <br> <span id="details_h1">due to false claims by coaching institutes</span></h1>
  <h2 >Don't worry, grab your seat now and protect your money from possible fraud <span id="price"> </span></h2>
  <h3 >Get your fee refund back once you get admission</h3>
  <button class="inquiry-span" onclick="showLogin('Users')">Know More</button> 
  <button id="book_seat" onclick="window.location.href='book_coaching.php'">Book Now</button>
  
  
</div>
  </div>

      <!-- ................................. enquery.................................. -->
<script>
    var know;
    function openInquiryForm(parameter) {
        know=parameter;
        // alert()
        document.getElementById("inquiryContainer").style.display = "flex";
        document.body.style.overflow = "hidden"; /* Disable scrolling when the inquiry form is open */
    }
    
    function closeInquiryForm() {
        document.getElementById("inquiryContainer").style.display = "none";
        document.body.style.overflow = "auto"; /* Enable scrolling when the inquiry form is closed */
    }


    // ................................................
    function showLogin(parameter) {
        know=parameter;
        document.getElementById("inquiryContainer").style.display = "flex";
        document.body.style.overflow = "hidden"; /* Disable scrolling when the inquiry form*/
        document.getElementById("form_type").innerText=parameter+" "+"Login Form";
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("signupForm").style.display = "none";
    }
   

</script>
    
    

    <div class="inquiry-container" id="inquiryContainer">
    <div class="inquiry-form">
        <!-- <span class="close-btn" onclick="closeInquiryForm()">&times;</span> -->
        <img src="images/icons8-close-30.png"  onclick="closeInquiryForm()" id="pop_image">
     <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa, autem. Eaque, voluptatum magni ad vitae sequi porro eos maxime aperiam similique
       voluptatibus, reiciendis animi numquam esse ipsum distinctio? Est aliquid voluptas consequuntur odio doloribus libero exercitationem vel eius cumque,
        distinctio itaque similique cupiditate quos deleniti ipsam, asperiores officiis porro rem. Maiores cupiditate, sint magnam quod sit corrupti, obcaecati sunt,
         voluptas omnis nemo magni alias quas ratione amet corporis animi non repellat ullam suscipit sed eum. Eum neque quos nulla ab ipsa corrupti, culpa quod ut laudantium?
          Alias explicabo dolores facere doloremque quaerat amet accusantium dolor quisquam voluptates, delectus possimus rem.</p> 
    </div>
    </div>

<!-- .................................... end section........................... -->

<h1 style="text-align:center;margin-bottom: -3vw;font-family:cursive;">Why Coaching Helper</h1>
   <div class="what_you_get_main_part">

<div class="what_you_get">
    <div class="what_you_get_logo" class="n">
        <img src="images/quality.gif" alt="">
    </div>
    <div class="what_you_get_details">
        <h5>Quality Over Quantity</h5>
        <p id="what_you_get_details1">We believe on providing all details of your interested coaching center to make easier for you to know every aspect of coaching centers before visiting it</p>    
    </div>
</div>
<div class="what_you_get">
    <div class="what_you_get_logo">
        <img src="images/on_time.gif" alt="">
    </div>
    <div class="what_you_get_details">
        <h5>Dont know information</h5>
        <p id="what_you_get_details2">Fee, Location, Placement/Selection Rate,<br> Contact Number and many more</p>
      
    </div>
</div>
<div class="what_you_get">
    <div class="what_you_get_logo">
        <img src="images/legal_work.gif" alt="">
    </div>
    <div class="what_you_get_details">
        <h5>Free For You <br></h5>
        <p id="what_you_get_details3">We are completely free platforms , Our aim is to provide you all relevant information and make your decision easier</p>
      
    </div>
</div>
<div class="what_you_get">
    <div class="what_you_get_logo">
        <img src="images/students.gif" alt="">
    </div>
    <div class="what_you_get_details">
        <h5>Real reviews from students</h5>
        <p id="what_you_get_details4">One question always strikes on mind, whether provided information is really works or not . We provide you students reviews who are past students of selected coaching centers.</p>
    
    </div>
</div>

</div>

  <!-- <span id="auto-typing-text" style="color: cadetblue;font-weight:700;">Your all solution in one platform</span> -->
  <!-- <div id="auto-typing-text" ><span style="color:red;">Services</span> We Provides You</div> -->
<div class="typing">
<!-- <p style="margin-bottom: -1vh;font-size: 3vw;text-align: center;font-family:cursive;"> Find My Coching</p> -->
<div id="auto-typing-text" style="color: cadetblue;font-weight:700;margin:2vw 0vw;" >Your all solution in one platform</div>
</div>

  
<div class="upper_part">

<!-- left part -->
<div class="left">

<div class="containerrr">
    <!-- First div -->
    <div class="item">
      <img src="images/select_your_city.png" alt="Image 1">
      <div class="content">
        <h2>Select Your Course or city name </h2>
        <p>Choosing nearest city and selecting right coaching will help you to explore more </p>
      </div>
    </div>

    <!-- Second div -->
    <div class="item">
      <img src="images/explore_opportunity.png" alt="Image 2">
      <div class="content">
        <h2>Explore Coaching center near you</h2>
        <p>Once you enter your city name , you will get all coaching centers , select according to your need</p>
      </div>
    </div>
    <div class="item">
        <img src="images/detailed_explanation.png" alt="Image 2">
        <div class="content">
          <h2>Explore everything in detailed</h2>
          <p>Get details of coaching center and if any confusion then contact to the center directly</p>
        </div>
      </div>

      <div class="item">
        <img src="images/customer care.png" alt="Image 2">
        <div class="content">
          <h2>Support You Will get</h2>
          <p>in case of any confusion reach out us , we will try best to sort your queries
          </p>
        </div>
      </div>

  </div>

</div>
<!-- <div class="right1"> -->
<!-- right part -->

<!-- </div> -->

<div class="right">
<!-- <div class="slider-container right">
  <div class="slider">
    <div class="slide"><img src="back.jpg" alt="Slide 1"></div>
    <div class="slide"><img src="newlogo.jpg" alt="Slide 2"></div>
    <div class="slide"><img src="back.jpg" alt="Slide 3"></div>
   
  </div>

  <button class="control-button prev" onclick="prevSlide">&#9665;</button>
  <button class="control-button next" onclick="nextSlide">&#9655;</button>
</div> -->

<!-- </div> -->

<!-- <div class="facity_upper_part">
<div class="left_facility">
<div class="facility">
  <div class="facility_left">
  <img src="Screenshot (1214).png" alt="Image 1">
  </div>
  <div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
</div>

<div class="facility">
  <div class="facility_left">
  <img src="all_details.png" alt="Image 2">
  </div>
  <div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
</div>

<div class="facility">
  <div class="facility_left">
  <img src="Screenshot (1210).png" alt="Image 3">
  </div>
  <div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
</div>

</div>

<div class="facity__part">
<div class="facility">
  <div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
<div class="facility_left">
  <img src="Screenshot (1213).png" alt="Image 3">
</div>
 
</div>

<div class="facility">
<div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
<div class="facility_left">
  <img src="Screenshot (1212).png" alt="Image 3">
</div>
  
</div>

<div class="facility">
<div class="facility_right">
    <div class="facility_details">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta, voluptatum?</div>
  </div>
<div class="facility_left">

  <img src="Screenshot (1208).png" alt="Image 3">
</div>
 
</div>

</div>

</div> -->
<!-- <div class="facility">
  <img src="fee_detail.png" alt="Image 3">
  <p>Fee Dtails</p>
</div> -->

<!-- <div class="services" style="text-align: center;"><img src="services.gif" alt="" style="height:6vw;"></div> -->
<!-- <div class="typing">
<div id="auto-typing-text" ><span style="color:red;">Services</span> We Provides You</div>
</div> -->
<!-- ........................................... experiment part........................... -->
<!-- 
    <div class="what_you_get_main_part">

        <div class="what_you_get">
            <div class="what_you_get_logo" class="n">
                <img src="quality.gif" alt="">
            </div>
            <div class="what_you_get_details">
                <h3>Quality Assurance</h3>
                <p>Lorem ipsum dolor sit amet.</p> <br>
                <hr>
                <span >Lorem ipsum dolor sit.</span>
            </div>
        </div>
        <div class="what_you_get">
            <div class="what_you_get_logo">
                <img src="on_time.gif" alt="">
            </div>
            <div class="what_you_get_details">
                <h3>On Time Work</h3>
                <p>Lorem ipsum dolor sit amet.</p><br>
                <hr>
                <span >Lorem ipsum dolor sit.</span>
            </div>
        </div>
        <div class="what_you_get">
            <div class="what_you_get_logo">
                <img src="within_budget.gif" alt="">
            </div>
            <div class="what_you_get_details">
                <h3>Within Budeget</h3>
                <p>Lorem ipsum dolor sit amet.</p> <br>
                <hr>
                <span >Lorem ipsum dolor sit.</span>
            </div>
        </div>
        <div class="what_you_get">
            <div class="what_you_get_logo">
                <img src="legal_work.gif" alt="">
            </div>
            <div class="what_you_get_details">
                <h3>Fast and Legal Process</h3>
                <p>Lorem ipsum dolor sit amet.</p> <br>
                <hr>
                <span >Lorem ipsum dolor sit.</span>
            </div>
        </div>

    </div> -->

<!-- .................................. configuration ............................. -->
<!-- 
<div class="maincontainer">
        <div class="box">
            <div class="box1">
                <div class="bg"></div>
                <div class="smallbox1"></div>
                <div class="smallbox2"></div>
                <div class="arrowhead"></div>
                <div class="box1text">
                    <div class="step">STEP</div>
                    <div class="stepnumber">01</div>
                </div>
            </div>
            <div class="box2">
                <div class="box2text">
                    <div class="tagline">Subscribe to my Channel</div>
                    <h1>JAYKV390</h1>
                    <p>Please like my videos and share it with your friends. If you like it give it a thmbsup....Thank You for watching</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box1">
                <div class="bg"></div>
                <div class="smallbox1"></div>
                <div class="smallbox2"></div>
                <div class="arrowhead"></div>
                <div class="box1text">
                    <div class="step">STEP</div>
                    <div class="stepnumber">02</div>
                </div>
            </div>
            <div class="box2">
                <div class="box2text">
                    <div class="tagline">Subscribe to my Channel</div>
                    <h1>JAYKV390</h1>
                    <p>Please like my videos and share it with your friends. If you like it give it a thmbsup....Thank You for watching</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box1">
                <div class="bg"></div>
                <div class="smallbox1"></div>
                <div class="smallbox2"></div>
                <div class="arrowhead"></div>
                <div class="box1text">
                    <div class="step">STEP</div>
                    <div class="stepnumber">03</div>
                </div>
            </div>
            <div class="box2">
                <div class="box2text">
                    <div class="tagline">Subscribe to my Channel</div>
                    <h1>JAYKV390</h1>
                    <p>Please like my videos and share it with your friends. If you like it give it a thmbsup....Thank You for watching</p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="box1">
                <div class="bg"></div>
                <div class="smallbox1"></div>
                <div class="smallbox2"></div>
                <div class="arrowhead"></div>
                <div class="box1text">
                    <div class="step">STEP</div>
                    <div class="stepnumber">04</div>
                </div>
            </div>
            <div class="box2">
                <div class="box2text">
                    <div class="tagline">Subscribe to my Channel</div>
                    <h1>JAYKV390</h1>
                    <p>Please like my videos and share it with your friends. If you like it give it a thmbsup....Thank You for watching</p>
                </div>
            </div>
        </div>
    </div> -->

   <div id="container321">
    <h2>Fill This Form For Any Query</h2>
     <?php
     if(isset($_SESSION['status'])){
     ?>
  <div class="alert alert-success">
      <h5><?=$_SESSION['status'];?></h5>
  </div>
      <?php
   unset($_SESSION['status']);
       }
      ?>

    <form action="enquiery.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" required>

        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required>

        <label for="coaching">Coaching:</label>
        <select id="coaching" name="coaching" required>
            <option value="">Select Coaching</option>
            <option value="nda">NDA</option>
            <option value="neet">NEET</option>
            <option value="jee">JEE</option>
            <option value="NEET">Medical</option>
            <option value="pre-schooling">Pre-Schooling</option>
        </select>

        <label for="question">Ask Your Question:</label>
        <textarea id="question" name="question" rows="2" required></textarea>

        <input type="submit" value="Submit">
    </form>

  </div>

</div>
</div>

<!-- ............................... all states details...................... -->
<h3 class="browse_by">Browse By state name</h3>
<div id="sidebar">
    <div><div class="container_right" onclick="showDetails('1-8', this)" id="1-8">1-8 Class</div><div  class="trangle" id="trangle1-8"></div></div> 
    <div><div class="container_right" onclick="showDetails('8-10', this)" id="8-10">8-10 Class</div><div  class="trangle" id="trangle8-10"></div></div>
    <div><div class="container_right" onclick="showDetails('10-12', this)" id="10-12">10-12 Class</div><div  class="trangle" id="trangle10-12"></div></div>
    <div><div class="container_right" onclick="showDetails('neet', this)" id="neet">Medical</div><div  class="trangle" id="trangleneet"></div></div>
    <div><div class="container_right" onclick="showDetails('engineering', this)" id="engineering">Engineering</div><div  class="trangle" id="trangleengineering"></div></div>
    <div><div class="container_right" onclick="showDetails('banking', this)" id="banking">Banking</div><div  class="trangle" id="tranglebanking"></div></div>
    <div><div class="container_right" onclick="showDetails('civilService', this)" id="civilService">Civil Service</div><div  class="trangle" id="tranglecivilService"></div></div>
    <div><div class="container_right" onclick="showDetails('NDA', this)" id="NDA">NDA</div><div  class="trangle" id="trangleNDA"></div></div>
    <div><div class="container_right" onclick="showDetails('railway', this)" id="railway">Railway</div><div  class="trangle" id="tranglerailway"></div></div>
    <div><div class="container_right" onclick="showDetails('navodya', this)" id="navodya">Navodya</div><div  class="trangle" id="tranglenavodya"></div></div>
    <div><div class="container_right" onclick="showDetails('otherexam', this)" id="otherexam">Other Exams</div><div  class="trangle" id="trangleotherexam"></div></div>
    <!-- Add more containers as needed -->
</div>
<div id="content">

    <p id="details">Click on a category to see more details.</p>
    <img src="images/loader.gif" id="loading-message" alt="loader">
    <div id="largeDetailsContainer"></div>
    <div id="big-container">
  <!-- Dynamic small div containers will be added here -->
   </div>
   <div id="big-container1">
  <!-- Dynamic small div containers will be added here -->
   </div>
   <button class="see-more-button" >See More</button>
</div>
<script>
   var prev_pressed='neet';
   showDetails('neet');
   
  function showDetails(category, clickedButton) {
  // background color of button goggle effect
      var changee = document.getElementById(prev_pressed);
      changee.style.backgroundColor = 'white';
      var tra = document.getElementById('trangle'+prev_pressed);
      tra.style.display='none';

  
      
      prev_pressed=category;
      var change = document.getElementById(category);
      change.style.backgroundColor = 'lightgrey';
      var tra = document.getElementById('trangle'+category);
      tra.style.display='none';
    
 
        var detailsElement = document.getElementById('details');
        var largeDetailsContainer = document.getElementById('largeDetailsContainer');
        
        // Clear existing content in the large container
        largeDetailsContainer.innerHTML = '';
    
        

    const bigContainer = document.getElementById('big-container');
    const bigContainer1 = document.getElementById('big-container1');
    let val = document.getElementsByClassName('see-more-button')[0];
    detailsElement.innerText = 'All States Coaching Centers for '+ category;
   
    

    
    const cont = document.getElementById('content');
    document.getElementById("loading-message").style.display = 'block';

    bigContainer .style.display = 'none';
    
    var originalColor = cont.style.backgroundColor;
    cont.style.backgroundColor = 'lightgrey';

    setTimeout(function() {
        cont.style.backgroundColor = originalColor;
        bigContainer .style.display = 'flex';
        document.getElementById("loading-message").style.display = 'none';
        document.getElementById('trangle'+category).style.display='block';
        document.getElementsByClassName('see-more-button')[0].style.display='block';
        // document.getElementsByClassName("see-more-button").style.display='none';

      
    }, 1000);











        // switch (category) {
          
              bigContainer.innerText="";
              bigContainer1.innerText="";
           
             // Get the first element with the class 'see-more-button'

             val.style.display = 'none'; // Set the display property to 'block'

             val.onclick = function() {
              const currentDisplayStyle = window.getComputedStyle(bigContainer1).display;

             if (currentDisplayStyle === 'none') {
               showMore(11); // Call the showMore function with the desired parameter (e.g., 11)
               bigContainer1.style.display = 'flex';
               val.innerText = 'See Less';
             } else {
               bigContainer1.style.display = 'none';
               val.innerText = 'See More';
               bigContainer1.innerText="";
             }
            };

              
                 // Array containing data for each small div
const divDataArray = [
    {
      imageSrc: 'ranchi1.png',
      heading: 'Jharkhand',
      content: 'Ranchi , Bokaro',
      content2: 'Dhanbad , Lohardaga',
      content3: 'more 22+ city'
    },
    // ... (repeat for divs 2 to 25)
    {
      imageSrc: 'bengal.png',
      heading: 'West Bengal',
      content: 'Kolkata , Hawrah',
      content2: 'Cooch Behar',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'ranchi1.png',
      heading: 'Delhi',
      content: 'East, North- East',
      content2: 'Central, Shahdara ',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'patna.png',
      heading: 'Bihar',
      content: 'Patna , Mujjafarpur',
      content2: 'Begusarai , Champaran',
      content3: 'more 27+ city'
    },
    {
      imageSrc: 'up.png',
      heading: 'Uttar Pradesh',
      content: 'Lacknow , Banaras',
      content2: 'Noida , Zagiabad',
      content3: 'more 45+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Madhya Pradesh',
      content: 'Bhopal , Bhind',
      content2: 'Chhatarpur , Burhanpur',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'odisha.png',
      heading: 'Odisha',
      content: 'Puri , Kendrapara',
      content2: 'Subarnapur, Nabarangpur',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'bengal.png',
      heading: 'Haryana',
      content: 'GurGaon , Rohtak',
      content2: 'Faridabad, Bhind',
      content3: 'more 26+ city'
    },
    {
      imageSrc: 'ranchi1.png',
      heading: 'Punjab',
      content: 'Amritsar , Barnala',
      content2: 'Bathinda , Faridkot',
      content3: 'more 15+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'patna.png',
      heading: 'Bihar',
      content: 'Patna , Mujjafarpur',
      content2: 'Begusarai , Champaran',
      content3: 'more 27+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'bengal.png',
      heading: 'Haryana',
      content: 'GurGaon , Rohtak',
      content2: 'Faridabad, Bhind',
      content3: 'more 26+ city'
    },
    {
       imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Punjab',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Kerla',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Telangana',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    },
    {
      imageSrc: 'mp.png',
      heading: 'Maharastra',
      content: 'Mumbai , Amravati',
      content2: 'Aurangabad , Bhandara',
      content3: 'more 22+ city'
    }
  ];
 
 
  // Loop through the divDataArray to create dynamic small divs
  for (let i = 0; i < 10; i++) {
    const divData = divDataArray[i];

    // Create a new small div element
    const smallDiv = document.createElement('div');
    smallDiv.classList.add('small-div');

    // Set background image using the image source
    // smallDiv.style.backgroundImage = `url(${divData.imageSrc})`;
    const smallimg = document.createElement('img');
    // smallimg.classList.add('state_image');
    // smallimg.src = divData.imageSrc; 
    // Setting the source directly to the src property of the img 
    // smallimg.style.borderBottom = '2px solid red'; 


    smallDiv.style.webkitBackdropFilter = 'blur(10px)';  // For WebKit browsers like Chrome and Safari
    smallDiv.style.backdropFilter = 'blur(10px)';  // Standard syntax

    // Create a heading element
    const heading = document.createElement('h4');
    heading.innerHTML = `<p>${divData.heading}</p>`;
    // Create a paragraph element for content
    const content = document.createElement('p');
    content.textContent = divData.content;
    content.classList.add('small_p_upper');

    const content2 = document.createElement('p');
    content2.textContent = divData.content2;
    content2.classList.add('small_p_lower');

    const content3=document.createElement('p');
    content3.textContent= divData.content3;
    const click_image=document.createElement('img');
    content3.classList.add('small_p_lower');
    
    

    // Append heading and content to the small div
    smallDiv.appendChild(smallimg);
    smallDiv.appendChild(heading);
    // smallDiv.appendChild(content);
    smallDiv.appendChild(content2);
    smallDiv.appendChild(content3);

    // Append the small div to the big container
    bigContainer.appendChild(smallDiv);

    // Add click event listener to each small div
    smallDiv.addEventListener('click', () => {
      console.log(`Clicked on ${category} ${divData.heading}`);
      var encodedCategory = encodeURIComponent(category);
      var encodedHeading = encodeURIComponent(divData.heading);
      var url = `show_coaching_small.php?category=${encodedCategory}&heading=${encodedHeading}`;
      // Redirect to the URL
      window.location.href = url;
    });
  }
  
  function showMore(number_starts_from) {
    for (let i = number_starts_from; i < divDataArray.length; i++) {
    const divData = divDataArray[i];

    // Create a new small div element
    const smallDiv = document.createElement('div');
    smallDiv.classList.add('small-div');
    // Create a heading element
    const heading = document.createElement('h4');
    heading.innerHTML = `<p>${divData.heading}</p>`;
 

    // Create a paragraph element for content
    const content = document.createElement('p');
    content.textContent = divData.content;
    content.classList.add('small_p_upper');
    const content2 = document.createElement('p');
    content2.textContent = divData.content3;
    content2.classList.add('small_p_upper');


    // // Append heading and content to the small div
    smallDiv.appendChild(heading);
    smallDiv.appendChild(content);
    smallDiv.appendChild(content2);

    // // Append the small div to the big container
    bigContainer1.appendChild(smallDiv);

    // Add click event listener to each small div
     smallDiv.addEventListener('click', () => {
      // You can perform actions when a small div is clicked
      console.log(`Clicked on ${category} ${divData.heading}`);
    });
  }

  }
            // break;
            // case 'engineering':
            //   enableAllButtons();
            //   bigContainer.innerText="";
            //   bigContainer1.innerText="";
            //   val.style.display='none';

            //     detailsElement.innerText = 'Details about the Engineering field.';
            //     break;
            // case 'banking':
            //   enableAllButtons();
            //   bigContainer.innerText="";
            //   bigContainer1.innerText="";
            //   val.style.display='none';
            //     detailsElement.innerText = 'Details about the Banking sector.';
            //     break;
            // case 'civilService':
            //   enableAllButtons();
            //   bigContainer.innerText="";
            //   bigContainer1.innerText="";
            //   val.style.display='none';

            //     detailsElement.innerText = 'Details about the Civil Service.';
            //     break;
            // case 'NDA':
            //   enableAllButtons();
            //   bigContainer.innerText="";
            //   bigContainer1.innerText="";
            //   val.style.display='none';

            //     detailsElement.innerText = 'Details about the NDA.';
            //     break;
            // // Add more cases for additional categories

        //     default:
        //         // detailsElement.innerText = 'Click on a category to see more details.';
        //         largeDetailsContainer.style.display = 'none';  // Hide the large container for other categories
        // }
    function enableAllButtons() {
    var buttons = document.querySelectorAll('#sidebar');
    buttons.forEach(button => {
      button.disabled = false;
    });
  }
        
}
  
  
</script>
<!-- ....................about section............................. -->
<h1 class="l">Coaching Helper - Your Gateway to Thousands of Coaching centers </h1>
    <div class="about_section">
        <div class="left_about_section">
            <img src="images/happy_man.jpg" alt="">
        </div>
        <div class="right_about_section">
            <p>
            Welcome to <span style="font-size:1.6vw;"><b>CoachingHelper.com</b></span>, your premier online platform dedicated to helping you discover the best coaching centers in your area across various domains. 
            Whether you're looking for academic tutoring, professional development, fitness training, or any other specialized coaching, we've got you covered. With a vast 
            database of verified coaching centers and authentic reviews from past students, making informed decisions about your educational and developmental needs has never been easier.
            Our user-friendly interface allows you to effortlessly navigate through a myriad of coaching centers, filtering by location, domain, reviews, and ratings to find the perfect
             fit for your requirements. Gone are the days of endless searches and uncertainty. At FindLocalCoaches.com, we streamline the process, ensuring that you find the ideal coaching 
             center tailored to your preferences.
            </p>
            <h3>Key Features:</h3>
            <ul>
                <li><b>Location-Based Search:</b> Find coaching centers conveniently located near you, eliminating the hassle of long commutes and enabling you to focus more on your learning journey.</li>
                <li><b>Ratings and Rankings:</b> Evaluate coaching centers based on ratings provided by past students, ensuring transparency and reliability in your decision-making process.</li>
                <li><b>Booking Convenience:</b> Reserve your spot at your preferred coaching center with ease through our integrated booking system. Secure your seat hassle-free and embark on your path to success.</li>
                <li><b>Community Engagement:</b> Join a vibrant community of learners, educators, and enthusiasts, sharing experiences, tips, and recommendations to enhance your coaching center experience.</li>
            </ul>
            <button id="about_button" onclick="GetStarted()">Get Started</button>
        </div>
    </div>


<!-- .......................... admission updates........................... -->
<h2 style="text-align:center;margin-bottom:2vw;margin-top:1vw;">Admission to Various Programs</h2>
<div class="admission2024">
 
    <div class="college_admission" onclick="handleClick('MBBS')">MBBS Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BDS')">BDS Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('PhD')">PhD Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BSC')">BSC Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BDS')">MTech Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('PhD')">B Pharmacy Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BSC')">LLB Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BDS')">Engineering Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('PhD')">Nursing Admission <img src="images/arrow_right.gif" alt="go"></div>
    <div class="college_admission" onclick="handleClick('BSC')">Reasearch Field Admission <img src="images/arrow_right.gif" alt="go"></div>
    <!-- Add more divs as needed -->
</div>
<script>
  function handleClick(admissionType) {
    console.log(`Clicked on ${admissionType} Admission`);
    // Add your logic here
}

</script>

<!-- .........................................news letter............................. -->
<div class="news_letter">
        <div class="news_letter_details">
            <h1>Subscribe to our Newsletter</h1>
            <p >"Subscribe to our newsletter and receive fresh updates directly in your email inbox. 
              Our newsletter delivers key events, latest news, and important notifications that you'll find useful for your educational or professional pursuits. 
              Join our newsletter today and stay connected with us!"
            </p>;
                <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_SESSION['form_submitted'])) {
                $email = $_POST["email"];
            
                $sql = "INSERT INTO  suscribe_to_news_letter (email_id) VALUES ('$email')";

                if ($conn->query($sql) === TRUE) {
                 echo "<div class='alert alert-success'>
                     <h5>yahoo ! You will get recent news from Coaching Helper</h5>
                     </div>";
                    $_SESSION['form_submitted'] = true;
                } 
                $conn->close();
            }else{
              echo "<div class='alert alert-danger' >
                  <h5>You have already suscribed</h5>
                  </div>";
            }

                ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                 <input type="email" name="email"  placeholder="Enter a valid email address">
                 <button type="submit" id='news_letter_button'>Submit</button>
                </form>
            <!-- <form action="">
                <input type="email" name="email" id="" placeholder="Enter a valid email address">
                <button>Submit</button>
            </form> -->
        </div>
</div>
<!-- <script src="script.js"></script> -->

<?php
include 'footer.php';
?>
 <script src="app.js"></script>
 <script src="animation.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
