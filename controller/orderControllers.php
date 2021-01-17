<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
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

//read order data
$sql = "SELECT * FROM place_order";
$order = mysqli_query($conn,$sql);
if($order) {
    $order_details = mysqli_fetch_all($order,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
} 



//add new order

if (isset($_POST['selectOrder'])){
    // var_dump($_POST);
    // exit;

    $shopId = $_POST['shop_id'];
    $refId = $_POST['ref_id'];
    $orderDate = $_POST['date'];
    $orderTime = $_POST['time'];
    $query = "INSERT INTO place_order (order_id, shop_id , ref_id, order_date, order_time) 
        VALUES ( NULL,'{$shopId}', '{$refId}', '{$orderDate}', '{$orderTime}')";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: orderTable.php');
    }
    
}


// submit order

if (isset($_POST['submitOrderItem'])){
   
    
    $str = $_POST['subTotal'];
    $newStr = str_replace(',', '', $str); // If you want it to be "185345321"
    $num = intval($newStr); // If you want it to be a number 185345321
//     echo '<pre>' , var_dump($num) , '</pre>';
//    exit;
   $count = 0; 
   $sql = "SELECT * FROM place_order ORDER BY order_id DESC LIMIT 1";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $order_id = $row['order_id'];
   $shop_id = $row['shop_id'];

    
    foreach ($_POST as $key => $value) {
        $count++;
        if ($count == 1) {
            $product_id = $value;
        }
        
        if ($count==2) {
            if ($value != "") {
                $sql = "SELECT * FROM products WHERE product_id= '{$product_id}' LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $profit = ($row['sell_unit_price'] - $row['bill_unit_price']) * $value;

                $query = "INSERT INTO order_item (id,order_id, product_id , qty, profit ) 
                VALUES ( NULL,'{$order_id}', '{$product_id}', '{$value}', '{$profit}')";
                // echo $query;
                // exit;
                $result = mysqli_query($conn, $query);
                $count=0;
            }else{
                $count =0;
            }
        }
        
    }

    $sql = "UPDATE place_order SET total_amount ={$num} WHERE order_id={$order_id}";
    
   $result = mysqli_query($conn, $sql);
    if($result) {   
        
        header('location: shopProfile.php?shop_id='.$shop_id);
    }
    
}


//del order item

if (isset($_POST['orderItemDel'])){
    // var_dump($_POST);
    // exit;

    $rowId = $_POST['id'];
    $row2Id = $_POST['shopid'];

    $query = "DELETE FROM place_order WHERE order_id ={$rowId}";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);

    if($result) {   
        
        header('location: shopProfile.php?shop_id='.$row2Id);
    }
    
}