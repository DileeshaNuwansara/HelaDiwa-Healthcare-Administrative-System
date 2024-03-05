<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
</head>
<body>
    <?php 
    include("../include/header.php");
    include("../include/connection.php");

    $ad = $_SESSION['admin'];

    $sql4 = "SELECT * FROM admin WHERE username = '$ad'";
    $result4 = mysqli_query($connect, $sql4);

    while ($row4 = mysqli_fetch_array($result4)) {
        $username = $row4["username"];
        $profiles = $row4["profile"];
    }

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px;">
                    <?php 
                    include("Admin/sidenavbar.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4> Profile: <?php echo $username; ?></h4>

                                <?php 
                                if (isset($_SESSION['update'])) {
                                    $profiles = $_FILES['profile']['name'];
                                    if (empty($profiles)) {
                                    } else {
                                        $sql5 = "UPDATE admin SET profile='$profiles' WHERE username='$ad'";
                                        $result5 = mysqli_query($connect, $sql5);

                                        if ($result5) {
                                            move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                                        }
                                    }
                                }
                                ?>

                                <form method="post" action="">
                                    <?php 
                                    echo "<img src='images/$profiles' class='col-md-12' style ='height:200px;' >";
                                    ?>
                                    <br>
                                    <p>
                                        <div class="form-group">
                                            <label for="update">Update Profile </label>
                                            <input type="file" name="profile" class="form-control">
                                        </div>
                                        <br>
                                        <input type="submit" name="update" value="Update" class="btn btn-success">
                                    </p>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <?php 
                                if (isset($_POST['change'])) {
                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                    } else {
                                        $sql6 = "UPDATE admin SET username='$uname' WHERE username='$ad'";
                                        $result6 = mysqli_query($connect, $sql6);
                                        if ($result6) {
                                            $_SESSION['admin'] = $uname;
                                            echo "<script> alert('Username is changed successfully !') </script> ";
                                        }
                                    }
                                }
                                ?>
                                <form method="POST" name="change_user_details">
                                    <h5 class="text-center my-4"> Change Username </h5>
                                    <div class="form-group">
                                        <label> Username :</label>
                                        <input type="text" name="uname" class="form-control"><br>
                                        <input type="submit" name="change" class="btn btn-success" value="Change User Name">
                                    </div>
                                    <br>

                                    <?php 
                                    if (isset($_POST["update_pass"])) {
                                        $new_pass = $_POST["new_pass"];
                                        $con_pass = $_POST["con_pass"];

                                        $error = array();

                                        $oldpass = "SELECT * FROM admin WHERE  username = '$ad'";
                                        if (empty($new_pass)) {
                                            $error['p'] = "Enter New Password Correctly";
                                        } else if (empty($con_pass)) {
                                            $error['p'] = "Confirmed Password";
                                        } else if ($new_pass != $con_pass) {
                                            $error['p'] = " Password does not match!";
                                        }

                                        if (count($error) == 0) {
                                            $sqlUpdate_pass = "UPDATE admin SET password='$new_pass' WHERE username='$ad' ";
                                            mysqli_query($connect, $sqlUpdate_pass);
                                        }
                                    }

                                    if (isset($error['p'])) {
                                        $er = $error['p'];
                                        $show = "<h5 class='text-center alert alert-danger'> $er </h5>";
                                    } else {
                                        $show = "";
                                    }

                                    ?>
                                    <form method="post">
                                        <h5 class="text-center my-4"> Change Password </h5>
                                        <div>
                                            <?php 
                                            echo $show; 
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label> New Password :</label>
                                            <input type="password" name="new_pass" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="confirm">Confirm Password :</label>
                                            <input type="password" name="con_pass" class="form-control">
                                        </div>

                                        <div>
                                            <input type="submit" name="update_pass" value="Update Password" class="btn btn-info">
                                            <script>alert('Password is changed successfully !')</script>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
