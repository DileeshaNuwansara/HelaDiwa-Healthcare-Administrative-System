<?php
session_start();
?>

<html>

<head>
    <title>Patient Dashboard</title>
</head>

<body>
    <?php
    include("../include/header.php");
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
                    <h5 class="my-3">Patient Dashboard</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4" style="font-size: 30px;">My Profile</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4" style="font-size: 30px;">My Appointments</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fa fa-user-circle fa-3x my-4" style="color:white;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="text-white my-4" style="font-size: 30px;">Invoices</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="">
                                                <i class="fas fa-file-invoice-dollar  fa-3x my-4" style="color:white;"></i>
                                            </a>
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
