<?
$page_title = "My account";
include 'header.php';

if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
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
							<a href="profileEdit.php" class="button main"><span>Edit</span></a>
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
<?
include 'footer.php';
?>
