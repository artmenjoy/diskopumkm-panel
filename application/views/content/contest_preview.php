
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$data->title;?> &mdash; Catcoin - World's Best Community Driven Coin</title>
  
	<meta name="msapplication-TileImage" content="https://catcoin.io/assets/img/logo-new/favicon/favicon.ico"> <!-- Windows 8 -->
	<meta name="msapplication-TileColor" content="#ff6d40"/> <!-- Windows 8 color -->


	<link rel="shortcut icon" href="https://catcoin.io/assets/img/logo-new/favicon/favicon.ico">

	<meta name="description" content="<?=$data->title;?> - Catcoin, World's Best Community Driven Coin. Catcoin with new contract is launched on April 22, 2022. To the Meoown!">
	<meta name="keywords" content="crypto, cryptocurrency, bitcoin, binance, etherium, bnb, cats, cat, catcoin, token, wallet, exchange, blockchain, marketcap" itemprop="keywords" />
	<meta name="theme-color" content="#ff6d40" />
	
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Fredoka One:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="https://catcoin.io/assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="https://catcoin.io/assets/css/style-5.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/css/custom-primary.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/css/custom-secondary.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/css/timeline2.css" rel="stylesheet">
	<link href="https://catcoin.io/assets/css/button-group-2.css" rel="stylesheet">

</head>

<body>
	
	<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="#hero" class="logo d-flex align-items-center">
      <img src="https://catcoin.io/assets/img/logo-new/logo-2.png" alt="main new catcoin logo">
    </a>
    <nav id="navbar" class="navbar">
		<ul>
			<li><a class="nav-link" href="https://catcoin.io/">Home</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#about">About Us</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#counts">Tokenomics</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#values">Audit</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#roadmap">Roadmap</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#team">Team</a></li>
			<li><a class="nav-link" href="https://catcoin.io/#recent-blog-posts">Featured In</a></li>
			<li><a class="nav-link" href="https://catcoin.io/preview/catpaper" target="_blank">Cat Paper</a></li>
			<li><a class="nav-link active" href="https://catcoin.io/contest">Contest</a></li>
			<li><a class="nav-link " href="https://catcoin.io/news">News</a></li>
			<li><a class="getstarted" href="https://flooz.trade/wallet/0x2f0c6e147974bfbf7da557b88643d74c324053a2?network=bsc" target="_blank">BUY NOW</a></li>
		</ul>
		<i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->
  

	<main id="main">
		<section class="breadcrumbs">
	<div class="container">
	
		<ol>
			<li><a href="#">Home</a></li>
			<li><a href="#">Contest</a></li>
			<li><a href="#">Detail</a></li>
		</ol>
		<h2><?=$data->title;?></h2>
	
	</div>
