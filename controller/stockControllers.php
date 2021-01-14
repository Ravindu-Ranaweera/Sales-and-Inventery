<?php
session_start();
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
        
        header('location: stockSupply.php');
    }
    
}
