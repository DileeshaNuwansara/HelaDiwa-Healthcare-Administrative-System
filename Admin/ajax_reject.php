<?php 

include("../include/connection.php");
$id = $_post['id'];
$query = "UPDATE doctors SET status ='Rejected' where id ='$id'";
mysqli_query($connect,$query);


?>