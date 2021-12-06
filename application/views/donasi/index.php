<script src="<?=base_url();?>assets/pages/js/form-validation-kolom-testimoni.js" type="text/javascript"></script>
  
	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Form Donasi</h2>
					<div class="divider-header"></div>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
			<div class="container">

			<div class="row marginbot-80">
				<div class="col-md-8 col-md-offset-2 text-left">
			<?php if($this->session->flashdata('msgUpload') == 'Bukti Donasi Sudah Terkirim'){?>
							<div id="sendmessage" style="display: block;">
									<?=$this->session->flashdata('msgUpload')?>
							</div>
							<?php } else if($this->session->flashdata('msgUpload') != '') { ?>
							<div id="errormessage" style="display: block;">
									<?=$this->session->flashdata('msgUpload')?>
							</div>
							<?php } ?>
							</div>
							</div>
			<div class="row marginbot-80">
				<div class="col-md-4 col-md-offset-2 text-left">
				Kata kata donasi</br></br>
				Jika anda ingin melakukan donasi silahkan mengirimkan ke no rek 00000000000000 </br></br>
				Kemudian dimohon untuk mengirimkan tanda bukti donasi untuk kami gunakan sebagai data.</br></br>
				Terima kasih
				
				</div>
				<div class="col-md-4">
						<form action="<?=base_url();?>donasi/save" method="post" enctype="multipart/form-data" class="contactForm">						
							
    						<div class="row marginbot-20">
    							<div class="col-md-12 xs-marginbot-20">
								<p style="text-align: left">Nama</p>
    							    <div class="form-group">
        								<input type="text" name="donasi_nama" class="form-control" id="donasi_nama" placeholder="Nama" />
                                    </div>
    							</div>
    						</div>
    						<div class="row marginbot-20">
    							<div class="col-md-12 xs-marginbot-20">
								<p style="text-align: left">Upload Bukti</p>
    							    <div class="form-group">
										<input type="file" class="form-control" name="file"/>
                                    </div>
    							</div>
    						</div>
							
    						<div class="row">
    								<button type="submit" class="btn btn-skin btn-lg btn-block" id="btnSave">
    									Kirim</button>
    							</div>
    						</div>
						</form>
				</div>
			</div>	
<script>
$(document).ready(function() {
	$("#testimoni_nama").focus();
});

function save(){ //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
	var url;
		$('#btnSave').text('Daftar...');
        url = "<?php echo site_url('kolomTestimoni/save')?>";

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
				$('[name="testimoni_nama"]').focus();
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
	
