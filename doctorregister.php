<?php 
include("include/connection.php");
mysqli_select_db($connect, "mcas");

if (isset($_POST['register_user'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $medi_regno = $_POST['medi_regno'];
    $docspec = $_POST['docspec'];
    $phone = $_POST['phone'];
    $password = $_POST['pass'];
    $conpass = $_POST['con_pass'];

    $error = array();
    if (empty($name)) {
        $error['r'] = 'Enter Name';
    } elseif (empty($gender)) {
        $error['r'] = 'Enter gender';
    } elseif (empty($email)) {
        $error['r'] = 'Enter Email';
    } elseif (empty($medi_regno)) {
        $error['r'] = 'Enter medical registration No';
    } elseif (empty($docspec)) {
        $error['r'] = "Enter doctor'S specialization ";
    } elseif (empty($phone)) {
        $error['r'] = "Enter Phone no";
    } elseif (empty($password)) {
        $error['r'] =  "Enter Password";
    } elseif ($conpass != $password) {   
        $error['r'] = "Both Password do not match";
    }

    if (count($error) == 0) {
        $sql = "INSERT INTO doctors(name,gender,email,medi_regno,docspec,phone,password,date_reg,salary,profile) VALUES('$name','$gender','$email',$medi_regno','$docspec','$phone','$password',NOW(),0.0,'doctor.jpg')";
        $result = mysqli_query($connect, $sql);

        if ($result) {
            echo "<script>alert('You have Successfully Registered')</script>";
            header("Location:doctorlogin.php");
            exit();
        } else {
            echo "<script>alert('Failed to Register!!')</script>";
        }
    }
}

if (isset($error['r'])) {
    $er = $error['r'];
    $show = "<h5 class='text-center alert alert-danger'> $er </h5>";
} else {
    $show = "";
}
?>

<html>
<head>
    <title>Doctor Register</title>
    <link rel="stylesheet" type="text/css" href="adminloginstyle.css">
</head>
<body>
    <?php include("include/header.php"); ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-1 my-2 jumbotron" style="background-color: lightgreen; margin: auto;padding: 20px;">
                    <form name="register_user" method="POST">
                        <h5 style="color: white; font-family: monospace; font-size:28px;"> Register Now !!! </h5>
                        <div>
                            <?php echo $show; ?>
                        </div>
                        <div class="form-group my-2">
                            <label>Name :</label>
                            <input type="text" name="name" value="" class="form-control" autocomplete="off" required="required" placeholder="Enter Name Here..">
                        </div>

                        <div class="form-group my-2">
                            <label for="gender">Gender :</label>
                            <input type="radio" class="form-check-input" name="gender" id="" value="Male" checked>Male
                            <input type="radio" class="form-check-input" name="gender" id="" value="Female" checked>Female
                        </div>

                        <div class="form-group my-2">
                            <label>E-mail :</label>
                            <input type="email" name="email" value="" class="form-control" required="required" placeholder="Enter E-mail here..">
                        </div>

                        <div class="form-group my-2">
                            <label for="medi_regno">Medical Registration No :</label>
                            <input type="text" name="medi_regno" value="" class="form-control" autocomplete="off" required="required" placeholder="Enter Medical Registration No Here..">
                        </div>

                        <div class="form-group my-2">
                            <label for="docspecialization">Select Specialization :</label>
                            <select name="docspec" class="form-control">
                                <option value="cardiologist">Cardiologist</option>
                                <option value="neurologist">Neurologist</option>
                            </select>
                        </div>

                        <div class="form-group my-2">
                            <label>Phone No:</label>
                            <input type="text" name="phone" value="" class="form-control" required="required" placeholder="Enter Phone no here..">
                        </div>

                        <div class="form-group my-2">
                            <label>Password :</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" required="required" placeholder="Enter Password here..">
                        </div>

                        <div class="form-group my-2">
                            <label>Confirm Password :</label>
                            <input type="password" name="con_pass" class="form-control" autocomplete="off" required="required" placeholder="Enter Again Password here..">
                        </div>
                        <br><br>
                        <div class="form-group col-md-10 my-2 mx-1">
                            <input type="submit" name="register" value="Register Now" class="btn btn-success">
                            <input type="reset" name="reset" value="Clear" class="btn btn-success">
                        </div>
                        <div class="form-group mx-1 my-2">
                            <p> I already have an account. 
                                <a href="doctorlogin.php"> Log In ! </a> 
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
