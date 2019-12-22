<?PHP
session_start();

$con= mysqli_connect('localhost','root','');

mysqli_select_db($con, 'userregistration');
$name= $_POST['uname'];
$pass1 = $_POST['psw1'];

$s = "select * from usertable where name = '$name' && password='$pass1'";

$result= mysqli_query($con,$s);

$numb = mysqli_num_rows($result);
if($numb==1){
    $_SESSION['username']= $name ;

    $_SESSION['result']=$result;

   header('location:dashbord.php');
}else{
   echo "Username doesnot exist or incorrect details";
}





?>