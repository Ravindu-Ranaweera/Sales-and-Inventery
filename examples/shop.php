<?php require_once '../controller/shopControllers.php'; ?>
<?php require_once '../controller/orderControllers.php'; ?>
<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
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
              <h6 class="h2 text-white d-inline-block mb-0">Shops</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Shops</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6 ph-3">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
            <?php if ($_SESSION['usertype'] == '1'):  ?>
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form">
                  <i class="fas fa-plus md-0"></i> ADD NEW SHOP
                </button> 
                <?php endif;  ?>
                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                      <h5 class="modal-title" id="exampleModalLabel">Add New Shop</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <form method="post">
                        <div class="modal-body">
                          <div class="form-group">
                            <label >Shop Name</label>
                            <input type="text" name="shopName" class="form-control"  aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label >Owner Name</label>
                            <input type="text" name="ownerName" class="form-control"  aria-describedby="emailHelp"required >
                          </div>
                          <div class="form-group">
                            <label >Contact Number</label>
                            <input type="num" name="contact" class="form-control"  aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label >Address Line 1</label>
                            <input type="text" name="address1" class="form-control"  aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label >Address Line 2</label>
                            <input type="text" name="address2" class="form-control" aria-describedby="emailHelp" >
                          </div>
                          <div class="form-group">
                            <label >City</label>
                            <input type="text" name="city" class="form-control"  aria-describedby="emailHelp" required>
                          </div>
                          
                          
                        
                          <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" name="addShop" class="btn btn-success">Submit</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>


              
            </div>
            <div class="card-body">
              <div class="row ph-5">
                <?php foreach($shop_details as $key=>$value): //var_dump($value); ?>
                <?php if($value['shop_isdelete']=='0'): //var_dump($value); ?>
                
                
                <div class=" col-xl-3 col-md-6">
                    <div class="bg-dark card card-stats">
                      <!-- Card body -->
                      <form action="shop.php" method="post">
                      <input type="hidden" name="shopid" value="<?php echo $value['shop_id']; ?>">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <a href="shopProfile.php?shop_id=<?php echo $value['shop_id']; ?>"><h3 class="card-title text-uppercase text-muted mb-0"><?php echo $value['shop_name']; ?></h3></a>
                            
                          </div>
                          <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                              <i class="ni ni-shop"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                          <span class="text-success mr-2"><i class="fa fa-user"></i> <?php echo $value['owner_name']; ?></span>
                          <br>
                          <span class="text-nowrap"><i class="fa fa-phone"></i> <?php echo $value['shop_contact']; ?></span>
                        </p>
                        <?php if ($_SESSION['usertype'] == '1'):  ?>
                        <button type="submit" name="shopDel" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Shop?');">
                            <span class="btn-label"><i class="fa fa-trash"></i></span> Delete
                       </button>
                       <?php endif;  ?>
                      </div>
                      </form>
                    </div>
                
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            
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