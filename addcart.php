<?php
$pid=$_GET['pid'];
session_start();


include "../shared/connection.php";

$sql_status=mysqli_query($conn,"insert into cart(userid,pid) values($_SESSION[userid],$pid)");

if($sql_status){
echo "Successfully added to cart!";

}

?>