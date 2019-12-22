<?php
session_start();
if(!isset($_SESSION['username'])&&(isset($_SESSION['result']))){
    
    header('location:index.html');
    
}
else{
    $username= $_SESSION['username'];
    $con= mysqli_connect('localhost','root','');
}
mysqli_select_db($con, 'userregistration');
$username=$_SESSION['username'];

$date=date('Y-m-d H:i:s');
$caption=$_POST['caption'];
$path = $_FILES['photo']['tmp_name'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$img = 'data:image/' . $type . ';base64,' . base64_encode($data);

$query= "insert into post(created_by,date,caption,image) values('$username','$date','$caption','$img')";
mysqli_query($con, $query);
header('location:dashbord.php');
?>