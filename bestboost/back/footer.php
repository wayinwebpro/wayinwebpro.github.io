<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-8 order-md-1 order-4">
					<div class="footerInfo">
						<div class="logo_footer">
							<img src="./images/dist/main/logo_footer.png" alt="logo footer">
						</div>
						<p class="copy_desc">
							League of Legends is a registered trademark of Riot Games, Inc. We are in no way affiliated with, associated with or endorsed by Riot Games, Inc.
						</p>
						<p class="copy">© 2021 bestboost.net | All Rights Reserved</p>
						<div class="payment">
							<span>Payment systems:</span>
							<div class="paymentSystems">
								<img src="./images/dist/main/paypal.png" alt="lol boosting paypal payment system">
							</div>
						</div> 
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 order-md-2 order-3">
					<div class="footerGroup">
						<h4 class="footerTitle">About us</h4>
						<ul class="footerList">
							<li><a href="#">Home</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 order-md-3 order-1">
					<div class="footerGroup">
						<h4 class="footerTitle">Solo boosting</h4>
						<ul class="footerList">
							<li><a href="buy-boost.php">Solo division boosting</a></li>
							<li><a href="buy-boost.php">Solo placement matches</a></li>
							<li><a href="buy-boost.php">Solo net wins</a></li>
							<li><a href="buy-boost.php">Solo normal wins</a></li>
							<li><a href="buy-boost.php">Solo masteries</a></li>
							<li><a href="buy-boost.php">Solo leveling</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 order-md-4 order-2">
					<div class="footerGroup">
						<h4 class="footerTitle">Duo boosting</h4>
						<ul class="footerList">
							<li><a href="buy-boost.php">Duo division boosting</a></li>
							<li><a href="buy-boost.php">Duo placement matches</a></li>
							<li><a href="buy-boost.php">Duo net wins</a></li>
							<li><a href="buy-boost.php">Duo games</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>
	</div>
	
	<script src="js/app.min.js"></script>
	<script src="libs/luxy/luxy.min.js"></script>
	<script>
		var isMobile = /iPhone|iPad|Android/i.test(navigator.userAgent)
		if (!isMobile) {
			var options={wrapper:'#scrollWrapper', targets:'.sectionBg',wrapperSpeed: 0.04};luxy.init(options)
		}
	</script>
</body>
</html>