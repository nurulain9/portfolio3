<?php

$con = mysqli_connect ('localhost', 'root');
if($con){
    echo "Connection Successful";
}
else {
    echo "No connection";
}

mysqli_select_db($con, 'aproject');

$username = $_POST['username'];
$password = $_POST['password'];



$query = " insert into users(username, password)
values('$username','$password')";

mysqli_query($con,$query);

header('location:index.php');

?>
