<!-- DESIGN Navigation BAR and HOme page -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    
        <title>Medical Center Header</title>

        <link rel ="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

        <script src ="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

        <script type="text/javascript" src ="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

        <link rel ="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

       
       

       

    </head>
<body>

<nav class="navbar navbar-expand-md navbar-info bg-info">
    <h2 class = "text-white" >Heladiva Medical Center Administrative System </h2>
    <div class = "mr-auto">

    <ul class ="navbar-nav">
        <?php 

        if(isset($_SESSION['admin'])) {
            $user = $_SESSION['admin'];
            echo'
            <li class = "nav-item"><a href="adminlogin.php" class="nav-link text-white"> '.$user.' </a> </li>
            <li class = "nav-item"><a href="logout.php" class="nav-link text-white"> Log Out</a></li>';
        }else if(isset($_SESSION['doctor'])){
            $user = $_SESSION['doctor'];
            echo '
            
            <li class = "nav-item"><a href="Adminlogin.php" class="nav-link text-white"> '.$user.' </a> </li>
            <li class = "nav-item"><a href="logout.php" class="nav-link text-white"> Log Out</a></li>';
        }else if(isset($_SESSION['patient'])){
            $user = $_SESSION['patient'];
            echo '
            <li class = "nav-item"><a href="patientlogin.php" class="nav-link text-white"> '.$user.' </a> </li>
            <li class = "nav-item"><a href="logout.php" class="nav-link text-white"> Log Out</a></li>
            ';
    
        
    
            

    }else {
            echo '
        <li class = "nav-item"><a href="index.php" class="nav-link text-white"><i class="fa fa-home fa-spin"></i> Home </a> </li>
        <li class="nav-item"><a href="AdminLogin.php" class="nav-link text-white"><i class="fa fa-user fa-spin"></i> Admin</a></li>
        <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white"><i class="fa fa-user-md fa-spin"></i> Doctor</a></li>
        <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white"><i class="fa fa-user fa-spin"></i> Patient</a></li>
        <li class="nav-item"><a href="#" class="nav-link text-white"><i class="fa fa-sign-in fa-spin"></i> Log In</a></li>
        
        ';
    
        }
        
        ?>
        </ul>

    </div>
</nav>


</body>
</html>