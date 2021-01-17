<?php 

// Read shop data

//add new order

if (isset($_POST['selectReturn'])){
    // var_dump($_POST);
    // exit;

    $shopId = $_POST['shop_id'];
    $orderId = $_POST['order_id'];
    $orderDate = $_POST['date'];
    $query = "INSERT INTO return_product (return_id, order_id, shop_id , return_date) 
        VALUES ( NULL,'{$orderId}', '{$shopId}', '{$orderDate}')";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: returnProduct.php?order_id='.$orderId);
    }
    
}

// submit return

if (isset($_POST['submitReturnItem'])){
   
    // var_dump($_POST);
    // exit;
    $str = $_POST['subTotal'];
    $newStr = str_replace(',', '', $str); // If you want it to be "185345321"
    $num = intval($newStr); // If you want it to be a number 185345321
   $count = 0; 
   $sql = "SELECT * FROM return_product ORDER BY return_id DESC LIMIT 1";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $return_id = $row['return_id'];
    
    foreach ($_POST as $key => $value) {
        $count++;
        if ($count == 1) {
            $product_id = $value;
        }
        
        if ($count==2) {
            if ($value != "") {

                $sql = "SELECT * FROM products WHERE product_id ={$product_id} LIMIT 1";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                $total = $row['sell_unit_price'] * $value;
                $query = "INSERT INTO return_item (id , return_id , product_id , qty, value) 
                VALUES ( NULL,'{$return_id}', '{$product_id}', '{$value}','{$total}')";
                // echo $query;
                // exit;
                $result = mysqli_query($conn, $query);
                $count =0;
            }
            $count =0;
        }
 
        
        $sql = "UPDATE return_product SET return_value ={$num} WHERE return_id={$return_id}";
    
        $result = mysqli_query($conn, $sql);
    }
        header('location: shopOrderView.php?order_id='.$_POST['order_id']);
    
}
