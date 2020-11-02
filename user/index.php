<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:../login.php");
}
?>
<?php include "include/head.php"?>
<?php include "include/alerts.php"?>
<?php include "include/dbconfig.php"?>
    <div class="container-fluid">
        
        <!-- top nav -->
        <section>
            <div class="row bg-brand top-nav" >
                <div class="col-md-4">
                    <span class="left text-white"><?php echo $_SESSION['fullname']?></span>
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
                        <div class="row mt-5">
                            <div class="col-md-4 offset-md-1 mb-3">
                                <div class="card card-body kpi-box kpi-box--orange">
                                    <div class="row">
                                        <div class="col-8">
                                            <h4 class="text-white">Co-Funders</h4>
                                            <h5 class="text-white">5</h5>
                                        </div>
                                        <div class="col-2"><i class="fa fa-group fa-3x text-white"></i></div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-md-4 offset-md-1 mb-3">
                                <div class="card card-body kpi-box kpi-box--brown">
                                    <div class="row">
                                        <div class="col-8">
                                            <h3 class="text-white">Projects</h3>
                                            <h5 class="text-white">10</h5>
                                        </div>
                                        <div class="col-2"><i class="fa fa-building fa-3x text-white"></i></div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-10 offset-md-1">
                            <?php
                        
                                $sql= " SELECT * FROM project WHERE project_status ='open'";
                                if($result = mysqli_query($conn,$sql)){ 
                                        if (mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        $proj_id = $row['project_id'];
                                        $title = $row['project_title'];
                                        $desc = $row['project_description'];
                                        $capital = $row['project_capital'];
                                        $rate = $row['interest_rate'];
                                        $base = $row['base_amount'];
                                        $start_date = $row['start_date'];
                                        $end_date = $row['end_date'];
                                        $image=$row['image_one'];
                            
                                ?>
                                <div class="card">
                                    <div class="card-header bg-brand text-white" style="text-transform:uppercase;"><?php echo $title;?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="../<?php echo $image;?>" alt="" style="max-width:100%;">
                                            </div>
                                            <div class="col-md-4">
                                                <p><?php echo $desc;?></p>
                                                <p><?php echo " Project cost: ".$capital;?></p>
                                                <p><?php echo " Minimum Amount to invest: ".$base;?></p>
                                                <p><?php echo " Interest rate: ".$rate;?></p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><?php echo " Start Date: ".$start_date;?></p>
                                                <p><?php echo " Closing Date: ".$end_date;?></p>
                                                    <!-- form for cofund -->        
                                            <a class="btn btn-brand" href="cofund.php?id=<?php echo $proj_id;?>">Cofund</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php  
                        }
                        }   
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    } 

            
            ?> 
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