<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Total Doctors</title>
    </head>
    <body>
        <?php  
        include("../include/header.php");
        include ("../include/connection.php");
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
                        <h5 class="text-center">Total Doctors </h5>
                        <?php 
                            $query = "SELECT * FROM doctors WHERE status='Approved' ORDER BY date_reg ASC";
                            $res = mysqli_query($connect, $query);
                            $output = "";

                            $output .= "
                                <table class='table-bordered'>
                                    <tr>
                                        <td>ID</td>
                                        <td>Name</td>
                                        <td>Gender</td>
                                        <td>Email</td>
                                        <td>Medi_RegNo</td>
                                        <td>Specialization</td>
                                        <td>Phone No</td>
                                        <td>Date Registered</td>
                                        <td>Action</td>
                                    </tr>
                            ";

                            if (mysqli_num_rows($res) < 1) {
                                $output .= "
                                    <tr>
                                        <td colspan='8' class='text-center'> No job Request Yet.</td>
                                    </tr>
                                ";
                            }

                            while ($row = mysqli_fetch_array($res)) {
                                $output .= "
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['name']."</td>
                                        <td>".$row['gender']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['medi_regno']."</td>
                                        <td>".$row['docspec']."</td>
                                        <td>".$row['phone']."</td>
                                        <td>".$row['date_reg']."</td>
                                        <td>
                                            <a href='edit.php?id=".$row['id']."'>
                                                <button class ='btn btn-info'>Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                ";
                            }
                            $output .= "</table>";
                            echo $output;
                        ?>
                    </div>
                </div>
            </div>  
        </div>
    </body>
</html>
