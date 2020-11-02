<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "include/count.php"?>
<?php include "include/head.php"?>
<?php include "include/alerts.php"?>
    <div class="container-fluid">
        
        <!-- top nav -->
        <section>
            <div class="row bg-brand top-nav" >
                <div class="col-md-4">
                    <h4 class="left text-white">Admin</h4>
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
            <!-- kpis -->
            <div class="row">
                <!-- sidebar -->
                <?php include "include/side.php"?>
                <!-- mainboard -->
                <div class="col-md-10 bg-set">
                        <div class="row mt-5">
                            <div class="col-md-4  mb-3">
                                <div class="card card-body kpi-box kpi-box--orange">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="text-white">Co-Funders</h5>
                                            <h5 class="text-white"><?php countCofunders();?></h5>
                                        </div>
                                        <div class="col-2"><i class="fa fa-group fa-3x text-white"></i></div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card card-body kpi-box kpi-box--brown">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="text-white"> open for funding</h5>
                                            <h5 class="text-white"><?php countOpenForFunding();?></h5>
                                        </div>
                                        <div class="col-2"><i class="fa fa-door-open fa-3x text-white"></i></div>
                                    </div>
                                  </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <div class="card card-body kpi-box kpi-box--brown">
                                    <div class="row">
                                        <div class="col-8">
                                            <h5 class="text-white">Total Properties</h5>
                                            <h5 class="text-white"><?php countProject();?></h5>
                                        </div>
                                        <div class="col-2"><i class="fa fa-building fa-3x text-white"></i></div>
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="card ">
                                    <h4 class="card-header bg-brand text-white">
                                         open for funding
                                        <i class="fa fa-door-open  right text-white"></i>
                                    </h4>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                    <thead>
                                                        <th></th>
                                                        <th>Title</th>
                                                        <th>Capital</th>
                                                        <th>Rate</th>
                                                        <th>Minimum Amount</th>
                                                        <th>Duration</th>
                                                        <th></th>
                                                    </thead>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                
                $sql= " SELECT * FROM project WHERE project_status = 'open' LIMIT 5 ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $proj_id = $row['project_id'];
                                $title = $row['project_title'];
                                $capital = $row['project_capital'];
                                $rate = $row['interest_rate'];
                                $base = $row['base_amount'];
                                $start_date = $row['start_date'];
                                $end_date = $row['end_date'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $capital;?></td>
                                    <td><?php echo $rate;?></td>
                                    <td><?php echo $base;?></td>
                                    <td><?php echo $start_date." to ".$end_date;?></td>
                                    <td>
                                    <a class="btn btn-primary" href="viewproject.php?id=<?php echo $proj_id;?>">View</a>
                                         <!--close project -->
                                            <form action="../process/processproject.php" method="post" style="display: inline;">
                                                <input type="hidden"  name="projid" value="<?php echo $proj_id; ?>" />
                                                <input type="submit" name="closeproj" class="btn  btn-brand" value="Close" />
                                            </form>
                                    
                                    </td>              
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

            <!-- table -->
                
        </section>
        <script src="js/sidebar-menu.js"></script>
        <script>
          $.sidebarMenu($('.sidebar-menu'))
        </script>
    </div>
</body>
</html>