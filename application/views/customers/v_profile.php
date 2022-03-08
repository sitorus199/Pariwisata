<?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $id=$this->db->query("SELECT pengguna_id FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
              $id_ro=$id->row_array();
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
  <title>Anak Tao | Profile</title>

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
            <h1 class="m-0"> Profile <small>Anak Tao</small></h1>
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
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $c['pengguna_nama'];?></h3>

                <!-- <p class="text-muted text-center">Software Engineer</p>
 -->
                <ul class="list-group list-group-unbordered mb-0">
                  <li class="list-group-item">
                    <b>No HP</b> <a class="float-right"><?php echo $c['pengguna_nohp'];?></a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <strong><i class="fas fa-book mr-1"></i> Motto</strong> -->
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">
                  <?php echo $c['pengguna_moto'];?>
                </p>

                <hr>

                <!-- <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>

                <p class="text-muted">Balige</p>

                <hr> -->

                <!-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p> -->

                <!-- <hr> -->

                <!-- <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#pesanan" data-toggle="tab">Pesanan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="pesanan">
                    <h2>Paket Wisata</h2>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Kode Paket #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      function rupiah($angka){
  
                        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                        return $hasil_rupiah;
 
                        }
                        
                        foreach($data as $row){
            
                        ?>
                      <tr>
                        <td><?= $row->adult ?></td>
                        <td><a href="#ModalDetail<?= $row->id ?>" data-toggle="modal" title="Lihat Detail"><?= $row->nama_paket ?></a></td>
                        <td><?=  $row->id_paket ?></td>
                        <td><?=  $row->keterangan ?></td>
                        <td><?=  rupiah($row->harga*$row->adult) ?></td>
                        <td>
                          <?php 
                          
                          $temp = $row->status; 
                          if( $temp == 'LUNAS'): ?>
                          <label class="label label-success ml-2">LUNAS</label>
                        <?php elseif ($temp == 'KONFIRMASI'):?>
                      <label class="label label-success ml-2">Telah Kirim Bukti</label>
                      <?php else:?>
                        <a class="btn btn-xs btn-danger" href="#ModalHapus<?= $row->id ?>" data-toggle="modal" title="Batalkan"><button type="button" class="btn btn-block btn-danger">Batal</button> </a>


                      
                        <a class="btn btn-xs btn-success" href="#ModalKonfirmasi<?= $row->id ?>" data-toggle="modal" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
                        <?php endif ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table> 

                  <h2>Destinasi</h2>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Kode Paket #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($datadestinasi as $row){
            
                        ?>
                      <tr>
                        <td><?= $row->adult ?></td>
                        <td><a href="#ModalDetail<?= $row->id ?>" data-toggle="modal" title="Lihat Detail"><?= $row->nama_destinasi ?></a></td>
                        <td><?=  $row->id_paket ?></td>
                        <td><?=  $row->keterangan ?></td>
                        <td><?=  rupiah($row->harga*$row->adult) ?></td>
                        <td>
                          <?php 
                          
                          $temp = $row->status; 
                          if( $temp == 'LUNAS'): ?>
                          <label class="label label-success ml-2">LUNAS</label>
                        <?php elseif ($temp == 'KONFIRMASI'):?>
                      <label class="label label-success ml-2">Telah Kirim Bukti</label>
                      <?php else:?>
                        <a class="btn btn-xs btn-danger" href="#ModalHapus<?= $row->id ?>" data-toggle="modal" title="Batalkan"><button type="button" class="btn btn-block btn-danger">Batal</button> </a>


                      
                        <a class="btn btn-xs btn-success" href="#ModalKonfirmasi<?= $row->id ?>" data-toggle="modal" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
                        <?php endif ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table> 

                  <h2>Akomodasi</h2>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Kode Paket #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($dataakomodasi as $row){
            
                        ?>
                      <tr>
                        <td><?= $row->adult ?></td>
                        <td><a href="#ModalDetail<?= $row->id ?>" data-toggle="modal" title="Lihat Detail"><?= $row->nama_akomodasi ?></a></td>
                        <td><?=  $row->id_paket ?></td>
                        <td><?=  $row->keterangan ?></td>
                        <td><?=  rupiah($row->harga*$row->adult) ?></td>
                        <td>
                          <?php 
                          
                          $temp = $row->status; 
                          if( $temp == 'LUNAS'): ?>
                          <label class="label label-success ml-2">LUNAS</label>
                        <?php elseif ($temp == 'KONFIRMASI'):?>
                      <label class="label label-success ml-2">Telah Kirim Bukti</label>
                      <?php else:?>
                        <a class="btn btn-xs btn-danger" href="#ModalHapus<?= $row->id ?>" data-toggle="modal" title="Batalkan"><button type="button" class="btn btn-block btn-danger">Batal</button> </a>


                      
                        <a class="btn btn-xs btn-success" href="#ModalKonfirmasi<?= $row->id ?>" data-toggle="modal" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
                        <?php endif ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>

                  <h2>Transportasi</h2>
                    <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Kode Paket #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach($datatransportasi as $row){
            
                        ?>
                      <tr>
                        <td><?= $row->adult ?></td>
                        <td><a href="#ModalDetail<?= $row->id ?>" data-toggle="modal" title="Lihat Detail"><?= $row->nama_transportasi ?></a></td>
                        <td><?=  $row->id_paket ?></td>
                        <td><?=  $row->keterangan ?></td>
                        <td><?=  rupiah($row->harga*$row->adult) ?></td>
                        <td>
                          <?php 
                          
                          $temp = $row->status; 
                          if( $temp == 'LUNAS'): ?>
                          <label class="label label-success ml-2">LUNAS</label>
                        <?php elseif ($temp == 'KONFIRMASI'):?>
                      <label class="label label-success ml-2">Telah Kirim Bukti</label>
                      <?php else:?>
                        <a class="btn btn-xs btn-danger" href="#ModalHapus<?= $row->id ?>" data-toggle="modal" title="Batalkan"><button type="button" class="btn btn-block btn-danger">Batal</button> </a>


                      
                        <a class="btn btn-xs btn-success" href="#ModalKonfirmasi<?= $row->id ?>" data-toggle="modal" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
                        <?php endif ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>


                  </div>
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          Data Diri
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <!-- <i class="fas fa-envelope bg-primary"></i> -->
                        <i class="fas fa-user bg-primary"></i>

                        <div class="timeline-item">
                          <!-- <span class="time"><i class="far fa-clock"></i> 12:05</span> -->

                          <h3 class="timeline-header"><a href="#"><?php echo $c['pengguna_nama'];?></a></h3>

                          <div class="timeline-body">
                            <?php echo $c['pengguna_tentang'];?>
                          </div>
                          <!-- <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div> -->
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-info"></i>

                        <div class="timeline-item">
                          

                          <h3 class="timeline-header border-0"><a href="#"><?php echo $c['pengguna_email'];?></a></h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <!-- <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div> -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->


                  <!--Modal Konfirmasi Pengguna--> 
                  <?php
                        
                foreach($data as $row){
            
                ?> 
        <div class="modal fade" id="ModalKonfirmasi<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/konfirmasi_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Silahkan Upload Bukti Pembayaran  <b> <?=  $row->nama_paket ?>  </b>Anda !!</p>

                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Transfer</label>
                        <div class="col-sm-7">
                          <input type="hidden" value="<?=  $row->id_paket ?>" name="xidpaket">
                          <input type="hidden" value="<?=  $row->nama ?>" name="xnama">
                          <input type="hidden" name="xtanggal" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" >
                          <input type="text" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Transfer " value="<?=  $row->harga*$row->adult ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Bukti Pembayaran</label>
                        <div class="col-sm-7">
                            <input type="file" name="filefoto" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>
<?php
                        
                foreach($datadestinasi as $row){
            
                ?> 
        <div class="modal fade" id="ModalKonfirmasi<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/konfirmasi_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Silahkan Upload Bukti Pembayaran  <b> <?=  $row->nama_destinasi ?>  </b>Anda !!</p>

                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Transfer</label>
                        <div class="col-sm-7">
                          <input type="hidden" value="<?=  $row->id_paket ?>" name="xidpaket">
                          <input type="hidden" value="<?=  $row->nama ?>" name="xnama">
                          <input type="hidden" name="xtanggal" value="<?php echo date("Y-m-d"); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
                          <input type="text" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Transfer " value="<?=  $row->harga*$row->adult ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Bukti Pembayaran</label>
                        <div class="col-sm-7">
                            <input type="file" name="filefoto" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>
<?php
                        
                foreach($dataakomodasi as $row){
            
                ?> 
        <div class="modal fade" id="ModalKonfirmasi<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/konfirmasi_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Silahkan Upload Bukti Pembayaran  <b> <?=  $row->nama_akomodasi ?>  </b>Anda !!</p>

                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Transfer</label>
                        <div class="col-sm-7">
                          <input type="hidden" value="<?=  $row->id_paket ?>" name="xidpaket">
                          <input type="hidden" value="<?=  $row->nama ?>" name="xnama">
                          <input type="hidden" name="xtanggal" value="<?php echo date("Y-m-d"); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
                          <input type="text" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Transfer " value="<?=  $row->harga*$row->adult ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Bukti Pembayaran</label>
                        <div class="col-sm-7">
                            <input type="file" name="filefoto" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>
<?php
                        
                foreach($datatransportasi as $row){
            
                ?> 
        <div class="modal fade" id="ModalKonfirmasi<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Bukti Pembayaran</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/konfirmasi_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Silahkan Upload Bukti Pembayaran  <b> <?=  $row->nama_transportasi ?>  </b>Anda !!</p>

                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Transfer</label>
                        <div class="col-sm-7">
                          <input type="hidden" value="<?=  $row->id_paket ?>" name="xidpaket">
                          <input type="hidden" value="<?=  $row->nama ?>" name="xnama">
                          <input type="hidden" name="xtanggal" value="<?php echo date("Y-m-d"); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
                          <input type="text" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Transfer " value="<?=  $row->harga*$row->adult ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Bukti Pembayaran</label>
                        <div class="col-sm-7">
                            <input type="file" name="filefoto" required/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Kirim</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<?php } ?>

<div class="tab-pane" id="settings">
                     <form class="form-horizontal" action="<?php echo base_url().'customers/profile/update_pengguna'?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="<?php echo $c['pengguna_photo'];?>" name="gambar">
                      <input type="hidden" name="kode" value="<?php echo $c['pengguna_id'];?>"/>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="xnama" id="inputName" value="<?php echo $c['pengguna_nama'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="xemail" class="form-control" id="inputEmail" value="<?php echo $c['pengguna_email'];?>" readonly="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" name="xmoto" class="form-control" id="inputName2" value="<?php echo $c['pengguna_moto'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">No HP</label>
                        <div class="col-sm-10">
                          <input type="number" name="xnohp" class="form-control" id="inputName2" value="<?php echo $c['pengguna_nohp'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Tentang</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="xtentang" id="inputExperience" placeholder="Experience"><?php echo $c['pengguna_tentang'];?></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <?php
                          $pengguna_jenkel = $c['pengguna_jenkel'];
                           if($pengguna_jenkel=='L'):?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                            <label class="form-check-label">Laki-laki</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" id="inlineRadio1" value="P" name="xjenkel" >
                            <label class="form-check-label">Perempuan</label>
                          </div>
                          <?php else:?>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" id="inlineRadio1" value="L" name="xjenkel">
                            <label class="form-check-label">Laki-laki</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                            <label class="form-check-label">Perempuan</label>
                          </div>
                          <?php endif;?>
                        </div>
                      </div>
                      <div class="form-group row">
                          <label for="inputUserName" class="col-sm-2 col-form-label">Photo</label>
                          <div class="col-sm-10">
                            <input type="file" name="filefoto"/>
                          </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger" id="simpan">Simpan</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>




                  <!--Modal Hapus Pengguna-->
                <?php
                        
                foreach($data as $row){
            
                ?>  
        <div class="modal fade" id="ModalHapus<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Batal Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/hapus_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?=  $row->nama_paket ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <!--Modal Hapus Pengguna-->
                <?php
                        
                foreach($datadestinasi as $row){
            
                ?>  
        <div class="modal fade" id="ModalHapus<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Batal Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/hapus_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?=  $row->nama_destinasi ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <!--Modal Hapus Pengguna-->
                <?php
                        
                foreach($dataakomodasi as $row){
            
                ?>  
        <div class="modal fade" id="ModalHapus<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Batal Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/hapus_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?=  $row->nama_akomodasi ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <!--Modal Hapus Pengguna-->
                <?php
                        
                foreach($datatransportasi as $row){
            
                ?>  
        <div class="modal fade" id="ModalHapus<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Batal Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile/hapus_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?=  $row->nama_transportasi ?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>

                <?php
                        
                foreach($data as $row){
            
                ?>

        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalDetail<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <!-- <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?php echo $namadestinasi;?></b> ?</p> -->
                            
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Produk</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->nama_paket ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Qty</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->adult ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kode Paket</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->id_paket ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Alamat</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->alamat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Deskripsi</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->deskripsi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Total</label>
                      <div class="col-sm-7">
                        <p>: <?=  rupiah($row->harga*$row->adult) ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Berangkat </label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->berangkat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kembali</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->kembali ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Status</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->status ?></p>
                      </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Ok</button>
                        <!-- <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>  
        <?php
                        
                        foreach($datadestinasi as $row){
            
                        ?>

        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalDetail<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <!-- <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?php echo $namadestinasi;?></b> ?</p> -->
                            
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Produk</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->nama_destinasi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Qty</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->adult ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kode Paket</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->id_paket ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Alamat</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->alamat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Deskripsi</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->deskripsi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Total</label>
                      <div class="col-sm-7">
                        <p>: <?=  rupiah($row->harga*$row->adult) ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Berangkat </label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->berangkat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kembali</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->kembali ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Status</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->status ?></p>
                      </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Ok</button>
                        <!-- <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php
                        
                        foreach($dataakomodasi as $row){
            
                        ?>

        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalDetail<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <!-- <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?php echo $namadestinasi;?></b> ?</p> -->
                            
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Produk</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->nama_akomodasi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Qty</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->adult ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kode Paket</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->id_paket ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Alamat</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->alamat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Deskripsi</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->deskripsi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Total</label>
                      <div class="col-sm-7">
                        <p>: <?=  rupiah($row->harga*$row->adult) ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Berangkat </label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->berangkat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kembali</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->kembali ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Status</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->status ?></p>
                      </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Ok</button>
                        <!-- <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php
                        
                        foreach($datatransportasi as $row){
            
                        ?>

        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalDetail<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Detail Order</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/profile'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                     <!-- <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                            <p>Apakah Anda yakin mau membatalkan orderan <b><?php echo $namadestinasi;?></b> ?</p> -->
                            
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Produk</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->nama_transportasi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Qty</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->adult ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kode Paket</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->id_paket ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Alamat</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->alamat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Deskripsi</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->deskripsi ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Total</label>
                      <div class="col-sm-7">
                        <p>: <?=  rupiah($row->harga*$row->adult) ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Berangkat </label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->berangkat ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Kembali</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->kembali ?></p>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputUserName" class="col-sm-4 control-label ml-3">Status</label>
                      <div class="col-sm-7">
                        <p>: <?=  $row->status ?></p>
                      </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-flat" data-dismiss="modal">Ok</button>
                        <!-- <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?> 

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
