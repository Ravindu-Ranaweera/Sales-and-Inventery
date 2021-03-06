<?php require_once '../controller/shopControllers.php'; ?>
<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/orderControllers.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
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
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    
    <!-- BEGIN FOXYCART FILES -->
    <script src="https://css-tricks.foxycart.com/files/foxycart_includes.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="https://css-tricks.foxycart.com/files/foxybox.css" type="text/css" media="screen" charset="utf-8" />
    <link rel="stylesheet" href="https://css-tricks.foxycart.com/themes/standard/theme.foxybox.css" type="text/css" media="screen" charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- END FOXYCART FILES -->

    
	<script type='text/javascript' src='../assets/js/order.js'></script>
</head>
<style>
td{
  font-size: 15px;
}
</style>
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
              <h6 class="h2 text-white d-inline-block mb-0">Place Order</h6>
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
            <?php if(isset($_GET['message'])): ?>
              <div class="alert alert-dismissible alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4 class="alert-heading">Warning!</h4>
                <p class="mb-0">Please Enter The Correct Quentity Value</a>.</p>
              </div>
					    <?php endif; ?>

            <div id="table-responsive">

              <form action="" method="post">

              

                <table id="order-table">
                    <tr>
                        <th>Product Name</th> 
                        <th>Available Qty</th> 
                        <th>Quantity</th>
                        <th>X</th>
                        <th>Unit Price</th>
                        <th>=</th>
                        <th >Totals</th> 
                    </tr>
                    
                      <tr>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="hideAccessories"><strong>-</strong></button>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="showAccessories"><strong>+</strong></button>
                          <strong>Accessories</strong>  
                            
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Accessories" && $value['is_delete'] == 0): //var_dump($value); ?>
                      <tr class="Accessories">
                      <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                          <td class=""><?php echo $value['available_qty']; ?> </td>
                          <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input form-control form-control-sm" id="sparkle-num-pallets" value="0"></input></td>
                          <td class="times">X</td>
                          <td class="price-per-pallet">LKR<span><?php echo $value['sell_unit_price']; ?> </span></td>
                          <td class="equals">=</td>
                          <td class="row-total"><input type="text" class="row-total-input form-control form-control-sm" id="sparkle-row-total" disabled="disabled"></input></td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      <tr>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="hideGangSwitches"><strong>-</strong></button>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="showGangSwitches"><strong>+</strong></button>
                            <strong>Gang Switches</strong>
                        </td>
                      </tr>
                      
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Gang Switches" && $value['is_delete'] == 0): //var_dump($value); ?>
                      <tr class="GangSwitches">
                      <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                       <td class=""><?php echo $value['available_qty']; ?> </td>
                          <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input form-control form-control-sm" id="sparkle-num-pallets" value="0"></input></td>
                          <td class="times">X</td>
                          <td class="price-per-pallet">LKR<span><?php echo  $value['sell_unit_price']; ?> </span></td>
                          <td class="equals">=</td>
                          <td class="row-total"><input type="text" class="row-total-input form-control form-control-sm" id="sparkle-row-total" disabled="disabled"></input></td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>

                      <tr>
                      <td>
                      <button type="button" class="btn btn-outline-primary btn-sm px-3" id="hideOtherswitches"><strong>-</strong></button>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="showOtherswitches"><strong>+</strong></button>
                          <strong>Other switches</strong>
                      </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Other switches" && $value['is_delete'] == 0): //var_dump($value); ?>
                      <tr class="Otherswitches">
                      
                      <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class=""><?php echo $value['available_qty']; ?> </td>
                          <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input form-control form-control-sm" id="sparkle-num-pallets" value="0"></input></td>
                          <td class="times">X</td>
                          <td class="price-per-pallet">LKR<span><?php echo  $value['sell_unit_price']; ?> </span></td>
                          <td class="equals">=</td>
                          <td class="row-total"><input type="text" class="row-total-input form-control form-control-sm" id="sparkle-row-total" disabled="disabled"></input></td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      
                      <tr>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="hideSockets"><strong>-</strong></button>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="showSockets"><strong>+</strong></button>
                            <strong>Sockets</strong>
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Sockets" && $value['is_delete'] == 0): //var_dump($value); ?>
                      <tr class="Sockets">
                      <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                      <td class=""><?php echo $value['available_qty']; ?> </td>
                          <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input form-control form-control-sm" id="sparkle-num-pallets" value="0"></input></td>
                          <td class="times">X</td>
                          <td class="price-per-pallet">LKR<span><?php echo $value['sell_unit_price']; ?> </span></td>
                          <td class="equals">=</td>
                          <td class="row-total"><input type="text" class="row-total-input form-control form-control-sm" id="sparkle-row-total" disabled="disabled"></input></td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      
                      <tr>
                        <td>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="hideSwitchGears"><strong>-</strong></button>
                        <button type="button" class="btn btn-outline-primary btn-sm px-3" id="showSwitchGears"><strong>+</strong></button>
                            <strong>Switch Gears</strong>
                        </td>
                      </tr>
                      <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
                      <?php if($value['product_catogery'] == "Switch Gears" && $value['is_delete'] == 0): //var_dump($value); ?>
                      <tr class="SwitchGears">
                          <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                          <td class=""><?php echo $value['available_qty']; ?> </td>
                          <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?> qqty" class="num-pallets-input form-control form-control-sm" id="sparkle-num-pallets" value="0"></input></td>
                          <td class="times">X</td>
                          <td class="price-per-pallet">LKR<span><?php echo  $value['sell_unit_price'] ; ?> </span></td>
                          <td class="equals">=</td>
                          <td class="row-total"><input type="text" class="row-total-input form-control form-control-sm" id="sparkle-row-total" disabled="disabled"></input></td>
                      </tr>
                            <?php endif; ?>
                            <?php endforeach; ?>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td > <strong>Product SUBTOTAL:</strong> </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                          <td >
                             
                              <input type="text" name="subTotal" class="total-box " value="" id="product-subtotal" readonly="readonly"></input>
                          </td>
                      </tr>
                      <tr>
                      <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      <td >
                      <input type="submit" name="submitOrderItem"  class="btn btn-success"/>
                          </td>
                      
                      </tr>
                </table>
              </form>
    	
        
              
            </div>
          </div>
        </div>
      </div>
      </div>

      <script>
            


            
        </script>

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
