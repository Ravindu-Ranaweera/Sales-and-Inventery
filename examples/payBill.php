<?php
if (!isset($_SESSION['id'])) {
  session_start();
}
?>
<?php require_once '../controller/shopControllers.php'; ?>
<?php require_once '../controller/orderControllers.php'; ?>
<?php require_once '../controller/shopControllers.php'; ?>
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
  <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
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
        
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-12">
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                            <td colspan="4">
                                <table>
                                <tr>
                                    <td class="title">
                                    <img src="../assets/img/brand/dashboard.png" style="width:100%; max-width:300px;">
                                    </td>

                                    <td>
                                    Invoice #:<?php echo(rand(10000,900000)); ?> <br>
                                    <?php
                                        
                                        $sql = "SELECT * FROM  place_order WHERE order_id = {$_GET['order_id']} LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        echo "Created: ".$row['order_date'];
                                    ?>
                                    <br> 
                                    <?php
                                    date_default_timezone_set("Asia/Kolkata"); 
                                    $Due = date("Y-m-d");
                                    echo "Due: ".$Due;

                                    ?>
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>

                            <tr class="information">
                            <td colspan="4">
                                <table>
                                <tr>
                                    <td>
                                    Chenith Enterprises<br>  Sunny Road<br> Ambalangoda, Sri Lanka
                                    </td>

                                    <td>
                                    
                                    <?php foreach($shop_details as $key=>$value): //var_dump($value); ?>
                                    <?php if( $row['shop_id'] == $value['shop_id']):?>

                                    <?php echo $value['shop_name']; ?> <br>
                                    <?php echo $value['shop_address']; ?> <br>
                                    <?php echo $value['shop_contact']; ?>

                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                    
                                    </td>
                                </tr>
                                </table>
                            </td>
                            </tr>

                            <tr class="heading">
                            <td>
                                Purches Item
                            </td>

                            <td>
                                Unit Cost
                            </td>

                            <td>
                                Quantity
                            </td>

                            <td>
                                Price
                            </td>
                            </tr>
                            <?php 
                            $sql = "SELECT * FROM order_item WHERE order_id = {$_GET['order_id']}";
                            $return = mysqli_query($conn,$sql);
                            if($return) {
                                $item_details = mysqli_fetch_all($return,MYSQLI_ASSOC);
                            }
                            ?>

                            <?php foreach($item_details as $key=>$value): //var_dump($value); ?>            
                            
                            <tr class="item">
                            <td>
                            <?php
                                        
                                $sql = "SELECT * FROM  products WHERE product_id = {$value['product_id']} LIMIT 1";
                                $result = mysqli_query($conn, $sql);
                                $row1 = mysqli_fetch_assoc($result);
                                echo $row1['product_name'];
                            ?>
                            </td>
                               
                            <td>
                                <?php echo $row1['sell_unit_price']; ?> LKR
                            </td>

                            <td>
                            <?php echo $value['qty']; ?>
                            </td>

                            <td>
                            <?php echo $row1['sell_unit_price']*$value['qty']; ?> LKR
                            </td>
                            </tr>
                            <?php endforeach; ?>

                            <tr class="total">
                            <td ></td>
                            <td ></td>
                            <td ><strong>Sub Total:</strong></td>

                            <td>
                            <?php echo $row['total_amount'];   ?> LKR 
                            </td>
                            </tr>

                            <?php
                                        
                                $sql = "SELECT * FROM  return_product WHERE order_id = {$_GET['order_id']} LIMIT 1";
                                $result = mysqli_query($conn, $sql);
                                $row2 = mysqli_fetch_assoc($result);
                                $ret=0;
                                

                                if( $row2 != NULL){
                                   
                                    $ret =$row2['return_value'];
                                    

                                }
                                
                                
                            ?>

                            <?php if($row2 != NULL): ?>
                            <?php
                                $sql = "SELECT * FROM  return_item WHERE return_id = {$row2['return_id']} LIMIT 1";
                                $return = mysqli_query($conn,$sql);
                                if($return) {
                                    $ritem_details = mysqli_fetch_all($return,MYSQLI_ASSOC);
                                }
                                        
                            ?>


                            <tr class="heading">
                            <td>
                                Return Item
                            </td>

                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>

                            
                            <?php foreach($ritem_details as $key=>$value): //var_dump($value); ?>  

                            <tr class="item">
                            <td>
                            <?php
                                        
                                        $sql = "SELECT * FROM  products WHERE product_id = {$value['product_id']} LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $row3 = mysqli_fetch_assoc($result);
                                        echo $row3['product_name'];
                                    ?>

                            <td> <?php echo $row3['sell_unit_price']; ?> LKR </td>
                            <td> <?php echo $value['qty']; ?> </td>
                            <td> -<?php echo $value['qty']*$row3['sell_unit_price']; ?> LKR </td>
                            </tr>

                            <tr class="total">
                            <td ></td>
                            <td ></td>
                            <td ><strong>Return Total:</strong></td>

                            <td>
                            -<?php echo $ret;   ?> LKR 
                            </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <tr class="total">
                            <td ><strong>Total Bill Amount:</strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                            <?php echo ($row['total_amount'] - $ret);   ?> LKR 
                            </td>
                            </tr>

                            <tr class="total">
                            <td ><strong>Payment Recived:</strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                               
                            </td>
                            </tr>
                            <tr class="total">
                            <td ><strong>Cash: </strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                            <?php 
                                    $sql = "SELECT * FROM payment WHERE order_id = {$_GET['order_id']} ORDER BY payment_id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    $row5 = mysqli_fetch_assoc($result);  
                                    echo $row5['cash_amount'];
                                ?> LKR
                            </td>
                            </tr>
                            <tr class="total">
                            <td ><strong>Check:</strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                            <?php 
                                    $sql = "SELECT * FROM payment WHERE order_id = {$_GET['order_id']} ORDER BY payment_id DESC LIMIT 1";
                                    $result = mysqli_query($conn, $sql);
                                    $row5 = mysqli_fetch_assoc($result);  
                                    if($row5['cheque_id']== 0) {
                                        echo "0.00";
                                    }else{
                                        $sql = "SELECT * FROM cheque WHERE cheque_id = {$row5['cheque_id']} LIMIT 1";
                                        $result = mysqli_query($conn, $sql);
                                        $row4 = mysqli_fetch_assoc($result); 
                                        echo $row4['sub_total'];;
                                    }
                                ?> LKR
                            </td>
                            </tr>

                            <tr class="total">
                            <td ><strong>Full Payment Recived:</strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                                <?php echo $row['paid_amount'] ;  ?> LKR 
                            </td>
                            </tr>

                            <tr class="total">
                            <td ><strong>Payment Arrears:</strong></td>
                            <td ></td>
                            <td ></td>
                            <td>
                                <?php echo ($row['total_amount'] - $ret)- $row['paid_amount'] ;  ?> LKR 
                            </td>
                            <tr>
                            <td></td>
                            </tr>
                            </tr>
                            <tr class="total">
                            <td ></td>
                            <td ></td>
                            <td >SIgnature</td>
                            <td>
                               ........................
                            </td>
                            </tr>


                        </table>
                        <a  href="paymentBill.php?order_id=<?php echo $value['order_id'];?>" class="btn btn-labeled btn-dark">
                            <span class="btn-label"><i class="fa fa-trash"></i></span> Print Bill
                        </a>
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
          
            
        
      </div>
      
      <script type="text/javascript">
        $('table').on('mouseup keyup', 'input[type=number]', () => calculateTotals());

$('.btn-add-row').on('click', () => {
  const $lastRow = $('.item:last');
  const $newRow = $lastRow.clone();

  $newRow.find('input').val('');
  $newRow.find('td:last').text('$0.00');
  $newRow.insertAfter($lastRow);

  $newRow.find('input:first').focus();
});

function calculateTotals() {
  const subtotals = $('.item').map((idx, val) => calculateSubtotal(val)).get();
  const total = subtotals.reduce((a, v) => a + Number(v), 0);
  $('.total td:eq(1)').text(formatAsCurrency(total));
}

function calculateSubtotal(row) {
  const $row = $(row);
  const inputs = $row.find('input');
  const subtotal = inputs[1].value * inputs[2].value;

  $row.find('td:last').text(formatAsCurrency(subtotal));

  return subtotal;
}

function formatAsCurrency(amount) {
  return `$${Number(amount).toFixed(2)}`;
}
      </script>
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