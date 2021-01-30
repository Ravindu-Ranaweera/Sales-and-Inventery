<?php require_once '../controller/stockControllers.php'; ?>
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
  <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form">
  <i class="fas fa-plus md-0"></i> ADD INVOICE
  </button>   -->
</div>


<!-- <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <div class="form-group">
            <label >Bill Amount (LKR)</label>
            <input type="text" name="bill" class="form-control" aria-describedby="emailHelp"  required>
          </div>
          <div class="form-group">
            <label >Special Note</label>
            <input type="text" name="note" class="form-control" aria-describedby="emailHelp"  required>
          </div>
          <div class="form-group">
            <input type="hidden" name="sk" class="form-control"  aria-describedby="emailHelp" value="<?php echo $_SESSION['id']; ?>" >
          </div>
          
          </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" name="addStock" class="btn btn-success">Add Stock Items</button>
        </div>
      </form>
    </div>
  </div>
</div> -->

<?php
                                

                                $sql = "SELECT * FROM  supply_item WHERE supply_id = {$_GET['sup_id']} ";
                                $return = mysqli_query($conn,$sql);
                                if($return) {
                                    $supitem_details = mysqli_fetch_all($return,MYSQLI_ASSOC);
                                }
                                // var_dump($supitem_details);
                                // exit;
                                
                            ?>
            </div>
            <!-- Light table -->
            <div id="page-wrap">
    
                <div class="table-responsive">
                  <table class="table align-items-center table-dark table-flush">
                    <tr class="text-center">
                        <th>Product Name</th> 
                        <th>Stock Quantity</th>
                        
                    </tr>
                      <tr>
                        <td>
                            <button type="button" id="hid">Hide</button>
                            <button type="button" id="sho">Show</button>
                            Accessories
                            
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Accessories"): //var_dump($value); ?>
                      <tr class="o">
                         
                            <?php foreach($supitem_details as $key=>$value1): //var_dump($value); ?>
                            <?php if($value['product_id'] == $value1['product_id']): //var_dump($value); ?>
                                <td class="">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                      </td>
                            <td class="text-center"><?php echo $value1['qty']; ?></td>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      <tr>
                        <td>
                            <button id="hide">Hide</button>
                            <button id="show">Show</button>
                            Gang Switches
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Gang Switches"): //var_dump($value); ?>
                      <tr class="odd">
                      
                      <?php foreach($supitem_details as $key=>$value1): //var_dump($value); ?>
                            <?php if($value['product_id'] == $value1['product_id']): //var_dump($value); ?>
                                <td class="">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                      </td>
                            <td class="text-center"><?php echo $value1['qty']; ?></td>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>

                      <tr>
                      <td>
                          <button id="hide">Hide</button>
                          <button id="show">Show</button> 
                          Other switches
                      </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Other switches"): //var_dump($value); ?>
                      <tr class="odd">
                      
                      <?php foreach($supitem_details as $key=>$value1): //var_dump($value); ?>
                            <?php if($value['product_id'] == $value1['product_id']): //var_dump($value); ?>
                                <td class="">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                      </td>
                            <td class="text-center"><?php echo $value1['qty']; ?></td>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      
                      <tr>
                        <td>
                            <button id="hide">Hide</button>
                            <button id="show">Show</button>
                            Sockets
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Sockets"): //var_dump($value); ?>
                      <tr class="odd">
                      
                        <?php foreach($supitem_details as $key=>$value1): //var_dump($value); ?>
                            <?php if($value['product_id'] == $value1['product_id']): //var_dump($value); ?>
                                <td class="">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                      </td>
                            <td class="text-center"><?php echo $value1['qty']; ?></td>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                      
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>

                            <tr>
                        <td>
                        <button id="hide">Hide</button>
                            <button id="show">Show</button>
                            Switch Gears
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Switch Gears"): //var_dump($value); ?>
                      <tr class="odd">
                      
                        <?php foreach($supitem_details as $key=>$value1): //var_dump($value); ?>
                            <?php if($value['product_id'] == $value1['product_id']): //var_dump($value); ?>
                                <td class="">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                        
                          <img alt="Image placeholder" src=" <?php echo $value['image_path'];  ?>">
                        </a>
                        <div class="media-body">
                          <span class="name mb-0 text-sm"> <?php echo $value['product_name']; ?></span>
                        </div>
                      </div>
                      </td>
                            <td class="text-center"><?php echo $value1['qty']; ?></td>
                          
                          <?php endif; ?>
                          <?php endforeach; ?>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      
                      
                      
                  </table>
                </div>
      

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