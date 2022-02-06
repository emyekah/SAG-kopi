	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	$prof = $profil->row();

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?= $prof->title; ?></title>
		<!-- Materialize Css -->
		<link rel="stylesheet" href="<?= base_url('assets/css/materialize.min.css'); ?>">
		<!-- Font-Awesome -->
		<link rel="stylesheet" href="<?= base_url('admin_assets/font-awesome/css/font-awesome.min.css'); ?>">
		<!-- customCss -->
		<link rel="stylesheet" href="<?= base_url('assets/css/custom.css?ver='.filemtime('assets/css/custom.css')); ?>">
	</head>
	<body>
		<header>
			<nav class="brown">
				<div class="nav-wrapper">
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
				<a href="<?=site_url('home');?>" class="brand-logo"><?= $prof->title; ?></a>
				
				<!-- <div style="width:30%;" class="left hide-on-med-and-down">
					<form action="<?= site_url('home/search'); ?>" method="post" class="input-group">
						<input type="search" class="top" name="search" placeholder="Cari">
					</form>
				</div> -->
				
				<ul id="nav-mobile" class="right hide-on-med-and-down" style="max-width:70%">
				<li><a href="<?= site_url('home'); ?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?= site_url('home/tentang'); ?>"><i class="fa fa-users"></i> Tentang</a></li>

				<li><a href="#" class="dropdown-button" data-activates="kat1"><i class="fa fa-tags"></i> Kategori<i class="fa fa-caret-down right"></i></a></li>

				<ul class="dropdown-content" id="kat1">
					<?php foreach ($kategori->result() as $kat): ?>
						<li>
						<a href="<?=site_url('home/kategori/'.$kat->url);?>"> <?=$kat->kategori;?></a>
						</li>
					<?php endforeach; ?>
				</ul>
					
				<li><a href="<?= site_url('home/cara'); ?>"><i class="fa fa-pencil-square-o"></i> Cara Pemesanan</a></li>


					<?php if ($this->session->userdata('user_login')) { ?>
						<li>
							<a class="white-text right" style="font-weight:500" href="<?= site_url('home/upload_bukti'); ?>"><i class="fa fa-upload"></i> Unggah Bukti</a>
						</li>

						<li><a href="#" class="dropdown-button" data-activates="drop1"><i class="fa fa-user"></i> <?= ucwords($this->session->userdata('name')); ?><i class="fa fa-caret-down right"></i></a></li>

						<ul class="dropdown-content" id="drop1">
							<li><a href="<?= site_url('home/profil'); ?>"><i class="fa fa-user"></i> Profil</a></li>
							<li><a href="<?= site_url('home/password'); ?>"><i class="fa fa-key"></i> Ubah Password</a></li>
							<li><a href="<?= site_url('home/transaksi'); ?>"><i class="fa fa-exchange"></i> Transaksi</a></li>
							<li><a href="<?= site_url('home/logout'); ?>"><i class="fa fa-sign-out"></i> Keluar</a></li>
						</ul>
					<?php } else { ?>
						<li><a href="#" class="dropdown-button" data-activates="drop3"><i class="fa fa-user"></i> Akun<i class="fa fa-caret-down right"></i></a></li>

						<ul class="dropdown-content" id="drop3">
							<li><a href="<?= site_url('home/login'); ?>"><i class="fa fa-sign-in"></i> Masuk</a></li>
							<li><a href="<?= site_url('home/registrasi'); ?>"><i class="fa fa-edit"></i> Daftar</a></li>
						</ul>
						
						
					<?php }
					?>
					<li>
						<a href="<?= site_url('cart'); ?>">
							<i class="fa fa-shopping-cart"></i>
							<?php
							if ($this->cart->total() > 0) {
							echo 'Rp. '.number_format($this->cart->total(), 0, ',', '.');
							} else {
							echo 'Keranjang Belanja';
							}
							?>
						</a>
					</li>
				</ul>
				</div>
				<!-- Side Nav -->
				<ul id="slide-out" class="side-nav">
				<!-- <li>
					<form action="<?= site_url('home/search'); ?>" method="post" class="input-group">
						<input type="search" name="search" placeholder="Search">
					</form>
				</li> -->
				<li><a href="<?= site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="<?= site_url('home/tentang'); ?>"><i class="fa fa-users"></i> Tentang</a></li>
				<li><a href="#" class="dropdown-button" data-activates="kat2"><i class="fa fa-tags"></i> Kategori<i class="fa fa-caret-down right"></i></a></li>
				<li><a href="<?= site_url('home/cara'); ?>"><i class="fa fa-pencil-square-o"></i> Cara Pemesanan</a></li>

				<li>

						
				<ul class="dropdown-content" id="kat2">
					<?php foreach ($kategori->result() as $kat): ?>
						<li>
							<a href="<?=site_url('home/kategori/'.$kat->url);?>"> <?=$kat->kategori;?></a>
						</li>
					<?php endforeach; ?>
				</ul>

				<?php if ($this->session->userdata('user_login')) { ?>

					<li><a href="#" class="dropdown-button" data-activates="drop2"><i class="fa fa-user"></i> <?= ucwords($this->session->userdata('name')); ?><i class="fa fa-caret-down right"></i></a></li>

					<ul class="dropdown-content" id="drop2">
						<li><a href="<?= site_url('home/profil'); ?>"><i class="fa fa-user"></i> Profil</a></li>
						<li><a href="<?= site_url('home/password'); ?>"><i class="fa fa-key"></i> Ubah Password</a></li>
						<li><a href="<?= site_url('home/transaksi'); ?>"><i class="fa fa-exchange"></i> Transaksi</a></li>
						<li><a href="<?= site_url('home/logout'); ?>"><i class="fa fa-sign-out"></i> logout</a></li>
					</ul>
				<?php } else { ?>

					<li><a href="<?= site_url('home/login'); ?>"><i class="fa fa-sign-in"></i> login</a></li>
					<li><a href="<?= site_url('home/registrasi'); ?>"><i class="fa fa-edit"></i> Registrasi</a></li>

				<?php } ?>
				<li><a href="<?= site_url('cart'); ?>"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>

				</ul>
			</nav>
		</header>

		<main>

			<div class="cont">
				<!-- start item -->
				<div class="item">

				<?= $content; ?>
				<!-- end item -->
				</div>

				<footer class="page-footer brown darken-3">
				<div class="container">
					<div class="row">
						<div class="col l5 s12">
							<h5 class="white-text">Alamat Toko</h5>
							<p class="grey-text text-lighten-4"><?= $prof->alamat_toko; ?><br />
							<i class="fa fa-phone-square"></i> <?= $prof->phone1; ?>
							<i class="fa fa-phone-square"></i> <?= $prof->phone2; ?></p>
						</div>
						<div class="col l6 offset-l1 s12">
							<h5 class="white-text">Kami di</h5>
							<div class="link">
							<a class="grey-text text-lighten-3" href="<?= $prof->facebook; ?>"><i class="fa fa-facebook"></i> Facebook</a>&nbsp;&nbsp;
							<a class="grey-text text-lighten-3" href="<?= $prof->shopee; ?>"><i class="fa fa-shopping-bag"></i> Shopee</a>&nbsp;&nbsp;
							<a class="grey-text text-lighten-3" href="<?= $prof->instagram; ?>"><i class="fa fa-instagram"></i> Instagram</a>&nbsp;&nbsp;
							<a class="grey-text text-lighten-3" href="<?= $prof->whatsapp1; ?>"><i class="fa fa-whatsapp"></i> Whatsapp(1)</a>&nbsp;&nbsp;
							<a class="grey-text text-lighten-3" href="<?= $prof->whatsapp2; ?>"><i class="fa fa-whatsapp"></i> Whatsapp(2)</a>&nbsp;&nbsp;
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						© <?= "2020".' '.$prof->title; ?> | All Rights Reserved
					</div>
				</div>
				</footer>
			</div>
		</main>

		<a href="" class="btn-floating btn-large waves-effect waves-light red back-top"><i class="fa fa-angle-double-up"></i></a>

		<!-- Jquery -->
		<script type="text/javascript" src="<?= base_url('admin_assets/js/jquery.min.js'); ?>"></script>
		<!-- materialize -->
		<script type="text/javascript" src="<?= base_url('assets/js/materialize.min.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/custom.js'); ?>"></script>
		<script type="text/javascript" src="<?= base_url('assets/js/jquery.mask.min.js'); ?>"></script>
		<!-- custom -->
		<?php if($this->uri->segment(1) == 'checkout' || $this->uri->segment(1) == 'Checkout') { ?>

			<script type="text/javascript">

				$(document).ready(function() {
				function convertToRupiah(angka)
				{

					var rupiah = '';
					var angkarev = angka.toString().split('').reverse().join('');

					for(var i = 0; i < angkarev.length; i++)
						if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';

					return rupiah.split('',rupiah.length-1).reverse().join('');

				}

				$('#prov').change(function() {
					var prov = $('#prov').val();

					$.ajax({
						url: "<?=base_url();?>checkout/city",
						method: "POST",
						data: { prov : prov },
						success: function(obj) {
							$('#kota').html(obj);
						}
					});
				});

				$('#kota').change(function() {
					var dest = $('#kota').val();
					var kurir = $('#kurir').val()

					$.ajax({
						url: "<?=base_url();?>checkout/getcost",
						method: "POST",
						data: { dest : dest, kurir : kurir },
						success: function(obj) {
							$('#layanan').html(obj);
						}
					});
				});

				$('#kurir').change(function() {
					var dest = $('#kota').val();
					var kurir = $('#kurir').val()

					$.ajax({
						url: "<?=base_url();?>checkout/getcost",
						method: "POST",
						data: { dest : dest, kurir : kurir },
						success: function(obj) {
							$('#layanan').html(obj);
						}
					});
				});

				$('#layanan').change(function() {
					var layanan = $('#layanan').val();

					$.ajax({
						url: "<?=base_url();?>checkout/cost",
						method: "POST",
						data: { layanan : layanan },
						success: function(obj) {
							var hasil = obj.split(",");

							$('#ongkir').val(convertToRupiah(hasil[0]));
							$('#total').val(convertToRupiah(hasil[1]));
						}
					});
				});
				});
			</script>

		<?php } ?>

		<script type="text/javascript">
			$(".button-collapse").sideNav();
			$(".modal").modal();
			$('.carousel').carousel();

			$(document).ready(function() {
				$(".uang").mask("00,000.000.000", {reverse:true});

				$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.back-top').fadeIn();
					} else {
					$('.back-top').fadeOut();
				}
				});
				$('.back-top').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
					return false;
				});
			});
			$('.alert-message').alert().delay(3000).slideUp('slow');
		</script>
	</body>
	</html>
