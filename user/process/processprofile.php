<?php session_start();?>
<?php include "../include/dbconfig.php";?>
<?php include "../include/formfunctions.php";?>
<?php

$id = $_SESSION['userlogged'];
//collect data from form on profile.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
      $fullname = test_input($_POST["fullname"]);
      $email = test_input($_POST["email"]);
      $bank = test_input($_POST["bank"]);
      $account = test_input($_POST["account"]);
      
  
  }
  
  
  
  
  $sql = " UPDATE users SET user_fullname = '$fullname',user_email = '$email',user_bank='$bank',user_account='$account' WHERE user_id = '$id' ";
      if($result = mysqli_query($conn,$sql)){
        // reset data  session        
         
            $_SESSION['fullname'] = $fullname;
            $_SESSION['email'] = $email;
            $_SESSION['bank'] = $bank;
            $_SESSION['account'] = $account;
            $_SESSION['message'] = " Profile successfully updated";
            header("Location:../index.php");
            die();

        }else{
                
            echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
        
        }


       