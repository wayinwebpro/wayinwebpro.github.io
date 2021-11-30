<?
$page_title = "My account";
include 'header.php';
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	
}
else{
	?>
  <script type="text/javascript">
  	window.location.href = "index.php";
  </script>  
<?php
    exit;
}
?>

			<div class="row headingZ">
				<div class="col-12 g-0">
					<div class="heading_title">
						<h1>My Account</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="sectionBg" data-speed-y="3" data-offset="0" style="background-image:url(./images/dist/main/headerBg.jpg)"></div>
	</header>

<main>
	<section class="profile sectionWithBg">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<ul class="breadcrumbs">
						<li><a href="/">Home</a></li>
						<li><span>My account</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<span class="profile_title">Personal Information</span>	
					<div class="profile_body">
						<div class="profile_photo">
							<img src="./images/user_pics/<? echo $_SESSION["img"] ?>" alt="user photo">
						</div>
						<div class="profile_info">
							<ul>
								<li>
									<span class="param">Name:</span>
									<span class="value"><? echo $_SESSION['first_name'] . ' ' . $_SESSION["last_name"] ?></span>
								</li>
								<li>
									<span class="param">Username:</span>
									<span class="value"><? echo $_SESSION["username"] ?></span>
								</li>
								<li>
									<span class="param">E-mail:</span>
									<span class="value"><? echo $_SESSION["email"] ?></span>
								</li>
								<li>
									<span class="param">Country:</span>
									<span class="value"><? echo $_SESSION["country"] ?></span>
								</li>
								<li>
									<span class="param">Rank:</span>
									<span class="value"><? echo $_SESSION["rank"] ?></span>
								</li>
							</ul>
							<a href="#" class="button main"><span>Edit</span></a>
						</div>

						<!-- В комменте баланс пользователя с кнопокой пополнения и кнопка заказов -->

						<!-- <div class="balance">
							<div class="balance_body">
								<div class="balance_money">
									<img src="./images/dist/icons/creditCard_icon.svg" alt="credit icon">
									<span>$50</span>
								</div>
								<button class="button accent"><span>Top up balance</span></button>
							</div>
							<a href="#" class="button main"><span>My Orders</span></a>
						</div> -->

						<!-- В комменте баланс пользователя с кнопокой пополнения и кнопка заказов -->
						
					</div>
				</div>
			</div>
		</div>
		<div class="addBg" style="background-image:url(./images/dist/main/profile_bg.jpg)"></div>
	</section>
</main>

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
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-6 order-md-3 order-1">
					<div class="footerGroup">
						<h4 class="footerTitle">Solo boosting</h4>
						<ul class="footerList">
							<li><a href="#">Solo division boosting</a></li>
							<li><a href="#">Solo placement matches</a></li>
							<li><a href="#">Solo net wins</a></li>
							<li><a href="#">Solo normal wins</a></li>
							<li><a href="#">Solo masteries</a></li>
							<li><a href="#">Solo leveling</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 order-md-4 order-2">
					<div class="footerGroup">
						<h4 class="footerTitle">Duo boosting</h4>
						<ul class="footerList">
							<li><a href="#">Duo division boosting</a></li>
							<li><a href="#">Duo placement matches</a></li>
							<li><a href="#">Duo net wins</a></li>
							<li><a href="#">Duo games</a></li>
						</ul>
					</div>
				</div>
				<div class="col-12 order-5">
					<div class="createdBy">
						<a target="_blank" href="https://wayinweb.pro"><img src="./images/dist/main/logo_created.svg" alt="created by wayinweb pro"></a>
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
