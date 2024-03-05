<?php 
session_start();
include("include/connection.php");

if(isset($_POST['Login'])){
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $error = array();

    $sql = "SELECT * FROM doctors WHERE username='$uname' AND email='$email' AND password='$password'";
    $result = mysqli_query($connect, $sql);

    $row = mysqli_fetch_array($result);

    if (empty($uname) || empty($email) || empty($password)){
        $error['login'] = "Values can not be Empty!";
    } elseif($row['status'] == "Pending") {
        $error['login'] = 'Please wait for admin to accept the validation';
    } elseif($row['status'] == "Rejected") {
        $error['login'] = 'Try again Later';
    }

    if(count($error) == 0){
        $query = "SELECT * FROM doctors WHERE username='$uname' AND email='$email' AND password='$password'";
        $res = mysqli_query($connect, $query);
        $res2 = mysqli_num_rows($res);

        if($res2 > 0){
            echo "<script>alert('done')</script>";
            $_SESSION['doctor'] = $uname;
            header("Location: doctor/index.php");
        } else {
            echo "<script>alert('Failed to Create Account')</script>";
        }
    }
}

if(isset($error['login'])){
    $errname = $error['login'];
    $show = "<h5 class ='text-center alert alert-danger'>$errname</h5>";
} else {
    $show = "";
}
?>

<html>
<head>
    <title>Doctor Login Page</title>
    <link rel="stylesheet" type="text/css" href="adminloginstyle.css">
</head>
<body style="background-image: url(images/doctor.jpg); background-size: cover; background-repeat: no-repeat; ">
    <?php include("include/header.php"); ?>

    <div class="main-container"> 
        <div class="box">
            <img src="images/doctorlogin.jpeg" class="col-md-3">
            <form method="POST" name="Doctorlogin" class="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2>Doctor Login</h2>
                <div>
                    <?php echo $show; ?>
                </div>
                <div class="form-group">
                    <label>Username :</label>
                    <input type="text" name="uname" value="" class="form-control" autocomplete="off" required="required" placeholder="Username here..">
                </div>
                <div class="form-group">
                    <label>E-mail :</label>
                    <input type="email" name="email" value="" class="form-control" required="required" placeholder="E-mail here..">
                </div>
                <div class="form-group">
                    <label>Password :</label>
                    <input type="password" name="pass" class="form-control" autocomplete="off" required="required" placeholder="Password here..">
                </div>

                <div class="checkbox">
                    <input type="checkbox" value="ok">  Remember me
                </div>

                <div class="links"> 
                    <a href="/doctor/profile.php">Forgot Password! </a>
                </div>

                <div>
                    <input type="submit" name="Login" value="Log In" class="btn btn-success">
                    <input type="reset" name="reset" value="Clear" class="btn btn-success">
                </div>

                <div class="register_links">
                    <label> Don't have an account? 
                        <a href="doctorregister.php"> Register Now!!! </a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
