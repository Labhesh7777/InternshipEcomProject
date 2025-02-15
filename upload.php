<?php

//created session because of owner id 
session_start();
print_r($_POST);
echo "<br>";
print_r($_FILES);
echo "<br>";
echo $_FILES['pdtimg']['tmp_name'];
echo "<br>";
echo $_FILES['pdtimg']['name'];


$source=$_FILES['pdtimg']['tmp_name'];
$target ="../shared/images/".$_FILES['pdtimg']['name'];
move_uploaded_file($source,$target);

$conn = new mysqli("localhost","root","","internshipproject",3306);

mysqli_query($conn,"insert into product(name,price,detail,impath,owner) values ('$_POST[name]',$_POST[price],'$_POST[detail]',
'$target',$_SESSION[userid])");


?>