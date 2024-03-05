<?php 
session_start();
?>

<html>
    <head>
        <title>Doctor Dashboard</title>
    </head>
    <body>
        <?php 
        include("../include/header.php");
        include("sidenavbar.php");
        ?>
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php 
                            include("sidenavebar.php");
                        ?>
                    </div>
                    <div class="col-md-10">
                        <div class="container-fluid">
                            <h4>Doctor Dashboard</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 my-2 bg-info" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="col-md-4">My Profile</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style="font-size: 30px;">0</h5>
                                                    <h5 class="col-md-4">Total</h5>
                                                    <h5 class="col-md-4">Patient</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href=""><i class="fa fa-procedures fa-3x my-4" style="color:white;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3 my-2 bg-success mx-2" style="height: 150px;">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-2" style=" font-size: 30px;">0</h5>
                                                    <h5 class="col-md-4">Total</h5>
                                                    <h5 class="col-md-4">Appointments</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href=""><i class="fa fa-calendar fa-3x my-4" style="color:white;"></i></a>
                                                </div>
                                            </div>
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
