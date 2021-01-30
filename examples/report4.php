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
              $sql = "SELECT sum(total_amount) FROM place_order WHERE order_date BETWEEN '{$pre}' AND '{$Due}'";
              // echo $sql;
              // exit;
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);

              $sql = "SELECT sum(billing_price) FROM supplier_stock WHERE recived_date BETWEEN '{$pre}' AND '{$Due}'";
                echo $sql;
                exit;
              $result = mysqli_query($conn, $sql);
              $row1 = mysqli_fetch_assoc($result);
              ?>

<div id="page-wrap">
    
    <div class="table-responsive">
      <table class="table align-items-center table-dark table-flush">
        <tr>
            <th>#Title</th> 
            <th>Amount</th>
            
        </tr>

        <tr>
          <td>Item Purches Value </td>
          <td>
          <?php  echo $row1['sum(billing_price)']; ?>
          </td>
        </tr>

        <tr>
          <td>Complete Order Value </td>
          <td>
          <?php  echo $row['sum(total_amount)']; ?>
          </td>
        </tr>

        <tr>
          <td>Recied Order Value </td>
          <td>
          
          </td>
        </tr>

        <tr>
          <td>Return Item Value </td>
          <td>
          
          </td>
        </tr>
          
        <tr>
          <td>Valuation Profit </td>
          <td>
          
          </td>
        </tr>
          
          
          
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