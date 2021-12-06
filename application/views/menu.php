<?php if($menu == 'home'){ ?>
	<section class="hero" id="intro">
            <div class="container" style="margin-top: 10%">
              <div class="row">
                <div class="col-md-12 text-right navicon">
                  <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                </div>
              </div>
              <div class="row">

                <div class="col-md-8 col-md-offset-2 text-center inner" style="background: rgba(0, 0, 0, 0.4); padding: 1px 0 10px 0; border-radius: 20px">
					<div class="animatedParent"> 
						<h1 class="animated fadeInDown">MY ARABIC CLASS</h1>
						<p class="animated fadeInUp">Kelas Bahasa Arab yang mudah dan gembira </p>
					</div>
			   </div>
              </div>
              <div class="row">
                <div class="col-md-12 text-center">
					<div class=" col-lg-4">
						<a href="#about" class="learn-more-btn btn-scroll col-lg-12" style="margin-right: 10px">Next Info</a>
					</div>
					<div class=" col-lg-4">
						<a href="https://api.whatsapp.com/send?phone=60193811043" class="learn-more-btn btn-scroll col-lg-12 " style="margin-right: 10px" target="_blank">Kirim Mesej Menggunakan Whatsapp</a>
					</div>
					<div class=" col-lg-4">
						<a href="<?=base_url()?>borangPendaftaran"  class="learn-more-btn btn-scroll col-lg-12">Daftar Sekarang</a>
					</div>
                </div>
              </div>
            </div>
    </section>
<?php } ?>

    <!-- Navigation -->
    <div id="navigation">
        <nav class="navbar navbar-custom" role="navigation">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-2">
                                                   <div class="site-logo">
                                                            <a href="<?=base_url()?>home" class="brand">ARABIC CLASS </a>
                                                    </div>
                                          </div>
                                          

                                          <div class="col-md-10">
                         
                                                      <!-- Brand and toggle get grouped for better mobile display -->
                                          <div class="navbar-header">
                                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                                <i class="fa fa-bars"></i>
                                                </button>
                                          </div>
                                                      <!-- Collect the nav links, forms, and other content for toggling -->
                                                      <div class="collapse navbar-collapse" id="menu">
                                                            <ul class="nav navbar-nav navbar-right">
                                                                  <li <?php if($menu == 'home'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>home">Home</a></li>
                                                                  <li <?php if($menu == 'jadwal'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>jadwal">Jadwal Kelas</a></li>
																  <li <?php if($menu == 'kelasBiaya'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>kelasBiaya">Pilihan Kelas & Biaya</a></li>
                                                                  <li <?php if($menu == 'borangPendaftaran'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>borangPendaftaran">Borang Pendaftaran</a></li>
                                                                  <li <?php if($menu == 'konfirmasiPembayaran'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>konfirmasiPembayaran">Konfirmasi pembayaran</a></li>
                                                                  <li <?php if($menu == 'galery'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>galery">Galeri Image</a></li>
                                                                  <li <?php if($menu == 'blog'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>blog">Blog</a></li>
                                                                  <li <?php if($menu == 'kolomTestimoni'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>kolomTestimoni">Form Testimoni</a></li>
                                                                  <li <?php if($menu == 'donasi'){ ?> style="background: #3dc9b3 !important" <?php }?>>
																	<a href="<?=base_url()?>donasi">Form Donasi</a></li>
                                                            </ul>
                                                      </div>
                                                      <!-- /.Navbar-collapse -->
                             
                                          </div>
                                    </div>
                              </div>
                              <!-- /.container -->
                        </nav>
    </div> 
    <!-- /Navigation -->  