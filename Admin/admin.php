<?php 
session_start(); 
include("include/header.php");
include('include/connection.php');
mysqli_select_db($connect, "mcas");
?>
<html>
    <head>
        <title> Admin</title>
    </head>
    <body>
        <?php 
        ?>
        <div class="container-fluid">
            <div class="col-md-12"> 
                <div class="row">
                    <div class="col-md-2" style="margin-left: -30px;">
                        <?php
                        include("/Admin/sidenavbar.php");
                        include("/include/connection.php");
                        ?>
                    </div>

                    <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="text-center">All Admins</h5>

                                    <?php 
                                    $ad = $_SESSION['admin'];
                                    $sql = "SELECT * FROM admin WHERE username != '$ad'";
                                    $result = mysqli_query($connect, $sql);

                                    $output = "<table class='table table-responsive table-bordered'>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th style='width: 10%;'>Action</th>
                                    </tr>";

                                    if (mysqli_num_rows($result) < 1) {
                                        echo "<tr><td colspan='4' class='text-center'><h5 class='text-center'> No New Admin </h5></td></tr>";
                                    }

                                    while ($row = mysqli_fetch_array($result)) {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                        $email = $row['email'];

                                        $output .= "<tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>$email</td>
                                            <td> <a href='admin?id=$id'>
                                                <button id='$id' class='btn btn-danger'> Remove </button> 
                                            </a> </td>
                                        </tr>";
                                    }

                                    $output .= "</table>";

                                    echo $output;

                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];

                                        $sql3 = "DELETE FROM admin WHERE id='$id'";
                                        $result3 = mysqli_query($connect, $sql3);

                                        if ($result3 != 0) {
                                            echo "Successfully Deleted!";
                                        }
                                    }
                                    ?>
                                </div>

                                <div class="col-md-8">
                                    <?php 
                                    if (isset($_POST["add"])) {
                                        $uname = $_POST["uname"];
                                        $pass = $_POST["password"];
                                        $email = $_POST["email"];
                                        $image = $_FILES['img']['name'];

                                        $error = array();

                                        if (empty($uname)) {
                                            $error['u'] = "Enter Admin Username";
                                        } else if (empty($pass)) {
                                            $error['u'] = "Enter Admin Password";
                                        } else if (empty($email)) {
                                            $error['u'] = "Enter Admin Email";
                                        } else if (empty($image)) {
                                            $error['u'] = "Add Admin Picture";
                                        }

                                        if (count($error) == 0) {
                                            $sql2 = "INSERT INTO admin(username,password,email,profile) VALUES('$uname','$pass','$email','$image')";
                                            $result = mysqli_query($connect, $sql2);

                                            if ($result != 0) {
                                                move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                            } else {
                                                // Handle error
                                            }
                                        }
                                    }

                                    if (isset($error['u'])) {
                                        $er = $error['u'];
                                        $show = "<h5 class='text-center alert alert-danger'> $er </h5>";
                                    } else {
                                        $show = "";
                                    }
                                    ?>

                                    <h5 class="text-center">Add Admin</h5> 
                                    <form name="add_admin" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                        <div>
                                            <?php echo $show; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username :</label>
                                            <input type="text" name="uname" class="form-control" autocomplete="off" required="required" placeholder="Username here..">
                                        </div>
                                        <div class="form-group">
                                            <label>E-mail :</label>
                                            <input type="text" name="email" value="" class="form-control" required="required" placeholder="E-mail here..">
                                        </div>
                                        <div class="form-group">
                                            <label>Password :</label>
                                            <input type="password" name="password" class="form-control" autocomplete="off" required="required" placeholder="Password here..">
                                    </div>
                                    <div class="form-group">
                                        
                                        <input type="file" name="img" class="form-control">
                                    </div>
                                        <input type="submit" name="add" value="Add New Admin" class="btn btn-success">
                                    
                                    </form>
                            </div>

                                    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
      
