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

<body>


<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $(".odd").hide();
  });
  $("#show").click(function(){
    $(".odd").show();
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

            <div id="page-wrap">
    
        <!-- <h1>Multi-product Quantity-based Order Form</h1> -->
        <form action="" method="post">
    
    	<table id="order-table">
    	    <tr>
    	         <th>Product Name</th> 
    	         <th>Quantity</th>
    	         <th>X</th>
    	         <th>Unit Price</th>
    	         <th>=</th>
    	         <th style="text-align: right; padding-right: 30px;">Totals</th> 
    	    </tr>
            <tr>
              <td>
                  <button id="hide">Hide</button>
                  <button id="show">Show</button>
                  Accessories
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Accessories"): //var_dump($value); ?>
            <tr class="odd">
            <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input" id="sparkle-num-pallets" value="0"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">LKR<span><?php echo $value['unit_price']; ?> </span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
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
            <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input" id="sparkle-num-pallets" value="0"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">LKR<span><?php echo $value['unit_price']; ?> </span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
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
            <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input" id="sparkle-num-pallets" value="0"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">LKR<span><?php echo $value['unit_price']; ?> </span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
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
            <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input" id="sparkle-num-pallets" value="0"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">LKR<span><?php echo $value['unit_price']; ?> </span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
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
                <td class="product-title"><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class="num-pallets"><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="num-pallets-input" id="sparkle-num-pallets" value="0"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">LKR<span><?php echo $value['unit_price']; ?> </span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
            </tr>
                  <?php endif; ?>
                  <?php endforeach; ?>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;">
                    Product SUBTOTAL: 
                    <input type="text" name="subTotal" class="total-box" value="" id="product-subtotal" readonly="readonly"></input>
                </td>
            </tr>
            <tr>
            <td colspan="6" style="text-align: right;">
            <input type="submit" name="submitOrderItem" />
                </td>
            
            </tr>
    	</table>
    	</form>
    	<!-- <table id="shipping-table">
    	
    	 <tr>
    	     <th>Total Qty.</th>
    	     <th>X</th>
    	     <th>Shipping Rate</th>
    	     <th>=</th>
    	     <th style="text-align: right;">Shipping Total</th>
    	 </tr>
    	 
    	 <tr>
    	     <td id="total-pallets"><input id="total-pallets-input" value="0" type="text" disabled="disabled"></input></td>
    	     <td>X</td>
    	     <td id="shipping-rate">10.00</td>
    	     <td>=</td>
    	     <td style="text-align: right;"><input type="text" class="total-box" value="$0" id="shipping-subtotal" disabled="disabled"></input></td>
    	 </tr>
    	
    	</table> -->
    	
    	<!-- <div class="clear"></div>
    	
        <div style="text-align: right;">
            <span>ORDER TOTAL: </span> 
            <input type="text" class="total-box" value="$0" id="order-total" disabled="disabled"></input>
            
            <br />
            
            <form class="foxycart" action="https://css-tricks.foxycart.com/cart" method="post" accept-charset="utf-8" id="foxycart-order-form">
                
                <input type="hidden" name="name" value="Multi Product Order" />
                <input type="hidden" id="fc-price" name="price" value="0" />

                <input type="submit" value="Submit Order" class="submit" />
                
            </form>
        </div> -->
        
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
