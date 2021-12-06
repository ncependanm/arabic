	<!-- Section: services -->
    <section id="service" class="home-section color-dark bg-gray">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div>
					<div class="section-heading text-center">
					<h2 class="h-bold">Blog</h2>
					<div class="divider-header"></div>
					</div>
					</div>
				</div>
			</div>

		</div>

		<div class="text-center">
		<div class="container">

        <div class="row animatedParent" id="awal">
		<div class="container">
		
		<?php $no = 0;
		foreach($dataBlog as $b){ 
		$no++;
		if($no == 1){
			echo "<div class='row animatedParent'>";
		}
		?>
			<div class="col-md-3 text-left" style="">
				<div >
					<div class="service-box" >
						<div class="service-desc">						
							<h5><?=$b->blog_judul?></h5>
							<p><i><?=substr($b->blog_tgl, 0, 11)?>, Post : <?=$b->blog_postby?></i></p>
							<div class="divider-header"></div>
							<div style="overflow: hidden; height: 250px ">
								<p><?=substr($b->blog_isi, 0, 500)?>...</p>
							</div>
						</div>
					</div>
					</br>
					<div class="btn btn-skin">
						<a style="color: #FFF" href="javascript:void(0)" title="Readmore" onclick="readmore(<?=$b->blog_id?>)">Readmore</a>
					</div>
				</div>
			<hr>
			</div>
		<?php 
		if($no == 4){
			$no = 0;
			echo "</div>";
		}
		} 
		if($no !== 0){
			echo "</div>";
		}
		?>

    </div>
		</div>		
		
        <div class="row" id="readMore" style="display:none">
			<div class="row">
				<div class="col-md-12 text-left" style="margin-left: 25px">
					<h3 name="judulBlog"></h3>
					<p><i name="tglPostBlog"></i></p>
						<p name="isiBlog"></p>
						<a class="btn btn-primary" href="javascript:void(0)" onclick="back()">< Back</a>
				</div>
			</div>
		</div>
		
		
		</div>
		</div>
	</section>
	<!-- /Section: services -->
	<script>
	function readmore(id)
{
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('blog/readmore')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$("#awal").hide();
			$("#readMore").show();
			$('[name="judulBlog"]').html(data.blog_judul);
			$('[name="tglPostBlog"]').html(data.blog_tgl + ', Post By : ' + data.blog_postby);
            $('[name="isiBlog"]').html(data.blog_isi);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
};
	function back(){
			$("#awal").show();
			$("#readMore").hide();
	
	}
	</script>
