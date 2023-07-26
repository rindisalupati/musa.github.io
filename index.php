<?php
session_start();
require "functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
	<?php include 'header.php'; ?>

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img" style="padding-bottom: 200px;">
						</div>
						<div class="shop-body">
							<h3>Kue Kering</h3>
							<a href="katalog/" class="cta-btn">Lihat Produk <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img" style="padding-bottom: 200px;">
						</div>
						<div class="shop-body">
							<h3>Kue Basah</h3>
							<a href="katalog/" class="cta-btn">Lihat Produk <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->

				<!-- shop -->
				<div class="col-md-4 col-xs-6">
					<div class="shop">
						<div class="shop-img" style="padding-bottom: 200px;">
						</div>
						<div class="shop-body">
							<h3>Lainnya</h3>
							<a href="katalog/" class="cta-btn">Lihat Produk <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
				</div>
				<!-- /shop -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h3 class="title">Rekomendasi Produk untuk kamu</h3>
					</div>
				</div>
				<!-- /section title -->

				<!-- Products tab & slick -->
				<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1">
									<?php $produk = mysqli_query($conn, "SELECT * FROM produk ORDER BY rand() LIMIT 7"); ?>
									<?php foreach ($produk as $m) : ?>
										<!-- product -->
										<?php $id = $m['id']; ?>
										<div class="product" onclick="window.location.href='produk/?id=<?= $id; ?>';">
											<div class="product-img">
												<img src="./foto/<?= $m['foto']; ?>" alt="">
												<div class="product-label">
													<?php if ($m['diskon'] > 0) : ?>
														<span class="sale">-<?= $m['diskon']; ?>%</span>
													<?php endif; ?>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?= $m['kategori']; ?></p>
												<h3 class="product-name"><?= $m['nama']; ?></h3>
												<h4 class="product-price">
													<?php $diskon = $m['harga'] * $m['diskon'] / 100; ?>
													<?php $harga = $m['harga'] - $diskon; ?>
													Rp<?= number_format($harga, 0, ',', '.'); ?>
													<del class="product-old-price">Rp<?= number_format($m['harga'], 0, ',', '.'); ?></del>
												</h4>
											</div>
										</div>
										<!-- /product -->
									<?php endforeach; ?>



								</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
				</div>
				<!-- Products tab & slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->


	<?php include 'footer.php'; ?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

	<script>
		var menuHolder = document.getElementById('menuHolder')
		var siteBrand = document.getElementById('siteBrand')

		function menuToggle() {
			if (menuHolder.className === "drawMenu") menuHolder.className = ""
			else menuHolder.className = "drawMenu"
		}
		if (window.innerWidth < 426) siteBrand.innerHTML = "Musa Bakery"
		window.onresize = function() {
			if (window.innerWidth < 420) siteBrand.innerHTML = "Musa Bakery"
			else siteBrand.innerHTML = "Musa Bakery"
		}
	</script>


</body>

</html>