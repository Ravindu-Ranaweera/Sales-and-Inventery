<?php require_once '../controller/productControllers.php'; ?>
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
<?php include('../sidebar.php'); ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-auto ml-md-auto ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Ravindu</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
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
                <tr class="odd">
                <td class="product-title"><?php echo $value['product_name']; ?></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="sparkle-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet"><?php echo $value['unit_price']; ?> LKR</td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="sparkle-row-total" disabled="disabled"></input></td>
            </tr>
                  <?php endforeach; ?>
            <td>
            
                <button id="hide">Hide</button>
                <button id="show">Show</button>
                Gang Switches
            </td>
            </tr>
            <td>
           
                <button id="hide">Hide</button>
                <button id="show">Show</button> 
                Other switches
            </td>
            </tr>
            <td>
            
                <button id="hide">Hide</button>
                <button id="show">Show</button>
                Sockets
            </td>
            </tr>
            <td>
            
                <button id="hide">Hide</button>
                <button id="show">Show</button>
                Switch Gears
            </td>
            </tr>
            
            <tr class="even">
                <td class="product-title">Turface&reg; MVP - <em>Calcined Clay Soil Conditioner</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-mvp-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>300</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-mvp-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Turface&reg; Pro League - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-pro-league-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-pro-league-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Turface&reg; Pro League Red - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-pro-league-red-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>455</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-pro-league-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Turface&reg; Quick Dry - <em>Calcined Clay Moisture Absorbent</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-quick-dry-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>300</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-quick-dry-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Turface&reg; Mound Clay Red - <em>Virgin Red Clay</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="turface-mound-clay-red-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>410</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="turface-mound-clay-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Diamond Pro&reg; Red Infield Conditioner - <em>Vitrified Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-red-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>365</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-red-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Diamond Pro&reg; Drying Agent - <em>Calcined Clay Moisture Absorbent</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-drying-agent-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-drying-agent-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="odd">
                <td class="product-title">Diamond Pro&reg; Professional - <em>Calcined Clay Top Dressing</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-professional-num-pallets" ></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>375</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-professional-row-total" disabled="disabled"></input></td>
            </tr>
            <tr class="even">
                <td class="product-title">Diamond Pro&reg; Top Dressing - <em>Calcined Clay Soil Conditioner</em></td>
                <td class="num-pallets"><input type="text" class="num-pallets-input" id="diamond-pro-top-dressing-num-pallets"></input></td>
                <td class="times">X</td>
                <td class="price-per-pallet">$<span>340</span></td>
                <td class="equals">=</td>
                <td class="row-total"><input type="text" class="row-total-input" id="diamond-pro-top-dressing-row-total" disabled="disabled"></input></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;">
                    Product SUBTOTAL: <input type="text" class="total-box" value="$0" id="product-subtotal" disabled="disabled"></input>
                </td>
            </tr>
    	</table>
    	
    	<table id="shipping-table">
    	
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
    	
    	</table>
    	
    	<div class="clear"></div>
    	
        <div style="text-align: right;">
            <span>ORDER TOTAL: </span> 
            <input type="text" class="total-box" value="$0" id="order-total" disabled="disabled"></input>
            
            <br />
            
            <form class="foxycart" action="https://css-tricks.foxycart.com/cart" method="post" accept-charset="utf-8" id="foxycart-order-form">
                
                <input type="hidden" name="name" value="Multi Product Order" />
                <input type="hidden" id="fc-price" name="price" value="0" />

                <input type="submit" value="Submit Order" class="submit" />
                
            </form>
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
