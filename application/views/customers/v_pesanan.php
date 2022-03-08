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
  <title>Anak Tao | Pesanan</title>

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
            <h1 class="m-0"> Pesanan <small>Anak Tao</small></h1>
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
                        <td class="ml-5">
                          <?php 
                          
                          $temp = $row->status; 
                          if( $temp == 'LUNAS'): ?>
                          <label class="label label-success ml-2">LUNAS</label>
                        <?php elseif ($temp == 'KONFIRMASI'):?>
                      <label class="label label-success ml-2">Telah Kirim Bukti</label>
                      <?php else:?>
                        <a class="btn btn-xs btn-danger" href="#ModalHapus<?= $row->id ?>" data-toggle="modal" title="Batalkan"><button type="button" class="btn btn-block btn-danger">Batal</button> </a>

                        <a class="btn btn-xs btn-warning" href="#ModalEdit<?= $row->id ?>" data-toggle="modal" title="Edit"><button type="button" class="btn btn-block btn-warning">Edit</button> </a>

                        <a class="btn btn-xs btn-success" href="<?php echo base_url().'customers/pesanan/pesan/'.$row->id ?>" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
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
                        <a class="btn btn-xs btn-warning" href="#ModalEdit<?= $row->id ?>" data-toggle="modal" title="Edit"><button type="button" class="btn btn-block btn-warning">Edit</button> </a>
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
                        <a class="btn btn-xs btn-warning" href="#ModalEdit<?= $row->id ?>" data-toggle="modal" title="Edit"><button type="button" class="btn btn-block btn-warning">Edit</button> </a>
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
                        <a class="btn btn-xs btn-warning" href="#ModalEdit<?= $row->id ?>" data-toggle="modal" title="Edit"><button type="button" class="btn btn-block btn-warning">Edit</button> </a>
                        <a class="btn btn-xs btn-success" href="#ModalKonfirmasi<?= $row->id ?>" data-toggle="modal" title="Konfirmasi"><button type="button" class="btn btn-block btn-success">Bayar</button> </a>
                        <?php endif ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
    
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <?php
     foreach($data as $row){
    ?>  
        <div class="modal fade" id="ModalEdit<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pesanan</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/pesanan/edit_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body"><center>
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                        <p>Edit jumlah pesanan <b><?=  $row->nama_paket ?></b> Anda !!</p>
                        </center>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Pesanan</label>
                        <div class="col-sm-7">
                          <input type="number" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Pesanan" value="<?=  $row->adult ?>" >
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <?php
     foreach($datadestinasi as $row){
    ?>  
        <div class="modal fade" id="ModalEdit<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pesanan</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/pesanan/edit_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body"><center>
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                        <p>Edit jumlah pesanan <b><?=  $row->nama_destinasi ?></b> Anda !!</p>
                        </center>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Pesanan</label>
                        <div class="col-sm-7">
                          <input type="number" min="1" max="<?=  $row->stock ?>" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Pesanan" value="<?=  $row->adult ?>" >
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <?php
     foreach($dataakomodasi as $row){
    ?>  
        <div class="modal fade" id="ModalEdit<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pesanan</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/pesanan/edit_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body"><center>
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                        <p>Edit jumlah pesanan <b><?=  $row->nama_akomodasi ?></b> Anda !!</p>
                        </center>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Pesanan</label>
                        <div class="col-sm-7">
                          <input type="number" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Pesanan" value="<?=  $row->adult ?>" >
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>
      <?php
     foreach($datatransportasi as $row){
    ?>  
        <div class="modal fade" id="ModalEdit<?=  $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-eader"><center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Pesanan</h4></center>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'customers/pesanan/edit_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body"><center>
                     <input type="hidden" name="kode" value="<?=  $row->id ?>"/>
                        <p>Edit jumlah pesanan <b><?=  $row->nama_transportasi ?></b> Anda !!</p>
                        </center>
                    </div>
                    <div class="form-group row">
                        <label for="inputUserName" class="col-sm-4 control-label ml-3">Jumlah Pesanan</label>
                        <div class="col-sm-7">
                          <input type="number" min="1" name="xjumlah" class="form-control" id="inputEmail" placeholder="Jumlah Pesanan" value="<?=  $row->adult ?>" >
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <?php } ?>

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
                          <input type="hidden" name="xtanggal" value="<?php echo date('Y-m-d');?>" autocomplete="off" id="datepicker" required>
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
                          <input type="hidden" name="xtanggal" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
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
                          <input type="hidden" name="xtanggal" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
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
                          <input type="hidden" name="xtanggal" value="<?php echo date('Y-m-d'); ?>" autocomplete="off" class="form-control pull-left" id="datepicker" required>
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