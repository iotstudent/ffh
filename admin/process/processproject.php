<?php session_start();
include"../includes/dbconfig.php";
include"../includes/formfunctions.php";
?>
<?php


    //delete project from message page
    if(isset($_POST['deleteproj'])){
        if(isset($_POST['projid']) && !empty($_POST['projid'])){
            $projid = $_POST['projid'];
            $sql= "DELETE FROM project WHERE project_id = '$projid'";
            $delete = mysqli_query($conn,$sql);
            if($delete){
                $_SESSION['message']="Message successfully deleted ";
                header('Location:../projectsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }


    //Close project 
    if(isset($_POST['closeproj'])){
        if(isset($_POST['projid']) && !empty($_POST['projid'])){
            $projid = $_POST['projid'];
            $sql= " UPDATE project SET project_status='close'WHERE project_id = '$projid'";
            $update = mysqli_query($conn,$sql);
            if($update){
                $_SESSION['message']=" Project successfully closed ";
                header('Location:../projectsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }

    //Open project 
    if(isset($_POST['openproj'])){
        if(isset($_POST['projid']) && !empty($_POST['projid'])){
            $projid = $_POST['projid'];
            $sql= " UPDATE project SET project_status='open'WHERE project_id = '$projid'";
            $update = mysqli_query($conn,$sql);
            if($update){
                $_SESSION['message']=" Project successfully opened ";
                header('Location:../projectsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }

             
             
       
    ?>