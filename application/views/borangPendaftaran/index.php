 <script src="<?=base_url();?>assets/pages/js/form-validation-borang-pendaftaran.js" type="text/javascript"></script>
 	
	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Borang Pendaftaran</h2>
					<div class="divider-header"></div>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
			<div class="container">

			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2">
						<form id="form" class="contactForm">						
							<div id="sendmessage">Pendaftaran Berhasil</div>
							<div id="errormessage"></div>
    						<div class="row marginbot-20">
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">
        								<input type="text" name="pendaftar_nama" class="form-control" id="pendaftar_nama" placeholder="Nama" />
                                    </div>
    							</div>
    							<div class="col-md-6">
    							    <div class="form-group">
        								<input type="email" class="form-control" name="pendaftar_no_telp" id="pendaftar_no_telp" placeholder="No Telp"/>
    							    </div>
    							</div>
    						</div>
    						<div class="row marginbot-20">
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">
        								<input type="text" name="pendaftar_email" class="form-control" id="pendaftar_email" placeholder="Email" />
                                    </div>
    							</div>
    							<div class="col-md-6">
    							    <div class="form-group">
        								<input type="email" class="form-control" name="pendaftar_email_konfirm" id="pendaftar_email_konfirm" placeholder="Konfirmasi Email"/>
    							    </div>
    							</div>
    						</div>
							
    						<div class="row marginbot-20">
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">									
										<select name="pendaftar_kelas" class="form-control">
											<option value="">Pilih Kelas</option>
										<?php 
										foreach ($dataKelasBiaya as $d)
										{ ?>
											<option value="<?=$d->kelasbiaya_id?>"><?=$d->kelasbiaya_nama?></option>
										<?php } ?>
										</select>
                                    </div>
    							</div>
    							<div class="col-md-6">
    							    <div class="form-group">								
										<select name="pendaftar_jadwal" class="form-control">
											<option value="">Pilih Jadwal</option>
										<?php 
										foreach ($dataJadwal as $d)
										{ ?>
											<option value="<?=$d->jadwal_id?>">Kelas : <?=$d->jadwal_kelas?> | Jam : <?=$d->jadwal_jam?> | Mulai : <?=$d->jadwal_mulai?></option>
										<?php } ?>
										</select>
    							    </div>
    							</div>
    						</div>
    						<div class="row marginbot-20">
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">
										<textarea class="form-control" placeholder="Alamat" name="pendaftar_alamat" id="pendaftar_alamat"></textarea>
                                    </div>
    							</div>
    							<div class="col-md-6">
    							    <div class="form-group">
										<textarea class="form-control" placeholder="Keterangan Lainnya" name="pendaftar_ket_lain" id="pendaftar_ket_lain"></textarea>
    							    </div>
    							</div>
    						</div>
							
    						<div class="row">
    								<button type="button" class="btn btn-skin btn-lg btn-block" id="btnSave" onclick="cek()">
    									Daftar</button>
    							</div>
    						</div>
						</form>
				</div>
			</div>	
<script>
$(document).ready(function() {
	$("#pendaftar_nama").focus();
});

function save(){ //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
	var url;
		$('#btnSave').text('Daftar...');
        url = "<?php echo site_url('borangPendaftaran/save')?>";

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
				$("#sendmessage").show();		
            } else {
				$("#errormessage").show();
				$("#errormessage").html(data.msg);
				$('[name="pendaftar_nama"]').focus();
			}
			$('#btnSave').text('Daftar'); //change button text
			$('#btnSave').attr('disabled',false); //set button enable 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			$("#errormessage").show();
			$("#errormessage").html('Tidak Dapat Menyimpan Data');
			$('#btnSave').text('Daftar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}
</script>


		</div>
	</div>
	</section>
	<!-- /Section: services -->
	
