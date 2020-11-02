<?php session_start();?>
<?php include "../include/dbconfig.php"?>
<?php include "../include/formfunctions.php"?>
<?php
if (isset($_POST['create'])){
   
    if(empty($_POST["enddate"])) {
      $_SESSION['error']=" End date is required";
        header("Location:../createproject.php;");
    } else {
      $end =  test_input($_POST["enddate"]);
    }
    
    if(empty($_POST["startdate"])) {
      $_SESSION['error']=" Start date is required";
      header("Location:../createproject.php;");
    } else {
      $start= test_input($_POST["startdate"]);
    }
    
    if(empty($_POST["baseprice"])) {
        $_SESSION['error']=" Base price is required";
        header("Location:../createproject.php;");
      } else {
        $base = test_input($_POST["baseprice"]);
      }
      
    if(empty($_POST["interest"])) {
        $_SESSION['error']=" interest is required";
        header("Location:../createproject.php;");
      } else {
        $interest = test_input($_POST["interest"]);
      }
    
    if(empty($_POST["capital"])) {
        $_SESSION['error']=" capital is required";
        header("Location:../createproject.php;");
      } else {
        $capital = test_input($_POST["capital"]);
      }
    
    if(empty($_POST["name"])) {
        $_SESSION['error']=" Project Name is required";
        header("Location:../createproject.php;");
      } else {
        $name = test_input($_POST["name"]);
      }
      
    if(empty($_POST["address"])) {
        $_SESSION['error']=" Address is required";
        header("Location:../createproject.php;");
      } else {
        $address = test_input($_POST["address"]);
      }
    
    if(empty($_POST["desc"])) {
        $_SESSION['error']=" Description is required";
        header("Location:../createproject.php;");
      } else {
        $desc = test_input($_POST["desc"]);
      }

    
    if(empty($_FILES["attachment"])) {
        $_SESSION['error']=" Image is required";
        header("Location:../createproject.php;");
      } else {
        $info = pathinfo($_FILES['attachment']['name']);
        $ext = $info['extension'];
        $imgname = $name.".".$ext; 
        $target = 'admin/uploads/'.$imgname;
        move_uploaded_file( $_FILES['attachment']['tmp_name'], $target);
      }
     
  }

    $insert = " INSERT INTO project(project_title,project_description,project_location,project_capital,interest_rate,base_amount,start_date,end_date,image_one,project_status) VALUES ('$name','$desc','$address','$capital','$interest','$base','$start','$end','$target','open') ";
    $result = mysqli_query($conn,$insert);
    if($result){
    $_SESSION['message'] = " Project was created  successfully ";
    header("Location:../createsuc.php");
    }else{
        echo mysqli_error($conn);
    }
?>