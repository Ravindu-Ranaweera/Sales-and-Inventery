<?php
if (!isset($_SESSION['id'])) {
  session_start();

}

?>

<?php require_once '../controller/reportControllers.php'; ?>
<?php require_once '../controller/shopControllers.php'; ?>
<?php require_once '../controller/productControllers.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Chenith Enterprises</title>
  <!-- Favicon -->
  <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script>
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <?php include('sidebar.php'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include('topnav.php'); ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Reports</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Reports</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Generate Report</h3>
            </div>
            <div class="card-body">
            <?php 

            
            $arr1= array();
            $arr2= array();
            $arr3= array();

            $first_day_this_month = date('Y-01-01'); // hard-coded '01' for first day
            $last_day_this_month  = date('Y-01-t');

            //   echo $first_day_this_month;
            //   echo $last_day_this_month;

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              
              $tot = $row['sum(total_amount)']- $return_val;
              $arr1[] = $tot;
              // $arr4 = 2;

              
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }
            // var_dump($rr3); exit;
            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-02-01'); 
            $last_day_this_month  = date('Y-02-28');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-03-01'); 
            $last_day_this_month  = date('Y-03-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);


            $first_day_this_month = date('Y-04-01'); 
            $last_day_this_month  = date('Y-04-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-05-01'); 
            $last_day_this_month  = date('Y-05-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-06-01'); 
            $last_day_this_month  = date('Y-06-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-07-01'); 
            $last_day_this_month  = date('Y-07-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-08-01'); 
            $last_day_this_month  = date('Y-08-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-09-01'); 
            $last_day_this_month  = date('Y-09-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-10-01'); 
            $last_day_this_month  = date('Y-10-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);
            
            $first_day_this_month = date('Y-11-01'); 
            $last_day_this_month  = date('Y-11-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            $first_day_this_month = date('Y-12-01'); 
            $last_day_this_month  = date('Y-12-t');

            $sql = "SELECT order_id FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
                $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
      
            $data=$order_details; //associative array
            $simple_array = array(); //simple array
            $return_val=0;
      
            if ($data != NULL) {
              
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array); 
              $sql = "SELECT sum(return_value) FROM return_product WHERE order_id in ('$ids')";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              // echo '<pre>' , var_dump($list_details) , '</pre>';
              if ($row1['sum(return_value)'] != NULL) {
                  
                  $arr3[] = $row1['sum(return_value)'];
                  $return_val= $row1['sum(return_value)'];
                  // echo $row1['sum(return_value)'];
                  // exit;
              }else{
                  
                  $arr3[] = $return_val;
              }
            }else{
             
              $arr3[] = $return_val;
            }
            // echo $return_val;
            // exit;

            $sql = "SELECT sum(total_amount), sum(paid_amount) FROM place_order WHERE shop_id= '{$_GET['shop_id']}' AND order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['sum(total_amount)'] != NULL ) {
              $arr1[] = $row['sum(total_amount)']- $return_val;
            }else{
              $arr1[] = 0;
            }
            if ($row['sum(paid_amount)'] != NULL ) {
              $arr2[] = $row['sum(paid_amount)'];
            }else{
              $arr2[] = 0;
            }

            unset($row);
            unset($row1);
            unset($simple_array);
            unset($data);
            unset($order_details);
            unset($ids);

            // echo join(',',$arr3);
            // var_dump($arr1); 
            //   var_dump($arr1);    
              // var_dump($arr2);    
              // var_dump($arr3);    
              // exit;
            ?>
            <canvas id="myChart" width="800" height="400"></canvas>

</div>
</div>
</div>
</div>
</div>

<script >
  var ctx = document.getElementById('myChart').getContext('2d');

  var dataArray1 = [<?php echo join(',',$arr1); ?>];
  var dataArray2 = [<?php echo join(',',$arr2); ?>];
  var dataArray3 = [<?php echo join(',',$arr3); ?>];
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November','December'],
        datasets: [{
            label: 'Total Amount   ',
            backgroundColor: 'rgb(199, 0, 42)',
            borderColor: 'rgb(0, 0, 0)',
            data: dataArray1
        },
        {
            label: 'Paid Amount   ',
            backgroundColor: 'rgb(0, 55, 207)',
            borderColor: 'rgb(0, 0, 0)',
            data: dataArray2
        },
        {
            label: 'Return Amount  ',
            backgroundColor: 'rgb(0, 138, 50)',
            borderColor: 'rgb(0, 0, 0)',
            data: dataArray3
        }]
    },

    // Configuration options go here
    options: {}
});
</script>

  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>