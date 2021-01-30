<?php
if (!isset($_SESSION['id'])) {
  session_start();

}

?>

<?php require_once '../controller/reportControllers.php'; ?>
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

                $arr= array();
              
              $first_day_this_month = date('Y-01-01'); // hard-coded '01' for first day
              $last_day_this_month  = date('Y-01-t');

            //   echo $first_day_this_month;
            //   echo $last_day_this_month;
                $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{ $first_day_this_month}' AND '{$last_day_this_month}'";
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
                $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                if ($row['sum(qty)'] != NULL) {
                    
                    $arr[] = $row['sum(qty)'];
                }else{
        
                    $arr[] = 0;
                }
              }else{
                $row['sum(qty)'] = 0;
                $arr[] = $row['sum(qty)'];
              }

                $first_day_this_month = date('Y-02-01'); 
                $last_day_this_month  = date('Y-02-28');

                $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                if($result) {
                  $order_details1 = mysqli_fetch_all($result,MYSQLI_ASSOC);
              }
              
              $data1=$order_details1; //associative array

              $simple_array1 = array(); //simple array

              if ($data1 != NULL) {
                foreach($data1 as $d)
                {
                      $simple_array1[]=$d['order_id'];   
                }
                // var_dump($simple_array1);
                // exit;
                $ids = join("','",$simple_array1); 
                $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row1 = mysqli_fetch_assoc($result);
                if ($row1['sum(qty)'] != NULL) {
                    
                    $arr[] = $row1['sum(qty)'];
                }else{
        
                    $arr[] = 0;
                }
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                
              }else{
                $row1['sum(qty)'] = 0;
                $arr[] = $row1['sum(qty)'];
              }

              $first_day_this_month = date('Y-03-01'); 
                $last_day_this_month  = date('Y-03-t');

                $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                if($result) {
                  $order_details2 = mysqli_fetch_all($result,MYSQLI_ASSOC);
              }
              
              $data2=$order_details2; //associative array

              $simple_array2 = array(); //simple array

              if ($data2 != NULL) {
                foreach($data2 as $d)
                {
                      $simple_array2[]=$d['order_id'];   
                }
                // var_dump($simple_array1);
                // exit;
                $ids = join("','",$simple_array2); 
                $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row2 = mysqli_fetch_assoc($result);
                if ($row2['sum(qty)'] != NULL) {
                    
                    $arr[] = $row2['sum(qty)'];
                }else{
        
                    $arr[] = 0;
                }
              }else{
                $row2['sum(qty)'] = 0;
                $arr[] = $row2['sum(qty)'];
              }

              $first_day_this_month = date('Y-04-01'); 
              $last_day_this_month  = date('Y-04-t');

              $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              if($result) {
                $order_details3 = mysqli_fetch_all($result,MYSQLI_ASSOC);
            }
            
            $data3=$order_details3; //associative array

            $simple_array3 = array(); //simple array

            if ($data3 != NULL) {
              foreach($data3 as $d)
              {
                    $simple_array3[]=$d['order_id'];   
              }
              // var_dump($simple_array1);
              // exit;
              $ids = join("','",$simple_array3); 
              $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row3 = mysqli_fetch_assoc($result);
              if ($row3['sum(qty)'] != NULL) {
                    
                $arr[] = $row3['sum(qty)'];
            }else{
    
                $arr[] = 0;
            }
            }else{
              $row3['sum(qty)'] = 0;
              $arr[] = $row3['sum(qty)'];
            }

            $first_day_this_month = date('Y-05-01'); 
            $last_day_this_month  = date('Y-05-t');

            $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            if($result) {
              $order_details5 = mysqli_fetch_all($result,MYSQLI_ASSOC);
          }
          
          $data5=$order_details5; //associative array

          $simple_array5 = array(); //simple array

          if ($data2 != NULL) {
            foreach($data5 as $d)
            {
                  $simple_array5[]=$d['order_id'];   
            }
            // var_dump($simple_array1);
            // exit;
            $ids = join("','",$simple_array5); 
            $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
            // echo $sql;
            // exit;
            $result = mysqli_query($conn, $sql);
            $row5 = mysqli_fetch_assoc($result);
            if ($row5['sum(qty)'] != NULL) {
                    
                $arr[] = $row5['sum(qty)'];
            }else{
    
                $arr[] = 0;
            }
          }else{
            $row5['sum(qty)'] = 0;
            $arr[] = $row5['sum(qty)'];
          }
        
          $first_day_this_month = date('Y-06-01'); 
          $last_day_this_month  = date('Y-06-t');

          $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
          // echo $sql;
          // exit;
          $result = mysqli_query($conn, $sql);
          if($result) {
            $order_details6 = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        
        $data6=$order_details6; //associative array

        $simple_array6 = array(); //simple array

        if ($data6 != NULL) {
          foreach($data6 as $d)
          {
                $simple_array6[]=$d['order_id'];   
          }
          // var_dump($simple_array1);
          // exit;
          $ids = join("','",$simple_array6); 
          $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
          // echo $sql;
          // exit;
          $result = mysqli_query($conn, $sql);
          $row2 = mysqli_fetch_assoc($result);
          if ($row6['sum(qty)'] != NULL) {
                    
            $arr[] = $row6['sum(qty)'];
        }else{

            $arr[] = 0;
        }
        }else{
          $row6['sum(qty)'] = 0;
          $arr[] = $row6['sum(qty)'];
        }


        $first_day_this_month = date('Y-07-01'); 
        $last_day_this_month  = date('Y-07-t');

        $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
        // echo $sql;
        // exit;
        $result = mysqli_query($conn, $sql);
        if($result) {
          $order_details7 = mysqli_fetch_all($result,MYSQLI_ASSOC);
      }
      
      $data7=$order_details7; //associative array

      $simple_array7 = array(); //simple array

      if ($data7 != NULL) {
        foreach($data7 as $d)
        {
              $simple_array7[]=$d['order_id'];   
        }
        // var_dump($simple_array1);
        // exit;
        $ids = join("','",$simple_array7); 
        $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
        // echo $sql;
        // exit;
        $result = mysqli_query($conn, $sql);
        $row7 = mysqli_fetch_assoc($result);
        if ($row7['sum(qty)'] != NULL) {
                    
            $arr[] = $row7['sum(qty)'];
        }else{

            $arr[] = 0;
        }
      }else{
        $row7['sum(qty)'] = 0;
        $arr[] = $row7['sum(qty)'];
      } 

      $first_day_this_month = date('Y-08-01'); 
      $last_day_this_month  = date('Y-08-t');

      $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
      // echo $sql;
      // exit;
      $result = mysqli_query($conn, $sql);
      if($result) {
        $order_details8 = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    
    $data8=$order_details8; //associative array

    $simple_array8 = array(); //simple array

    if ($data8 != NULL) {
      foreach($data8 as $d)
      {
            $simple_array8[]=$d['order_id'];   
      }
      // var_dump($simple_array1);
      // exit;
      $ids = join("','",$simple_array8); 
      $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
      // echo $sql;
      // exit;
      $result = mysqli_query($conn, $sql);
      $row8 = mysqli_fetch_assoc($result);
      if ($row8['sum(qty)'] != NULL) {
                    
        $arr[] = $row8['sum(qty)'];
    }else{

        $arr[] = 0;
    }
    }else{
      $row8['sum(qty)'] = 0;
      $arr[] = $row8['sum(qty)'];
    }

    $first_day_this_month = date('Y-09-01'); 
    $last_day_this_month  = date('Y-09-t');

    $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
    // echo $sql;
    // exit;
    $result = mysqli_query($conn, $sql);
    if($result) {
      $order_details9 = mysqli_fetch_all($result,MYSQLI_ASSOC);
  }
  
  $data9=$order_details9; //associative array

  $simple_array9 = array(); //simple array

  if ($data9 != NULL) {
    foreach($data9 as $d)
    {
          $simple_array9[]=$d['order_id'];   
    }
    // var_dump($simple_array1);
    // exit;
    $ids = join("','",$simple_array2); 
    $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
    // echo $sql;
    // exit;
    $result = mysqli_query($conn, $sql);
    $row9 = mysqli_fetch_assoc($result);
    if ($row9['sum(qty)'] != NULL) {
                    
        $arr[] = $row9['sum(qty)'];
    }else{

        $arr[] = 0;
    }
  }else{
    $row9['sum(qty)'] = 0;
    $arr[] = $row9['sum(qty)'];
  }

  $first_day_this_month = date('Y-10-01'); 
  $last_day_this_month  = date('Y-10-t');

  $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
  // echo $sql;
  // exit;
  $result = mysqli_query($conn, $sql);
  if($result) {
    $order_details10 = mysqli_fetch_all($result,MYSQLI_ASSOC);
}

$data10=$order_details10; //associative array

$simple_array10 = array(); //simple array

if ($data10 != NULL) {
  foreach($data10 as $d)
  {
        $simple_array10[]=$d['order_id'];   
  }
  // var_dump($simple_array1);
  // exit;
  $ids = join("','",$simple_array10); 
  $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
  // echo $sql;
  // exit;
  $result = mysqli_query($conn, $sql);
  $row10 = mysqli_fetch_assoc($result);
  if ($row10['sum(qty)'] != NULL) {
                    
    $arr[] = $row10['sum(qty)'];
}else{

    $arr[] = 0;
}
}else{
  $row10['sum(qty)'] = 0;
  $arr[] = $row10['sum(qty)'];
}
$first_day_this_month = date('Y-11-01'); 
$last_day_this_month  = date('Y-11-t');

$sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
// echo $sql;
// exit;
$result = mysqli_query($conn, $sql);
if($result) {
  $order_details11 = mysqli_fetch_all($result,MYSQLI_ASSOC);
}

$data11 =$order_details11; //associative array

$simple_array11 = array(); //simple array

if ($data11 != NULL) {
foreach($data11 as $d)
{
      $simple_array11[]=$d['order_id'];   
}
// var_dump($simple_array1);
// exit;
$ids = join("','",$simple_array11); 
$sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
// echo $sql;
// exit;
$result = mysqli_query($conn, $sql);
$row11 = mysqli_fetch_assoc($result);
if ($row11['sum(qty)'] != NULL) {
                    
    $arr[] = $row11['sum(qty)'];
}else{

    $arr[] = 0;
}
}else{
$row11['sum(qty)'] = 0;
$arr[] = $row11['sum(qty)'];
}

$first_day_this_month = date('Y-12-01'); 
$last_day_this_month  = date('Y-12-t');

$sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$first_day_this_month}' AND '{$last_day_this_month}'";
// echo $sql;
// exit;
$result = mysqli_query($conn, $sql);
if($result) {
  $order_details12 = mysqli_fetch_all($result,MYSQLI_ASSOC);
}

$data12=$order_details12; //associative array

$simple_array12 = array(); //simple array

if ($data12 != NULL) {
foreach($data12 as $d)
{
      $simple_array12[]=$d['order_id'];   
}
// var_dump($simple_array1);
// exit;
$ids = join("','",$simple_array12); 
$sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$_GET['product_id']}'";
// echo $sql;
// exit;
$result = mysqli_query($conn, $sql);
$row12 = mysqli_fetch_assoc($result);
if ($row12['sum(qty)'] != NULL) {
                    
    $arr[] = $row12['sum(qty)'];
}else{

    $arr[] = 0;
}
}else{
$row12['sum(qty)'] = 0;
$arr[] = $row12['sum(qty)'];
}
            //   var_dump($arr);    
                
              
              ?>
<canvas id="myChart"></canvas>

            </div>
          </div>
        </div>
      </div>
      </div>

      <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var dataArray = [<?php echo join(',',$arr); ?>];
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'Octomber', 'November','December'],
        datasets: [{
            label: 'Product Details',
            backgroundColor: 'rgb(199, 0, 42)',
            borderColor: 'rgb(0, 0, 0)',
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