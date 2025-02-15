<?php
session_start();
if($_SESSION['login_status']==false){
    echo "Forbidden Access";
    die;

}
if($_SESSION['usertype']!='Vendor'){
    echo "Unauthorized Access";
    die;
}
include "menu.html";
?>



<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>


<div class="d-flex justify-content-center align-items-center vh-100">
<form enctype="multipart/form-data" action="upload.php" method="post" class="w-50 bg-warning p-4">
    <h3 class="text-center">Add Product</h3>
<input required class="form-control mt-2" type="text" placeholder="Product Name" name="name">
<input required  class="form-control mt-2" type="number" min="1"  placeholder="Product Price" name="price">
<textarea required placeholder="Product Descrioption"  class="form-control mt-2" id="" cols="" rows="5" name="detail"></textarea>
<input required  class="form-control mt-2"type="file" name="pdtimg"accept=".jpg,.png">
<div class="text-center mt-3">
<button class="btn btn-success">Add Product</button>
</div>


</form>
</div>
</body>
</html>