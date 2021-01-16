
<?php require_once '../controller/productControllers.php'; ?>
<?php require_once '../controller/stockControllers.php'; ?>
<!DOCTYPE >
<html >

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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- END FOXYCART FILES -->

    
</head>

<body>




<!-- Sidenav -->
<?php include('sidebar.php'); ?>
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
        <form action="" method="post">
        <div class="table-responsive">
        <table class="table align-items-center table-dark table-flush">
    	    <tr>
    	         <th>Product Name</th> 
    	         <th>Quantity</th>
    	         <th>Unit Price</th>
    	         
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
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                <td class=""><input type="text" name="<?php echo 'bill-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                
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
            <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                
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
            <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                
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
            <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                
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
            <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                <td class=""><input type="text" name="<?php echo 'qty-'.$value['product_name']; ?>" class="form-control " id="sparkle-num-pallets" ></input></td>
                
            </tr>
                  <?php endif; ?>
                  <?php endforeach; ?>
            </tr>
            
            <tr>
            <td colspan="6" style="text-align: right;">
            <input type="submit" name="submitStockItem" />
                </td>
            
            </tr>
    	</table>
        </div>
    	
    	</form>
      

    </div>
              
            </div>
          </div>
        </div>
      </div>
      </div>

      <script>
        $(document).ready(function(){
          $("#hid").click(function(){
            $(".o").hide();
          });
          $("#sho").click(function(){
            $(".o").show();
          });
        });
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
