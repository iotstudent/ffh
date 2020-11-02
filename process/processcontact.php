<?php session_start();?>
<?php include "../includes/dbconfig.php";?>
<?php include "../includes/formfunctions.php";?>
<?php include "../includes/sendmail.php";?>
<?php

//check for errors in the email from form on forgot.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty($_POST["senderemail"])) {
        $_SESSION['error'] = " Email is required";
        header("Location:../contact.php");
        die();
      } else {
        $senderemail =  test_input($_POST["senderemail"]);
      }
      $senderphone =  test_input($_POST["senderphone"]);
      if(empty($_POST["sendermessage"])) {
        $_SESSION['error'] = " Message is required";
        header("Location:../contact.php");
        die();
      } else {
        $sendermessage =  test_input($_POST["sendermessage"]);
      }
      if(empty($_POST["subject"])) {
        $_SESSION['error'] = " Subject is required";
        header("Location:../contact.php");
        die();
      } else {
        $subject =  test_input($_POST["subject"]);
      }
    
  }

 //send mail

sendContactEmail($senderemail,$senderphone,$sendermessage,$subject);

