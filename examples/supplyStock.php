<?php require_once '../controller/stockControllers.php'; ?>
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
              <h6 class="h2 text-white d-inline-block mb-0">Stock Manage</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Stock</li>
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
  <i class="fas fa-plus md-0"></i> ADD INVOICE
  </button>  
</div>


<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add New Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body">
          <div class="form-group">
            <label >Invoice No</label>
            <input type="text" name="invoice" class="form-control"  aria-describedby="emailHelp" required >
          </div>
          <div class="form-group">
            <label >Recived Date</label>
            <input type="date" name="rdate" class="form-control"  aria-describedby="emailHelp"  required>
          </div>
          <!-- <div class="form-group">
            <label >Bill Amount (LKR)</label>
            <input type="text" name="bill" class="form-control" aria-describedby="emailHelp"  required>
          </div> -->
          <div class="form-group">
            <label >Special Note</label>
            <input type="text" name="note" class="form-control" aria-describedby="emailHelp"  required>
          </div>
          <div class="form-group">
            <input type="hidden" name="sk" class="form-control"  aria-describedby="emailHelp" value="<?php echo $_SESSION['id']; ?>" >
          </div>
          
          </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" name="addStock" class="btn btn-success" onclick="return confirm('Are you sure you want to add this stock?');">Add Stock Items</button>
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
                    <th scope="col" class="sort" data-sort="name">Invoice No</th>
                    <th scope="col" class="sort" data-sort="price">Recived Date</th>
                    <th scope="col" data-sort="modify">Billing Price</th>
                    <th scope="col" data-sort="decs">Store Keeper</th>
                    <th scope="col" data-sort="modify">Special Note</th>
                    <th scope="col" data-sort="modify">Modify</th>
                  </tr>
                </thead>
                <tbody class="list">  
                
                <?php foreach($supplier_stock_details as $key=>$value): //var_dump($value); ?>
                  <form action="" method="post">
                <input type="hidden" name="stock_id" value="<?php echo $value['stock_id']; ?>">
                  <tr>
                    <th scope="row">
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['invoice_no']; ?></span>
                        </div>
                    </th>
                    <td class="price">
                    <?php echo $value['recived_date']; ?>
                    <td>
                    <?php echo $value['billing_price']; ?> LKR
                    </td>
                    <td>
                    <?php
                     $sql = "SELECT * FROM user_login WHERE user_id ={$value['stock_keeper']}  LIMIT 1";
                     $sk = mysqli_query($conn,$sql);
                     if($sk) {
                         $sk_details = mysqli_fetch_assoc($sk);
                     }
                     else {
                         echo "Database Query Failed";
                     } 
                     echo $sk_details['user_name']; ?> 
                    </td>
                    <td>
                    <?php echo $value['special_note']; ?> 
                    </td>
                    <td class="">
                        <a href="viewStock.php?sup_id=<?php echo $value['stock_id']; ?>" class="btn btn-labeled btn-success">
                          <span class="btn-label"><i class="fa fa-eye"></i> View</span>
                        </a>
                        <button type="submit" name="deleteOrder" class="btn btn-labeled btn-danger" onclick="return confirm('Are you sure you want to delete this stock record?');"> 
                          <span class="btn-label"><i class="fa fa-trash"></i></span>
                        </button>
                    </td>
                  </tr>
                  </form>
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