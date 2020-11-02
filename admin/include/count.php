<?php include "include/dbconfig.php";?>
<?php
                
     function countCofunders(){
        global $conn;
        global $id;
        $sql= (" SELECT COUNT(user_id) AS nofunders FROM funding ");
        if($result = mysqli_query($conn,$sql)){ 
                if (mysqli_num_rows($result)>0){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $number_funders = $row['nofunders'];
                        echo $number_funders;   
                }
            }else { 
                echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
            }
    
        }


               
        function countOpenForFunding(){
            global $conn;
            global $id;
            $sql= (" SELECT COUNT(project_id) AS noopen FROM project WHERE project_status = 'open' ");
            if($result = mysqli_query($conn,$sql)){ 
                    if (mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $number_open = $row['noopen'];
                            echo $number_open;   
                    }
                }else { 
                    echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                }
        
            }

            function countProject(){
                global $conn;
                global $id;
                $sql= (" SELECT COUNT(project_id) AS noproject FROM project  ");
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $number_project = $row['noproject'];
                                echo $number_project;   
                        }
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    }
            
                }
