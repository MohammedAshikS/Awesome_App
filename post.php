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
    $s = 'select * from post' ;
$result= mysqli_query($con,$s);
if(mysqli_num_rows($result)!=0){
while($row = mysqli_fetch_array($result)){
    echo $row['created_by'];  
    echo $row['date'];
    echo $row['caption'];
    echo $row['image'];
}}
else
{
    echo 'No Posts';
}


?>