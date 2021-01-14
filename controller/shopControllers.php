<?php
session_start();
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

if (isset($_POST['shopDel'])){
    

    $rowId = $_POST['shopid'];

    $query = "UPDATE shops SET shop_isdelete ='1' WHERE shop_id={$rowId}";
    
    $result = mysqli_query($conn, $query);

    if($result) {   
        
        header('location: shop.php');
    }
    
}

if (isset($_POST['addShop'])){
    // var_dump($_POST);
    // exit;

    $shopName= $_POST['shopName'];
    $ownerName = $_POST['ownerName'];
    $contact = $_POST['contact'];
    $address = $_POST['address1'].','.$_POST['address2'].','.$_POST['city'];

    $query = "INSERT INTO shops (shop_id, shop_name , owner_name, shop_contact, shop_address) 
        VALUES ( NULL,'{$shopName}', '{$ownerName}', '{$contact}', '{$address}')";
    //     echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: shop.php');
    }
    
}

if (isset($_POST['editShop'])){
    // var_dump($_POST);
    // exit;

    $shop_id= $_POST['shopid'];
    $shopName= $_POST['shopName'];
    $ownerName = $_POST['ownerName'];
    $contact = $_POST['contact'];
    $address = $_POST['address1'];
    $query = "UPDATE shops  SET shop_name='{$shopName}' , owner_name='{$ownerName}' , shop_contact= '{$contact}' , shop_address='{$address}' WHERE shop_id={$shop_id}";
    // echo $query;
    // exit;
    $result = mysqli_query($conn, $query);
    
    if($result) {
        
        header('location: shopProfile.php?shop_id='.$shop_id);
    }
    
}