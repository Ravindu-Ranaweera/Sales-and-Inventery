<?php require_once '../controller/productControllers.php'; ?>
<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/stockControllers.php'; ?>

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
              <h6 class="h2 text-white d-inline-block mb-0">Daily Stock</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Daily Stock</li>
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
                  <form action="" method="post">
                    <input type="hidden" name="date" value=" <?php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d");  ?>">
                    <button type="submit" name="selectLoad" class="btn btn-dark" onclick="return confirm('Are you sure you want to add new load?');">
                      <i class="fas fa-plus md-0"></i> ADD TODAY LOADINGS
                    </button> 
                  </form>

                  
              </div>
              
            </div>
            <div class="card-body">
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark white-text pt-5">
                  <tr class="pt-5">
                    <th scope="col" class="sort" data-sort="name">Date</th>
                    <th scope="col" data-sort="modify">Unload States</th>
                    <th scope="col" data-sort="modify">Summery</th>
                  </tr>
                </thead>
                <tbody class="list">  
                <?php foreach($loading_details as $key=>$value): //var_dump($value); ?>
                  <tr>
                    
                    <td class="category">
                    <?php echo $value['load_date']; ?>
                    </td>
                    <td class="">
                    <?php if($value['is_unload'] == '0'): ?>
                        <a  href="dailyunloading.php?load_id=<?php echo $value['load_id']; ?>" class="btn btn-labeled btn-success">
                          <span class="btn-label"><i class="fa fa-pen"></i></span> Unload
                        </a>
                        <?php else: ?>
                          <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">Unloaded</span>
                      </span>
                        <?php endif; ?>
                    </td>
                    <td>
                    <?php if($value['is_unload'] == '1'): ?>
                    <a  href="loadingSummery.php?load_id=<?php echo $value['load_id']; ?>" class="btn btn-labeled btn-warning">
                          <span class="btn-label"><i class="fa fa-file"></i></span> Summery
                        </a>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
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
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>