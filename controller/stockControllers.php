<?php
require '../config/db.php';

// Read shop data
$sql = "SELECT * FROM supplier_stock INNER JOIN products ON supplier_stock.product_id = products.product_id";
$supplier_stock = mysqli_query($conn,$sql);
if($supplier_stock) {
    $supplier_stock_details = mysqli_fetch_all($supplier_stock,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 