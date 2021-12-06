<script src="<?=base_url();?>assets/pages/js/form-validation-kolom-testimoni.js" type="text/javascript"></script>
  
	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Form Testimoni</h2>
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
							<div id="sendmessage">Submit Testimoni Berhasil</div>
							<div id="errormessage"></div>
    						<div class="row marginbot-20">
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">
        								<input type="text" name="testimoni_nama" class="form-control" id="testimoni_nama" placeholder="Nama" />
                                    </div>
    							</div>
    							<div class="col-md-6">
    							    <div class="form-group">
        								<input type="email" class="form-control" name="testimoni_email" id="testimoni_email" placeholder="Email"/>
    							    </div>
    							</div>
    						</div>
    						<div class="row marginbot-20">
    							<div class="col-md-6">
    							    <div class="form-group">
        								<input type="text" class="form-control" name="testimoni_pekerjaan" id="testimoni_pekerjaan" placeholder="Pekerjaan"/>
    							    </div>
    							</div>
    							<div class="col-md-6 xs-marginbot-20">
    							    <div class="form-group">
										<textarea class="form-control" placeholder="Testimoni" name="testimoni_testimoni" id="testimoni_testimoni"></textarea>
                                    </div>
    							</div>
    						</div>
							
    						<div class="row">
    								<button type="button" class="btn btn-skin btn-lg btn-block" id="btnSave" onclick="cek()">
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
	
