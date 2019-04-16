<!DOCTYPE HTML>
<html>
	<head>
		<title>Kapı Kamera Sistemi</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- One -->
					<section class="banner style1 orient-left content-align-left image-position-right fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1>Doorline</h1>
							<p class="major">Kapıyı açmak için aşağıdaki butona basabilirsiniz.</p>
							<ul class="actions stacked">
								<li>
									<form method="get" action="index.php">
										<input type="submit" value="Kapıyı Aç" name="on" class="button big wide smooth-scroll-middle">
									</form>
								</li>
									<p class="major">< <?php
											$setmode17 = shell_exec("/usr/local/bin/gpio -g mode 17 out");
											if(isset($_GET['on'])){
												$gpio_on = shell_exec("/usr/local/bin/gpio -g write 17 1");
												echo "Kapı Açık";
											}
											else{
												$gpio_off = shell_exec("/usr/local/bin/gpio -g write 17 0");
												echo "Kapı Kapalı";
											}
										?> >
									</p>
							</ul>
						</div>
	
						<div class="image">
							<img src="http://<?php $ip = getenv('SERVER_ADDR'); echo "$ip"; ?>:8000/stream.mjpg" alt="" />
						</div>
					</section>

				<!-- Footer -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<p>&copy;  <a href="https://www.zekeriyapolat.com.tr">Zekeriya Polat</a> ve <a href="https://www.masumak.com.tr">Muhammet Masum Ak</a>.</p>
						</div>
					</footer>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
	</body>
</html>
