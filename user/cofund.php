<?php session_start();
if(!isset($_SESSION['userlogged'])){
    header("Location:../login.php");
}
include "include/head.php"; 
include "include/alerts.php"; 
include "include/dbconfig.php";

if(isset($_GET['id'])) {
    $projid = $_GET['id'];
}
$sql= " SELECT  base_amount FROM project  WHERE project_id='$projid' ";
if($result = mysqli_query($conn,$sql)){ 
        if (mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $proj_id = $row['project_id'];
                $base = $row['base_amount'];
                
            }
        }
    }

?>

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
                            <div class="col-md-8 offset-md-2">
                                 <form id="paymentForm">
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control" placeholder="Email" readonly
                                        value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>">
                                    </div>
                                    <input type="hidden" id="projid" value="<?php echo $projid;?>">
                                    <div class="form-group">
                                        <label for="">Amount you want to invest <small><?php echo "A minimum of " .$base."Naira";?></small></label>
                                        <input type="number" id="amount" class="form-control" min="<?php echo 100;?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" onclick=" payWithPaystack() " class="btn btn-primary btn-block">
                                            Pay Now
                                        </button>
                                     </div>
                                     <div class="form-group">
                                        <img src="img/paystack.png">
                                     </div>
                                </form>
                                <script src="https://js.paystack.co/v1/inline.js"></script> 
                                 <script src="js/pay.js"></script> 
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