<!--Counter Inbox-->
<?php
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $query3=$this->db->query("SELECT * FROM tbl_order WHERE status <> 'LUNAS'");
    $query4=$this->db->query("SELECT * FROM tbl_pembayaran");
    $jum_comment=$query2->num_rows();
    $jum_pesan=$query->num_rows();
    $jum_order=$query3->num_rows();
    $jum_konfirmasi=$query4->num_rows();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Anak Tao | Data Orders</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/AdminLTE.min.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.css'?>">
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/timepicker/bootstrap-timepicker.min.css'?>">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datepicker/datepicker3.css'?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php
    $this->load->view('admin/v_header');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li>
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Berita</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/tulisan'?>"><i class="fa fa-list"></i> List Event</a></li>
            <li><a href="<?php echo base_url().'admin/tulisan/add_tulisan'?>"><i class="fa fa-thumb-tack"></i> Post Event</a></li>
            <li><a href="<?php echo base_url().'admin/kategori'?>"><i class="fa fa-wrench"></i> Kategori</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-users"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo base_url().'admin/agenda'?>">
            <i class="fa fa-calendar"></i> <span>Agenda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li> -->
        <li class="">
          <a href="<?php echo base_url().'admin/souvenir'?>">
            <i class="fa fa-shopping-bag"></i> <span>Souvenir</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/kuliner'?>">
            <i class="fa fa-cutlery"></i> <span>Kuliner</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/paketwisata'?>">
            <i class="fa fa-gift"></i> <span>Paket Wisata</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/destinasi'?>">
            <i class="fa fa-map-signs"></i> <span>Destinasi</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/transportasi'?>">
            <i class="fa fa-bus"></i> <span>Transportasi</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/akomodasi'?>">
            <i class="fa fa-building"></i> <span>Akomodasi</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/pengumuman'?>">
            <i class="fa fa-volume-up"></i> <span>Pengumuman</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <!-- <li>
          <a href="<?php echo base_url().'admin/files'?>">
            <i class="fa fa-download"></i> <span>Download</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li> -->
        <li class="">
          <a href="<?php echo base_url().'admin/galeri'?>">
            <i class="fa fa-camera"></i> <span>Galery</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
        <li class="active">
          <a href="<?php echo base_url().'admin/orders'?>">
            <i class="fa fa-bell"></i> <span>Orders</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_order;?></small>
            </span>
          </a>
        </li>
        <li class="">
          <a href="<?php echo base_url().'admin/konfirmasi'?>">
            <i class="fa fa-money"></i> <span>Konfirmasi</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_konfirmasi;?></small>
            </span>
          </a>
        </li>

        <!-- <li>
          <a href="<?php echo base_url().'admin/inbox'?>">
            <i class="fa fa-envelope"></i> <span>Inbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_pesan;?></small>
            </span>
          </a>
        </li> -->

        <li>
          <a href="<?php echo base_url().'admin/komentar'?>">
            <i class="fa fa-comments"></i> <span>Komentar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_comment;?></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Destinasi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <!-- <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Add Destinasi</a>
            </div> -->
            <!-- /.box-header -->
            
            <div class="box-body">
              <h2>Paket Wisata</h2>
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <!-- <th style="width:70px;">#</th> -->
                    <th style="">No Invoice</th>
                    <th style="">Tgl Invoice</th>
                    <th style="">Atas Nama</th>
                    <th style="">Jumlah Order</th>
                    <th style="">Keberangkatan</th>
                    <th style="">Kepulangan</th>
                    <th style="">Total Bayar</th>
                    <th style="">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];

                    ?>
                <tr>
                  <td style=""><?php echo $id_paket; ?></td>
                  <td style=""><?php echo $tgl; ?></td>
                  <td style=""><?php echo $nama; ?></td>
                  <td style=""><?php echo $adult; ?></td>
                  <td style=""><?php echo $berangkat; ?></td>
                  <td style=""><?php echo $kembali; ?></td>
                  <td style=""><?php echo 'Rp '.number_format($total); ?></td>
                  <td style="">
                    <?php 
                     if($status=='LUNAS'):?>
                      <label class="label label-success">LUNAS</label>
                   <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'admin/orders/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#ModalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Batalkan"><span class="fa fa-close"></span> </a>
                   <?php endif ?>
                  </td>
                </tr>
				<?php endforeach;?>
                </tbody>
              </table>


            </div>

            <div class="box-body">
              <h2>Destinasi</h2>

              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                    <!-- <th style="width:70px;">#</th> -->
                    <th style="">No Invoice</th>
                    <th style="">Tgl Invoice</th>
                    <th style="">Atas Nama</th>
                    <th style="">Jumlah Order</th>
                    <th style="">Keberangkatan</th>
                    <th style="">Kepulangan</th>
                    <th style="">Total Bayar</th>
                    <th style="">Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no=0;
            foreach ($datadestinasi->result_array() as $i) :
               $no++;
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];

                    ?>
                <tr>
                  <td style=""><?php echo $id_paket; ?></td>
                  <td style=""><?php echo $tgl; ?></td>
                  <td style=""><?php echo $nama; ?></td>
                  <td style=""><?php echo $adult; ?></td>
                  <td style=""><?php echo $berangkat; ?></td>
                  <td style=""><?php echo $kembali; ?></td>
                  <td style=""><?php echo 'Rp '.number_format($total); ?></td>
                  <td style="">
                    <?php 
                     if($status=='LUNAS'):?>
                      <label class="label label-success">LUNAS</label>
                   <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'admin/orders/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#ModalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Batalkan"><span class="fa fa-close"></span> </a>
                   <?php endif ?>
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>
            </div>

            
            <div class="box-body">
              <h2 class="ml-3"> Akomodasi</h2>
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                    <!-- <th style="width:70px;">#</th> -->
                    <th style="">No Invoice</th>
                    <th style="">Tgl Invoice</th>
                    <th style="">Atas Nama</th>
                    <th style="">Jumlah Order</th>
                    <th style="">Keberangkatan</th>
                    <th style="">Kepulangan</th>
                    <th style="">Total Bayar</th>
                    <th style="">Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no=0;
            foreach ($dataakomodasi->result_array() as $i) :
               $no++;
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];

                    ?>
                <tr>
                  <td style=""><?php echo $id_paket; ?></td>
                  <td style=""><?php echo $tgl; ?></td>
                  <td style=""><?php echo $nama; ?></td>
                  <td style=""><?php echo $adult; ?></td>
                  <td style=""><?php echo $berangkat; ?></td>
                  <td style=""><?php echo $kembali; ?></td>
                  <td style=""><?php echo 'Rp '.number_format($total); ?></td>
                  <td style="">
                    <?php 
                     if($status=='LUNAS'):?>
                      <label class="label label-success">LUNAS</label>
                   <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'admin/orders/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#ModalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Batalkan"><span class="fa fa-close"></span> </a>
                   <?php endif ?>
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>


            </div>

            
            <div class="box-body">
              <h2>Transportasi</h2>
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                    <!-- <th style="width:70px;">#</th> -->
                    <th style="">No Invoice</th>
                    <th style="">Tgl Invoice</th>
                    <th style="">Atas Nama</th>
                    <th style="">Jumlah Order</th>
                    <th style="">Keberangkatan</th>
                    <th style="">Kepulangan</th>
                    <th style="">Total Bayar</th>
                    <th style="">Aksi</th>
                </tr>
                </thead>
                <tbody>
        <?php
          $no=0;
            foreach ($datatransportasi->result_array() as $i) :
               $no++;
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];

                    ?>
                <tr>
                  <td style=""><?php echo $id_paket; ?></td>
                  <td style=""><?php echo $tgl; ?></td>
                  <td style=""><?php echo $nama; ?></td>
                  <td style=""><?php echo $adult; ?></td>
                  <td style=""><?php echo $berangkat; ?></td>
                  <td style=""><?php echo $kembali; ?></td>
                  <td style=""><?php echo 'Rp '.number_format($total); ?></td>
                  <td style="">
                    <?php 
                     if($status=='LUNAS'):?>
                      <label class="label label-success">LUNAS</label>
                   <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'admin/orders/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#ModalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Batalkan"><span class="fa fa-close"></span> </a>
                   <?php endif ?>
                  </td>
                </tr>
        <?php endforeach;?>
                </tbody>
              </table>


            </div>



            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="http://mfikri.com">M Fikri Setiadi</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--Modal Add Pengguna-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Destinasi</h4> 
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/destinasi/simpan_destinasi'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Nama Destinasi</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Nama Destinasi" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                                <div class="col-sm-7">
                                  <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Alamat</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xalamat" class="form-control" id="inputUserName" placeholder="Alamat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Harga</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xharga" class="form-control" id="inputUserName" placeholder="Harga" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Stock</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xstock" class="form-control" id="inputUserName" placeholder="Stock" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Fasilitas</label>
                                <div class="col-sm-7">
                                  <input type="text" name="xfasilitas" class="form-control" id="inputUserName" placeholder="Fasilitas" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                <div class="col-sm-7">
                                    <input type="file" name="filefoto"/>
                                </div>
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


		<?php foreach ($data->result_array() as $i) :
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];
            ?>
	<!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Order</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/orders/edit_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                      <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Order</label>
                        <div class="col-xs-9">
                          <input name="adult" class="form-control" min="1" type="number" value="<?php echo $adult;?>" style="width:280px;" required>
                        </div>
                      </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
                $id=$i['id'];
                $id_paket=$i['id_paket'];
                $tgl=$i['tanggal'];
                $nama=$i['nama'];
                $alamat=$i['alamat'];
                $notelp=$i['no_telp'];
                $berangkat=$i['berangkat'];
                $kembali=$i['kembali'];
                $adult=$i['adult'];
                $total=$i['total'];
                $status=$i['status'];
            ?>
	<!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Order</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'admin/orders/hapus_orders'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                            <p>Apakah Anda yakin mau menghapus orderan dari <b><?php echo $nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>




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
<!-- page script -->
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
    $('.datepicker3').datepicker({
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
<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Order Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Order berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Order Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
