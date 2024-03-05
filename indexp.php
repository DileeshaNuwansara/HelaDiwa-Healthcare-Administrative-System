<!DOCTYPE html>
<html>

<head>
    <title>Medical Center Administrative System Home Page</title>
</head>

<body>
    <?php
    include("include/header.php");
    ?>
    <div style="margin-top: 50px"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">

                <div class="col-md-3 mx-1 shadow" style="width:40%;">
                    <img src="images/getinformation.png" style="width: 100%; height: 80%;">
                    <h5 class="text-center">Click on for more information</h5>

                    <a href="#">
                        <button class="btn btn-success my-3" style="margin-left: 40%;">Click More !</button>
                    </a>
                </div>

                <div class="col-md-3 mx-1 shadow" style="width:40%;">
                    <img src="images/patient.jpg" style="width:100%; height:80%; ">
                    <h5 class="text-center"> Create Account so that we can take care of you </h5>

                    <a href="patientaccount.php">
                        <button class="btn btn-success my-3" style="margin-left: 40%;">Create Account !</button>
                    </a>
                </div>

                <div class="col-md-3 mx-1 shadow" style="width:40%;">
                    <img src="images/doctor.jpg" style="width:100%; height:250px ;">
                    <h5 class="text-center">We are employing for doctors</h5>

                    <a href="doctorregister.php">
                        <button class="btn btn-success my-3" style="margin-left: 40%;">Apply Now !</button>
                    </a>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
