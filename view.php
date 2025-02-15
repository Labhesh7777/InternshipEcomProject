<!DOCTYPE html>
<head>
   <style>
    .cardown{
width:200px;
height:350px;
background-color: bisque;
display : inline-block;
margin:5px;
padding:5px;

    }
    .name{
        font-size: 24px;
        text-align:center;

    }
    .price{
font-weight:bold;
color:orangered;
font-size: 26px;
    }
    .price::before{
        content:"Rs";
        color:black;
        font-size:12px;
    }
    .pdt-img-parent,.pdtimg{
width:100%;
height:250px;
    }
    </style>
</head>
<body>
    
</body>
</html>

<?php
include "menu.html";
session_start();
include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from product where owner='{$_SESSION['userid']}'");

//Used a while loop to display all the rows 
while($dbrow=mysqli_fetch_assoc($sql_result)){

    echo "<div class='cardown'>
    <div class='name'>$dbrow[name]</div>
    <div class='price'>$dbrow[price]</div>
    <div class='pdt-img-parent'>
<img class='pdtimg' src='$dbrow[impath]'>
    </div>
<div>$dbrow[detail]</div>

    </div>";
}

?>