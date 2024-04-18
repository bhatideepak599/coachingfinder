<?php 
include 'conection.php';
include 'authentication.php';
$page_title="Dashboard";
include 'navbar.php';
 ?>
    <link rel="stylesheet" href="student_signupp.css">
    
</head>
<body>
<div class="py-5">
   <div class="container">
        <div class="row11">
           <div class="col-md-14">
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
            <div class="card">
                <div class="card-header">
                    <h4>User Dashboard</h4>

                </div>
                <div class="card-body">
                <hr>
                <h5><b>Username</b>:<?= $_SESSION['auth_user']['username'];?></h5>
                <h5><b>Email Id</b>:<?= $_SESSION['auth_user']['email'];?></h5>
                <h5><b>Phone No.</b>:<?= $_SESSION['auth_user']['phone'];?></h5>
                </div>
            </div>
           </div> 
        </div>
   </div>
</div>
            <?php
             $emaill=$_SESSION['auth_user']['email'];
             $check_all_detail="select all_detailed_filled from login where email='$emaill'";
             $check_all_detail_run=mysqli_query($conn,$check_all_detail);
             if(mysqli_num_rows($check_all_detail_run)>0){
                $row=mysqli_fetch_array($check_all_detail_run);
                if($row['all_detailed_filled']=="0"){
                    echo "<div style='width:80%;margin:auto;text-align:center;'>
                    <div class='alert alert-success mt-6'>
                    <h5 >Please Fill Out all Details</h5>
                     </div>
                     </div>
                     ";
                    include 'student_signup.php';
                }else{
                    $email=$_SESSION['auth_user']['email'];
                    $query="select * from login where email='$email'";
                    $query_run=mysqli_query($conn,$query);
                    if(mysqli_num_rows($query_run)>0){
                         $row=mysqli_fetch_array($query_run);
                         echo "<h4 style='text-align:center'>Your Complete Details with us </h4>";
                         echo "<div id='details'>";

                         echo "<h4> <b>gender</b>: $row[gender]</h4>";
                         echo "<h4> <b>course</b>: $row[course]</h4>";
                         echo "<h4> <b>district</b>: $row[district]</h4>";
                         echo "<h4> <b>state</b>: $row[state]</h4>"; 
                         echo "<h4> <b>year of target</b>: $row[yearOfTarget]</h4>";
                         echo "<h4> <b>Date of birth</b>: $row[dob]</h4>";
                         echo "<h4 style='text-align:center;margin-top:2vw;'> 10th Deatils</h4>";
                         echo "<div id='tenTh_detail'>";
                         echo "<h4> <b>Board Name</b>: $row[board10]</h4>";
                         echo "<h4> <b>Passing Year </b>: $row[passingYear10]</h4>";
                         echo "<h4> <b>Percentage </b>: $row[percentage10]</h4>";
                         echo "</div>";
                         echo "<h4 style='text-align:center;margin-top:2vw;'> 12th Deatils</h4>";
                         echo "<div id='twelthTh_detail'>";
                         echo "<h4> <b>Board Name</b>: $row[board12]</h4>";
                         echo "<h4> <b>Passing Year </b>: $row[passingYear12]</h4>";
                         echo "<h4> <b>Percentage</b>: $row[marksObtained12]</h4>";
                         echo "</div>";
                         
                         echo "</div>";
                    }else{
                        $_SESSION['status']="Eoor in fetching data";
                        exist(0);
                    }

                }
             }
            
            ?>
<?php
 include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


