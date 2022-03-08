<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>About</title>
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/logo.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/slick-theme.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
</head>

<body>
    <!--============================= HEADER =============================-->
    <div class="header-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-8 col-md-9">
                    <div class="header-top_address">
                        <div class="header-top_list">
                            <span class="icon-phone"></span>082272375895
                        </div>
                        <div class="header-top_list">
                            <span class="icon-envelope-open"></span>panaktoba@gmail.com
                        </div>
                        <div class="header-top_list">
                            <span class="icon-location-pin"></span>Samosir
                        </div>
                    </div>
                    <div class="header-top_login2">
                        <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3">
                    <div class="header-top_login mr-sm-3">
                        <a href="<?php echo site_url('contact');?>">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-toggle="affix" style="border-bottom:solid 1px #f2f2f2;">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-light bg-faded">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="200px;" src="<?php echo base_url().'theme/images/logoAnakTao2.png'?>"></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('');?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('paketwisata');?>">Paket_Wisata</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('destinasi');?>">Destinasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('acomodasi');?>">Akomodasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('transportasi');?>">Transportasi</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('guru');?>">Guru</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('siswa');?>">Siswa</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('blog');?>">Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('pengumuman');?>">Pengumuman</a>
                                </li>
                               <!--  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('agenda');?>">Event</a>
                                </li> -->
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('download');?>">Download</a>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('galeri');?>">Gallery</a>
                                </li>
                                <!-- <li class="nav-item">
                                  <a class="nav-link" href="<?php echo site_url('contact');?>">Contact</a>
                                </li> -->
                                <li class="nav-item">
                                    <a href="<?php echo base_url().'administrator'?>" class="nav-link">Login</a>
                                </li>
                          </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
      <section>
</section>
<!--//END HEADER -->
<div class="content">
      <div class="container"><br>
<section class="content">
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
                  Rp <?php echo $harga;?> / Orang
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
      </div><br>
      <?php } ?>
</section>
</div>
</div>

    <!--//END TESTIMONIAL -->
    <!--============================= DETAILED CHART =============================-->
    <!-- <div class="detailed_chart">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_1.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_guru;?></span> Guru
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_bottom chart_top">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_2.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_siswa;?></span> Siswa
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 chart_top">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_3.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_files;?></span> Download
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="chart-img">
                        <img src="<?php echo base_url().'theme/images/chart-icon_4.png'?>" class="img-fluid" alt="chart_icon">
                    </div>
                    <div class="chart-text">
                        <p><span class="counter"><?php echo $tot_agenda;?></span> Agenda</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!--//END DETAILED CHART -->

        <!--============================= FOOTER =============================-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="foot-logo">
                            <a href="<?php echo site_url();?>">
                                <img src="<?php echo base_url().'theme/images/logoAnakTao2.png'?>" class="img-fluid" alt="footer_logo">
                            </a>
                            <p><?php echo date('Y');?> © copyright by <a href="https://destinasi-toba.000webhostapp.com/" target="_blank">Anak Tao</a>. <br>All rights reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sitemap">
                                <h3>Menu Utama</h3>
                                <ul>
                                    <li><a href="<?php echo site_url();?>">Home</a></li>
                                    <li><a href="<?php echo site_url('about');?>">About</a></li>
                                    <li><a href="<?php echo site_url('artikel');?>">Blog </a></li>
                                    <li><a href="<?php echo site_url('galeri');?>">Gallery</a></li>
                                    <li><a href="<?php echo site_url('contact');?>">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                          <div class="sitemap">
                              <h3>Penting</h3>
                              <ul>
                                  
                                  <li><a href="<?php echo site_url('pengumuman');?>">Pengumuman</a></li>
                                  <li><a href="<?php echo site_url('agenda');?>">Agenda</a></li>
                                  <li><a href="<?php echo site_url('download');?>">Download</a></li>
                              </ul>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="address">
                                <h3>Hubungi Kami</h3>
                                <p><span>Alamat: </span> Padang, Sumatera Barat, INA. 11001</p>
                                <p>Email : panaktoba@gmail.com
                                    <br> Phone : - </p>
                                    <ul class="footer-social-icons">
                                        <li><a href="#"><i class="fa fa-facebook fa-fb" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin fa-in" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter fa-tw" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!--//END FOOTER -->
                <!-- jQuery, Bootstrap JS. -->
                <script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/tether.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
                <!-- Plugins -->
                <script src="<?php echo base_url().'theme/js/slick.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/waypoints.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/counterup.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/owl.carousel.min.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/validate.js'?>"></script>
                <script src="<?php echo base_url().'theme/js/tweetie.min.js'?>"></script>
                <!-- Subscribe -->
                <script src="<?php echo base_url().'theme/js/subscribe.js'?>"></script>
                <!-- Script JS -->
                <script src="<?php echo base_url().'theme/js/script.js'?>"></script>
            </body>

            </html>
