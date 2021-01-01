<?php
require '../config/db.php';

// Read shop data
$sql = "SELECT * FROM shops";
$shop = mysqli_query($conn,$sql);
if($shop) {
    $shop_details = mysqli_fetch_all($shop,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 