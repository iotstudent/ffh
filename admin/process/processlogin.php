<?php session_start();
include "../include/dbconfig.php";
include "../include/formfunctions.php";
//collect data from form on login.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST["username"])) {
      $_SESSION['error'] = "Username is required";
      header("Location:../login.php");
      die();
    } else {
      $username = $_POST["username"];
    }
    
    if(empty($_POST["password"])) {
      $_SESSION['error'] = "Password is required";
      header("Location:../login.php");
      die();
    } else {
      $password = $_POST["password"];
    }
    
  }
  

// check if user exist
$sql= " SELECT * FROM admin WHERE admin_name = '$username' ";
    if($result = mysqli_query($conn,$sql)){
        if (mysqli_num_rows($result)<1){
            $_SESSION['error'] = " Wrong details";
            header("Location:../login.php");
            die();
          }       
      }

//extract user data from DB
if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $db_password = $row["admin_password"];
        $_SESSION['adminlogged'] = $row["admin_id"];
        $_SESSION['adminname'] = $row["admin_name"];
               
// check for password matching between passowrd from form and DB
    if(password_verify($password, $db_password)){
            header("Location:../index.php");
            die();
      }else{
          $_SESSION['error'] = " Wrong details";
          header("Location:../login.php");
          die();
      }
    
}