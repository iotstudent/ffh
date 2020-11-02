<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:login.php");
}
$id=$_SESSION['userlogged'];
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<?php include "include/head.php"?>
<?php include "include/dbconfig.php"?>
    <div class="container-fluid">
        
        <!-- top nav -->
        <section>
            <div class="row bg-brand top-nav" >
                <div class="col-md-4">
                    <span class="left text-white"><?php echo $_SESSION['fullname']?></span>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white text-center"></h6>
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
                            <div class="col-md-12">
                                <div class="card ">
                                    <h4 class="card-header bg-brand text-white">
                                         Projects
                                        <i class="fa fa-building  right text-white"></i>
                                    </h4>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered">
                                                    <thead>
                                                        <th></th>
                                                        <th>Title</th>
                                                        <th>Capital</th>
                                                        <th>Rate</th>
                                                        <th>Amount invested</th>
                                                        <th>Returns</th>
                                                        <th>Status </th>
                                                        <th>Duration</th>
                                                        <th></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                
                $sql= " SELECT project.project_id,project.project_description,project.project_title,project.project_status,project.project_capital,project.interest_rate,project.base_amount,project.start_date,project.end_date,funding.amount,funding.returns FROM project JOIN funding ON funding.project_id = project.project_id WHERE funding.user_id='$id' ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $proj_id = $row['project_id'];
                                $title = $row['project_title'];
                                $status = $row['project_status'];
                                $capital = $row['project_capital'];
                                $rate = $row['interest_rate'];
                                $start_date = $row['start_date'];
                                $end_date = $row['end_date'];
                                $returns = $row['returns'];
                                $amount = $row['amount'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $title;?></td>
                                    <td><?php echo $capital;?></td>
                                    <td><?php echo $rate;?></td>
                                    <td><?php echo $amount;?></td>
                                    <td><?php echo $returns;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $start_date." to ".$end_date;?></td>
                                    <td>
                                    <a class="btn btn-brand" href="viewcofunders.php?id=<?php echo $proj_id;?>">Co-funders</a>
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