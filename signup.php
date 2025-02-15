<?php

$uname=$_POST['uname'];
$password=$_POST['pass'];
$utype=$_POST['usertype'];


$cipher_pass=md5($password);

echo "Your name is $uname<br>";

echo "You are a $utype";


$conn=new mysqli("localhost","root","","internshipproject",3306);
$query = "insert into user(username,password,usertype) values('$uname','$cipher_pass','$utype')";
echo "<br>Running Query=$query";

mysqli_query($conn,$query);
?>


