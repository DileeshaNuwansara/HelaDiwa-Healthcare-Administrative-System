<?php 
session_start();
?>

<html>
<head>
    <title>Doctor Profile</title>
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
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php 
                                    $doc = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE name='$doc'";
                                    $res = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($res);
                                    
                                    if(isset($_POST['upload'])){
                                        $image = $_FILES['img']['name'];
                                        if (empty($image)){
                                            echo "Error empty image";
                                        }else{
                                            $query = "UPDATE doctors SET profile='$image' WHERE name='$doc'";
                                            $res = mysqli_query($connect, $query);
                                            
                                            if($res){
                                                move_uploaded_file($_FILES['img']['tmp_name'], "images/$image");
                                            }
                                        }
                                    }
                                    ?>

                                    <form method="post" enctype="multipart/form-data">
                                        <?php 
                                        echo "<img src='images/".$row['profile']."' style='height: 250px;' class='col-md-12 my-3'>";
                                        ?>

                                        <input type='file' name='img' class='form-control'>
                                        <input type='submit' name="upload" class="btn btn-success" value="Update Profile">
                                    </form>

                                    <div class="my-3">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center">Details</th>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo $row['name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?php echo $row['email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone No</td>
                                                <td><?php echo $row['phone']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?php echo $row['gender']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Medical Register No</td>
                                                <td><?php echo $row['medi_regno']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Specialization</td>
                                                <td><?php echo $row['docspec']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Register Date</td>
                                                <td><?php echo $row['date_reg']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="text-center">Update Username</h5>

                                    <?php 
                                    if(isset($_POST['change_uname'])){
                                        $uname = $_POST['uname'];
                                        if(empty($uname)){
                                            echo "ERROR Changing Name";
                                        }else{
                                            $query = "UPDATE doctors SET name='$uname' WHERE name='$doc'";
                                            $res = mysqli_query($connect, $query);

                                            if($res){
                                                $_SESSION['doctor'] = $uname;
                                            }
                                        }
                                    }
                                    ?>

                                    <form method="post">
                                        <label for="update username">Update Username</label>
                                        <input type="text" name='uname' class="form-control" autocomplete="off" placeholder="Enter username here..">
                                        <br>
                                        <input type="submit" name="change_uname" class="btn btn-success" value="Change Username">
                                    </form>
                                    <br><br><br>

                                    <h5 class="text-center">Update Password</h5>

                                    <?php 
                                    if(isset($_POST['change_password'])){
                                        $opassword = $_POST['upassword'];
                                        $con_pass = $_POST['con_pass'];

                                        $oldpass = "SELECT * FROM doctors WHERE name='$doc'";
                                        $old = mysqli_query($connect, $oldpass);
                                        $row = mysqli_fetch_array($old);

                                        if($opassword != $row['password']){
                                            echo "Old password does not match.";
                                        }else if(empty($con_pass)){
                                            echo "ERROR Changing Password";
                                        }else if($con_pass != $opassword ){
                                            echo "Passwords do not match.";
                                        }else{
                                            $query = "UPDATE doctors SET password='$con_pass' WHERE name='$doc'";
                                            $res = mysqli_query($connect, $query);
                                        }
                                    }
                                    ?>

                                    <form method="post">
                                        <label for="update password">Update Password</label>
                                        <input type="password" name='upassword' class="form-control" autocomplete="off" placeholder="Enter Password here..">
                                        <br>

                                        <h5 class="text-center">Confirm Password</h5>

                                        <label for="confirm password">Confirm Password</label>
                                        <input type="password" name='con_pass' class="form-control" autocomplete="off" placeholder="Enter Confirm Password here..">
                                        <br>
                                        <input type="submit" name="change_password" class="btn btn-info" value="Change Password">
                                    </form>
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
