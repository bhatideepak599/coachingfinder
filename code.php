<?php
session_start();
include 'conection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_email_verify($name,$email,$verify_token){
  $mail = new PHPMailer(true);
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;  //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'coachinghelperoffecial@gmail.com';                     //SMTP username
  $mail->Password   = 'ivmpnizaaueoijrt';                               //SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
  $mail->Port       = 465;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom("coachinghelperoffecial@gmail.com", $name);
  $mail->addAddress($email);     //Add a recipient

  //Attachments
  //Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Email verification form Coaching Helper';
  $email_template="
  <h2>You have Registered with Coaching Helper </h2>
  <h5> Verify email address to login with the below given link</h5>
  <br>
  <a href='http://localhost/experiment1/verify-email.php?token=$verify_token'>Click ME </a>
  ";
  $mail->Body=$email_template;
  $mail->send();
  // echo 'Message has been sent';
}


if(isset($_POST['register_button'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $verify_token=md5(rand());

    $chech_email_query=" select email from login where email='$email' limit 1 ";
    $chech_email_query_run=mysqli_query($conn,$chech_email_query);
    if(mysqli_num_rows($chech_email_query_run)>0){
        $_SESSION['status']="Email id already exist";
        header("Location:register.php");
        exit(0);
    }else{
      $query="INSERT INTO login(name,phone,email,password,verify_token) VALUES('$name','$phone','$email','$password','$verify_token')";
      $query_run=mysqli_query($conn,$query);

      if($query_run){
        send_email_verify("$name","$email","$verify_token");
        $_SESSION['status']="Registartion successfull please verify your email";
        header("Location:register.php");
       
      }else{
        $_SESSION['status']="Registartion Faild";
        header("Location:register.php");
       
      }
    }
}
?>