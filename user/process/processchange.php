<?php session_start();?>
<?php 
include "../include/dbconfig.php";
include "../include/formfunctions.php";
$id = $_SESSION['userlogged'];

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    if(empty($_POST['cpassword'])){
        $_SESSION['error']= " Pls type in the current password";
        header("Location:../change.php");
    }else{
        $cpassword = test_input($_POST['cpassword']);
    }

    if(empty($_POST['npassword'])){
        $_SESSION['error']= " Pls type in your new password";
        header("Location:../change.php");
    }else{
        $npassword = test_input($_POST['npassword']);
    }


    if($_POST["npassword"] == $_POST["rnpassword"]){
        $npassword = test_input($_POST['npassword']);
        } else {
        $_SESSION['error'] = " New Password doesnt match ";
        header("Location:../change.php");
        die();
        } 
}

$npassword = password_hash($npassword,PASSWORD_DEFAULT);

    $sql = " SELECT * FROM users WHERE user_id = '$id' ";
    $read= mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($read)==1){
        $row = mysqli_fetch_array($read, MYSQLI_ASSOC);
        $db_password = $row["user_password"];
        
        if(password_verify($cpassword, $db_password)){
            $sql = "UPDATE users SET user_password = '$npassword' WHERE user_id = '$id' ";
            $update = mysqli_query($conn,$sql);
            $_SESSION['message'] = " Password changed successfully ";
            header("Location:../logout.php");
            die();
      }else{
          $_SESSION['error'] = " Wrong password ";
          header("Location:../change.php");
          die();
      }
    
        
    }
