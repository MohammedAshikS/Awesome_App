<?PHP
session_start();
header('location:index.html');

// if(isset($_POST['img'])){
//     $target="LOGIN/".basename($_Files['img']);
// }

$con= mysqli_connect('localhost','root','');

mysqli_select_db($con, 'userregistration');
$name= $_POST['uname'];
$num= $_POST['number'];
$email = $_POST['email'];
$pass1 = $_POST['psw1'];
$pass2 = $_POST['psw2'];
$adder=$_POST['addr'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['zip'];
$about=$_POST['about'];
$hobby=$_POST['hobby'];
$ambi=$_POST['ambi'];
$goal=$_POST['goal'];
$path = $_FILES['file_upload']['tmp_name'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$img = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo $img;






$s = "select * from usertable where name = '$name'";

$result= mysqli_query($con,$s);

$numb = mysqli_num_rows($result);
if($numb==1){
    echo "UserName Already Taken ";
}else{
    $reg="insert into usertable(name,number,email,password,address,city,state,zipcode,about,hobbies,ambition,goal,image)
    values('$name','$num','$email','$pass1','$adder','$city','$state','$zip','$about','$hobby','$ambi','$goal','$img')";
    mysqli_query($con, $reg);
    echo "Registration Successfull";
}

?>