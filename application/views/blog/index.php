	
		<!--contact form-->
		<div id="blog" class="bg-gray">
			<div class="container">
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
				<div class="col-md-12">
					<div class="container col-md-8">
						<div class="container">

							<div class="row" id="awal">
								<div class="container">
						
									<?php $no = 0;
									foreach($dataBlog as $b){ 
									$no++;
									if($no == 1){
										echo "<div class='row'>";
									}
									?>
										<div class="col-md-3 text-left">
											<div >
												<div class="service-box"  style="background: #FFF; padding: 5px 10px">
													<div class="service-desc">						
														<h5><?=$b->blog_judul?></h5>
														<p><i><?=substr($b->blog_tgl, 0, 11)?>, Post : <?=$b->blog_postby?></i></p>
														<div style="overflow: hidden; height: 300px ">
															<p><?=substr($b->blog_isi, 0, 500)?>...
															</p>
														</div>
													</div>
													<hr>
													<a href="javascript:void(0)" title="Readmore" onclick="readmore(<?=$b->blog_id?>)">Readmore</a>
												</div>
											</div>
										</div>
									<?php 
									if($no == 4){
										$no = 0;
										echo "</div><hr>";
									}
									} 
									if($no !== 0){
										echo "</div><hr>";
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
						</br>
		
		
					</div>
				</div>
</section>
		
			</div>
		</div>
	</div>
	    </div>
		
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
	