<?php

$con = mysqli_connect ('localhost', 'root');
if($con){
    echo "Connection Successful";
}
else {
    echo "No connection";
}

mysqli_select_db($con, 'aproject');

$title = $_POST['title'];
$start_date = $_POST['startdate'];
$end_date = $_POST['enddate'];
$phase = $_POST['phase'];
$description = $_POST['shortdescription'];



$query = " insert into projects(title, start_date, end_date,phase, description,uid)
values('$title','$start_date','$end_date','$phase','$description',1)";

mysqli_query ($con,$query);

header('location:index.php');

?> 
