<?php 
    include("../include/connection.php");

    $query ="SELECT * from doctors where status='Pending' ORDER BY date_reg ASC";
    $res = mysqli_query($connect,$query);

    $output = "";

    $output .="
    <table class=table-bordered'>
    
    <tr>
    <td>    ID</td>
    <td>    Name</td>
    <td>    Gender</td>
    <td>    Email</td>
    <td>    Medi_RegNo</td>
    <td>    Specilization</td>
    <td>    Phone No</td>
    <td>    Date Registerd</td>
    <td>    Action</td>
    </tr>

    ";
    if(mysqli_num_rows($res) < 1){
        $output .="
        <tr>
        <td colspan ='8' class='text-center'> No job Request Yet.</td>
        </tr>
    ";
    }

    while($row = mysqli_fetch_array($res)){
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

            <div class ='col-md-12'>
                <div class='row'>
                    <div class='col-md-6'>
                        <button id=' ".$row['id']." ' class ='btn btn-success approve' >Approve </button>
                    </div>
                    <div class='col-md-6'>
                        <button id='" .$row['id']. "' class ='btn btn-danger reject' >Reject </button>
                    </div>
                </div>
            
            </div>
        </td>

    ";
}
    $output .="
    </tr>
    </table>
        ";

    echo $output;
?>