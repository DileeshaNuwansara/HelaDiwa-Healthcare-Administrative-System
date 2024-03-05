<html>
<head>
    <title>Edit Doctors</title>
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
                    <h5 class="text-center">Edit Doctor</h5>
                    <?php 
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $query = "SELECT * FROM doctors WHERE id='$id'";
                            $res = mysqli_query($connect, $query);
                            $row = mysqli_fetch_array($res);
                        }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor Details</h5>
                            <h5 class="my-3">ID: <?php echo $row['id']; ?></h5>
                            <h5 class="my-3">Doctor Name: <?php echo $row['name']; ?></h5>
                            <h5 class="my-3">Doctor Gender: <?php echo $row['gender']; ?></h5>
                            <h5 class="my-3">Doctor Email: <?php echo $row['email']; ?></h5>
                            <h5 class="my-3">Doctor Medical Register No: <?php echo $row['medi_regno']; ?></h5>
                            <h5 class="my-3">Doctor Specilization: <?php echo $row['docspec']; ?></h5>
                            <h5 class="my-3">Doctor Phone No: <?php echo $row['phone']; ?></h5>
                            <h5 class="my-3">Doctor Password: <?php echo $row['password']; ?></h5>
                            <h5 class="my-3">Doctor Register Date: <?php echo $row['date_reg']; ?></h5>
                            <h5 class="my-3">Doctor Salary: <?php echo $row['salary']; ?></h5>
                            <h5 class="my-3">Doctor Account Status: <?php echo $row['status']; ?></h5>
                            <h5 class="my-3">Doctor Profile: <?php echo $row['profile']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update Account Logging Details</h5>
                            <?php 
                                if(isset($_POST['update'])){
                                    $name = $_POST['uname'];
                                    $password = $_POST['password'];
                                    $email = $_POST['email'];
                                    $updateq = "UPDATE doctors SET name='$name', password='$password', email='$email' WHERE id='$id'";
                                    mysqli_query($connect, $updateq);
                                }
                            ?>
                            <form method="post">
                                <label> Enter Doctor New Name: </label>
                                <input type="text" name='uname' class='form-control' aria-autocomplete="off" placeholder="Update Name:" value="<?php echo $row['name'] ?> ">
                                <label> Enter Doctor New Password: </label>
                                <input type="Password" name='password' class='form-control' aria-autocomplete="off" placeholder="Update Password:" value="<?php echo $row['password'] ?> ">
                                <label> Enter Doctor New Email: </label>
                                <input type="text" name='email' class='form-control' aria-autocomplete="off" placeholder="Update Email:" value="<?php echo $row['email'] ?> ">
                                <input type="submit" name="update" class="btn btn-info my-3" value="Update Logging">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
