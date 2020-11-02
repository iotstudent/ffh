<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "include/head.php"?>
<?php include "include/alerts.php"?>
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
            <!-- kpis -->
            <div class="row">
                <!-- sidebar -->
                <?php include "include/side.php"?>
                <!-- mainboard -->
                <div class="col-md-10 bg-set">
                       <div class="row">
                            <div class="col-md-8 offset-md-2">
                            <div class="card card-body inner-form mt-3">
                    
                    <form action="process/processcreate.php" method="post" enctype="multipart/form-data" style="padding:5px">
                       <div class="form-group">
                        <?php error_alert();?>
                       </div>
                        <div class="form-group">
                            <input type="file" name="attachment" class="form-control" placeholder="image">
                         </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Project Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="desc" id="" cols="30" rows="5" class="form-control">
                                    project description
                            </textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" id="" class="form-control" placeholder="Location">
                        </div>

                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label for="">interest rate </label>
                                <input type="text" name="interest" id="" min="1" class="form-control" placeholder="expected interest">
                            </div>
                            <div class="col">
                                <input type="text" name="capital" id="" min="1" class="form-control" placeholder=" Amount to be raised">
                            </div>
                            <div class="col">
                                <input type="text" name="baseprice" id="" min="1" class="form-control" placeholder="Minimum Amount allowed for co funding">
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="row">
                            <div class="col">
                                <label for="">Start date</label>
                                <input type="date" name="startdate" id="" min="1" class="form-control" placeholder="Project funding start">
                            </div>
                            <div class="col">
                            <label for="">End date</label>
                                <input type="date" name="enddate" id="" min="1" class="form-control" placeholder="Project funding ends">
                            </div>
                        </div>
                            <br>
                            <input type="submit" name="create" value="Create" class="btn btn-brand" style="float:right">
                    </form>
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