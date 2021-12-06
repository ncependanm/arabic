<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$judulHalaman?></title>
	
    <!-- css -->
    <link rel="stylesheet" href="<?=base_url()?>assets/awal/css/bootstrap.min.css">
    <link href="<?=base_url()?>assets/awal/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/awal/css/nivo-lightbox.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/awal/css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/awal/css/animations.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/awal/css/style.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/awal/color/default.css" rel="stylesheet">
    <script src="<?=base_url()?>assets/awal/js/jquery.min.js"></script>	 
    <script src="<?=base_url()?>assets/awal/js/photo-gallery.js"></script>
</head>

	<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<?php
	include "menu.php";
	?>
		<?=$contents?>

	  <section id="about" class="home-section color-dark bg-white">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-md-6">
					<h5 class="h-bold text-center">Contact Us</h5>
					<div class="divider-header"></div>
					<table style="text-align: left">
						<tr>
							<td><p>27-2A (1st Floor), Block C, Prima Biz Hub,</br> Jalan Tasik Prima 5/1,</br> 47150 Puchong, Selangor, Malaysia</br>
+60193811043 </p>
</td>
						</tr>
					</table>
                    <div class="credits">
                        <div class="col-md-1">
						<a href="<?=$urlFB?>">
						<img src="<?=base_url()?>assets/images/fb.png" width="30px">
						</a>
						</div>
                        <div class="col-md-1">
						<a href="<?=$urlIG?>">
						<img src="<?=base_url()?>assets/images/ig.png" width="30px">
						</a>
						</div>
						                        <div class="col-md-10">
						</div>
                    </div>
				</div>
				<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4182974740784!2d101.60040111448015!3d2.9813149978287163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdb39193950261%3A0xe2545434c1c5d40!2sKelas+Bimbingan+Al-Quran!5e0!3m2!1sen!2sid!4v1502689932177" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6 text-right copyright">
					&copy;Copyright – MY Arabic Class
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="<?=base_url()?>assets/awal/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/awal/js/jquery.sticky.js"></script>
    <script src="<?=base_url()?>assets/awal/js/jquery.easing.min.js"></script>	
	<script src="<?=base_url()?>assets/awal/js/jquery.scrollTo.js"></script>
	<script src="<?=base_url()?>assets/awal/js/jquery.appear.js"></script>
	<script src="<?=base_url()?>assets/awal/js/stellar.js"></script>
	<script src="<?=base_url()?>assets/awal/js/nivo-lightbox.min.js"></script>
	
    <script src="<?=base_url()?>assets/awal/js/custom.js"></script>
	<script src="<?=base_url()?>assets/awal/js/css3-animate-it.js"></script>
    
</body>

</html>