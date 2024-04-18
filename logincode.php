<?php
session_start();
include 'conection.php';
if(isset($_POST['login_now_btn'])){
   
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password']))){
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);

$login_query="select * from login where email='$email' and password='$password' limit 1";
$login_query_run=mysqli_query($conn,$login_query);
if(mysqli_num_rows($login_query_run)>0){
$row=mysqli_fetch_array($login_query_run);
// echo $row['verify_status'];
if($row['verify_status']=="1"){
   $_SESSION['authenticated']=TRUE;
   $_SESSION['auth_user']=[
    'username'=>$row['name'],
    'phone'=>$row['phone'],
    'email'=>$row['email'],

   ];
    $_SESSION['status']="You are logged in Successfully";
    header("Location:dashboard.php");
    exit(0);

   
}else{
    $_SESSION['status']="Please Verify Your Email address to login";
    header("Location:login.php");
    exit(0);
}
}
else{
    $_SESSION['status']="Invalid Email or Password";
    header("Location:login.php");
    exit(0);
}
        

    }else{
        $_SESSION['status']="All fields are mandetory";
        header("Location:login.php");
        exit(0);
    }
    
}
?>