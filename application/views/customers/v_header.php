
<!-- <link rel="stylesheet" href="<?php echo base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
 -->

 <style>
   .pull-right{padding-top: -5px; padding-right:15px;padding-left:0;text-align:right;border-right:5px solid #eee;border-left:0}
   .pull-left{padding-right:10px;padding-top: -5px}.media-body,.media-left,.media-right{display:table-cell;vertical-align:top}.pull-left{float:left!important}.hide{display:none!important}
 </style>
 <?php 

  ?>
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url().'admin/dashboard'?>" class="navbar-brand">
        <img class="img img-responsive" width="150px;" src="<?php echo base_url().'theme/images/logoAnakTao2.png'?>">
        
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?php echo base_url().'customers/home'?>" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'customers/paketwisata'?>" class="nav-link">Paket_Wisata</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'customers/destinasi'?>" class="nav-link">Destinasi</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'customers/accomodation'?>" class="nav-link">Akomodasi</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url().'customers/transportasi'?>" class="nav-link">Transportasi</a>
          </li>
          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Budaya</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url().'customers/souvenir'?>" class="dropdown-item">Souvenir </a></li>
              <li><a href="<?php echo base_url().'customers/kuliner'?>" class="dropdown-item">Kuliner</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url().'customers/blog'?>" class="nav-link">Event</a>
          </li>

        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>
      <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" href="<?php echo base_url().'customers/pesanan'?>">
            <i class="fas fa-cart-plus fa-lg mr-1"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          
        </li>

          
          <li class="dropdown user user-menu">
            <a href="#" class="nav-link" data-toggle="dropdown">
              <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="user-image" alt="">
              <!-- <span class="hidden-xs"><?php echo $c['pengguna_nama'];?></span> -->
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().'assets/images/'.$c['pengguna_photo'];?>" class="img-circle" alt="">

                <p>
                  <?php echo $c['pengguna_nama'];?>
                  <?php if($c['pengguna_level']=='1'):?>
                    <small>Administrator</small>
                  <?php else:?>
                    <small>Author</small>
                  <?php endif;?>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer ">
                <div class="pull-left">
                  <a href="<?php echo base_url().'customers/profile'?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url().'admin/login/logout'?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>

            </ul>
          </li>
          <li>
            <a href="<?php echo base_url().''?>" target="_blank" class="" title="Lihat Website"><i class="fa fa-globe fa-2x mt-1"></i></a>
          </li>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->