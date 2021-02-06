<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
require_once '../controller/productControllers.php'; 
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
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
<script>
  $(document).ready(function(){
    $("#hideAccessories").click(function(){
      $(".Accessories").hide();
    });
    $("#showAccessories").click(function(){
      $(".Accessories").show();
    });
  });

  $(document).ready(function(){
    $("#hideGangSwitches").click(function(){
      $(".GangSwitches").hide();
    });
    $("#showGangSwitches").click(function(){
      $(".GangSwitches").show();
    });
  });

  $(document).ready(function(){
    $("#hideOtherswitches").click(function(){
      $(".Otherswitches").hide();
    });
    $("#showOtherswitches").click(function(){
      $(".Otherswitches").show();
    });
  });

  $(document).ready(function(){
    $("#hideSockets").click(function(){
      $(".Sockets").hide();
    });
    $("#showSockets").click(function(){
      $(".Sockets").show();
    });
  });

  $(document).ready(function(){
    $("#hideSwitchGears").click(function(){
      $(".SwitchGears").hide();
    });
    $("#showSwitchGears").click(function(){
      $(".SwitchGears").show();
    });
  });
</script>
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
              <h6 class="h2 text-white d-inline-block mb-0">Stocks</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Stocks</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Stock Manage</h3>
            </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="card col-lg-6 col-md-12 ">
                  <a  href="supplyStock.php" class="h2 border border-primary rounded p-3" > <i class="fas fa-chart-line"></i> Supllier's Stock</a>
                </div>
                <div class="card col-lg-6 col-md-12">
                  <a  href="dailyStock.php" class="h2 border border-primary rounded p-3" ><i class="fas fa-chart-line "></i>  Daily Stock </a>
              </div>

              <div id="page-wrap">
       
                <div class="table-responsive">
                  <table class="table align-items-center table-dark table-flush">
                    <tr>
                        <th>Product Name</th> 
                        <th>Available Quantity</th>
                        <th>Remaning</th>
                        
                    </tr>
                      <tr>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideAccessories">Hide</button>
                            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showAccessories">Show</button>
                            <strong>Accessories</strong>
                            
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Accessories" && $value['is_delete'] == 0): //var_dump($value); ?>
                        <tr class="Accessories">
                          <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                          <td class="text-center"><?php echo $value['available_qty']; ?></td>
                          <td>
                          <?php 
                            if ($value['available_qty'] <25) :
                          ?>
                          <div class="alert alert-danger" role="alert">
                              Please Order New Items. 
                            </div>
                            <?php endif; ?>
                          </td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      <tr>
                        <td>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideGangSwitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showGangSwitches">Show</button>
                            <strong>Gang Switches</strong>
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Gang Switches" && $value['is_delete'] == 0): //var_dump($value); ?>
                        <tr class="GangSwitches">
                      <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class="text-center"><?php echo $value['available_qty']; ?></td>
                      <td>
                          <?php 
                            if ($value['available_qty'] <25) :
                          ?>
                          <div class="alert alert-danger" role="alert">
                              Please Order New Items. 
                            </div>
                            <?php endif; ?>
                          </td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>

                      <tr>
                      <td>
                      <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideOtherswitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showOtherswitches">Show</button>
                          <strong>Other switches</strong>
                      </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Other switches" && $value['is_delete'] == 0): //var_dump($value); ?>
                        <tr class="Otherswitches">
                      <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class="text-center"><?php echo $value['available_qty']; ?></td>
                      <td>
                          <?php 
                            if ($value['available_qty'] <25) :
                          ?>
                          <div class="alert alert-danger" role="alert">
                              Please Order New Items. 
                            </div>
                            <?php endif; ?>
                          </td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      
                      <tr>
                        <td>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSockets">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSockets">Show</button>
                            <strong>Sockets</strong>
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Sockets" && $value['is_delete'] == 0): //var_dump($value); ?>
                        <tr class="Sockets">
                      <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class="text-center"><?php echo $value['available_qty']; ?></td>
                      <td>
                          <?php 
                            if ($value['available_qty'] <25) :
                          ?>
                          <div class="alert alert-danger" role="alert">
                              Please Order New Items. 
                            </div>
                            <?php endif; ?>
                          </td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>

                            <tr>
                        <td>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSwitchGears">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSwitchGears">Show</button>
                            <strong>Switch Gears</strong>
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Switch Gears" && $value['is_delete'] == 0): //var_dump($value); ?>
                        <tr class="SwitchGears">
                      <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class="text-center"><?php echo $value['available_qty']; ?></td>
                      <td>
                          <?php 
                            if ($value['available_qty'] <25) :
                          ?>
                          <div class="alert alert-danger" role="alert">
                              Please Order New Items. 
                            </div>
                            <?php endif; ?>
                          </td>
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

  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>