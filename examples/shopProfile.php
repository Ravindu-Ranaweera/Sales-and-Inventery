<?php require_once '../controller/shopControllers.php'; ?>
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
    
    <!-- Header -->
    <div class="header pb-1 d-flex align-items-center" style="min-height: 250px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-5"></span>
      <!-- Header container -->
      
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6 ">
      <div class="row">
        <div class="col-xl-3 order-xl-2">
          <div class="card card-profile">
            <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/shop.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
          
            <?php foreach($shop_details as $key=>$value): //var_dump($value); ?>
            <?php if($_GET['shop_id'] == $value['shop_id']):?>

            <div class="card-body pt-0">
              
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">  
                   
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h2 class="h2"><?php echo $value['shop_name']; ?>
                </h2>
                <div class="h5 font-weight-300">
                  <i class="fa fa-user mr-2"></i></i><?php echo $value['owner_name']; ?>
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i><?php echo $value['shop_address']; ?>
                </div>
                <div>
                  <i class="fa fa-phone mr-2"></i> <?php echo $value['shop_contact']; ?>
                </div>
                <div class="mt-3">
                <a href="#!" class="bg-default btn ">Edit Shop</a>
                </div>
                
              </div>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="col-xl-9 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Order History</h3>
                </div>
                <div class="col-4 text-right">
                  
                </div>
              </div>
            </div>
          </div>
          
          <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Order id</th>
                    <th scope="col" class="sort" data-sort="date">Order Date</th>
                    <th scope="col" class="sort" data-sort="budget">Order Value</th>
                    <th scope="col" class="sort" data-sort="status">Payment </th>
                    <th scope="col" class="sort" data-sort="view">View Order</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class=" list">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">A0012</span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo date(" jS \of F Y ");?>
                    </td>
                    <td class="budget">
                      2500 LKR
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-eye"></i>View
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">A0012</span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo date(" jS \of F Y ");?>
                    </td>
                    <td class="budget">
                      2500 LKR
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-eye"></i>View
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">A0012</span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo date(" jS \of F Y ");?>
                    </td>
                    <td class="budget">
                      2500 LKR
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-eye"></i>View
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">A0012</span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo date(" jS \of F Y ");?>
                    </td>
                    <td class="budget">
                      2500 LKR
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-eye"></i>View
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">
                    <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">A0012</span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo date(" jS \of F Y ");?>
                    </td>
                    <td class="budget">
                      2500 LKR
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td>
                    <td class="text-right">
                        <a class="btn btn-sm btn-icon-only " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-eye"></i>View
                        </a>
                    </td>
                  </tr>
                </tbody>
              </table>
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