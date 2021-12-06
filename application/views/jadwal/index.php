	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Jadwal</h2>
					<div class="divider-header"></div>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		<div class="container">

        <div class="row animatedParent">
		
			<div class="col-md-12">
				<div class="animated rotateInDownLeft">
					<div class="service-box">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th class="text-center">Kelas</th>
							  <th class="text-center">Waktu</th>
							  <th class="text-center">Mulai Belajar</th>
							</tr>
						  </thead>
						  <tbody>
						  <?php foreach ($dataJadwal as $d) { ?>
							<tr>
							  <td><?=$d->jadwal_kelas?></td>
							  <td><?=$d->jadwal_jam?></td>
							  <td><?=$d->jadwal_mulai?></td>
							</tr>
							<?php } ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		
		</div>
			</br>
			</br>
			<a href="<?=base_url()?>borangPendaftaran" class="btn btn-lg btn-skin btn-scroll" style="padding: 15px; font-size: 20px">Daftar Sekarang</a>		
		</div>
		</div>
	</section>
	<!-- /Section: services -->
	
