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
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">Ribbons</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row mt-4">
                  <?php
                  foreach ($brt->result_array() as $b) {
                    $id=$b['id'];
                    $nama=$b['nama_souvenir'];
                    $ketbuka=$b['ket_buka'];
                    $kettutup=$b['ket_tutup'];
                    $keterangan=$b['keterangan'];
                    $gbr=$b['gambar'];
                  ?>
                  <div class="col-sm-4">
                    <div class="position-relativ">
                      <img src="<?php echo base_url().'assets/images/'.$gbr;?>" alt="Photo 1" class="img-flui">
                      <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-success text-lg">
                          <?php echo $nama;?>
                        </div>
                      </div>
                      <div class="card-img-overlay d-flex flex-column justify-content-end" >
                        <h5 style="" class="card-title text-primary text-white"><b><?php echo $nama;?></b></h5>
                        <b><p class="card-text text-white pb-2 pt-1"><?php echo $keterangan;?></p>
                        <a href="#" class="text-black">Buka : <?php echo $ketbuka;?> Tutup : <?php echo $kettutup;?></a></b>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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