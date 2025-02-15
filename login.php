<?php
session_start();
$_SESSION['login_status']=false;
$uname=$_POST['uname'];
$upass=$_POST['pass'];

$hostname="localhost";
$user="root";
$password="";
$dbname="internshipproject";
$port="3306";

$conn =new mysqli($hostname,$user,$password,$dbname,$port);

$cipher_text = md5($upass);
$query="select * from user where username='$uname' and password='$cipher_text'";
$sql_result=mysqli_query($conn,$query);


if(mysqli_num_rows($sql_result)>0){
    echo "Login Success<br>";
    $dbrow = mysqli_fetch_assoc($sql_result);
    print_r($dbrow);

    $_SESSION['login_status']=true;
   $_SESSION['usertype']=$dbrow['usertype'];
   $_SESSION['userid']=$dbrow['userid'];

    //From here we will redirect the user to home page
    if($dbrow['usertype']=="Vendor"){
        header("location:../vendor/home.php");
    }
    else if($dbrow['usertype']=="Customer"){
        header("location:../customer/home.php");
    }
else {
    echo "Login failed";
} }
        else{
            echo "Login failed";
}



?>