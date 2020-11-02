<?php session_start();
include "../includes/dbconfig.php";
include "../includes/formfunctions.php";
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//collect data from form on login.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(empty($_POST["email"])) {
      $_SESSION['error'] = "Email is required";
      header("Location:../login.php");
      die();
    } else {
      $email = $_POST["email"];
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
$sql= " SELECT * FROM users WHERE user_email = '$email' ";
    if($result = mysqli_query($conn,$sql)){
        if (mysqli_num_rows($result)<1){
            $_SESSION['error'] = " You have to signup first";
            header("Location:../login.php");
            die();
          }       
      }

//extract user data from DB
if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $db_password = $row["user_password"];
        $_SESSION['userlogged'] = $row["user_id"];
        $_SESSION['email'] = $row["user_email"];
        $_SESSION['fullname'] = $row["user_fullname"];
        $_SESSION['account'] =  $row['user_account'];
        $_SESSION['bank'] =  $row['user_bank'];
        
        
// check for password matching between passowrd from form and DB
    if(password_verify($password, $db_password)){
            header("Location:../user/index.php");
            die();
      }else{
          $_SESSION['error'] = " Wrong password or Wrong email";
          header("Location:../login.php");
          die();
      }
    
}