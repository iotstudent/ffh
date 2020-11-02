<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:../login.php");
}
?>
<?php include "include/head.php"?>
<?php include "include/alerts.php"?>
    <div class="container-fluid">
        
        <!-- top nav -->
        <section>
            <div class="row bg-brand top-nav" >
                <div class="col-md-4">
                    <span class="left text-white"><?php echo $_SESSION['fullname']?></span>
                </div>
                <div class="col-md-4">
                    <h6 class="text-white text-center">money</h6>
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
                        
                            <div class="col-md-6 offset-md-3 mt-4">
                                <div class="card card-body kpi-box kpi-box--brown">
                                        <form action="process/processchange.php" method="post">
                                            <div class="form-group">
                                                <h3 class="text-white text-center">Change Password</h3>
                                            </div>
                                            <div class="form-group">
                                                <?php error_alert();?>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="cpassword" class="form-control" placeholder="Curent Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="npassword" class="form-control" placeholder="New Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="rnpassword" class="form-control" placeholder="Re-enter Password">
                                            </div>
                                            <input type="submit" value="Change" class="btn btn-brand" style="float:right;">
                                        </form> 
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