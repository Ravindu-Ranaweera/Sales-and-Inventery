<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center" style="background: #212168;">
        <a class="navbar-brand " href="javascript:void(0)">
          <img src="../assets/img/brand/dashboard.png" class="navbar-brand-img" alt="..." style="min-height: 3rem;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="dashboard.php">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <?php if ($_SESSION['usertype'] == '1'):  ?>
            <li class="nav-item">
              <a class="nav-link" href="register.php">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register Employee </span>
              </a>
            </li>
            <?php endif; ?>
            <?php if ($_SESSION['usertype'] == '1' || ($_SESSION['usertype'] == '3')):  ?>
            <li class="nav-item">
              <a class="nav-link" href="shop.php">
                <i class="ni ni-shop text-orange"></i>
                <span class="nav-link-text">Shops</span>
              </a>
            </li>
            <?php endif; ?>

            <li class="nav-item">
              <a class="nav-link" href="tables.php">
                <i class="ni ni-box-2 text-yellow"></i>
                <span class="nav-link-text">Product</span>
              </a>
            </li>

            <?php if ($_SESSION['usertype'] == '1' || ($_SESSION['usertype'] == '2')):  ?>
            <li class="nav-item">
              <a class="nav-link" href="stock.php">
                <i class="ni ni-bag-17 text-red"></i>
                <span class="nav-link-text">Stock</span>
              </a>
            </li>
            <?php endif; ?>

            <?php if ($_SESSION['usertype'] == '1'):  ?>
            <li class="nav-item">
              <a class="nav-link" href="report.php">
              <i class="ni ni-books text-defaul"></i>
                <span class="nav-link-text">Report</span>
              </a>
            </li>
            <?php endif; ?>

            <?php if ($_SESSION['usertype'] == '1' || ($_SESSION['usertype'] == '3')):  ?>
            <li class="nav-item">
              <a class="nav-link" href="paymentShop.php">
                      <i class="ni ni-credit-card"></i>
      
                <span class="nav-link-text">Payments</span>
              </a>
            </li>
            <?php endif; ?>
          </ul>
          <!-- Divider -->
        </div>
      </div>
    </div>
  </nav>