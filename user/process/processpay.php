<?php session_start();?>
<?php include "../include/dbconfig.php";?>
<?php

$id=$_SESSION['userlogged'];
$payment_ref=$_GET['pref'];
$project_id=$_GET['projid'];
$amount=$_GET['amount'];
//edxtracting interest rate from project
$sql= " SELECT  base_amount FROM project  WHERE project_id='$project_id' ";
if($result = mysqli_query($conn,$sql)){ 
        if (mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $rate = $row['interest_rate'];   
            }
        }
    }
$gains= $amount * ($rate/100);
$returns = $amount + $gains;

$insert = " INSERT INTO funding(user_id,project_id,amount,returns,payment_ref)VALUES ('$id','$project_id',$amount,'$returns',$payment_ref) ";
$result = mysqli_query($conn,$insert);
if($result){
$_SESSION['message'] = " Payment was successful ";
header("Location:../index.php");
}
?>