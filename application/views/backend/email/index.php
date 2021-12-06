<?php 
$ada = true;
if($this->session->userdata('user_level') == '1'){
	$ada = true;
}
if(!$ada){ ?>
<section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>
        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="<?=base_url()?>dashboard">return to dashboard</a> or try using the search form.
          </p>
        </div>
      </div>
    </section>
<?php } else { ?>
<script src="<?=base_url();?>assets/pages/js/form-validation-email.js" type="text/javascript"></script>
<script>
var save_method;
var table;
var time;

$(document).ready(function() {
    //datatables
	showInputan();
});

function reset(){
	$("#inputan").hide();
    $('[name="id"]').val('');
    $('[name="email_judul"]').val('');
}

function showInputan(){
	reset();
	save_method = 'add';
	$("#inputan").show();
	$("input[name=email_judul]").focus();
	CKEDITOR.instances['editor'].setData('');
	$("#btnSave").text('Kirim');	
	$('#alerERRInput').hide();
}

function showInputan2(){
	reset();
	save_method = 'add';
	$("#inputan").show();
	$("input[name=email_judul]").focus();
	$("#btnSave").text('Kirim');	
	$('#alerERRInput').hide();
}

function save(){ //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
	var url;
		$('#btnSave').text('Kirim...');
        url = "<?php echo site_url('backend/email/send')?>";
		$("#msgSKS").text("Data Berhasil Ditambah !!");
		$("#msgERR").text("Data Gagal Ditambah !!");

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
				editTmp(data.judul);
					sending();
            } else {
				$("#alerERRInput").show();
				$("#msgERRInput").text(data.msg);
			}
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
			$("#alerERR").show();
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}

function editTmp(id)
{
	showInputan2();
	$('#btnSave').attr('disabled',true); //set button disable 
	$("#btnSave").text('Kirim...');
	save_method = 'update';
    $('[name="email_judul"]').val(id);
};

function sending(){ //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
	var url;
		$('#btnSave').text('Kirim...');
        url = "<?php echo site_url('backend/email/sending')?>";
		$("#msgSKS").text("Email Terkirim !!");
		$("#msgERR").text("Email Gagal Dikirim !!");
    

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
				$("#alerSKS").show();
				showInputan();
            } else {
				$("#msgERR").text(data.msg);
				$("#alerERRInput").show();
				$("#msgERRInput").text(data.msg);
			}
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
				$("#msgERR").text("ERROR");
			$("#alerERR").show();
            $('#btnSave').text('Save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}
</script>

<section class="content-header">
	<h1>
		<?=$titlePage?>
		<small><?=$titlePageSmall?></small>
	</h1>
</section>

<section class="content" id="inputan" style="display: none">
    <div class="row">
    <section class="content">
		<div id="alerSKS" class="custom-alerts alert alert-success fade in" style="display: none">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
			<p id="msgSKS"></p>
		</div>
		<div id="alerERR" class="custom-alerts alert alert-warning fade in" style="display: none">
			<button type="button" class="close" data-dismiss="alert" >x</button>
			<p id="msgERR"></p>
		</div>
        <form id="form" class="form-data" autocomplete="off" >		
		<div class="box box-default">
            <div class="box-header with-border">
			<div id="alerERRInput" class="custom-alerts alert alert-warning fade in" style="display: none" >
				<button type="button" class="close" data-dismiss="alert" >x</button>
				<p id="msgERRInput"></p>
			</div>
              <h3 class="box-title"><?=$titleInputan?></h3>
            </div><!-- /.box-header -->
			
			<input type="text" name="id" hidden>
            <div class="box-body">
              <div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Jenis Email *</label>
						<select class="form-control" name="email_jenis" id="email_jenis">
							<option value="B">All</option>
							<option value="P">Personal</option>
						</select>
					</div>
				</div>
				<div class="col-md-6" id="tujuanTmp" style="display: none">
					<div class="form-group">
						<label>Tujuan *</label>
						<input type="text" class="form-control" name="email_tujuan" placeholder="Tujuan" maxlength="50" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Judul *</label>
						<input type="text" class="form-control" name="email_judul" placeholder="Judul" maxlength="50" >
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Isi *</label>
						<textarea id="editor" name="editor"></textarea>
					</div>
				</div>
			  </div>
			</div>
            <div class="box-footer text-center">
				<button class="btn btn-primary" type="submit" id="btnSave"></button>                  
			</div>
          </div><!-- /.box -->
		  </form>
    </div>
</section>
<script>
CKEDITOR.replace('editor');
$('#email_jenis').change(function () {
        var type = $('#email_jenis option:selected').val();
        if (type == 'B') {
            $('#tujuanTmp').hide();
        } else {
            $('#tujuanTmp').show();
        }
});
</script>
<?php } ?>

