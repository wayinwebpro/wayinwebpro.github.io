<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title><? echo $page_title?></title>
	<meta name="description" content="BestBoost">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="icon" href="images/favicon/favicon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
	<meta property="og:image" content="images/dist/preview.jpg">
	<meta property="og:description" content="League of Legends Elo Boosting
	Would you like to Boost your ELO?">
	<meta property="og:title" content="Best Boost">
	<meta property="og:url" content="link">
	<meta property="og:site_name" content="Best Boost">
	<meta property="og:locale" content="en_US">
	
	<link rel="stylesheet" href="css/main.min.css">

</head>
<?
require_once 'model/Database.php'; 
require_once 'model/User.php'; 

$dbcon = Database::getDb();

//---------------------------LOGIN-----------------------------------------------------------
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  ?>
  <script type="text/javascript">
  	window.location.href = "index.php";
  </script>  
<?php
    exit;
}

$username = $password = "";
$username_err = $password_err = "";
$errors = array();

if (isset($_POST['login'])) {

  if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
    array_push($errors,"Please enter username.");
  }
  else{
    $username = trim($_POST["username"]);
  }

  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
    array_push($errors,"Please enter your password.");
  }
  else{
    $password = trim($_POST["password"]);
  }

  if(empty($username_err) && empty($password_err)){
    $sql = "SELECT id, username, password, email, first_name, last_name, country, rank, img, acc_type FROM Users WHERE username = :username";

    if($stmt = $dbcon->prepare($sql)){
      $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);

      $param_username = trim($_POST["username"]);

      if($stmt->execute()){
        if($stmt->rowCount() == 1){
          if($row = $stmt->fetch()){
            $id= $row["id"];
            $username = $row["username"];
            $hashed_password = $row["password"];
            $email = $row["email"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
            $country = $row["country"];
            $rank = $row["rank"];
            $img = $row["img"];
            $acc_type = $row["acc_type"];
            

            if(password_verify($password, $hashed_password)){
            // password is correct, then start new session

              session_start();
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["email"] = $email;
              $_SESSION["first_name"] = $first_name;
              $_SESSION["last_name"] = $last_name;
              $_SESSION["country"] = $country;
              $_SESSION["rank"] = $rank;
              $_SESSION["img"] = $img;
              $_SESSION["acc_type"] = $acc_type;
              

              ?>  
              <script type="text/javascript">
              	window.location.href = 'index.php';
              </script>
              <?php
            }
            else{
              $password_err="The password you entered is not valid.";
              	array_push($errors,"The password you entered is not valid.");
            }
          }
        }
        else{
          $username_err = "No account found with that username.";
          	array_push($errors,"No account found with that username.");
        }
      }
      else {
        echo "Something went wrong. Please try again later.";
      }
    }
    unset($stmt);
  }
  unset($dbcon);
}
// this function to display erros in the register panel.
function display_error() {
  global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
  }
}
session_start();

//var_dump($_SESSION);
// var_dump($_SERVER['REQUEST_URI']);
//---------------------------LOGIN-END----------------------------------------------------------
?>
<body class='home'>
<?php echo display_error(); ?>
<!--Mobile Menu-->
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="topNav_wrapper topNav_mobile">
				<div class="logo">
					<img src="./images/dist/logo.png" alt="best boost logo">
				</div>
				<div class="hamburger--wrapper">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
						  <span class="hamburger-inner"></span>
						</span>
					  </button>
					  <span class="hamburger--descr">Menu</span>
				</div>
			</div>
			<div class="menu_wrapper menu_wrapper_mobile">
				<div class="menu_close">
					<div class="hamburger--wrapper">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
							  <span class="hamburger-inner"></span>
							</span>
						  </button>
						  <span class="hamburger--descr">Close</span>
					</div>
				</div>
				<ul class="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="buy-boost.php">Buy Boost</a></li>
	<li><a href="#">FAQ</a></li>

</ul>
				<!--log out-->

				<div class="topButtons_wrapper">
	<button class="button buttonLogin main"><span>Sign In</span></button>
	<a href="registration.php" class="button accent"><span>Join Up</span></a>
</div>
<? if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) :?>
	<!--log in-->
	<div class="user_wrapper">
		<img src="./images/dist/main/user_default.png" alt="Username">
		<span class="username"><? echo $_SESSION['first_name'] . $_SESSION['last_name'] ?></span>
		<span class="menuOpen"></span>
		<div class="userMenu">
			<ul>
				<li><a href="profile.php"><img src="./images/dist/icons/user.png" alt="user">My Account</a></li>
				<li><a href="#"><img src="./images/dist/icons/сart.png" alt="orders">My Orders</a></li>
				<!-- <li><a href="#"><img src="./images/dist/icons/orderList.png" alt="orders list">Order List</a></li> -->
				<li><a href="logout.php"><img src="./images/dist/icons/logout.png" alt="orders list">Logout</a></li>
			</ul>
		</div>
	</div>
	<!--log in-->
<? endif; ?>
			</div>
		</div>
	</div>
</div>
<!--Mobile Menu-->

<!--Modal-->

<div class="modalForm loginModal profile userForm">
	<div class="modalBody">
		<span class="modalClose"></span>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<span class="profile_title">Sign In</span>	
						<div class="profile_body">
							<form method="POST" enctype="multipart/form-data">
								<input type="text" name="username" required placeholder="Login">
								<input type="password" name="password" required placeholder="Password">
								<button class="button accent" name="login"><span>Log In</span></button>	
							</form>
						</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal-->

<div id="scrollWrapper">
	<header class="sectionWithBg">
		<div class="container">
			<div class="row topLine align-items-center justify-content-between">
				<div class="col-xxl-3 col-xl-2 col-12">
						<div class="logo logo_desktop">
							<img src="./images/dist/logo.png" alt="best boost logo">
						</div>
				</div>
				<div class="col-xxl-9 col-xl-10 col-4">
					<div class="menu_wrapper">
						<ul class="menu">
	<li><a href="index.php">Home</a></li>
	<li><a href="buy-boost.php">Buy Boost</a></li>
	<li><a href="#">FAQ</a></li>
</ul>

						<!--log out-->

						
<? if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) :?>
	<!--log in-->
<div class="user_wrapper">
	<img src="./images/user_pics/<? echo $_SESSION['img'] ?>" alt="Username">
	<span class="username"><? echo $_SESSION['first_name'] . $_SESSION['last_name'] ?></span>
	<span class="menuOpen"></span>
	<div class="userMenu">
		<ul>
			<li><a href="profile.php"><img src="./images/dist/icons/user.png" alt="user">My Account</a></li>
			<li><a href="#"><img src="./images/dist/icons/сart.png" alt="orders">My Orders</a></li>
	<!-- 		<li><a href="#"><img src="./images/dist/icons/orderList.png" alt="orders list">Order List</a></li> -->
			<li><a href="logout.php"><img src="./images/dist/icons/logout.png" alt="orders list">Logout</a></li>
		</ul>
	</div>
</div>
<!--log in-->
<? else: ?>
	<div class="topButtons_wrapper">
	<button class="button buttonLogin main"><span>Sign In</span></button>
	<a href="registration.php" class="button accent"><span>Join Up</span></a>
</div>
<? endif; ?>

						
						<!--log out-->

					</div>
				</div>
			</div>