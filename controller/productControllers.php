<?php
session_start();
require '../config/db.php';

// Read shop data
$sql = "SELECT * FROM products";
$product = mysqli_query($conn,$sql);
if($product) {
    $product_details = mysqli_fetch_all($product,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 