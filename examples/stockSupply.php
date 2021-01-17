<?php require_once '../controller/productControllers.php'; ?>
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
              <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 ">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card bg-default shadow">
            <!-- Card header -->
            <div class="card-header  border-0 ">
              <div class="container">

              <h3 class="mb-0">Ordered Item List</h3> 
</div>

            </div>


<?php 
require '../config/db.php';
$sql = "SELECT * FROM order_item where order_id = {$_GET['order_id']} ";
// echo $sql;
// exit;
$order = mysqli_query($conn,$sql);
if($order) {
    $order_details = mysqli_fetch_all($order,MYSQLI_ASSOC);
    // var_dump($order_details);
    // exit;
}
else {
    echo "Database Query Failed";
} 


?>


            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark white-text pt-5">
                  <tr class="pt-5">
                    <th scope="col" class="sort" data-sort="name">Product name</th>
                    <th scope="col" class="sort" data-sort="category">Category</th>
                    <th scope="col" class="sort" data-sort="price">Unit Price</th>
                    <th scope="col" data-sort="decs">Quntity</th>
                    <th scope="col" data-sort="decs">Sub Total</th>
                    <!-- <th scope="col" data-sort="modify">Product Modyfy</th> -->
                  </tr>
                </thead>
                <tbody class="list">  
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php foreach($product_details as $key2=>$value2): //var_dump($value); ?>
                <?php if($value['product_id'] == $value2['product_id'] ): //var_dump($value); ?>
                <form action="shopOrderView.php?order_id=<?php echo $value['order_id']; ?>" method="post">
                <input type="hidden" name="rowId" value=" <?php echo $value['id']; ?>">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value2['image_path'].'/'.$value2['product_catogery'].'/'.$value2['product_name'].'.png';  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value2['product_name']; ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="category">
                    <?php echo $value2['product_catogery']; ?>
                    </td>
                    <td class="price">
                    <?php echo $value2['unit_price']; ?> LKR
                    </td>
                    <td>
                    <?php echo $value['qty']; ?> 
                    </td>
                    <td>
                    <?php $sub = $value['qty'] *$value2['unit_price']; echo $sub; ?> LKR
                    </td>
                    <!-- <td class="">
                        <button type="button" class="btn btn-labeled btn-success">
                          <span class="btn-label"><i class="fa fa-pen"></i></span> Update
                        </button>
                        <button type="submit" name="orderItemDel" class="btn btn-labeled btn-danger">
                          <span class="btn-label"><i class="fa fa-trash"></i></span> Delete
                        </button>
                    </td> -->
                  </tr>
                  </form>
                  <?php endif; ?>
                  <?php endforeach; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
      <!-- Footer -->
     
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>