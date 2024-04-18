<div class="bu">
  <button id="inquiry-span1" onclick="showLogin('Users')">User Login</button> 
  <button id="inquiry-span2" onclick="showLogin('Institute')">Institute Login</button>
</div> 

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
    
    function submitInquiry_login() {
        // Handle form submission logic here
        // use JavaScript to collect the input values and send them to the server


        // alert(know +'login');
        if(know=="Users"){
          
        }
        know='';
        closeInquiryForm();
        
    }
    function send_data1(selectedValues){
        window.location.href = "student_signup.php?fetchedData=" + encodeURIComponent(selectedValues); 

         }
    function send_data2(selectedValues){
        window.location.href = "index.php?fetchedData=" + encodeURIComponent(selectedValues); 

         }
    function submitInquiry_signup() {
        // Handle form submission logic here
        // use JavaScript to collect the input values and send them to the server
        if(know=='Users'){
          var gmail=document.getElementById('email_id').value;
          send_data1(gmail);
        }
        if(know=='Institute'){
          var gmail=document.getElementById('email_id').value;
          send_data2(gmail);
        }
        
        closeInquiryForm();
    }

    // ................................................
    function showLogin(parameter) {
        know=parameter;
        document.getElementById("inquiryContainer").style.display = "flex";
        document.body.style.overflow = "hidden"; /* Disable scrolling when the inquiry form*/
        document.getElementById("form_type").innerText=parameter+" "+"Login Form";
        document.getElementById("login").style.backgroundColor="lightblue";
        document.getElementById("signup").style.backgroundColor="#3498db";
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("signupForm").style.display = "none";
    }
   

    function showSignup(parameter) {
        document.getElementById("inquiryContainer").style.display = "flex";
        document.body.style.overflow = "hidden"; /* Disable scrolling when the inquiry form*/
        document.getElementById("form_type").innerText=parameter+" "+"Signup Form";
        document.getElementById("signup").style.backgroundColor="lightblue";
        document.getElementById("login").style.backgroundColor="#3498db";
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("signupForm").style.display = "block";
    }

</script>
    
    

    <div class="inquiry-container" id="inquiryContainer">
    <div class="inquiry-form">
        <!-- <span class="close-btn" onclick="closeInquiryForm()">&times;</span> -->
        <img src="images/icons8-close-30.png" class="close-btn" onclick="closeInquiryForm()">

        
    <div class="center">
    <h2 id="form_type"></h2>
    
    <button class="singin_button" id="login" onclick="showLogin(know)">Login</button>
    <button class="singin_button" id="signup" onclick="showSignup(know)">Signup</button>
    <!-- <img src="icons8-user-96.png" alt="" style="margin: auto; size: 2vw;"> -->

    </div>

    <form id="loginForm">
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button class="singup_button" onclick="submitInquiry_login()">Submit</button>
    </form>

    <form id="signupForm">
        <label for="newUsername">New Username:</label>
        <input type="text" id="newUsername" name="newUsername" required>

        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required>
        <label>Enter the Email Id</label>
        <input type='text' name='emailid'id="email_id" ></input>
        <label>Enter the Phone No.</label>
        <input type='text' name='phoneno'></input>
        <button class="singup_button" onclick="submitInquiry_signup()">Submit</button>
    </form>
           
    </div>
    </div>
