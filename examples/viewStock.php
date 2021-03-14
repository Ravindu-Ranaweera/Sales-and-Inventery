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
  <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#form">
  <i class="fas fa-plus md-0"></i> ADD INVOICE
  </button>   -->
</div>

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
            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideAccessories">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showAccessories">Show</button>
                          <strong>Accessories</strong> 
                
            </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Accessories"): //var_dump($value); ?>
                        <tr class="Accessories">
                         
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
            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideGangSwitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showGangSwitches">Show</button>
                            <strong>Gang Switches</strong>
            </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Gang Switches"): //var_dump($value); ?>
                        <tr class="GangSwitches">
                      
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
          <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideOtherswitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showOtherswitches">Show</button>
                          <strong>Other switches</strong>
          </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Other switches"): //var_dump($value); ?>
                        <tr class="Otherswitches">
                      
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
            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSockets">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSockets">Show</button>
                            <strong>Sockets</strong>
            </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Sockets"): //var_dump($value); ?>
                        <tr class="Sockets">
                      
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
            <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSwitchGears">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSwitchGears">Show</button>
                            <strong>Switch Gears</strong>
            </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Switch Gears"): //var_dump($value); ?>
                        <tr class="SwitchGears">
                      
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