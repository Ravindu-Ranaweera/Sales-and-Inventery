<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require '../config/db.php';

if (isset($_POST['findSale'])){
    
// var_dump($_POST);
// exit;
    
    $pre = $_POST['previousDate'];  
    date_default_timezone_set("Asia/Kolkata"); 
    $Due = date("Y-m-d");
    if ( $pre < $Due) {
      header('location: report1.php?date='.$_POST['previousDate']);
    }else{
      header('location: report.php?');
    }
    
    
}


if (isset($_POST['findProduct'])){
    
  // var_dump($_POST);
  // exit;
          
      header('location: report2.php?product_id='.$_POST['item']);
      
  }


  if (isset($_POST['findShop'])){
    
    // var_dump($_POST);
    // exit;
            
        header('location: report3.php?shop_id='.$_POST['item']);
        
    }
  


  
    if (isset($_POST['findFin'])){
    
      // var_dump($_POST);
      // exit;

        $pre = $_POST['previousDate'];  
        date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
        if ( $pre < $Due) {
          header('location: report4.php?date='.$_POST['previousDate']);
        }else{
          header('location: report.php?');
        }
          
      }

      if (isset($_POST['findInvent'])){
    
        // var_dump($_POST);
        // exit;
            $pre = $_POST['previousDate'];  
        date_default_timezone_set("Asia/Kolkata"); 
        $Due = date("Y-m-d");
        if ( $pre < $Due) {
          header('location: printInvent.php?date='.$_POST['previousDate']);

        }else{
          header('location: report.php?');
        }
        }

        if (isset($_POST['findReturn'])){
    
          // var_dump($_POST);
          // exit;
          $pre = $_POST['previousDate'];  
          date_default_timezone_set("Asia/Kolkata"); 
          $Due = date("Y-m-d");
          if ( $pre < $Due) {
            header('location: report5.php?date='.$_POST['previousDate']);
  
          }else{
            header('location: report.php?');
          }
          }