<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:login.php");
}
//extract id from url 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
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
                                         Co-funders
                                        <i class="fa fa-building  right text-white"></i>
                                    </h4>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-bordered">
                                                <thead>
                                                        <th></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                
                $sql= " SELECT users.user_fullname,users.user_email FROM users JOIN funding ON funding.user_id = users.user_id WHERE funding.project_id='$id' ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $fullname = $row['user_fullname'];
                                $email = $row['user_email']
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $fullname;?></td>
                                    <td><?php echo $email;?></td>
                                </tr>
       <?php
                            }
                            $n++;
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