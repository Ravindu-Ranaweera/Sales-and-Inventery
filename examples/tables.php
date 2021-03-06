<?php require_once '../controller/productControllers.php'; ?>
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
  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form">
  <i class="fas fa-plus md-0"></i> ADD PRODUCT
  </button>  
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
            <label >Product Name</label>
            <input type="text" class="form-control" name="product_name" aria-describedby="emailHelp" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Product Category</label>
            <select class="form-control" name="cat">
              <option value="" >Select</option>
              <option value="Gang Switches">Gang Switches</option>
              <option value="Sockets">Sockets</option>
              <option value="Switch Gears">Switch Gears</option>
              <option value="Accessories">Accessories</option>
              <option value="Other switches">Other switches</option>
            </select>
          </div>
          <div class="form-group">
            <label >Unit Selling Price</label>
            <input type="text" class="form-control" name="price" >
          </div>
          <div class="form-group">
            <label >Description</label>
            <input type="text" class="form-control" name="desc" >
          </div>
          <div class="form-group">
            <label >Product Image</label>
            <input type="file" class="form-control" name="file" />
          </div>
        </div>
        
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" name ="addProduct" class="btn btn-success" onclick="return confirm('Are you sure you want to add this item?');">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>


            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark white-text pt-5">
                  <tr class="pt-5">
                    <th scope="col" class="sort" data-sort="name">Product name</th>
                    <th scope="col" class="sort" data-sort="category">Category</th>
                    <th scope="col" class="sort" data-sort="price">Bill Unit Price</th>
                    <th scope="col" class="sort" data-sort="price">Sell Unit Price</th>
                    <th scope="col" data-sort="modify">Product Modyfy</th>
                  </tr>
                </thead>
                <tbody class="list">  
                <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                <?php if($value['is_delete'] != '1'): //var_dump($value); ?>
                <form action="" method="post">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                    </th>
                    <td class="category">
                    <?php echo $value['product_catogery']; ?>
                    </td>
                    <td class="price">
                    <?php echo $value['bill_unit_price']; ?> LKR
                    </td>
                    <td class="price">
                    <?php echo $value['sell_unit_price']; ?> LKR
                    </td>
                    <td class="">
                        <a href="productView.php?product_id=<?php echo $value['product_id']; ?>" class="btn btn-labeled btn-success" >
                          <span class="btn-label"></span>View
                        </a>
                    </td>
                  </tr>
                  </form>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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