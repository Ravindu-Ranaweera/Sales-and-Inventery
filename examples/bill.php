<!DOCTYPE html>
<html lang="en">
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<style>
body{margin-top:20px;
background:#eee;
}

.invoice {
    padding: 30px;
}

.invoice h2 {
	margin-top: 0px;
	line-height: 0.8em;
}

.invoice .small {
	font-weight: 300;
}

.invoice hr {
	margin-top: 10px;
	border-color: #ddd;
}

.invoice .table tr.line {
	border-bottom: 1px solid #ccc;
}

.invoice .table td {
	border: none;
}

.invoice .identity {
	margin-top: 10px;
	font-size: 1.1em;
	font-weight: 300;
}

.invoice .identity strong {
	font-weight: 600;
}


.grid {
    position: relative;
	width: 100%;
	background: #fff;
	color: #666666;
	border-radius: 2px;
	margin-bottom: 25px;
	box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
}
</style>
<body>
    <div class="container">
        <div class="row">
    			<!-- BEGIN INVOICE -->
				    <div class="col-xs-12">
						<div class="grid invoice">
							<div class="grid-body">
								<div class="invoice-title ">
									<div class="row">
										<div class="col-xs-12 align-items-center text-center">
											<img src="../assets/img/brand/dashboard.png" alt="" height="45">
										</div>
									</div>
									<br>
									<div class="row text-center align-items-center">
										<div class="col-xs-12 align-items-center">
											<h2>INVOICE<br>
											<span class="small">order #1082</span></h2>
										</div>
									</div>
                                    
                                    <div class="row">
                                    <div class="col">
                                                <address>
                                                    <strong>Billed To:</strong><br>
                                                    Chenith Enterprises.<br>
                                                    No 600<br>
                                                    Ambalangoda, Sri Lanka<br>
                                                    <abbr title="Phone">TP:</abbr> 09122654356
                                                </address>
                                            </div>
                                            <div class="col text-right">
                                                <address>
                                                    <strong>Invoice To::</strong><br>
                                                    Janahitha Hardware<br>
                                                    Sherman 42,<br>
                                                    Habour Road, Hikkaduwa<br>
                                                    <abbr title="Phone">TP:</abbr> 0712311212
                                                </address>
                                            </div>
                                    </div>
                                            

								</div>
								<hr>
								
								<div class="row">
									<div class="col-md-12">
										<h3>ORDER SUMMARY</h3>
										<table class="table table-striped">
											<thead>
												<tr class="line">
													<td><strong>#</strong></td>
													<td class="text-center"><strong>PRODUCT NAME</strong></td>
													<td class="text-center"><strong>QTY</strong></td>
													<td class="text-right"><strong>RATE</strong></td>
													<td class="text-right"><strong>SUBTOTAL</strong></td>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td><strong>Sunk Type 8 Way</strong><br></td>
													<td class="text-center">5</td>
													<td class="text-center">LKR 180</td>
													<td class="text-right">LKR 1,125.00</td>
												</tr>
												<tr class="line">
													<td>2</td>
													<td><strong>20A Dipole Switch</strong><br></td>
													<td class="text-center">15</td>
													<td class="text-center">LKR 75</td>
													<td class="text-right">LKR 1,125.00</td>
												</tr>
												<tr>
													<td colspan="3"></td>
													<td class="text-right"><strong>Return</strong></td>
													<td class="text-right"><strong>TAX</strong></td>
												</tr>
                                                <tr class="line">
                                                <td>1</td>
													<td><strong>Template Development</strong><br></td>
													<td class="text-center">10</td>
													<td class="text-center">- LKR 75</td>
													<td class="text-right">- LKR 750.00</td>
												</tr>
												<tr>
													<td colspan="3">
													</td><td class="text-right"><strong>Total</strong></td>
													<td class="text-right"><strong>LKR 2,025.00</strong></td>
												</tr>
											</tbody>
										</table>
									</div>									
								</div>
							</div>
						</div>
					</div>
					<!-- END INVOICE -->
		</div>
    </div>

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