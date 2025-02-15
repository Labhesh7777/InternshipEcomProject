<?php
session_start();
if($_SESSION['login_status']==false){
    echo "Forbidden Access";
    die;

}
if($_SESSION['usertype']!='Customer'){
    echo "Unauthorized Access";
    die;
}
include "menu1.html";


include "../shared/connection.php";

$sql_result=mysqli_query($conn,"select * from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");
$total=0;
//Used a while loop to display all the rows 
while($dbrow=mysqli_fetch_assoc($sql_result)){
$total=$total+$dbrow['price'];
    echo "<div class='cardown'>
    <div class='name'>$dbrow[name]</div>
    <div class='price'>$dbrow[price]</div>
    <div class='pdt-img-parent'>
<img class='pdtimg' src='$dbrow[impath]'>
    </div>
<div>$dbrow[detail]</div>
<div class='text-center'>
<a href='deletecart.php?cartid=$dbrow[cartid]'>
<button class='btn btn-danger'>Remove from Cart<button>
</a>
</div>
    </div>";
}
echo "<div>
<div>Total Amount : $total</div>
<a>
<button>Place Order</button> 
</a>
</div>";
?>
<!DOCTYPE html>
<head>
   <style>
    .cardown{
width:200px;
height:400px;
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

<!DOCTYPE html>
<head>
   <style>
    .cardown{
width:200px;
height:400px;
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