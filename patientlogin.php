<?php 
session_start();
include("include/connection.php");

if(isset($_POST['login'])){
    $name = $_POST['uname'];
    $password = $_POST['pass'];

    if(empty($name)){
        echo "<script>alert('Enter Name')</script>";
    } else if(empty($password)){
        echo "<script>alert('Enter Password')</script>";
    } else {
        $query = "SELECT * FROM patients WHERE username='$name' AND password='$password'";
        $res = mysqli_query($connect, $query);

        if(mysqli_num_rows($res) == 1){
            header("Location: patient/index.php");
            $_SESSION['patient'] = $name;
        } else {
            echo "<script>alert('Invalid')</script>";
        }
    }
}
?>
<html>
    <head>
        <title>Patient Login Page</title>
        <link rel="stylesheet" type="text/css" href="adminloginstyle.css">
    </head>

    <body style="background-image: url(images/patientlogin.jpeg); background-repeat:no-repeat; background-size:cover;">
        <?php 
            include("include/header.php");
        ?>
        <div class="container-flu">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 my-5 jumbotron">
                        <h5 class="text-center my-3">Patient Login</h5>
                        <form method="post">
                            <div class="form-group">
                                <label>Username :</label>
                                <input type="text" name="uname" value="" class="form-control" autocomplete="off" required="required" placeholder="Username here..">
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" name="pass" class="form-control" autocomplete="off" required="required" placeholder="Password here..">
                            </div>
                            <input type="submit" name="login" class="btn btn-info my-3" value="Login">
                            <input type="reset" name="reset" value="Clear" class="btn btn-success">
                            <label> Don't have an account? 
                                <a href="patientaccount.php"> Register Now!!! </a> 
                            </label>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </body>
</html>
