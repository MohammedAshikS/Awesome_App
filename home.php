<?php
session_start();
if(!isset($_SESSION['username'])&&(isset($_SESSION['result']))){
    
    header('location:index.html');
    
}
else{
    $username= $_SESSION['username'];
    $con= mysqli_connect('localhost','root','');

mysqli_select_db($con, 'userregistration');
    $s = "select * from usertable where name = '$username'";

$result= mysqli_query($con,$s);

$numb = mysqli_num_rows($result);

$number="";
$adder="";
$city="";
$state="";
$zip="";
$about="";
$hobby="";
$ambi="";
$goal="";
while ($row = $result->fetch_assoc()) {
    $number= $row['number'];
    $adder= $row['address'];
    $city= $row['city'];
    $state= $row['state'];
    $zip= $row['zipcode'];
    $about= $row['about'];
    $hobby= $row['hobbies'];
    $ambi= $row['ambition'];
    $goal= $row['goal'];
$image=$row['image'];

}

}
?>

<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" type="text/css" href="form.css">-->
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 600px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top:50px;
}



.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}


</style>

</head>
<body>
<a class="float-right" href="logout.php"> <b>LOGOUT</b></a>

<h1 style="text-align:left">User Profile </h2>       
    <div class = card>


        <h2 style="text-align:center">Welcome <?php echo $_SESSION['username']; ?> </h2>
        <table style="text-align:center;">
        <col width="30%">
        <col width="40%">
        <tr><td><p>Im :</p></td>   <td style="text-align:left;"> <img src= "<?php echo $image; ?>"/> </td></tr>
        <tr><td><p style="margin-right:15px">My Number: </p></td>   <td style="text-align:left;"> <p> <?php echo $number; ?> </p> </td></tr>
        <tr><td><p>Address :</p></td>   <td style="text-align:left;"> <p> <?php echo $adder; ?></p> </td></tr>
        <tr><td><p>City  :</p></td>   <td style="text-align:left;"><p>  <?php echo $city; ?></p></td></tr>
        <tr><td><p>State  : </p></td>   <td style="text-align:left;"> <p> <?php echo $state; ?></p></td></tr>
        <tr><td><p>ZipCode  :</p></td>   <td style="text-align:left;"> <p>  <?php echo $zip; ?></p></td></tr>
        <tr><td><p>About Me  :</p></td>  <td style="text-align:left;"> <p>  <?php echo $about; ?></p></td></tr>
        <tr><td><p>My Hobbies  :</p></td>   <td style="text-align:left;"> <p>  <?php echo $hobby; ?></p></td></tr>
        <tr><td><p>Ambition  : </p></td>   <td style="text-align:left;"><p> <?php echo $ambi; ?></p></td></tr>
        <tr><td><p>Goal : </p></td><td style="text-align:left;"> <p> <?php echo $goal; ?></p></td></tr>
        </table>
        <div style="margin: 24px 0;margin-top:90">
    <a href="#"><i class="fa fa-dribbble"></i></a>
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>





    </div>
    <form action="post.php">
        <div style="text-align:center"><input type="text"  placeholder="status"></div>
        <button type="submit" style="width:30%" class="w3-button w3-theme"><i class="fa fa-pencil" ></i>  Post</button>     
    </form>
</body>
</html>