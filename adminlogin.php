<?php 
session_start();
include("include/connection.php");
mysqli_select_db($connect, "mcas");
extract($_POST);

if (isset($_POST['Login'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $error = array();

    if (empty($username)){
        $error['admin'] = "Enter Valid Username !";
    } else if(empty($email)){
        $error['admin'] = "Enter Valid Email !"; 
    } else if(empty($password)){
        $error['admin'] = "Enter Valid password !";
    }

    if (count($error) == 0){
        $sql1 = "SELECT * FROM admin WHERE username ='$username' AND password='$password' AND email='$email' ";   
        $result = mysqli_query($connect, $sql1);

        if (mysqli_num_rows($result) == 1){
            echo "<script> alert('You have Login as an Admin') </script>";
            $_SESSION['admin'] = $username;
            header("Location: Admin/index.php");
            exit();
        } else {
            die("Error: " . mysqli_error($connect));
            //echo "<script> alert('Invalid Username or Email or Password)</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Login Page</title>
    <link rel="stylesheet" type="text/css" href="adminloginstyle.css">
</head>

<body style="background-image: url(images/backgroundimg1.jpg);">
    <div class="header">
        <?php 
            include("include/header.php");
        ?>
    </div>

    <div class="main-container"> 
        <div class="box">
            <img src="images/admin.png" class="col-md-3">
            <form method="post">
                <h2>Admin Login</h2>
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
                    <input type="password" name="password" class="form-control" autocomplete="off" required="required" placeholder="Password here..">
                </div>

                <div class="checkbox">
                    <input type="checkbox" value="ok">  Remember me
                </div>

                <div class="links"> 
                    <a href="#">Forgot Password! </a>
                </div>

                <div>
                    <input type="submit" name="Login" value="Log In" class="btn btn-success">
                    <input type="reset" name="reset" value="Clear" class="btn btn-success">
                </div>

                <div class="register_links">
                    <label> Don't have an account? </label>
                    <p> <a href="Admin/admin.php"> Register Admin ! </a> </p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
