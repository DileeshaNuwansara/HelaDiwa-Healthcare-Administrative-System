<?php
include("include/connection.php");
include("../include/connection.php");
mysqli_select_db($connect, "mcas");

if (isset($_POST['create'])) {

    $name = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $con_pass = $_POST['con_password'];

    $error = array();
    if (empty($name)) {
        $error['ac'] = "Enter Name";
    } elseif (empty($email)) {
        $error['ac'] = "Enter Email";
    } elseif (empty($phone)) {
        $error['ac'] = "Enter Phone NO";
    } elseif (empty($gender)) {
        $error['ac'] = "Enter Gender";
    } elseif (empty($password)) {
        $error['ac'] = "Enter Passcode";
    } elseif (empty($con_pass)) {
        $error['ac'] = "Enter Confirmation Passcode";
    } elseif ($con_pass != $password) {
        $error['ac'] = "Passcode Not Matching..";
    }

    if (count($error) == 0) {
        $query = "INSERT INTO patients(username, email, phone, gender, password, date_reg) VALUES ('$name','$email','$phone','$gender','$password',NOW())";

        $res = mysqli_query($connect, $query);
        if ($res) {
            header("Location:patientlogin.php");
        } else {
            echo "<script>alert('failed')</script>";
        }
    }
}
?>
<html>

<head>
    <title>Create Account</title>
</head>

<body style="background-image:url(images/patient.jpg); background-repeat: no-repeat; background-size:cover;">

    <?php
    include("include/header.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 my-2 jumbotron">
                    <h6 class="text-center text-info my-2" style="background-color: green; "><b>Create Patient Account</b></h5>

                        <form method="post">

                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" name="uname" value="" class="form-control" required="required" placeholder="Name here..">
                            </div>

                            <div class="form-group">
                                <label>E-mail :</label>
                                <input type="email" name="email" value="" class="form-control" placeholder=" Email here..">
                            </div>

                            <div class="form-group">
                                <label>Gender :</label>
                                <input type="text" name="gender" value="" class="form-control" placeholder="Gender here..">
                            </div>
                            <div class="form-group">
                                <label>phone No:</label>
                                <input type="text" name="phone" value="" class="form-control" required="required" placeholder="Phone No here..">
                            </div>

                            <div class="form-group">
                                <label>Passcode :</label>
                                <input type="password" name="password" value="" class="form-control" required="required" placeholder="Passcode here..">
                            </div>

                            <div class="form-group">
                                <label>Confirm Passcode :</label>
                                <input type="password" name="con_password" value="" class="form-control" required="required" placeholder="Again type here..">
                            </div><br><br>

                            <input type="submit" name="create" value="Create Account" class="btn btn-info">
                            <p>I already have an account. <a href="patientlogin.php">Patient Account Login </a></P>

                        </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>
