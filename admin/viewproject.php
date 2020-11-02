<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "include/head.php";
      include "include/alerts.php";
      include "include/dbconfig.php";

//extract id from url 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>
 
    <div class="container-fluid">
        
        <!-- top nav -->
        <section>
            <div class="row bg-brand top-nav" >
                <div class="col-md-4">
                    <span class="left text-white">Admin</span>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white text-center"><?php success_alert();?></h6>
                </div>
                <div class="col-md-4">
                    <img src="img/avatar.svg" alt="avatar" class="img-sm span-right">
                </div>        
            </div>
        </section>


        <section>
            <div class="row">
                <!-- sidebar -->
                <?php include "include/side.php"?>
                <!-- mainboard -->
                <div class="col-md-10 bg-set">
                    
                    <div class="card card-body inner-form mt-3 mr-2 ml-2">
                    <!-- 
                        section containing desscription and statisitics
                     -->
                            <div class="row">
                                <div class="col-md-6">
                                    <?php

                                
                                        $sql= " SELECT project.project_id,project.project_description,project.project_title,project.project_status,project.project_capital,project.interest_rate,project.base_amount,project.start_date,project.image_one,project.end_date,SUM(funding.amount) AS value_sum FROM project JOIN funding ON funding.project_id = project.project_id WHERE funding.project_id='$id' ";
                                        if($result = mysqli_query($conn,$sql)){ 
                                                if (mysqli_num_rows($result)>0){
                                                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                                        $proj_id = $row['project_id'];
                                                        $desc=$row['project_description'];
                                                        $title = $row['project_title'];
                                                        $status = $row['project_status'];
                                                        $capital = $row['project_capital'];
                                                        $rate = $row['interest_rate'];
                                                        $base = $row['base_amount'];
                                                        $start_date = $row['start_date'];
                                                        $end_date = $row['end_date'];
                                                        $total_raised = $row['value_sum'];
                                                        $image=$row['image_one'];
                                                    }
                                                }else{
                                                    echo mysqli_error($conn);
                                                }



                            
                                ?>

                                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img class="d-block w-100" src="../<?php echo $image;?>" alt="First slide">
                                        </div>
                                        <!-- <div class="carousel-item">
                                        <img class="d-block w-100" src="img/home2.jpg" alt="Second slide">
                                        </div>
                                        <div class="carousel-item">
                                        <img class="d-block w-100" src="img/home3.jpg" alt="Third slide">
                                        </div> -->
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon bg-brand" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon  bg-brand" aria-hidden="true" ></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h2 style="text-transform:capitalize;font-weight:bolder;"><?php echo $title?></h2>
                                    <p><?php echo $desc;?></p>
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Capital to be raised <span style="font-weight:normal;"> <?php echo $capital?> </span></h6>
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Expected interest <span style="font-weight:normal;"> <?php echo $rate?> </span></h6>
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Minimum Amount <span style="font-weight:normal;"> <?php echo $base?> </span></h6>
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Project start <span style="font-weight:normal;"> <?php echo $start_date?> </span></h6>   
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Project end  <span style="font-weight:normal;"> <?php echo $end_date?> </span></h6>
                                    <h6 style="text-transform:capitalize;font-weight:bolder;">Amount Realized <span style="font-weight:normal;"> <?php echo  $total_raised ?> </span></h6>
                                    <!-- <button class="btn btn-info">Edit</button> -->

                                </div>
                            </div>
                            <!-- 
                                cofunders section
                             -->
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="card ">
                                    <h4 class="card-header bg-brand text-white">
                                        Co-funders
                                        <i class="fa fa-group  right text-white"></i>
                                    </h4>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Amount invested</th>
                                                        <th>Expected returns</th>
                                                        <th>Bank</th>
                                                        <th>Account</th>
                                                        
                                                    </thead>
                                                    <tbody>
                                                    <?php
                
                $sql= " SELECT users.user_fullname,users.user_email,users.user_account,users.user_bank,funding.amount,funding.returns FROM users JOIN funding ON funding.user_id = users.user_id WHERE funding.project_id='$id' ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $fullname = $row['user_fullname'];
                                $email = $row['user_email'];
                                $bank = $row['user_bank'];
                                $account = $row['user_account'];
                                $amount = $row['amount'];
                                $returns = $row['returns'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $fullname;?></td>
                                    <td><?php echo $email;?></td>
                                    <td><?php echo $amount;?></td>
                                    <td><?php echo $returns;?></td>
                                    <td><?php echo $bank;?></td>
                                    <td><?php echo $account;?></td>
                                    </tr>
                            <?php  
                            $n++;    
                        }
                        }   
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    } 

            
            ?>       

                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                
                </div>
            </div>
        </section>

        <script src="js/sidebar-menu.js"></script>
        <script>
          $.sidebarMenu($('.sidebar-menu'))
        </script>
    </div>
</body>
</html>