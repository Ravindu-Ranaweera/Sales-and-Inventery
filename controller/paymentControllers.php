<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require '../config/db.php';

if (isset($_POST['submitBill'])){

// var_dump($_POST);
// exit;

    if($_POST['cat'] == "cash+check" && $_POST['check'] != "" && $_POST['checkNumber']!= "" &&  $_POST['returnDate'] != "" && $_POST['cash'] != ""){
        date_default_timezone_set("Asia/Kolkata"); 
        $get = date("Y-m-d");
        $query = "INSERT INTO  cheque (	cheque_id, sub_total, cheque_number , return_date, recived_date) 
        VALUES ( NULL,'{$_POST['check']}', '{$_POST['checkNumber']}', '{$_POST['returnDate']}', '{$get}')";
        // echo $query;
        $result = mysqli_query($conn, $query);
        
        $sql = "SELECT * FROM cheque ORDER BY cheque_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $_POST['cash'] + $_POST['check'];

        $query2 = "INSERT INTO  payment (payment_id , order_id , payment_type , cheque_id, cash_amount , cash_collector , total_amount, payment_date) 
        VALUES ( NULL,'{$_POST['order_id']}', '{$_POST['cat']}','{$row['cheque_id']}', '{$_POST['cash']}', '{$_SESSION['id']}', '{$total_amount}', '{$get}')";
        // echo $query2;
        // exit;
        $result = mysqli_query($conn, $query2);

        $sql = "SELECT * FROM  place_order WHERE order_id = {$_POST['order_id']} LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $total_paid = $row['paid_amount'] + $total_amount;

        $sql = "UPDATE place_order SET paid_amount ={$total_paid} WHERE order_id = {$_POST['order_id']}";
        $result = mysqli_query($conn, $sql);
        header('location: payBill.php?order_id='.$_POST['order_id']);

        


    }elseif($_POST['cat'] == "cash" && $_POST['cash'] != ""){
        date_default_timezone_set("Asia/Kolkata"); 
        $get = date("Y-m-d");
        $total_amount = $_POST['cash'] + $_POST['check'];

        $query2 = "INSERT INTO  payment (payment_id , order_id , payment_type , cheque_id, cash_amount , cash_collector , total_amount, payment_date) 
        VALUES ( NULL,'{$_POST['order_id']}', '{$_POST['cat']}',0, '{$_POST['cash']}', '{$_SESSION['id']}', '{$total_amount}', '{$get}')";

        // echo $query2;
        // exit;
        $result = mysqli_query($conn, $query2);
        $sql = "SELECT * FROM  place_order WHERE order_id = {$_POST['order_id']} LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $total_paid = $row['paid_amount'] + $total_amount;

        $sql = "UPDATE place_order SET paid_amount ={$total_paid} WHERE order_id = {$_POST['order_id']}";
        $result = mysqli_query($conn, $sql);
        header('location: payBill.php?order_id='.$_POST['order_id']);


    }elseif($_POST['cat'] == "check" && $_POST['check'] != "" && $_POST['checkNumber']!= "" &&  $_POST['returnDate'] != ""){
        date_default_timezone_set("Asia/Kolkata"); 
        $get = date("Y-m-d");
        $query = "INSERT INTO  cheque (	cheque_id, sub_total, cheque_number , return_date, recived_date) 
        VALUES ( NULL,'{$_POST['check']}', '{$_POST['checkNumber']}', '{$_POST['returnDate']}', '{$get}')";
        // echo $query;
        // exit;
        $result = mysqli_query($conn, $query);
        
        $sql = "SELECT * FROM cheque ORDER BY cheque_id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $total_amount = $_POST['cash'] + $_POST['check'];

        $query2 = "INSERT INTO  payment (payment_id , order_id , payment_type , cheque_id, cash_amount , cash_collector , total_amount, payment_date) 
        VALUES ( NULL,'{$_POST['order_id']}', '{$_POST['cat']}','{$row['cheque_id']}', '{$_POST['cash']}', '{$_SESSION['id']}', '{$total_amount}', '{$get}')";
        // echo $query2;
        // exit;
        $result = mysqli_query($conn, $query2);
        $sql = "SELECT * FROM  place_order WHERE order_id = {$_POST['order_id']} LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $total_paid = $row['paid_amount'] + $total_amount;

        $sql = "UPDATE place_order SET paid_amount ={$total_paid} WHERE order_id = {$_POST['order_id']}";
        $result = mysqli_query($conn, $sql);
        header('location: payBill.php?order_id='.$_POST['order_id']);

    }else{
        header('location: paymentBill.php?order_id='.$_POST['order_id']);
    }
}