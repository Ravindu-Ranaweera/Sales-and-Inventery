<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/shopControllers.php'; ?>
<?php require_once '../controller/returnControllers.php'; ?>
<?php require_once '../controller/orderControllers.php'; ?>
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
        
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                <div>
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
                    <th scope="col" class="sort" data-sort="name">Sales Ref</th>
                    <th scope="col" class="sort" data-sort="date">Order Date</th>
                    <th scope="col" class="sort" data-sort="budget">Order Value</th>
                    <th scope="col" class="sort" data-sort="budget">Paid Value</th>
                    <th scope="col" class="sort" data-sort="budget">Return Value</th>
                    <th scope="col" class="sort" data-sort="budget">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class=" list">
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php if($_GET['shop_id'] == $value['shop_id']):?>
                <input type="hidden" name="id" value="<?php echo $value['order_id'];?>">
                <input type="hidden" name="shopid" value="<?php echo $value['shop_id'];?>">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <div class="media-body">
                          <span class="name mb-0 text-sm">
                          <?php 
                            $padded_id = str_pad($value['order_id'], 4, '0',STR_PAD_LEFT);
                            echo $padded_id;
                          ?>
                          </span>
                        </div>
                      </div>
                    </th>
                    <td class="date">
                      <?php echo $value['order_date'];?>
                    </td>
                    <td class="date">
                      <?php 
                      $sql = "SELECT * FROM user_login WHERE user_id= '{$value['ref_id']}' ";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);
                      echo $row['user_name'];?>
                    </td>
                    <td class="budget">
                    <?php echo $value['total_amount'];?> LKR
                    </td>
                    <td class="budget">
                    <?php echo $value['paid_amount'];?> LKR
                    </td>

                    <td class="budget">
                    <?php
                                        
                                $sql = "SELECT * FROM  return_product WHERE order_id = {$value['order_id']} LIMIT 1";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                if ( $row != NULL) {
                                  echo $row['return_value'];
                                }else{
                                  echo "0.00";
                                  $row['return_value']=0.00;
                                }

                               
                                
                            ?> LKR
                    </td>
                    
                    <td>
                    <?php if (($value['paid_amount']+$row['return_value']) == $value['total_amount']):?> 
                      <span class="badge badge-dot mr-4">
                        <i class="bg-success"></i>
                        <span class="status">Complete</span>
                      </span>
                      <?php else:?>
                        <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                      <?php endif;?>
                    </td>
                    <td class="">
                    <?php if (($value['paid_amount']+$row['return_value']) != $value['total_amount']):?>
                        <a  href="paymentBill.php?order_id=<?php echo $value['order_id'];?>" class="btn btn-labeled btn-danger">
                            <span class="btn-label"><i class="fa fa-trash"></i></span> Pay
                        </a>
                      </span>
                      <?php endif;?>
                      
                    </td>
                  </tr>
                  <?php endif; ?>
            <?php endforeach; ?>
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