<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php 
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">

                <?php 
                    include("sidenavbar.php");

                ?>


                </div>
                <div class="col-md-10">

                <h4 class="my-2 text-center">Admin's Dashboard</h4>

                <div class="col-md-12 my-1">
                <div class="row">

                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-8">

                                    <?php  
                                        $sql = "select * from admin";
                                        $ad =mysqli_query($connect,$sql);

                                        $num = mysqli_num_rows($ad);
                                    ?>
                                    <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $num; ?> </h5>
                                    <h5 class ="text-white" >Total</h5>
                                    <h5 class ="text-white" >Admins</h5>
                                </div>
                                <div class="col-md-4">
                                    <a href="admin.php"> <i class="fa users-cog fa-3x my-4" style="color: white;">  </i> </a>

                                </div>
                            </div>  
                        </div>
                    </div>  
                        

                    <div class="col-md-3 bg-info mx-3 my-3" style="height: 130px;">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                            <?php 
                                $doctor = mysqli_query($connect,"SELECT * FROM doctors WHERE status ='Approved'");
                                $num2 = mysqli_num_rows($doctor);
                                ?>

                                <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $num2 ?> </h5>
                                <h5 class ="text-white" >Total</h5>
                                <h5 class ="text-white" >Doctors</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="doctor.php"> <i class="fa users-md fa-3x my-4" style="color: white;"> </i> </a>

                            </div>
                        </div>  
                        </div>
                    </div>
                         


                    <div class="col-md-3 bg-warning mx-3 my-3" style="height: 130px;">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">

                                <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                <h5 class ="text-white" >Total</h5>
                                <h5 class ="text-white" >Patients</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="#"> <i class="fa fa-producers fa-3x my-4" style="color: white;">  </i> </a>

                            </div>
                        </div>  
                        </div>
                    </div>  

                       
                    <div class="col-md-3 bg-warning mx-3 my-3" style="height: 130px;">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">

                                <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                <h5 class ="text-white" >Total</h5>
                                <h5 class ="text-white" >Reports</h5>
                            </div>
                            <div class="col-md-4">
                                <a href="#"> <i class="fa fa-flag fa-3x my-4" style="color: white;">  </i> </a>

                            </div>
                        </div>  
                        </div>
                    </div>
                     
                


                    <div class="col-md-3 bg-warning mx-3 my-3" style="height: 130px;">
                        <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <?php 
                                $sql = "SELECT * from doctors WHERE status='Pending'";

                                $job = mysqli_query($connect,$sql);
                                $num1 = mysqli_num_rows($job);

                                ?>


                                        <h5 class="my-2 text-white" style="font-size:30px;"> <?php echo $num1 ?> </h5>
                                        <h5 class ="text-white" >Total</h5>
                                        <h5 class ="text-white" >Job Request</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="job_request.php"> <i class="fa book-open fa-3x my-4" style="color: white;"> </i> </a> 
                                        


                                    </div>
                                </div>  
                            </div>
                    </div> 
                
                        

                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">

                                        <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                        <h5 class ="text-white" >Total</h5>
                                        <h5 class ="text-white" >Income</h5>
                                    </div>
                                    <div class="col-md-4">
                                       <a href="#"> <i class="fa fa-money-check-alt fa-3x my-4" style="color: white;">  </i> </a>

                                    </div>
                                </div>  
                        
                            </div> 
                    </div>


                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">

                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class ="text-white" >Total</h5>
                                            <h5 class ="text-white" >Room</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"> <i class="fa fa-money-check-alt fa-3x my-4" style="color: white;">  </i> </a>

                                        </div>  
                                    </div>
                            </div> 
                    </div>
                        

                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">


                                        <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                        <h5 class ="text-white" >Total</h5>
                                        <h5 class ="text-white" >Ambulance</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"> <i class="fa fa-money-check-alt fa-3x my-4" style="color: white;">  </i> </a>

                                    </div>
                                </div>  
                            </div>
                    </div> 

                        
                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">


                                        <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                        <h5 class ="text-white" >Total</h5>
                                        <h5 class ="text-white" >pharmacist </h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"> <i class="fa fa-money-check-alt fa-3x my-4" style="color: white;">  </i> </a>

                                    </div>
                                </div>  
                            </div>
                    </div> 
                        

                    <div class="col-md-3 bg-success mx-3 my-3" style="height: 130px;">
                            <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">


                                            <h5 class="my-2 text-white" style="font-size:30px;"> 0 </h5>
                                            <h5 class ="text-white" >Total</h5>
                                            <h5 class ="text-white" >Labotary_Service</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"> <i class="fa fa-money-check-alt fa-3x my-4" style="color: white;">  </i> </a>

                                        </div>
                                    </div>  
                            </div>
                    </div> 

                        
                
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>