<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/shopControllers.php'; ?>
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
                <?php if ($_SESSION['usertype'] == '1'):  ?>
                  <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form">
                    <i class="fas fa-plus md-0"></i> EDIT SHOP
                  </button> 
                  <?php endif;  ?>
                
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
                <div>
                  <form action="shopProfile.php" method="post">
                    <input type="hidden" name="shop_id" value="<?php echo $_GET['shop_id'];  ?>">
                    <input type="hidden" name="ref_id" value="<?php echo $_SESSION['id'];  ?>">
                    <input type="hidden" name="date" value=" <?php date_default_timezone_set("Asia/Kolkata"); echo date("Y-m-d");  ?>">
                    <input type="hidden" name="time" value=" <?php date_default_timezone_set("Asia/Kolkata"); echo date("h:i:s");  ?>">
                    <button type="submit" name="selectOrder" class="btn btn-dark" onclick="return confirm('Are you sure you want to Create new Order?');">
                <i class="fas fa-plus md-0"></i> ADD NEW ORDER
                </button> 
                  </form>
                </div>
                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Shop</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <?php foreach($shop_details as $key=>$value): //var_dump($value); ?>
                     <?php if($_GET['shop_id'] == $value['shop_id']):?>
                      <form method="post">
                      <input type="hidden" name="shopid" class="form-control" value="<?php echo $value['shop_id']; ?>" \>
                        <div class="modal-body">
                          <div class="form-group">
                            <label >Shop Name</label>
                            <input type="text" name="shopName" class="form-control" value="<?php echo $value['shop_name']; ?>"  aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label >Owner Name</label>
                            <input type="text" name="ownerName" class="form-control"  value="<?php echo $value['owner_name']; ?>" aria-describedby="emailHelp"required >
                          </div>
                          <div class="form-group">
                            <label >Contact Number</label>
                            <input type="num" name="contact" class="form-control" value="<?php echo $value['shop_contact']; ?>"  aria-describedby="emailHelp" required>
                          </div>
                          <div class="form-group">
                            <label >Address Line 1</label>
                            <input type="text" name="address1" class="form-control" value="<?php echo $value['shop_address']; ?>" aria-describedby="emailHelp" required>
                          </div>
                          <div class="modal-footer border-top-0 d-flex justify-content-center">
                            <button type="submit" name="editShop" class="btn btn-success">Submit</button>
                          </div>
                      </form>
                      <?php endif; ?>
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
                 
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
                    <th scope="col" class="sort" data-sort="view">View Order</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class=" list">
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php if($_GET['shop_id'] == $value['shop_id']):?>
                <form action="shopProfile.php?shop_id=<?php echo $value['shop_id'];?>" method="post">
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
                    <!-- <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>
                        <span class="status">pending</span>
                      </span>
                    </td> -->
                    <td class="">
                      <button type="submit" name="orderItemDel" class="btn btn-labeled btn-danger" onclick="return confirm('Are you sure you want to delete this Order?');">
                            <span class="btn-label"><i class="fa fa-trash"></i></span> Delete
                      </button>
                      <a href="shopOrderView.php?order_id=<?php echo $value['order_id'];?>&shop_id=<?php echo $_GET['shop_id'];  ?>" type="button" class="btn btn-labeled btn-success">
                            <span class="btn-label"><i class="fa fa-eye"></i></span> View
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