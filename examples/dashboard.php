<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require '../config/db.php';
?>
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
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <!-- <h6 class="h2 text-white d-inline-block mb-0">Default</h6> -->
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Default</li>
                </ol>
              </nav>
            </div>
          </div>

          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Orders</h5>
                      <?php
                      $today = date('Y-m-d'); 
                      $old = date("Y", strtotime("-1 months"));

                      $sql = "SELECT count(order_id) FROM place_order WHERE order_date BETWEEN '{$old}' AND '{$today}'";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($result);
                      // var_dump($row);
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $row['count(order_id)']; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-4 mb-0 text-sm">
                    <span class="text-success mr-2">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New Order Value</h5>
                      <?php
                      $sql = "SELECT sum(total_amount) FROM place_order WHERE order_date BETWEEN '{$old}' AND '{$today}'";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row = mysqli_fetch_assoc($result);
                      
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $row['sum(total_amount)']; ?> LKR</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Astimate Pfofit</h5>

                      <?php
                      $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$old}' AND '{$today}'";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      if($result) {
                        $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
                      }
                      
                      $data=$order_details; //associative array
        
                      $simple_array = array(); //simple array
                
                      if ($data != NULL) {
                        foreach($data as $d)
                        {
                              $simple_array[]=$d['order_id'];   
                        }
                        // var_dump($simple_array1);
                        // exit;
                        $ids = join("','",$simple_array); 
                        $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                        // echo $sql;
                        // exit;
                        $result = mysqli_query($conn, $sql);
                        $row= mysqli_fetch_assoc($result);
                        // echo '<pre>' , var_dump($list_details) , '</pre>';
                        
                      }else{
                         $row['sum(profit)'] = 0;
                      }
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $row['sum(profit)']; ?> LKR</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2">Since last month</span>
                    <span class="text-nowrap"></span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card ">
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <?php 

            
                    $arr3= array();

                    $first_day_this_month = date('Y-01-01'); // hard-coded '01' for first day
                    $last_day_this_month  = date('Y-01-t');

                    //   echo $first_day_this_month;
                    //   echo $last_day_this_month;

                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-02-01'); 
                    $last_day_this_month  = date('Y-02-28');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-03-01'); 
                    $last_day_this_month  = date('Y-03-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);


                    $first_day_this_month = date('Y-04-01'); 
                    $last_day_this_month  = date('Y-04-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-05-01'); 
                    $last_day_this_month  = date('Y-05-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-06-01'); 
                    $last_day_this_month  = date('Y-06-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-07-01'); 
                    $last_day_this_month  = date('Y-07-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-08-01'); 
                    $last_day_this_month  = date('Y-08-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-09-01'); 
                    $last_day_this_month  = date('Y-09-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-10-01'); 
                    $last_day_this_month  = date('Y-10-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);
                    
                    $first_day_this_month = date('Y-11-01'); 
                    $last_day_this_month  = date('Y-11-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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
                    unset($row1);
                    unset($simple_array);
                    unset($data);
                    unset($order_details);
                    unset($ids);

                    $first_day_this_month = date('Y-12-01'); 
                    $last_day_this_month  = date('Y-12-t');

                    
                    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN  '{$first_day_this_month}' AND '{$last_day_this_month}'";
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
                      $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids')";
                      // echo $sql;
                      // exit;
                      $result = mysqli_query($conn, $sql);
                      $row1 = mysqli_fetch_assoc($result);
                      // echo '<pre>' , var_dump($list_details) , '</pre>';
                      if ($row1['sum(profit)'] != NULL) {
                          
                          $arr3[] = $row1['sum(profit)'];
                          $return_val= $row1['sum(profit)'];
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


                <!-- <canvas id="chart-sales-dark" class="chart-canvas" data-update='{"data":{"datasets":[{"data":[0, 100, 10, 30, 15, 40, 20, 60, 60,80,100]}]}}'></canvas> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var dataArray = [<?php echo join(',',$arr3); ?>];
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November','December'],
        datasets: [{
            label: 'Monthly Product Profit',
            borderColor: 'rgb(71, 0, 138, 0.8)',
            fill: false,
            data: dataArray 
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
