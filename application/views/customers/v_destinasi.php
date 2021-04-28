<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/logo.png'?>">
  <title>Anak Tao | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/lte/adminlte.min.css'?>">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <?php
    $this->load->view('customers/v_header');
  ?>
  <!-- /.navbar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Dashboard <small>Anak Tao</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <!-- <div class="row"> -->
          <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-4">
              <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
              <div class="col-12">
                <img src="<?php echo base_url().'theme/images/Ecomerse/prod-1.jpg'?>" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <h3 class="my-3">Pantai Parbaba</h3>
              <p>Jl. Parapat</p>

              <hr>
              <h5>Tersedia</h5>
              <div class="mt-3 product-share">
                <a href="#" class="text-gray">
                  <i class="fas fa-utensils fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-beach fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

              <div class="mt-4">
                <a href="<?php echo base_url().'customers/dashboard2'?>">
                  <div class="btn btn-default btn-lg btn-flat">
                    Read more..
                  </div>
                </a>
              </div>

              

            </div>
            <div class="col-12 col-sm-4">
              <!-- ketiga -->
              <center>
              <h4 class="mt-3"><small>Avaliabel Tiket</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">50</span>&nbsp
                  <span class="text-xl">Tiket</span>
                </label>
              </div>
              <div class="bg-gray py-2 px-3 mt-2">
                <h2 class="mb-0">
                  Rp80.000 / Orang
                </h2>
                <!-- <h4 class="mt-0">
                  <small>$80.00 / Orang</small>
                </h4> -->
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Add to Cart
                </div>
              </div>

              </center>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
        <!-- </div> -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020-2021 <a href="#">Anak Tao</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery.min.js'?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/adminlte.min.js'?>"></script>

<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function () {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

</body>
</html>
