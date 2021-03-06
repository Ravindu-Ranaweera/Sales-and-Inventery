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
                <i class="fas fa-plus md-0"></i> ADD NEW PAYMENT
                </button>  
              </div>

<!-- <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
        <div class="modal-body">
          <div class="form-group">
            <label for="email1">Product Name</label>
            <input type="email" class="form-control" id="email1" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Product Category</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option>Select</option>
              <option>Gang Switches</option>
              <option>Sockets</option>
              <option>Switch Gears</option>
              <option>Accessories</option>
              <option>Other switches</option>
            </select>
          </div>
          <div class="form-group">
            <label for="password1">Unit Price</label>
            <input type="password" class="form-control" id="password1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="password1">Description</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirm Password">
          </div>
          <div class="form-group">
            <label class="form-label" for="customFile">Product Image</label>
            <input type="file" class="form-control" id="customFile" />
          </div>
        </div>
        
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark white-text pt-5">
                  <tr class="pt-5">
                    <th scope="col" class="sort" data-sort="name">Invoice Num</th>
                    <th scope="col" class="sort" data-sort="category">Shop Name</th>
                    <th scope="col" class="sort" data-sort="price">Ref Name</th>
                    <th scope="col" data-sort="decs">Total Ammount</th>
                    <th scope="col" data-sort="modify">Payment Method</th>
                    <th scope="col" data-sort="modify">Recived Amount</th>
                    <th scope="col" data-sort="modify">Pending Amount</th>
                    <th scope="col" data-sort="modify">Print Bill</th>
                  </tr>
                </thead>
                <tbody class="list">  
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> A001</span>
                        </div>
                      </div>
                    </th>
                    <td class="category">
                    Janahitha Traders
                    </td>
                    <td class="category">
                    Pasan Bandara
                    </td>
                    <td class="price">
                    LKR 5737.60
                    </td>
                    <td>
                    Cash
                    </td>
                    <td class="">
                        LKR 5000.00
                    </td>
                    <td class="">
                        LKR 737.60
                    </td>
                    <td class="">
                    <a href="bill.php" type="button" class="btn btn-labeled btn-danger">
                          <span class="btn-label"><i class="fa fa-print"></i></span> Print
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>