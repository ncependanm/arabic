	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Pilihan Kelas Dan Biaya.</h2>
					<div class="divider-header"></div>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		<div class="container">

        <div class="row animatedParent">
		<?php 
		foreach ($dataKelasBiaya as $d)
		{ ?>
			<div class="col-md-4">
				<div class="animated rotateInDownLeft">
                <div class="service-box">
					<div class="service-desc">						
						<h5><?=$d->kelasbiaya_nama?></h5>
						<div class="divider-header"></div>
						<p><?=$d->kelasbiaya_ket?>
						</p>
						<div class="btn btn-skin"><?=$d->kelasbiaya_biaya?></div>
					</div>
                </div>
				</div>
            </div>
		<?php }
		?>
		</div>		
		</br>
		</br>
		<a href="<?=base_url()?>borangPendaftaran" class="btn btn-lg btn-skin btn-scroll" style="padding: 15px; font-size: 20px">Daftar Sekarang</a>
		</div>
		</div>
	</section>
	<!-- /Section: services -->
	
