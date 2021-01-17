<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require '../config/db.php';

// Read shop data
$sql = "SELECT * FROM supplier_stock";
$supplier_stock = mysqli_query($conn,$sql);
if($supplier_stock) {
    $supplier_stock_details = mysqli_fetch_all($supplier_stock,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
}

// Read shop data
$sql = "SELECT * FROM loading";
$loading = mysqli_query($conn,$sql);
if($loading) {
    $loading_details = mysqli_fetch_all($loading ,MYSQLI_ASSOC);
}
else {
    echo "Database Query Failed";
}


//add invoice

if (isset($_POST['addStock'])){
    // var_dump($_POST);
    // exit;

    $inv = $_POST['invoice'];
    $rdate = $_POST['rdate'];
    $amount = $_POST['bill'];
    $note = $_POST['note'];
    $sk = $_POST['sk'];

    $query = "INSERT INTO supplier_stock (stock_id, invoice_no , stock_keeper, 	recived_date, billing_price, special_note) 
        VALUES ( NULL,'{$inv}', '{$sk}', '{$rdate}', '{$amount}','{$note}')";
    //     echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: supplyOrderItem.php');
    }
    
}

// submit suppy stock

if (isset($_POST['submitStockItem'])){
   
    // var_dump($_POST);
    // exit;

   $count = 0; 
   $sql = "SELECT * FROM supplier_stock ORDER BY stock_id DESC LIMIT 1";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $stock_id = $row['stock_id'];
    
    foreach ($_POST as $key => $value) {
        $count++;
        if ($count == 1) {
            $product_id = $value;
        }
        
        if ($count==2) {
            if ($value != "") {
                $query = "INSERT INTO supply_item (sup_id , supply_id , product_id , qty) 
                VALUES ( NULL,'{$stock_id}', '{$product_id}', '{$value}')";
                
                $result = mysqli_query($conn, $query);
               
            }
        }

        if ($count == 3) {
            $sql = "SELECT * FROM products WHERE product_id ={$product_id} LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if($row['bill_unit_price'] != $value){
                $sql = "UPDATE products SET bill_unit_price ={$value} WHERE product_id ={$product_id}";
                $result = mysqli_query($conn, $sql);
                $count =0;
            }
            $count =0;
        }
        
    }
        header('location: supplyStock.php');
    
}

//add day load

if (isset($_POST['selectLoad'])){
    // var_dump($_POST);
    // exit;

    $Date = $_POST['date'];
    $query = "INSERT INTO loading (load_id, load_date, is_unload) 
        VALUES ( NULL,'{$Date}', 0)";
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: dailyloading.php');
    }
    
}



//loading daily

if (isset($_POST['submitload'])){
   
    // var_dump($_POST);
    // exit;

   $count = 0; 
   $sql = "SELECT * FROM loading ORDER BY load_id DESC LIMIT 1";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $load_id = $row['load_id'];
    
    foreach ($_POST as $key => $value) {
        $count++;
        if ($count == 1) {
            $product_id = $value;
        }
        
        if ($count==2) {
            if ($value != "") {
                $query = "INSERT INTO load_unload (id , load_id , product_id , load_qty) 
                VALUES ( NULL,'{$load_id}', '{$product_id}', '{$value}')";
                // echo $query;
                // exit;
                
                $result = mysqli_query($conn, $query);
                $count =0;
            }
            $count =0;
        }

    }
        header('location: dailyStock.php');
    
}



//unloading daily

if (isset($_POST['submitunload'])){
//    var_dump($_POST);
//    exit;

    $load_id = $_POST['load_id'];
    $count = 0; 
    
    foreach ($_POST as $key => $value) {
        $count++;
        if ($count == 1) {
            $product_id = $value;
        }
        
        if ($count==2) {
            if ($value != "") {
                $sql = "UPDATE load_unload SET unload_qty ={$value} WHERE load_id ={$load_id} AND product_id = {$product_id} ";
                
                // echo $sql;
                // exit;
                
                $result = mysqli_query($conn, $sql);
                $count =0;
            }
            $count =0;
        }
        // var_dump($value); 
        // echo $value['load_qty'];

    }

    $sql = "UPDATE loading SET is_unload ='1' WHERE load_id ={$load_id} ";
                
                // echo $sql;
                // exit;
                
    $result = mysqli_query($conn, $sql);

        header('location: dailyStock.php');
    
}