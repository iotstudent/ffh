<?php
session_start();
include "../includes/dbconfig.php";
include "../includes/formfunctions.php";
include "../includes/sendmail.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
 
    if(empty($_POST['fullname'])){
        $_SESSION['error'] = " Fullname is required ";
        header("Location:../signup.php");
        die();
    }else{
     $fullname = test_input($_POST['fullname']);
    }

    if(empty($_POST['email'])){
        $_SESSION['error'] = " Email is required ";
        header("Location:../signup.php");
        die();
    }else{
        $email = test_input($_POST['email']);
    }
 
    if(empty($_POST['password'])){
        $_SESSION['error'] = " Password is required ";
        header("Location:../signup.php");
        die();
     }
    if(empty($_POST['cpassword'])){
        $_SESSION['error'] = " Password needs to be confirmed ";
        header("Location:../signup.php");
        die();
    }
 
 if($_POST["cpassword"] == $_POST["password"]){
    $password = test_input($_POST['password']);
    } else {
    $_SESSION['error'] = " Password doesnt match ";
    header("Location:../signup.php");
    die();
    } 
    
}

input_length($fullname);
check_for_number_in_string($fullname);
validity_of_mail();


//check db if email already exist
$sql= " SELECT * FROM users WHERE user_email = '$email' " ;
if($result = mysqli_query($conn,$sql)){
if (mysqli_num_rows($result)>0){
    $_SESSION['error'] = " This Email has been used before ";
    header("Location:../signup.php");
    die();
  }       
}



//password hashing
$password = password_hash($password,PASSWORD_DEFAULT);

//generate token for user verifcation
$token = bin2hex(random_bytes(50));

//inserting user data to db
$sql = " INSERT INTO users (user_fullname,user_email,user_password,token) VALUES ('$fullname','$email','$password','$token') ";
$insert = mysqli_query($conn,$sql);
if($insert){
    $_SESSION['message'] = " Registration Successful";
    sendVerificationEmail($email,$token);
    header("Location:../verify.php");
}else{
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
    }