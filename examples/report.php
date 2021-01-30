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


    <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label >Select Previous Date</label>
                <input type="date" class="form-control" name="previousDate" aria-describedby="emailHelp" >
              </div>
            </div>
            
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" name ="findFin" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="form1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" >
            <div class="modal-body">
              <div class="form-group">
                <label >Select Previous Date</label>
                <input type="date" class="form-control" name="previousDate" aria-describedby="emailHelp" required>
              </div>
            </div>
            
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" name ="findSale" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="form0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" >
            <div class="modal-body">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Product Item</label>
            <select class="form-control" name="item">
              <option value="" >Select</option>
              <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
              <?php echo "<option value=".$value['product_id']. " >".$value['product_name']."</option>;"; ?>
              
              <?php endforeach; ?>
            </select>
          </div>
            </div>
            
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" name ="findProduct" class="btn btn-success">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="form2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header border-bottom-0">
            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="post" >
            <div class="modal-body">
            <div class="form-group">
            <label for="exampleFormControlSelect1">Shop Name</label>
            <select class="form-control" name="item">
              <option value="" >Select</option>
              <?php foreach($shop_details as $key=>$value): //var_dump($value); ?>
              <?php if($value['shop_isdelete'] == 0  ): //var_dump($value); ?>
              <?php echo "<option value=".$value['shop_id']. " >".$value['shop_name']."</option>;"; ?>
              
              <?php endif; ?>
              <?php endforeach; ?>
            </select>
          </div>
            </div>
            
            <div class="modal-footer border-top-0 d-flex justify-content-center">
              <button type="submit" name ="findShop" class="btn btn-success">Submit</button>
            </div>
          </form>
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
              <div class="row icon-examples">
                <div class="card col-lg-6 col-md-12 ">
                  <h2  href="supplyStock.php" class="h2 border border-primary rounded p-3 text-center" ><i class="fas fa-file-pdf text-danger"></i> Product Sales Report</h2>
                  <button type="button" class="btn btn-labeled btn-success" data-toggle="modal" data-target="#form1">
                      <span class="btn-label"><i class="fas fa-cog"></i></i></span> Genarate Report
                  </button>
                </div>
                <div class="card col-lg-6 col-md-12 ">
                  <h2  href="supplyStock.php" class="h2 border border-primary rounded p-3 text-center" ><i class="fas fa-file-pdf text-danger"></i> Product item Report</h2>
                  <button type="button" class="btn btn-labeled btn-success" data-toggle="modal" data-target="#form0">
                      <span class="btn-label"><i class="fas fa-cog"></i></i></span> Genarate Report
                  </button>
                </div>
                <div class="card col-lg-6 col-md-12">
                  <h2  href="dailyStock.php" class="h2 border border-primary rounded p-3 text-center" ><i class="fas fa-file-pdf text-danger"></i> Financial Report </h2>
                  <button type="button" class="btn btn-labeled btn-success" data-toggle="modal" data-target="#form">
                      <span class="btn-label"><i class="fas fa-cog"></i></span> Genarate Report
                  </button>
                  
              </div>
              <div class="card col-lg-6 col-md-12">
                  <h2  href="dailyStock.php" class="h2 border border-primary rounded p-3 text-center" ><i class="fas fa-file-pdf text-danger"></i> Shop Report </h2>
                  <button type="button" class="btn btn-labeled btn-success" data-toggle="modal" data-target="#form2">
                      <span class="btn-label"><i class="fas fa-cog"></i></span> Genarate Report
                  </button>
                  
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