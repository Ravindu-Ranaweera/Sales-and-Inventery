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
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <?php include('sidebar.php'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
            <div class="form-group mb-0">
              <div class="input-group input-group-alternative input-group-merge">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
              </div>
            </div>
            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Ravindu</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
          <div class="card  shadow">
            <!-- Card header -->
            <div class="card-header  border-0 ">
              <div class="container">
              <section class="mb-5">

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
          <button type="submit" name ="addProduct" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

              <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
              <?php if($value['product_id']== $_GET['product_id']): //var_dump($value); ?>
                                <div class="row">
                                  <div class="col-md-6 mb-4 mb-md-0">

                                    <div id="mdb-lightbox-ui"></div>

                                    <div class="mdb-lightbox">

                                      <div class="row product-gallery mx-1">

                                        <div class="col-12 mb-0">
                                          <figure class="view overlay rounded z-depth-1 main-img">
                                            
                                              <img src=" <?php echo $value['image_path'].'/'.$value['product_catogery'].'/'.$value['product_name'].'.png';  ?>"
                                                class="img-fluid z-depth-1">
                                            
                                          </figure>
                                          
                                        </div>
                                      </div>

                                    </div>

                                  </div>
                                  <div class="col-md-6">

                                    <h2><strong><?php echo $value['product_name']; ?></strong></h2>
                                    <p class="pt-1"><?php echo $value['product_des']; ?>.</p>
                                    <div class="table-responsive">
                                      <table class="table table-sm table-borderless mb-0">
                                        <tbody>
                                          <tr>
                                            <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                                            <td><?php echo $value['product_catogery']; ?></td>
                                          </tr>
                                          <tr>
                                            <th class="pl-0 w-25" scope="row"><strong>Billing Unit Price</strong></th>
                                            <td><?php echo $value['bill_unit_price']; ?> LKR</td>
                                          </tr>
                                          <tr>
                                            <th class="pl-0 w-25" scope="row"><strong>Selling Unit Price</strong></th>
                                            <td> <?php echo $value['sell_unit_price']; ?> LKR</td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-primary btn-md mr-1 mb-2" data-toggle="modal" data-target="#form">Update</button>
                                    <button type="button" class="btn btn-danger btn-md mr-1 mb-2">Delete</button>
                                  </div>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                  </section>
 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script>
  $(document).ready(function () {
  // MDB Lightbox Init
  $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  });
});
  </script>
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>