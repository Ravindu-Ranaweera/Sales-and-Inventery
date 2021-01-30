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
              date_default_timezone_set("Asia/Kolkata"); 
              $Due = date("Y-m-d");
              $pre = $_GET['date'];
                $sql = "SELECT order_id FROM place_order WHERE order_date BETWEEN '{$pre}' AND '{$Due}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                if($result) {
                  $order_details = mysqli_fetch_all($result,MYSQLI_ASSOC);
              }
              
              $data=$order_details; //associative array

              $simple_array = array(); //simple array
        
              foreach($data as $d)
              {
                    $simple_array[]=$d['order_id'];   
              }
              // var_dump($simple_array);
              // exit;
              $ids = join("','",$simple_array); 
                
              
              ?>
<div id="page-wrap">
    
    <div class="table-responsive">
      <table class="table align-items-center table-dark table-flush">
        <tr>
            <th>Product Name</th> 
            <th>Sell Quantity</th>
            <th>Profit</th>
            
        </tr>
          <tr>
            <td>
                <button type="button" id="hid">Hide</button>
                <button type="button" id="sho">Show</button>
                Accessories
                
            </td>
          </tr>
          
          <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
          <?php if($value['product_catogery'] == "Accessories"): //var_dump($value); ?>
          <tr class="o">
              <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
              <td class="text-center">
                <?php $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(qty)']; 
              ?>
              </td>
              <td>
              <?php 

                 $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(profit)'];
              ?>
              </td>
          </tr>
                <?php endif; ?>
                <?php endforeach; ?>
          <tr>
            <td>
                <button id="hide">Hide</button>
                <button id="show">Show</button>
                Gang Switches
            </td>
          </tr>
          
          <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
          <?php if($value['product_catogery'] == "Gang Switches"): //var_dump($value); ?>
          <tr class="odd">
          <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
          <td class="text-center">
                <?php $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(qty)']; 
              ?>
              </td>
              <td>
              <?php 

                 $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(profit)'];
              ?>
              </td>
          </tr>
                <?php endif; ?>
                <?php endforeach; ?>

          <tr>
          <td>
              <button id="hide">Hide</button>
              <button id="show">Show</button> 
              Other switches
          </td>
          </tr>
          <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
          <?php if($value['product_catogery'] == "Other switches"): //var_dump($value); ?>
          <tr class="odd">
          <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
          <td class="text-center">
                <?php $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(qty)']; 
              ?>
              </td>
              <td>
              <?php 

                 $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(profit)'];
              ?>
              </td>
          </tr>
                <?php endif; ?>
                <?php endforeach; ?>
          
          <tr>
            <td>
                <button id="hide">Hide</button>
                <button id="show">Show</button>
                Sockets
            </td>
          </tr>
          <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
          <?php if($value['product_catogery'] == "Sockets"): //var_dump($value); ?>
          <tr class="odd">
          <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
          <td class="text-center">
                <?php $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(qty)']; 
              ?>
              </td>
              <td>
              <?php 

                 $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(profit)'];
              ?>
              </td>
          </tr>
                <?php endif; ?>
                <?php endforeach; ?>

                <tr>
            <td>
            <button id="hide">Hide</button>
                <button id="show">Show</button>
                Switch Gears
            </td>
          </tr>
          <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
          <?php if($value['product_catogery'] == "Switch Gears"): //var_dump($value); ?>
          <tr class="odd">
          <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
          <td class="text-center">
                <?php $sql = "SELECT sum(qty) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(qty)']; 
              ?>
              </td>
              <td>
              <?php 

                 $sql = "SELECT sum(profit) FROM order_item WHERE order_id in ('$ids') And product_id= '{$value['product_id']}'";
                // echo $sql;
                // exit;
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                // echo '<pre>' , var_dump($list_details) , '</pre>';
                echo $row['sum(profit)'];
              ?>
              </td>
          </tr>
                <?php endif; ?>
                <?php endforeach; ?>
          
          
          
      </table>
    </div>


  </div>

            </div>
          </div>
        </div>
      </div>
      </div>

  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>