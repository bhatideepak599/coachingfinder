<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        nav {
            background-color: #333;
            /* overflow: hidden; */
            transition: background-color 0.3s ease;
            height: 4vw;
        }

        nav img {
    height: 5.4vw;
    padding: 10px;
    /* float: right; */
    /* margin-left: 43%; */
    position: relative;
    float: right;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 1vw 16px;
            font-size: 1.5vw;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #555;
            color: black;
        }

        nav .dropdown {
            float: left;
            position: relative;
        }

        nav .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #555;
            width:56vw;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease;
            transform: translateY(-10px);
        }

        nav .dropdown:hover .dropdown-content {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        nav .dropdown-content a {
            color: white;
            padding: 17px 20px;
            display: block;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        @media screen and (max-width: 600px) {
            nav a, nav .dropdown {
                float: none;
                display: block;
                text-align: left;
            }

            nav .dropdown-content {
                position: static;
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<nav>
    <img src="images/coaching_logo.png" alt="Logo">
    <a href="navbar.php">Home</a>
    <div class="dropdown">
        <a href="#">Neet</a>
        <div class="dropdown-content">
            <span style="background-color:red;">
            <a href="#">Latest Exams Dates</a>
            <a href="#"> Cutoff 2024</a>
            <a href="#"> Cutoff 2023</a>
            <a href="#"> Cutoff 2022</a>
            </span>
          
            <a href="#"> Cutoff 2021</a>
            <a href="#"> Cutoff 2020</a>
            <a href="#">Download NEET syllabus</a>
            <a href="#">Indias top 10 medical colleges</a>
            <a href="#">medical colleges Fees</a>
            <a href="#">Tentative exams dates</a>
          <br>
          <div class="searchi">
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
    </div>
    <div class="dropdown">
        <a href="#">Jee</a>
        <div class="dropdown-content">
        <span style="background-color:red;">
            <a href="#">Latest Exams Dates</a>
            <a href="#"> Cutoff 2024</a>
            <a href="#"> Cutoff 2023</a>
            <a href="#"> Cutoff 2022</a>
            </span>
            <a href="#">List of IITS</a>
            <a href="#">List of NITS</a>
            <a href="#">List of IIIT</a>
            <a href="#">List of GFTI</a>
            <a href="#">Download Jee syllabus</a>
            <a href="#">Indias top 10 Private colleges</a>
            <a href="#">Indias top 10 IIT colleges</a>
            <a href="#">Private engineering colleges Fees</a>
            <a href="#">Tentative exams dates</a>
          <br>
            <div class="searchi">
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
    </div>
    <div class="dropdown">
        <a href="#">Clat</a>
        <div class="dropdown-content">
            <a href="#">CLAT syllabus download</a>
            <a href="#">Indias top clat online preparation platforms</a>
            <a href="#">Download syllabus</a>
            <a href="#">Latest news</a>
            <a href="#">Tentative Exam dates</a>

        </div>
    </div>
    <div class="dropdown">
        <a href="#">Banking</a>
        <div class="dropdown-content">
            <a href="#">Latest news related to banking</a>
            <a href="#">all details of banking exam</a>
            <a href="#">Download syllabus for clerk post</a>
            <a href="#">Easy steps to become CA</a>

        </div>
    </div>
    <div class="dropdown">
        <a href="#">Defence</a>
        <div class="dropdown-content">
            <a href="#">Upcoming exams details</a>
            <a href="#">Indias top defence academy</a>
            <a href="#">Cuttoff vs post</a>
            <a href="#">Best stratogy for NDA</a>
        </div>
    </div>
    <div class="dropdown">
        <a href="#">Primary</a>
        <div class="dropdown-content">
            <a href="#">Download NCRT books</a>
            <a href="#">E books</a>
            <a href="#">Indias most expensive primary school</a>
            <a href="#">List of government primary school in kolkata</a>
            <a href="#">top 100 primary government school</a>
        </div>
    </div>
</nav>

</body>
</html>
