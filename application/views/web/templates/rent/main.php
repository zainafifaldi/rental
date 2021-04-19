<!--
=========================================================
* Argon Dashboard - v1.2.0
=========================================================
* Product Page: https://www.creative-tim.com/product/argon-dashboard


* Copyright  Creative Tim (http://www.creative-tim.com)
* Coded by www.creative-tim.com



=========================================================
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Haza Baby</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="<?=base_url()?>assets/img/brand/favicon.png" type="image/png"> -->
  <link rel="icon" href="<?=base_url()?>assets/img/logo-haza-baby.jpeg" type="image/jpeg">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/css/argon.css?v=1.2.0" type="text/css"> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/argon.min.css?v=1.2.0" type="text/css">

  <link rel="stylesheet" href="<?=base_url()?>assets/css/calendar.css" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>assets/vendor/deepakbisht-calendar/calendar.css" type="text/css">
</head>

<body>
  <script>
    const BASE_URL = '<?=base_url()?>';
    const SITE_URL = '<?=site_url()?>';
  </script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script> -->
  <script src="<?=base_url()?>assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?=base_url()?>assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?=site_url('rent/items')?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('rent/timeline')?>">
                <i class="ni ni-calendar-grid-58 text-info"></i>
                <span class="nav-link-text">Timeline</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('rent/transactions')?>">
                <i class="ni ni-collection text-orange"></i>
                <span class="nav-link-text">Transactions</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('rent/items')?>">
                <i class="ni ni-diamond text-yellow"></i>
                <span class="nav-link-text">Items</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
            <li class="nav-item d-sm-none">
              <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                <i class="ni ni-zoom-split-in"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-ungroup"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                <div class="row shortcuts px-4">
                  <a href="<?=site_url()?>" class="col-4 shortcut-item text-white">
                    <center>
                      <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                        <i class="ni ni-app"></i>
                      </span>
                      <small>Aplikasi</small>
                    </center>
                  </a>
                  <a href="<?=site_url('rent/items')?>" class="col-4 shortcut-item text-white">
                    <center>
                      <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                        <i class="ni ni-cart"></i>
                      </span>
                      <small>Penyewaan</small>
                    </center>
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?=base_url()?>assets/img/retno.jpg">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Retno Dewi Hartianti</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Settings</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-calendar-grid-58"></i>
                  <span>Activity</span>
                </a>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-support-16"></i>
                  <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#!" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->

    <?php $this->load->view($view); ?>

  </div>

  <!-- Core -->
  <script src="<?=base_url()?>assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?=base_url()?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="<?=base_url()?>assets/js/argon.js?v=1.2.0"></script>
  <script src="<?=base_url()?>assets/js/main.js"></script>
</body>

</html>