</section><!-- End Breadcrumbs -->

		<!-- ======= Blog Section ======= -->
		<section id="blog" class="blog">
			<div class="container" data-aos="fade-up">

				<div class="row">

					<div class="col-lg-8 entries">

						<article class="entry entry-single">

							<div class="entry-img">
								<img src="<?=base_url();?>assets/uploads/images/contest/<?=$data->thumbnail;?>" width="100%" alt="" class="img-fluid">
							</div>

							<h2 class="entry-title">
								<a href="#"><?=$data->title;?></a>
							</h2>

							<div class="entry-meta">
							<ul>
									<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">Admin</a></li>
									<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="<?=date("Y-m-d", strtotime($data->date));?>"><?=date("F j, Y", strtotime($data->date));?></time></a></li>
									<li class="d-flex align-items-center"><i class="bi bi-bookmark"></i> <a href="#">Contest</a></li>
									<li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="#"><?=$data->view;?> view<?=($data->view > 1)? "s":"";?></a></li>
								</ul>
							</div>

							<div class="entry-content mt-5">
								<p><?=$data->content;?></p>

								<hr class="mt-5 mb-5">
								<h4>How to Join</h4>
								<p><?=$data->how_to;?></p>

								<hr class="mt-5 mb-5">
								<h4>Contest Detail</h4>
								<table class="table table-stripped">
									<tbody>
										<tr>
											<th>Title</th>
											<td><?=$data->title;?></td>
										</tr>
										<tr>
											<th>Start</th>
											<td><?=$data->time_start;?> UTC</td>
										</tr>
										<tr>
											<th>End</th>
											<td><?=($data->time_end == "0000-00-00 00:00:00")?"-":$data->time_end." WITA";?></td>
										</tr>
										<tr>
											<th>Prizepool</th>
											<td>
												<button class="btn btn-danger"><?=$data->prizepool;?></button>
											</td>
										</tr>
									</tbody>
								</table>

							</div>

						</article>

					</div><!-- End blog entries list -->


				</div>

			</div>
		</section><!-- End Blog Section -->

	</main><!-- End #main -->
	

	<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

	<div class="footer-newsletter">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">					
					<img src="https://catcoin.io/assets/img/logo-new/moon.png" class="mt-5 mb-5" width="50%" alt="">
				</div>
			</div>
		</div>
	</div>

	<div class="footer-top">
		<div class="container">
			<div class="row gy-4">
				<div class="col-lg-4 col-md-12 footer-info">
					<a href="index.html" class="logo d-flex align-items-center">
						<img src="https://catcoin.io/assets/img/logo-new/logo-2.png" alt="">
					</a>
					<p>World's Best Community Driven Coin</p>
					<div class="social-links mt-3">
						<a href="https://t.me/catcoin_bsc" target="_blank" class="telegram"><i class="bi bi-telegram"></i></a>
						<a href="https://twitter.com/catcoin" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
						<a href="https://www.youtube.com/channel/UCxxbDjy-tBNYqNzeRfhcndQ" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
						<a href="https://www.instagram.com/catcoin.official/" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
						<a href="https://www.reddit.com/r/catcoinarmy/" target="_blank" class="reddit"><i class="bi bi-reddit"></i></a>
						<a href="https://www.linkedin.com/company/catcoin" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
					</div>
					<div class="social-links mt-3">
						<a href="https://www.tiktok.com/@catcoin.official" target="_blank" class="tiktok"><i class="bi bi-tiktok"></i></a>
						<a href="https://discord.gg/rNv9vPxpGN" target="_blank" class="discord"><i class="bi bi-discord"></i></a>
						<a href="https://chingari.io/catcoin" target="_blank">
							<img src="https://catcoin.io/assets/img/icons/cgr-icon-2.png" alt="chingari-icon" class="icon-image-foot" >
						</a>
						<a href="https://coinmarketcap.com/currencies/catcoin-token/" target="_blank">
							<img src="https://catcoin.io/assets/img/icons/cmc-icon-2.png" alt="coinmarketcap-icon" class="icon-image-foot" >
						</a>
						<a href="https://www.coingecko.com/en/coins/catcoin-token" target="_blank">
							<img src="https://catcoin.io/assets/img/icons/cg-icon-2.png" alt="coingecko-icon" class="icon-image-foot" >
						</a>
					</div>

				</div>
				<div class="col-lg-4 col-md-12 footer-links">
					<h4>Partnership</h4>
											<a href="https://tofunft.com/collection/cat-coin-yacht-club/items" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-tofu.png" class="p-2" width="20%" alt="TofuNFT">
						</a>
											<a href="https://flooz.trade/trade/0x2f0c6e147974bfbf7da557b88643d74c324053a2?network=bsc" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-flooz.png" class="p-2" width="20%" alt="Flooz.trade">
						</a>
											<a href="https://t.me/BlockchainBrothersTG" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-bbrothers.png" class="p-2" width="20%" alt="Blockchain Brothers">
						</a>
											<a href="https://lasahido.id/" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-lasahido.png" class="p-2" width="20%" alt="lasahido.id">
						</a>
											<a href="https://gemcave.degem.tech/" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-degem.png" class="p-2" width="20%" alt="degem">
						</a>
											<a href="https://shopping.io/" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/shopping.png" class="p-2" width="20%" alt="Shopping.io">
						</a>
											<a href="https://www.ethair.com/" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-ethair.png" class="p-2" width="20%" alt="Ethair Market">
						</a>
											<a href="https://www.gtcupopen.net/en/teams/119/ro1-racing" target="_blank" rel="noopener noreferrer">
							<img src="https://panel.catcoin.io/assets/uploads/images/partners/partners-ro1racing.png" class="p-2" width="20%" alt="R01 Racing">
						</a>
					
					<h4 class="mt-5">Contact Us</h4>
					<p>
						For more information please contact us on
						<br><a href="mailto:team@catcoincrypto.me" target="_blank">team@catcoincrypto.me</a>
					</p>



				</div>

				<div class="col-lg-2 col-6 footer-links">
					<h4>Menu</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#about">About Us</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#counts">Tokenomics</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#values">Audit</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#roadmap">Roadmap</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#team">Team</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="#recent-blog-posts">Featured In</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://catcoin.io/preview/catpaper" target="_blank">Cat Paper</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://catscoinshop.com/collections/all?sort_by=created-descending" target="_blank">Merch</a></li>

						<li><i class="bi bi-chevron-right"></i> <a href="https://flooz.trade/wallet/0x2f0c6e147974bfbf7da557b88643d74c324053a2?network=bsc" target="_blank">BUY NOW</a></li>
					</ul>
				</div>

				<div class="col-lg-2 col-6 footer-links">
					<h4>Useful Links</h4>
					<ul>
						<li><i class="bi bi-chevron-right"></i> <a href="https://bscscan.com/token/0x2f0c6e147974BfbF7Da557b88643D74C324053A2" target="_blank">Smart Contract</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://catstats.info/" target="_blank">Reflection</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://bscscan.com/token/0x2f0c6e147974bfbf7da557b88643d74c324053a2?a=0x000000000000000000000000000000000000dead" target="_blank">Burn Wallet</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://cats.fans/" target="_blank">Forum</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://tofunft.com/collection/cat-coin-cat-club/items" target="_blank">NFT v1</a></li>
						<li><i class="bi bi-chevron-right"></i> <a href="https://tofunft.com/collection/cat-coin-yacht-club/items" target="_blank">NFT v2</a></li>
						
					</ul>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<!-- <div class="copyright">
			Catcoin is not an investment. Catcoin makes no promises and is not responsible for any losses or errors use at your own risk (DYOR). As everyone knows that cryptocurrencies have extremely high risk and may result in total loss. Nothing on this site is investment advice.

	​
		</div> -->
		<div class="credits">
			&copy; Copyright <a href="#"><b>Catcoin</b></a> All Rights Reserved
		</div>
</div>
</footer><!-- End Footer -->

<div id="mybutton" class="btn-group" role="group" aria-label="Basic example">
	<button class="btn btn-white d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#langModal">
		EN &nbsp;<img src="https://catcoin.io/assets/vendor/flag-icon-css/flags/1x1/gb.svg" class="btn-lang-img" alt="">
	</button>
	<a href="https://catscoinshop.com/collections/all?sort_by=created-descending" target="_blank" id="" class="btn btn-merch d-flex align-items-center justify-content-center">
		Merch Shop &nbsp;<i class="bi bi-bag"></i>
	</a>
</div>
	<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://catcoin.io/assets/vendor/purecounter/purecounter.js"></script>
<script src="https://catcoin.io/assets/vendor/aos/aos.js"></script>
<script src="https://catcoin.io/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://catcoin.io/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="https://catcoin.io/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="https://catcoin.io/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="https://catcoin.io/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="https://catcoin.io/assets/js/main.js"></script>
<script src="https://catcoin.io/assets/js/timeline2.js"></script>
		

</body>

</html>
