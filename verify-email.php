<?php
session_start();
include 'connection.php';
if(isset($_GET['token'])){
$token=$_GET['token'];
$verify_query="select verify_token,verify_status from login where verify_token='$token' limit 1";
$verify_query_run=mysqli_query($conn,$verify_query);
if(mysqli_num_rows($verify_query_run)){

    $row=mysqli_fetch_array($verify_query_run);
    if($row['verify_status']=="0"){
$clicked_token=$row['verify_token'];
$update_query="update login set verify_status='1' where verify_token='$clicked_token' limit 1";
$update_query_run=mysqli_query($conn,$update_query);
if($update_query_run){
    $_SESSION['status']="Your account has been verified successfully !";
    header("Location:login.php");
    exit(0);
}else{
    $_SESSION['status']="Verification Falied";
    header("Location:login.php");
    exit(0);
}

    }else{
        $_SESSION['status']="Email Already Verified Please Login";
        header("Location:login.php");
        exit(0);
       
    }
}else{
    $_SESSION['status']="This token does not exist";
    header("Location:login.php");
   
}

}else{
    $_SESSION['status']="Not Allowed";
    header("Location:login.php");
  
}
?>