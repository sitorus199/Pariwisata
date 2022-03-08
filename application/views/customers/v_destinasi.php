<?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
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
  <title>Anak Tao | Destinasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/lte/adminlte.min.css'?>">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">


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
            <h1 class="m-0"> Destinasi <small>Anak Tao</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Destinasi</li>
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
      <?php
      function rupiah($angka){
  
        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
        return $hasil_rupiah;
 
      }
      foreach ($brt->result_array() as $b) {
        $id=$b['id_destinasi'];
        $nama=$b['nama_destinasi'];
        $deskripsi=$b['deskripsi'];
        $alamat=$b['alamat_destinasi'];
        $harga=$b['harga'];
        $stock=$b['stock'];
        $gbr=$b['gambar']; 
        $fasilitas=$b['fasilitas'];
      ?>

      <!-- Default box -->
      <div class="card card-solid"> 
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-4">
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12">
                <img src="<?php echo base_url().'assets/images/'.$gbr;?>" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-4">
              <h3 class="my-3"><?php echo $nama;?></h3>
              <p><?php echo $alamat;?></p>

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

                <a href="<?php echo base_url().'customers/destinasi/detail_destinasi/'.$id?>">
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
                  <span class="text-xl"><?php echo $stock;?></span>&nbsp
                  <span class="text-xl">Tiket</span>
                </label>
              </div>
              <div class="bg-gray py-2 px-3 mt-2">
                <h2 class="mb-0">
                  <?php echo rupiah($harga);?> / Orang
                </h2>
                <!-- <h4 class="mt-0">
                  <small>$80.00 / Orang</small>
                </h4> -->
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat" data-toggle="modal" data-target="#modal-default<?php echo $id;?>">
                  
                    <i class="fas fa-cart-plus"></i>
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
      <?php } ?>

      <?php
      foreach ($brt->result_array() as $b) {
        $id=$b['id_destinasi'];
        $nama=$b['nama_destinasi'];
        $deskripsi=$b['deskripsi'];
        $alamat=$b['alamat_destinasi'];
        $harga=$b['harga'];
        $stock=$b['stock'];
        $gbr=$b['gambar'];
        $fasilitas=$b['fasilitas'];
      ?>

      <div class="modal fade" id="modal-default<?php echo $id;?>">
        <div class="modal-dialog">
          <form class="form-horizontal" action="<?php echo base_url().'customers/destinasi/simpan_pemesanan'?>" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pesan Destinasi <?php echo $nama;?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <!-- <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">No Invoice</label>
                  <div class="col-sm-7">
                      <input type="text" name="xjudul" class="form-control" id="inputUserName" value="<?php echo $id;?>" placeholder="No Invoice" required>
                  </div>
              </div> -->
              <div class="form-group row">
                <input type="hidden" value="<?php echo $id;?>" name="xid">
                <input type="hidden" value="<?php echo $stock;?>" name="xstock">
                  <label for="inputUserName" class="col-sm-4 control-label">Pemesan</label>
                  
                  <div class="col-sm-7">
                      <input type="text" name="xnama" class="form-control" id="inputPemesanan" placeholder="Nama Pemesan" required>
                  </div>
              </div>
               <!-- <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-7">
                      <div class="input-group date">
                          <input type="hidden" name="xtanggal" value="<?php echo date("Y-m-d"); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
                      </div>
                  </div>
              </div>  -->
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                  <div class="col-sm-7">
                    <input type="hidden" name="xtanggal" value="<?php echo date("Y-m-d"); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>

                      <input type="text" name="xalamat" class="form-control" id="inputAlamat" placeholder="Alamat" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-7">
                      <input type="text" name="xemail" class="form-control" id="inputEmail" placeholder="Email " required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">No Telp</label>
                  <div class="col-sm-7">
                      <input type="number" name="xnotelp" class="form-control" id="inputNoTelp" placeholder="No Telp" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal Berangkat</label>
                  <div class="col-sm-7">
                      <div class="input-group date">
                          <!-- <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div> -->
                          <input type="text" name="xmulai" autocomplete="off" class="form-control pull-left" id="datepicker2" required>
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Tanggal Kembali</label>
                  <div class="col-sm-7">
                      <div class="input-group date">
                          <!-- <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div> -->
                          <input type="text" name="xakhir" autocomplete="off" class="form-control pull-left" id="datepicker3" required>
                      </div>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Jumlah Pesanan</label>
                  <div class="col-sm-7">
                      <input type="number" min="1" max="<?php echo $stock;?>" name="xjumlah" class="form-control" id="inputJumlahPesanan" placeholder="Jumlah" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Keterangan</label>
                  <div class="col-sm-7">
                      <input type="text" name="xketerangan" class="form-control" id="inputKeterangan" placeholder="Keterangan">
                  </div>
              </div>
              <!-- <div class="form-group row">
                  <label for="inputUserName" class="col-sm-4 control-label">Bukti Transfer</label>
                  <div class="col-sm-7">
                      <input type="file" name="filefoto"/>
                  </div>
              </div> -->
            </div>
            
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="simpan">Kirim</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php } ?>
      <!-- /.modal -->
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assets/dist/js/demo.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>



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
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>

</body>
</html>