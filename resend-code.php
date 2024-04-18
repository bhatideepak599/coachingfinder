<?php
session_start();
include 'conection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function  resend_email_verify($name,$email,$verify_token){
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
  $mail->Subject = 'Resend-Email verification form Coaching Helper';
  $email_template="
  <h2>You have Registered with Coaching Helper </h2>
  <h5> Verify email address to login with the below given link</h5>
  <br>
  <a href='http://localhost/experiment1/login/verify-email.php?token=$verify_token'>Click ME </a>
  ";
  $mail->Body=$email_template;
  $mail->send();
  // echo 'Message has been sent';
}


if(isset($_POST['resend_email_verify_btn'])){
    if(!empty(trim($_POST['email']))){
      $email=mysqli_real_escape_string($conn,$_POST['email']);
      $checkmail_query="select * from login where email='$email' limit 1";
      $checkmail_query_run=mysqli_query($conn,$checkmail_query);
      if(mysqli_num_rows($checkmail_query_run)>0){
        $row=mysqli_fetch_array($checkmail_query_run);
        if($row['verify_status']=="0"){
           $name=$row['name'];
           $email=$row['email'];
           $verify_token=$row['verify_token'];

            resend_email_verify($name,$email,$verify_token);
            $_SESSION['status']="Verification Link has been sent to you Email";
            header("Location:login.php");
            exit(0);
        }else{
            $_SESSION['status']="Email Already Verified , Please Login ";
            header("Location:login.php");
            exit(0);
        }

      }else{
        $_SESSION['status']="Email is not Registed , Please Register Now ";
        header("Location:register.php");
        exit(0);
      }
    }else{
        $_SESSION['status']="Please Enter the email field ";
        header("Location:resend-email-verification.php");
        exit(0);
    }
}
?>