<?php
include 'header.php';
?>

<div class="bg-dark">
    <div class="container56" id="container1232">
    <div class="row">
        <div >
    <nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <img src="images/coaching_logo.png" class="nav-image" alt="Logo">
    <!-- <a class="navbar-brand text-white" href="#"></a> -->
    
    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id='toggle_button'>
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link text-white active  " aria-current="page" href="home.php">Home</a>
      </li>
      <?php if(!isset($_SESSION['authenticated'])): ?>
      <li class="nav-item">
      <div class="dropdown">
        <a href="#" class="nav-link text-white ">NEET</a>
        <div class="dropdown-content">
            <a href="#">Latest Exams Dates</a>
            <a href="#"> Cutoff 2024</a>
            <a href="#"> Cutoff 2023</a>
            <a href="#"> Cutoff 2022</a>
            <a href="#"> Cutoff 2021</a>
            <a href="#"> Cutoff 2020</a>
            <a href="#">Download NEET syllabus</a>
            <a href="#">Indias top 10 medical colleges</a>
            <a href="#">medical colleges Fees</a>
            <a href="#">Tentative exams dates</a>
            <a href="#"> Delhi</a>
            <a href="#">Mumbai</a>
            <a href="#">Kolkata</a>
            <a href="#">Ranchi</a>
            <a href="#">Patna</a>
            <a href="#">Hydrabad</a>
            <a href="#">Surat</a>
            <a href="#">Jamshedpur</a>
        </div>
      </div>
      </li>
        <li class="nav-item">
          <div class="dropdown">
        <a href="#" class="nav-link text-white">JEE</a>
        <div class="dropdown-content">
            <a href="#">Latest Exams Dates</a>
            <a href="#"> Cutoff 2024</a>
            <a href="#"> Cutoff 2023</a>
            <a href="#"> Cutoff 2022</a>
            <a href="#">List of IITS</a>
            <a href="#">List of NITS</a>
            <a href="#">List of IIIT</a>
            <a href="#">List of GFTI</a>
            <a href="#">Download Jee syllabus</a>
            <a href="#">Indias top 10 Private colleges</a>
            <a href="#">Indias top 10 IIT colleges</a>
            <a href="#">Private engineering colleges Fees</a>
            <a href="#">Tentative exams dates</a>
            <a href="#"> Delhi</a>
            <a href="#">Mumbai</a>
            <a href="#">Kolkata</a>
            <a href="#">Ranchi</a>
            <a href="#">Patn  a</a>
            <a href="#">Hydrabad</a>
            <a href="#">Surat</a>
            <a href="#">Jamshedpur</a>

            </div>
          </div>
        </li>
        <li class="nav-item">
      <div class="dropdown">
        <a href="#" class="nav-link text-white ">CLAT</a>
        <div class="dropdown-content">
            <a href="#">CLAT syllabus download</a>
            <a href="#">Indias top clat online preparation platforms</a>
            <a href="#">Download syllabus</a>
            <a href="#">Latest news</a>
            <a href="#">Tentative Exam dates</a>

        </div>
      </div>
      </li>
      <li class="nav-item">
      <div class="dropdown">
        <a href="#" class="nav-link text-white  ">BANKING</a>
        <div class="dropdown-content">
            <a href="#">Latest news related to banking</a>
            <a href="#">all details of banking exam</a>
            <a href="#">Download syllabus for clerk post</a>
            <a href="#">Easy steps to become CA</a>

        </div>
      </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-black drop " href="rating_coaching_center.php">Write Review</a>
      </li>
        <li class="nav-item">
          <a class="nav-link text-black drop " href="login.php">Login</a>
        </li>

      <li class="nav-item">
      <div class="dropdown">
        <a href="#" class="nav-link text-black drop  ">Register</a>
        <div class="dropdown-content">
            <a href="register.php">Student Registration</a>
            <a href="index.php">Coaching Institute</a>
        </div>
      </div>
      </li>

        <?php endif ?>
        <li class="nav-item">
          <a class="nav-link text-black drop " href="dashboard.php">Dashboard</a>
        </li>
        <?php if(isset($_SESSION['authenticated'])): ?>
        <li class="nav-item">
          <a class="nav-link text-black drop " href="logout.php">Log Out</a>
        </li>
        <?php endif ?>
      </ul>

    </div>
  </div>
</nav>
</div>
</div>
</div>
</div>


