<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
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
              <h3 class="mb-0">Summery Loading & Unloading</h3>
            </div>
            <div class="card-body p-0">

            <div id="page-wrap">
    
        <!-- <h1>Multi-product Quantity-based Order Form</h1> -->
        <form action="" method="post">
        
        <div class="table-responsive">
        <table class="table align-items-center table-dark table-flush">
    	    <tr>
    	         <th>Product Name</th> 
    	         <th>Load Quantity</th>
    	         <th>Unload Quantity</th>
    	         <th>Missed Quantity</th>
    	         
    	    </tr>
          <?php 
               $sql = "SELECT * FROM load_unload WHERE load_id= {$_GET['load_id']}";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_all($result ,MYSQLI_ASSOC);
            
            ?>
            <tr>
              <td>
              <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideAccessories">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showAccessories">Show</button>
                          <strong>Accessories</strong>  
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($row); exit; ?>
            <?php foreach($row as $key1=>$value1): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Accessories" && ($value['product_id']== $value1['product_id'])): //var_dump($value); ?>
            <tr class="Accessories">
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><?php echo $value1['load_qty']; ?></td>
                <td class=""><?php echo $value1['unload_qty']; ?></td>
                <td class=""><?php echo $value1['load_qty']-$value1['unload_qty']; ?></td>
                
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>

            <tr>
              <td>
              <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideGangSwitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showGangSwitches">Show</button>
                            <strong>Gang Switches</strong>
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($row); exit; ?>
            <?php foreach($row as $key1=>$value1): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Gang Switches" && ($value['product_id']== $value1['product_id'])): //var_dump($value); ?>
              <tr class="GangSwitches">
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><?php echo $value1['load_qty']; ?></td>
                <td class=""><?php echo $value1['unload_qty']; ?></td>
                <td class=""><?php echo $value1['load_qty']-$value1['unload_qty']; ?></td>
                
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>

            <tr>
              <td>
              <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideOtherswitches">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showOtherswitches">Show</button>
                          <strong>Other switches</strong>
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($row); exit; ?>
            <?php foreach($row as $key1=>$value1): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Other switches" && ($value['product_id']== $value1['product_id'])): //var_dump($value); ?>
              <tr class="Otherswitches">
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><?php echo $value1['load_qty']; ?></td>
                <td class=""><?php echo $value1['unload_qty']; ?></td>
                <td class=""><?php echo $value1['load_qty']-$value1['unload_qty']; ?></td>
                
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>

            <tr>
              <td>
              <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSockets">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSockets">Show</button>
                            <strong>Sockets</strong>
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($row); exit; ?>
            <?php foreach($row as $key1=>$value1): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Sockets" && ($value['product_id']== $value1['product_id'])): //var_dump($value); ?>
              <tr class="Sockets">
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><?php echo $value1['load_qty']; ?></td> 
                <td class=""><?php echo $value1['unload_qty']; ?></td>
                <td class=""><?php echo $value1['load_qty']-$value1['unload_qty']; ?></td>

            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>

            <tr>
              <td>
              <button type="button" class="btn btn-primary btn-sm btn-ripple" id="hideSwitchGears">Hide</button>
                        <button type="button" class="btn btn-primary btn-sm btn-ripple" id="showSwitchGears">Show</button>
                            <strong>Switch Gears</strong>
                  
              </td>
            </tr>
            
            <?php foreach($product_details as $key=>$value): //var_dump($row); exit; ?>
            <?php foreach($row as $key1=>$value1): //var_dump($value); ?>
            <?php if($value['product_catogery'] == "Switch Gears" && ($value['product_id']== $value1['product_id'])): //var_dump($value); ?>
              <tr class="SwitchGears">
                <td class=""><?php echo $value['product_name']; ?><input type="hidden" name="<?php echo $value['product_name']; ?>" value="<?php echo $value['product_id']; ?>"></input></td>
                <td class=""><?php echo $value1['load_qty']; ?></td>   
                <td class=""><?php echo $value1['unload_qty']; ?></td>  
                <td class=""><?php echo $value1['load_qty']-$value1['unload_qty']; ?></td>             
            </tr>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>

            
            <tr>
            <td colspan="6" style="text-align: right;">
            <!-- <input type="submit" name="submitunload" class="btn btn-success btn-lg btn-ripple" onclick="return confirm('Are you sure you want to submit this details?');"/> -->
                </td>
            
            </tr>
    	</table>
        </div>
        <input type="hidden" name="load_id" value="<?php echo $_GET['load_id'] ?>">
    	</form>
      

    </div>
              
            </div>
          </div>
        </div>
      </div>
      </div>

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
