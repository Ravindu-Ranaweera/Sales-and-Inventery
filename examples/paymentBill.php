<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/shopControllers.php'; ?>
<?php require_once '../controller/orderControllers.php'; ?>
<?php require_once '../controller/returnControllers.php'; ?>
<?php require_once '../controller/paymentControllers.php'; ?>
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
<style>
    
</style>
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
    	         <th>#Title</th> 
    	         <th></th>
    	         
    	    </tr>
            <input type="hidden" name="order_id" class="form-control" value="<?php echo $_GET['order_id'];?>" >
            <tr>
                <td>
                    Total Order Amount
                </td>
                <td>
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php if($_GET['order_id'] == $value['order_id']):?>
                
                    <input type="number" name="orderBill" class="form-control " value="<?php echo $value['total_amount'];?>" readonly>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>

            <tr>
                <td>
                    Return Item Amount
                </td>
                <td>
                <?php  $count= 0; ?>
                <?php foreach($return_details as $key=>$value):  ?>
                <?php if($_GET['order_id'] == $value['order_id']): ;?>
                <?php $count=1;?>
                
                    <input type="number" name="return"  class="form-control " value="<?php echo $value['return_value'];?>" readonly>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($count==0):     ?>
                    <input type="number" name="return"  class="form-control " value="0.00" readonly>
                    <?php endif; ?>

                </td>
            </tr>
            <tr>
                <td>
                    Total Bill Amount
                </td>
                <td>
                <?php  $count=0; //var_dump($value); ?>
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php if($_GET['order_id'] == $value['order_id']):?>
                
                    <?php foreach($return_details as $key=>$value1): //var_dump($value); ?>
                <?php if($_GET['order_id'] == $value1['order_id']): $count++;?>
                <?php $x= $value['total_amount'] - $value1['return_value'];
                ?>
                
                    <input type="number" name="trueBill" class="form-control " value="<?php echo $x;?>" readonly>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($count==0):     ?>
                    <input type="number" name="return"  class="form-control " value="<?php echo $value['total_amount'];?>" readonly>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Paid Bill Amount
                </td>
                <td>
                <?php foreach($order_details as $key=>$value): //var_dump($value); ?>
                <?php if($_GET['order_id'] == $value['order_id']):?>
                
                    <input type="number" name="paid" class="form-control " value="<?php echo $value['paid_amount'];?>" readonly>
                    <?php else: ?>
                    
                    <?php endif; ?>
                    <?php endforeach; ?>
                </td>
            </tr>

            <tr>
                <td>
                    Balance Bill Amount
                </td>
                <td>
                <?php $count=0;//var_dump($value); ?>
                <?php foreach($order_details as $key=>$value): ;//var_dump($value); ?>
                <?php if($_GET['order_id'] == $value['order_id']):?>
                
                    <?php foreach($return_details as $key=>$value1): //var_dump($value); ?>
                <?php if($_GET['order_id'] == $value1['order_id']): $count++;?>
                <?php $s= $value['total_amount'] - ($value1['return_value']+$value['paid_amount']);
                ?>
                
                    <input type="number" name="total" class="form-control " value="<?php echo $s;?>" readonly>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if($count==0):     ?>
                        <?php $s= $value['total_amount'] - $value['paid_amount'];
                ?>
                    <input type="number" name="return"  class="form-control " value="<?php echo $s;?>" readonly>
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <td>
                   Payment Type
                </td>
                <td>
                    <select class="form-control" name="cat">
                    <option value="" >Select</option>
                    <option value="cash">Cash</option>
                    <option value="check">Check</option>
                    <option value="cash+check">Cash & Check</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Cash Amount
                </td>
                <td>
                    <input type="textbox"  class="form-control "   name="cash" value="0">
                </td>
            </tr>
            <tr>
                <td>
                    Check Amount
                </td>
                <td>
                    <input type="textbox" class="form-control " name="check" value="0">
                </td>
            </tr>
            <tr>
                <td>
                    Check Number
                </td>
                <td>
                    <input type="number" name="checkNumber" class="form-control ">
                </td>
            </tr>

            <tr>
                <td>
                    Check Return Date
                </td>
                <td>
                    <input type="date" name="returnDate" class="form-control ">
                </td>
            </tr>
                
            
            
            <tr>
                <td></td>
            <td colspan="1" style="text-align: right;">
            <input type="submit" name="submitBill" class="form-control bg-success" value="Pay Amount" />
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
            
            var A = $('input[name=total]').val();
            console.log(parseInt(A));
            A =parseInt(A);

            $('input[name=cash]').keyup(function() {
                if(this.value > A) {
                    this.style.background="red";
                }       else{
                    this.style.background="white";
                }
                
                var c = A- this.value;
            $('input[name=check]').keyup(function() {
                if(this.value > c) {
                    this.style.background="red";
                }       else{
                    this.style.background="white";
                } 
            });
            });


            
        </script>
  <!-- Core -->
  <!-- <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script> -->
  <!-- Optional JS -->
   <!-- <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script> -->
  <!-- Argon JS -->
  <!-- <script src="../assets/js/argon.js?v=1.2.0"></script> -->


</body>

</html>
