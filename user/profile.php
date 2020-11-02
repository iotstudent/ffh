
<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:../login.php");
}
?>
<?php include "include/head.php"?>
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
                        
                              <div class="col-md-8 offset-md-2 mt-4">
                                <div class="card card-body kpi-box kpi-box--brown">
                                        <form action="process/processprofile.php" method="post">
                                            <div class="form-group">
                                                <center>
                                                    <img src="img/avatar.svg" alt="avatar" class="img-nm">
                                                </center>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="fullname" class="form-control" placeholder="Full name"
                                                value="<?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname'];} ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="E-mail"
                                                value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="bank" class="form-control" placeholder="Bank"
                                                value="<?php if(isset($_SESSION['bank'])){ echo $_SESSION['bank'];} ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="account" class="form-control" placeholder="Account"
                                                value="<?php if(isset($_SESSION['account'])){ echo $_SESSION['account'];} ?>">
                                            </div>
                                            <input type="submit" value="Update" class="btn btn-brand" style="float:right;">
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