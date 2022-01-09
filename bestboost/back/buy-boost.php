<?
$page_title = "Buy Boost";
include 'header.php';
require_once 'model/Order.php'; 
//Division
if(isset($_POST['submitDivisionOrder']))
{
	$o = new Order();
	$dbcon  = Database::getDb();
	$user_id = $_SESSION['id'];

	$type = 'Division';
	$current_rank = $_POST['currentRankDiv'];
	$desired_rank = $_POST['desiredRankDiv'];
	$server = $_POST['server'];
	//Additional features--------------------------------------------------
	if(isset($_POST['duoboost'])){
		$duo_boost = 'Yes';
	}else{
		$duo_boost = 'No';
	}

	if(isset($_POST['rolechampions'])){
		$rolechampions = 'Yes';
	}else{
		$rolechampions = 'No';
	}

	if(isset($_POST['stream'])){
		$stream = 'Yes';
	}else{
		$stream = 'No';
	}

	if(isset($_POST['prority'])){
		$prority = 'Yes';
	}else{
		$prority = 'No';
	}

	if(isset($_POST['express'])){
		$express = 'Yes';
	}else{
		$express = 'No';
	}
	//End additional features---------------------------------------------
	$primary_role = $_POST['role'];
	$primary_champion = $_POST['champion'];
	$secondary_role = $_POST['role-alt'];
	$secondary_champion = $_POST['champion-alt'];
	$final_amount_div = $_POST['finalAmountDiv'];
	$status = 'New';
	// echo $current_rank;
	// echo $desired_rank;
	// echo $server;
	// echo $duo_boost;

	$addOrder = $o->addOrder($dbcon,$type, $current_rank, $desired_rank, $server, $duo_boost, $rolechampions, $stream, $prority, $express, $primary_role, $primary_champion, $secondary_role, $secondary_champion, $final_amount_div, $user_id, $status);
}
//NetWin
if(isset($_POST['submitNetwinOrder']))
{
	$o = new Order();
	$dbcon  = Database::getDb();
	$user_id = $_SESSION['id'];

	$type = 'NetWin';
	$current_rank_netwin = $_POST['chooseCurrentRank_NetWin'];
	$number_games = $_POST['winsQuant'];
	$server_netwin = $_POST['server_netwin'];
	//Additional features--------------------------------------------------
	if(isset($_POST['duoboost_netwin'])){
		$duoboost_netwin = 'Yes';
	}else{
		$duoboost_netwin = 'No';
	}

	if(isset($_POST['rolechampions_netwin'])){
		$rolechampions_netwin = 'Yes';
	}else{
		$rolechampions_netwin = 'No';
	}

	if(isset($_POST['stream_netwin'])){
		$stream_netwin = 'Yes';
	}else{
		$stream_netwin = 'No';
	}

	if(isset($_POST['prority_netwin'])){
		$prority_netwin = 'Yes';
	}else{
		$prority_netwin = 'No';
	}

	if(isset($_POST['express_netwin'])){
		$express_netwin = 'Yes';
	}else{
		$express_netwin = 'No';
	}
	//End additional features---------------------------------------------
	$primary_role_netwin = $_POST['role_netwin'];
	$primary_champion_netwin = $_POST['champion_netwin'];
	$secondary_role_netwin = $_POST['role-alt_netwin'];
	$secondary_champion_netwin = $_POST['champion-alt_netwin'];
	$final_amount_netwin = $_POST['finalAmount_netwin'];
	$status = 'New';

	echo 'TEST FORM';
	echo $user_id;
	echo $type;
	echo $current_rank_netwin;
	echo $number_games;
	echo $server_netwin;
	echo $duoboost_netwin;
	echo $rolechampions_netwin;
	echo $stream_netwin;
	echo $prority_netwin;
	echo $express_netwin;
	echo $primary_role_netwin;
	echo $primary_champion_netwin;
	echo $secondary_role_netwin;
	echo $secondary_champion_netwin;
	echo $final_amount_netwin;
	echo $status;
	$addOrder = $o->addOrderNetWin($dbcon,$type, $current_rank_netwin, $number_games, $server_netwin, $duoboost_netwin, $rolechampions_netwin, $stream_netwin, $prority_netwin, $express_netwin, $primary_role_netwin, $primary_champion_netwin, $secondary_role_netwin, $secondary_champion_netwin, $final_amount_netwin, $user_id, $status);
}

?>
			<div class="row headingZ">
				<div class="col-12 g-0">
					<div class="heading_title">
						<h1>Buy Boost</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="sectionBg" data-speed-y="3" data-offset="0" style="background-image:url(./images/dist/main/headerBg.jpg)"></div>
	</header>

<main>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<ul class="breadcrumbs">
					<li><a href="/">Home</a></li>
					<li><span>Buy Boost</span></li>
				</ul>
			</div>
		</div>
	</div>
	<section class="order sectionWithBg">
		<div class="container">
			<div class="row">
				<div class="col-12 g-0">
					<div class="order_item tabsWrapper">
						<ul class="order_menu tabButton">
							<li class="active"><span>Division</span></li>
							<li><span>Netwin</span></li>
							<!-- <li><span>Placement </span></li>
							<li><span>Anti-Decay</span></li> -->
						</ul>
						<form method="POST" enctype="multipart/form-data" class="order_body tabContent orderDivision">
							<h2 class="orderTitle">Your Order</h2>
							<span class="orderTitle_descr">Select your order details</span>
							<div class="row gx-5 justify-content-center">
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="currentRank">							
											<h3>Current Rank</h3>
											<img src="./images/dist/icons/iron_rank.png" data-rank="iron" alt="iron rank" class="currentRank_icon">
											<select class="chooseCurrentRank" name="currentRankDiv">
												<option value="Choose rank">Choose rank</option>
												<option value="Iron4">Iron <span>4</span></option>
												<option value="Iron3">Iron <span>3</span></option>
												<option value="Iron2">Iron <span>2</span></option>
												<option value="Iron1">Iron <span>1</span></option>

												<option value="Bronze4">Bronze <span>4</span></option>
												<option value="Bronze3">Bronze <span>3</span></option>
												<option value="Bronze2">Bronze <span>2</span></option>
												<option value="Bronze1">Bronze <span>1</span></option>

												<option value="Silver4">Silver <span>4</span></option>
												<option value="Silver3">Silver <span>3</span></option>
												<option value="Silver2">Silver <span>2</span></option>
												<option value="Silver1">Silver <span>1</span></option>

												<option value="Gold4">Gold <span>4</span></option>
												<option value="Gold3">Gold <span>3</span></option>
												<option value="Gold2">Gold <span>2</span></option>
												<option value="Gold1">Gold <span>1</span></option>

												<option value="Platinum4">Platinum <span>4</span></option>
												<option value="Platinum3">Platinum <span>3</span></option>
												<option value="Platinum2">Platinum <span>2</span></option>
												<option value="Platinum1">Platinum <span>1</span></option>

												<option value="Diamond4">Diamond <span>4</span></option>
												<option value="Diamond3">Diamond <span>3</span></option>
												<option value="Diamond2">Diamond <span>2</span></option>
												<option value="Diamond1">Diamond <span>1</span></option>
											</select>
											<select class='currentPoint' name="currentPoint">
												<option value="0-20">0 - 20 LP</option>
												<option value="21-40">21 - 40 LP</option>
                                                <option value="41-60">41 - 60 LP</option>
                                                <option value="61-80">61 - 80 LP</option>
                                                <option value="81-100">81 - 100 LP</option>
											</select>
									</div>
								</div>
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="currentRank desiredRank">										
											<h3>Desired Rank</h3>
											<img src="./images/dist/icons/master_rank.png" data-rank="master" alt="master rank" class="currentRank_icon desiredRank_icon">
											<select class="chooseDesiredRank" name="desiredRankDiv">
												<option value="Choose rank">Choose rank</option>
												<option value="Iron4">Iron <span>4</span></option>
												<option value="Iron3">Iron <span>3</span></option>
												<option value="Iron2">Iron <span>2</span></option>
												<option value="Iron1">Iron <span>1</span></option>

												<option value="Bronze4">Bronze <span>4</span></option>
												<option value="Bronze3">Bronze <span>3</span></option>
												<option value="Bronze2">Bronze <span>2</span></option>
												<option value="Bronze1">Bronze <span>1</span></option>

												<option value="Silver4">Silver <span>4</span></option>
												<option value="Silver3">Silver <span>3</span></option>
												<option value="Silver2">Silver <span>2</span></option>
												<option value="Silver1">Silver <span>1</span></option>

												<option value="Gold4">Gold <span>4</span></option>
												<option value="Gold3">Gold <span>3</span></option>
												<option value="Gold2">Gold <span>2</span></option>
												<option value="Gold1">Gold <span>1</span></option>

												<option value="Platinum4">Platinum <span>4</span></option>
												<option value="Platinum3">Platinum <span>3</span></option>
												<option value="Platinum2">Platinum <span>2</span></option>
												<option value="Platinum1">Platinum <span>1</span></option>

												<option value="Diamond4">Diamond <span>4</span></option>
												<option value="Diamond3">Diamond <span>3</span></option>
												<option value="Diamond2">Diamond <span>2</span></option>
												<option value="Diamond1">Diamond <span>1</span></option>
											</select>
									</div>
								</div>
							</div>
							<div class="row gx-5 justify-content-center">
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="categoryRankTitle">
										<h4>Division Boost</h4>
										<div class="categoryRankTitle_wrapper">
											<span class="from">Choose</span>
											<span class="to">Choose</span>
										</div>
									</div>
									<div class="categoryRankTitle">
										<h4>Server</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="server">
												<option value="Choose Server">Choose server</option>
												<option value="Europe">Europe</option>
												<option value="North America">North America</option>
												<option value="Other">Other</option>
											</select>
										</div>
									</div>
									<div class="categoryRankTitle">
										<h4>Additional features </h4>
										<div class="categoryRankTitle_wrapper">
											<label class="addInp">
												<input type="checkbox" name="duoboost" value="1.5">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Duo Boost (+50%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label class="addInp">
												<input type="checkbox" name="rolechampions" value="1.15">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Roles/Champions (+15%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label class="addInp">
												<input type="checkbox" name="stream" value="1.15">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Twitch stream (+15%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label class="addInp">
												<input type="checkbox" name="prority" value="1.20">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>High priority (+20%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label class="addInp">
												<input type="checkbox" name="express" value="1.25">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Express Order (+25%)</p>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="categoryRankTitle features">
										<h4>Free features</h4>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>VPN Protection</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Choose Summoner Spells</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Offline mode</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Live Chat with Booster</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Track Order in Real-time</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Booster Ready in 3 minutes</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Grandmaster+ Boosters</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>VPN Protection</p>
										</div>
									</div>
									<div class="categoryRankTitle totalAmount">
										<h4>Total amount <span class="discount">-50%</span></h4>
										<div class="amountWrapper">
											<!--Вот тут финальные циферки-->
											<span class="finalAmount">$0</span>
											<input type="hidden" value="0" class="finalAmountInp" name="finalAmountDiv">
											<span class="clearAmount">($0)</span>
											<input type="hidden" class="clearAmountInp" value="0">
											<!--Вот тут финальные циферки-->
										</div>
									</div>
									
								</div>
							</div>

							<div class="row gx-5 customizeOrder justify-content-center">
								<div class="col-xl-8 col-lg-10 col-md-12">
									<p class="customizeDescr">Customize your order</p>
								</div>
								<div class="w-100"></div>
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="categoryRankTitle">
										<h4>Primary Role</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="role">
												<option value="None">None</option>
												<option value="Top">Top</option>
												<option value="Middle">Middle</option>
												<option value="Bottom">Bottom</option>
												<option value="Jungle">Jungle</option>
												<option value="Support">Support</option>
											</select>
										</div>
										<div class="categoryRankTitle_wrapper">
											<select name="champion">
				                        <option value="none">None</option>
				                        <option value="Aatrox">Aatrox</option>
				                        <option value="Ahri">Ahri</option>
				                        <option value="Akali">Akali</option>
				                        <option value="Alistar">Alistar</option>
				                        <option value="Amumu">Amumu</option>
				                        <option value="Anivia">Anivia</option>
				                        <option value="Annie">Annie</option>
				                        <option value="Aphelios">Aphelios</option>
				                        <option value="Ashe">Ashe</option>
				                        <option value="Aurelion Sol">Aurelion Sol</option>
				                        <option value="Azir">Azir</option>
				                        <option value="Bard">Bard</option>
				                        <option value="Blitzcrank">Blitzcrank</option>
				                        <option value="Brand">Brand</option>
				                        <option value="Braum">Braum</option>
				                        <option value="Caitlyn">Caitlyn</option>
				                        <option value="Camille">Camille</option>
				                        <option value="Cassiopeia">Cassiopeia</option>
				                        <option value="Cho'Gath">Cho'Gath</option>
				                        <option value="Corki">Corki</option>
				                        <option value="Darius">Darius</option>
				                        <option value="Diana">Diana</option>
				                        <option value="Draven">Draven</option>
				                        <option value="Dr. Mundo">Dr. Mundo</option>
				                        <option value="Ekko">Ekko</option>
				                        <option value="Elise">Elise</option>
				                        <option value="Evelynn">Evelynn</option>
				                        <option value="Ezreal">Ezreal</option>
				                        <option value="Fiddlesticks">Fiddlesticks</option>
				                        <option value="Fiora">Fiora</option>
				                        <option value="Fizz">Fizz</option>
				                        <option value="Galio">Galio</option>
				                        <option value="Gangplank">Gangplank</option>
				                        <option value="Garen">Garen</option>
				                        <option value="Gnar">Gnar</option>
				                        <option value="Gragas">Gragas</option>
				                        <option value="Graves">Graves</option>
				                        <option value="Hecarim">Hecarim</option>
				                        <option value="Heimerdinger">Heimerdinger</option>
				                        <option value="Illaoi">Illaoi</option>
				                        <option value="Irelia">Irelia</option>
				                        <option value="Ivern">Ivern</option>
				                        <option value="Janna">Janna</option>
				                        <option value="Jarvan IV">Jarvan IV</option>
				                        <option value="Jax">Jax</option>
				                        <option value="Jayce">Jayce</option>
				                        <option value="Jhin">Jhin</option>
				                        <option value="Jinx">Jinx</option>
				                        <option value="Kai'Sa">Kai'Sa</option>
				                        <option value="Kalista">Kalista</option>
				                        <option value="Karma">Karma</option>
				                        <option value="Karthus">Karthus</option>
				                        <option value="Kassadin">Kassadin</option>
				                        <option value="Katarina">Katarina</option>
				                        <option value="Kayle">Kayle</option>
				                        <option value="Kayn">Kayn</option>
				                        <option value="Kennen">Kennen</option>
				                        <option value="Kha'Zix">Kha'Zix</option>
				                        <option value="Kindred">Kindred</option>
				                        <option value="Kled">Kled</option>
				                        <option value="Kog'Maw">Kog'Maw</option>
				                        <option value="LeBlanc">LeBlanc</option>
				                        <option value="Lee Sin">Lee Sin</option>
				                        <option value="Leona">Leona</option>
				                        <option value="Lillia">Lillia</option>
				                        <option value="Lissandra">Lissandra</option>
				                        <option value="Lucian">Lucian</option>
				                        <option value="Lulu">Lulu</option>
				                        <option value="Lux">Lux</option>
				                        <option value="Malphite">Malphite</option>
				                        <option value="Malzahar">Malzahar</option>
				                        <option value="Maokai">Maokai</option>
				                        <option value="Master Yi">Master Yi</option>
				                        <option value="Miss Fortune">Miss Fortune</option>
				                        <option value="Wukong">Wukong</option>
				                        <option value="Mordekaiser">Mordekaiser</option>
				                        <option value="Morgana">Morgana</option>
				                        <option value="Nami">Nami</option>
				                        <option value="Nasus">Nasus</option>
				                        <option value="Nautilus">Nautilus</option>
				                        <option value="Neeko">Neeko</option>
				                        <option value="Nidalee">Nidalee</option>
				                        <option value="Nocturne">Nocturne</option>
				                        <option value="Nunu">Nunu</option>
				                        <option value="Olaf">Olaf</option>
				                        <option value="Orianna">Orianna</option>
				                        <option value="Ornn">Ornn</option>
				                        <option value="Pantheon">Pantheon</option>
				                        <option value="Poppy">Poppy</option>
				                        <option value="Pyke">Pyke</option>
				                        <option value="Qiyana">Qiyana</option>
				                        <option value="Quinn">Quinn</option>
				                        <option value="Rakan">Rakan</option>
				                        <option value="Rammus">Rammus</option>
				                        <option value="Rek'Sai">Rek'Sai</option>
				                        <option value="Rell">Rell</option>
				                        <option value="Renekton">Renekton</option>
				                        <option value="Rengar">Rengar</option>
				                        <option value="Riven">Riven</option>
				                        <option value="Rumble">Rumble</option>
				                        <option value="Ryze">Ryze</option>
				                        <option value="Samira">Samira</option>
				                        <option value="Sejuani">Sejuani</option>
				                        <option value="Senna">Senna</option>
				                        <option value="Seraphine">Seraphine</option>
				                        <option value="Sett">Sett</option>
				                        <option value="Shaco">Shaco</option>
				                        <option value="Shen">Shen</option>
				                        <option value="Shyvana">Shyvana</option>
				                        <option value="Singed">Singed</option>
				                        <option value="Sion">Sion</option>
				                        <option value="Sivir">Sivir</option>
				                        <option value="Skarner">Skarner</option>
				                        <option value="Sona">Sona</option>
				                        <option value="Soraka">Soraka</option>
				                        <option value="Swain">Swain</option>
				                        <option value="Sylas">Sylas</option>
				                        <option value="Syndra">Syndra</option>
				                        <option value="Tahm Kench">Tahm Kench</option>
				                        <option value="Taliyah">Taliyah</option>
				                        <option value="Talon">Talon</option>
				                        <option value="Taric">Taric</option>
				                        <option value="Teemo">Teemo</option>
				                        <option value="Thresh">Thresh</option>
				                        <option value="Tristana">Tristana</option>
				                        <option value="Trundle">Trundle</option>
				                        <option value="Tryndamere">Tryndamere</option>
				                        <option value="Twisted Fate">Twisted Fate</option>
				                        <option value="Twitch">Twitch</option>
				                        <option value="Udyr">Udyr</option>
				                        <option value="Urgot">Urgot</option>
				                        <option value="Varus">Varus</option>
				                        <option value="Vayne">Vayne</option>
				                        <option value="Veigar">Veigar</option>
				                        <option value="Vel'Koz">Vel'Koz</option>
				                        <option value="Vi">Vi</option>
				                        <option value="Viego">Viego</option>
				                        <option value="Viktor">Viktor</option>
				                        <option value="Vladimir">Vladimir</option>
				                        <option value="Volibear">Volibear</option>
				                        <option value="Warwick">Warwick</option>
				                        <option value="Xayah">Xayah</option>
				                        <option value="Xerath">Xerath</option>
				                        <option value="Xin Zhao">Xin Zhao</option>
				                        <option value="Yasuo">Yasuo</option>
				                        <option value="Yone">Yone</option>
				                        <option value="Yorick">Yorick</option>
				                        <option value="Yuumi">Yuumi</option>
				                        <option value="Zac">Zac</option>
				                        <option value="Zed">Zed</option>
				                        <option value="Ziggs">Ziggs</option>
				                        <option value="Zilean">Zilean</option>
				                        <option value="Zoe">Zoe</option>
				                        <option value="Zyra">Zyra</option>
				                </select>
										</div>
									</div>
								</div>
								<div class="col-xl-4 col-lg-5 col-md-6">
									<div class="categoryRankTitle">
										<h4>Secondary Role</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="role-alt">
												<option value="None">None</option>
												<option value="Top">Top</option>
												<option value="Middle">Middle</option>
												<option value="Bottom">Bottom</option>
												<option value="Jungle">Jungle</option>
												<option value="Support">Support</option>
											</select>
										</div>
										<div class="categoryRankTitle_wrapper">
											<select name="champion-alt">
				                        <option value="none">None</option>
				                        <option value="Aatrox">Aatrox</option>
				                        <option value="Ahri">Ahri</option>
				                        <option value="Akali">Akali</option>
				                        <option value="Alistar">Alistar</option>
				                        <option value="Amumu">Amumu</option>
				                        <option value="Anivia">Anivia</option>
				                        <option value="Annie">Annie</option>
				                        <option value="Aphelios">Aphelios</option>
				                        <option value="Ashe">Ashe</option>
				                        <option value="Aurelion Sol">Aurelion Sol</option>
				                        <option value="Azir">Azir</option>
				                        <option value="Bard">Bard</option>
				                        <option value="Blitzcrank">Blitzcrank</option>
				                        <option value="Brand">Brand</option>
				                        <option value="Braum">Braum</option>
				                        <option value="Caitlyn">Caitlyn</option>
				                        <option value="Camille">Camille</option>
				                        <option value="Cassiopeia">Cassiopeia</option>
				                        <option value="Cho'Gath">Cho'Gath</option>
				                        <option value="Corki">Corki</option>
				                        <option value="Darius">Darius</option>
				                        <option value="Diana">Diana</option>
				                        <option value="Draven">Draven</option>
				                        <option value="Dr. Mundo">Dr. Mundo</option>
				                        <option value="Ekko">Ekko</option>
				                        <option value="Elise">Elise</option>
				                        <option value="Evelynn">Evelynn</option>
				                        <option value="Ezreal">Ezreal</option>
				                        <option value="Fiddlesticks">Fiddlesticks</option>
				                        <option value="Fiora">Fiora</option>
				                        <option value="Fizz">Fizz</option>
				                        <option value="Galio">Galio</option>
				                        <option value="Gangplank">Gangplank</option>
				                        <option value="Garen">Garen</option>
				                        <option value="Gnar">Gnar</option>
				                        <option value="Gragas">Gragas</option>
				                        <option value="Graves">Graves</option>
				                        <option value="Hecarim">Hecarim</option>
				                        <option value="Heimerdinger">Heimerdinger</option>
				                        <option value="Illaoi">Illaoi</option>
				                        <option value="Irelia">Irelia</option>
				                        <option value="Ivern">Ivern</option>
				                        <option value="Janna">Janna</option>
				                        <option value="Jarvan IV">Jarvan IV</option>
				                        <option value="Jax">Jax</option>
				                        <option value="Jayce">Jayce</option>
				                        <option value="Jhin">Jhin</option>
				                        <option value="Jinx">Jinx</option>
				                        <option value="Kai'Sa">Kai'Sa</option>
				                        <option value="Kalista">Kalista</option>
				                        <option value="Karma">Karma</option>
				                        <option value="Karthus">Karthus</option>
				                        <option value="Kassadin">Kassadin</option>
				                        <option value="Katarina">Katarina</option>
				                        <option value="Kayle">Kayle</option>
				                        <option value="Kayn">Kayn</option>
				                        <option value="Kennen">Kennen</option>
				                        <option value="Kha'Zix">Kha'Zix</option>
				                        <option value="Kindred">Kindred</option>
				                        <option value="Kled">Kled</option>
				                        <option value="Kog'Maw">Kog'Maw</option>
				                        <option value="LeBlanc">LeBlanc</option>
				                        <option value="Lee Sin">Lee Sin</option>
				                        <option value="Leona">Leona</option>
				                        <option value="Lillia">Lillia</option>
				                        <option value="Lissandra">Lissandra</option>
				                        <option value="Lucian">Lucian</option>
				                        <option value="Lulu">Lulu</option>
				                        <option value="Lux">Lux</option>
				                        <option value="Malphite">Malphite</option>
				                        <option value="Malzahar">Malzahar</option>
				                        <option value="Maokai">Maokai</option>
				                        <option value="Master Yi">Master Yi</option>
				                        <option value="Miss Fortune">Miss Fortune</option>
				                        <option value="Wukong">Wukong</option>
				                        <option value="Mordekaiser">Mordekaiser</option>
				                        <option value="Morgana">Morgana</option>
				                        <option value="Nami">Nami</option>
				                        <option value="Nasus">Nasus</option>
				                        <option value="Nautilus">Nautilus</option>
				                        <option value="Neeko">Neeko</option>
				                        <option value="Nidalee">Nidalee</option>
				                        <option value="Nocturne">Nocturne</option>
				                        <option value="Nunu">Nunu</option>
				                        <option value="Olaf">Olaf</option>
				                        <option value="Orianna">Orianna</option>
				                        <option value="Ornn">Ornn</option>
				                        <option value="Pantheon">Pantheon</option>
				                        <option value="Poppy">Poppy</option>
				                        <option value="Pyke">Pyke</option>
				                        <option value="Qiyana">Qiyana</option>
				                        <option value="Quinn">Quinn</option>
				                        <option value="Rakan">Rakan</option>
				                        <option value="Rammus">Rammus</option>
				                        <option value="Rek'Sai">Rek'Sai</option>
				                        <option value="Rell">Rell</option>
				                        <option value="Renekton">Renekton</option>
				                        <option value="Rengar">Rengar</option>
				                        <option value="Riven">Riven</option>
				                        <option value="Rumble">Rumble</option>
				                        <option value="Ryze">Ryze</option>
				                        <option value="Samira">Samira</option>
				                        <option value="Sejuani">Sejuani</option>
				                        <option value="Senna">Senna</option>
				                        <option value="Seraphine">Seraphine</option>
				                        <option value="Sett">Sett</option>
				                        <option value="Shaco">Shaco</option>
				                        <option value="Shen">Shen</option>
				                        <option value="Shyvana">Shyvana</option>
				                        <option value="Singed">Singed</option>
				                        <option value="Sion">Sion</option>
				                        <option value="Sivir">Sivir</option>
				                        <option value="Skarner">Skarner</option>
				                        <option value="Sona">Sona</option>
				                        <option value="Soraka">Soraka</option>
				                        <option value="Swain">Swain</option>
				                        <option value="Sylas">Sylas</option>
				                        <option value="Syndra">Syndra</option>
				                        <option value="Tahm Kench">Tahm Kench</option>
				                        <option value="Taliyah">Taliyah</option>
				                        <option value="Talon">Talon</option>
				                        <option value="Taric">Taric</option>
				                        <option value="Teemo">Teemo</option>
				                        <option value="Thresh">Thresh</option>
				                        <option value="Tristana">Tristana</option>
				                        <option value="Trundle">Trundle</option>
				                        <option value="Tryndamere">Tryndamere</option>
				                        <option value="Twisted Fate">Twisted Fate</option>
				                        <option value="Twitch">Twitch</option>
				                        <option value="Udyr">Udyr</option>
				                        <option value="Urgot">Urgot</option>
				                        <option value="Varus">Varus</option>
				                        <option value="Vayne">Vayne</option>
				                        <option value="Veigar">Veigar</option>
				                        <option value="Vel'Koz">Vel'Koz</option>
				                        <option value="Vi">Vi</option>
				                        <option value="Viego">Viego</option>
				                        <option value="Viktor">Viktor</option>
				                        <option value="Vladimir">Vladimir</option>
				                        <option value="Volibear">Volibear</option>
				                        <option value="Warwick">Warwick</option>
				                        <option value="Xayah">Xayah</option>
				                        <option value="Xerath">Xerath</option>
				                        <option value="Xin Zhao">Xin Zhao</option>
				                        <option value="Yasuo">Yasuo</option>
				                        <option value="Yone">Yone</option>
				                        <option value="Yorick">Yorick</option>
				                        <option value="Yuumi">Yuumi</option>
				                        <option value="Zac">Zac</option>
				                        <option value="Zed">Zed</option>
				                        <option value="Ziggs">Ziggs</option>
				                        <option value="Zilean">Zilean</option>
				                        <option value="Zoe">Zoe</option>
				                        <option value="Zyra">Zyra</option>
				                </select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<button type="submit" name="submitDivisionOrder" class="button accent"><span>buy boost</span></button>
								</div>
							</div>
						</form>

						<!-- 2 таб -->
						<form method="POST" enctype="multipart/form-data" class="order_body tabContent orderNetwin">
							<h2 class="orderTitle">Your Order</h2>
							<span class="orderTitle_descr">Select your order details</span>
							<div class="row gx-5 justify-content-center">
								<div class="col-lg-4">
									<div class="currentRank">							
										<h3>Current Rank</h3>
										<img src="./images/dist/icons/iron_rank.png" data-rank="iron" alt="iron rank" class="currentRank_icon">
										<select class="chooseCurrentRank_NetWin" name="chooseCurrentRank_NetWin">
											<option value="Choose rank">Choose rank</option>
											<option value="Iron4">Iron <span>4</span></option>
											<option value="Iron3">Iron <span>3</span></option>
											<option value="Iron2">Iron <span>2</span></option>
											<option value="Iron1">Iron <span>1</span></option>

											<option value="Bronze4">Bronze <span>4</span></option>
											<option value="Bronze3">Bronze <span>3</span></option>
											<option value="Bronze2">Bronze <span>2</span></option>
											<option value="Bronze1">Bronze <span>1</span></option>

											<option value="Silver4">Silver <span>4</span></option>
											<option value="Silver3">Silver <span>3</span></option>
											<option value="Silver2">Silver <span>2</span></option>
											<option value="Silver1">Silver <span>1</span></option>

											<option value="Gold4">Gold <span>4</span></option>
											<option value="Gold3">Gold <span>3</span></option>
											<option value="Gold2">Gold <span>2</span></option>
											<option value="Gold1">Gold <span>1</span></option>

											<option value="Platinum4">Platinum <span>4</span></option>
											<option value="Platinum3">Platinum <span>3</span></option>
											<option value="Platinum2">Platinum <span>2</span></option>
											<option value="Platinum1">Platinum <span>1</span></option>

											<option value="Diamond4">Diamond <span>4</span></option>
											<option value="Diamond3">Diamond <span>3</span></option>
											<option value="Diamond2">Diamond <span>2</span></option>
											<option value="Diamond1">Diamond <span>1</span></option>

											<option value="Master">Master</option>
											<option value="GrandMaster">GrandMaster</option>
											<option value="Challendger">Challendger</option>
										</select>
									</div>
								</div>
								<div class="col-lg-4">
									<img class="desiredRank_img" src="./images/dist/main/desiredRank_bg.png" alt="desired rank image">
									<div class="currentRank desiredRank winsQuant">
											<h3>Wins</h3>
											<div class="winsWrapper">
												<span class="rangeInfo" name="rangeInfo">1</span>
												<input class='winsQuantInp' type="range" min="1" max="20" value="1" name="winsQuant" step="1">
											</div>
									</div>
								</div>
							</div>
							<div class="row gx-5 justify-content-center">
								<div class="col-lg-4">
									<div class="categoryRankTitle">
										<h4>Server</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="server_netwin">
												<option value="Choose Server">Choose server</option>
												<option value="Europe">Europe</option>
												<option value="North America">North America</option>
												<option value="Other">Other</option>
											</select>
										</div>
									</div>
									<div class="categoryRankTitle">
										<h4>Additional features </h4>
										<div class="categoryRankTitle_wrapper">
											<label>
												<input type="checkbox" name="duoboost_netwin">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Duo Boost (+50%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label>
												<input type="checkbox" name="rolechampions_netwin">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Roles/Champions (+15%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label>
												<input type="checkbox" name="stream_netwin">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Twitch stream (+15%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label>
												<input type="checkbox" name="prority_netwin">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>High priority (+20%)</p>
										</div>
										<div class="categoryRankTitle_wrapper">
											<label>
												<input type="checkbox" name="express_netwin">
												<span class="circle"></span>
												<span class="bg"></span>
											</label>
											<p>Express Order (+25%)</p>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="categoryRankTitle features">
										<h4>Free features</h4>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>VPN Protection</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Choose Summoner Spells</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Offline mode</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Live Chat with Booster</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Track Order in Real-time</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Booster Ready in 3 minutes</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>Grandmaster+ Boosters</p>
										</div>
										<div class="categoryRankTitle_wrapper features">
											<img src="./images/dist/icons/check_icon.svg" alt="">
											<p>VPN Protection</p>
										</div>
									</div>
									<div class="categoryRankTitle totalAmount">
										<h4>Total amount <span class="discount">-50%</span></h4>
										<div class="amountWrapper">
											<span class="finalAmount" name="finalAmount_netwin">$0</span>
											<input type="hidden" value="0" class="finalAmountInp" name="finalAmount_netwin">
											<span class="clearAmount">($0)</span>
											<input type="hidden" class="clearAmountInp" value="0">
										</div>
									</div>
									
								</div>
							</div>

							<div class="row gx-5 customizeOrder justify-content-center">
								<div class="col-lg-8">
									<p class="customizeDescr">Customize your order</p>
								</div>
								<div class="w-100"></div>
								<div class="col-lg-4">
									<div class="categoryRankTitle">
										<h4>Primary Role</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="role_netwin">
												<option value="None">None</option>
												<option value="Top">Top</option>
												<option value="Middle">Middle</option>
												<option value="Bottom">Bottom</option>
												<option value="Jungle">Jungle</option>
												<option value="Support">Support</option>
											</select>
										</div>
										<div class="categoryRankTitle_wrapper">
											<select name="champion_netwin">
				                        <option value="none">None</option>
				                        <option value="Aatrox">Aatrox</option>
				                        <option value="Ahri">Ahri</option>
				                        <option value="Akali">Akali</option>
				                        <option value="Alistar">Alistar</option>
				                        <option value="Amumu">Amumu</option>
				                        <option value="Anivia">Anivia</option>
				                        <option value="Annie">Annie</option>
				                        <option value="Aphelios">Aphelios</option>
				                        <option value="Ashe">Ashe</option>
				                        <option value="Aurelion Sol">Aurelion Sol</option>
				                        <option value="Azir">Azir</option>
				                        <option value="Bard">Bard</option>
				                        <option value="Blitzcrank">Blitzcrank</option>
				                        <option value="Brand">Brand</option>
				                        <option value="Braum">Braum</option>
				                        <option value="Caitlyn">Caitlyn</option>
				                        <option value="Camille">Camille</option>
				                        <option value="Cassiopeia">Cassiopeia</option>
				                        <option value="Cho'Gath">Cho'Gath</option>
				                        <option value="Corki">Corki</option>
				                        <option value="Darius">Darius</option>
				                        <option value="Diana">Diana</option>
				                        <option value="Draven">Draven</option>
				                        <option value="Dr. Mundo">Dr. Mundo</option>
				                        <option value="Ekko">Ekko</option>
				                        <option value="Elise">Elise</option>
				                        <option value="Evelynn">Evelynn</option>
				                        <option value="Ezreal">Ezreal</option>
				                        <option value="Fiddlesticks">Fiddlesticks</option>
				                        <option value="Fiora">Fiora</option>
				                        <option value="Fizz">Fizz</option>
				                        <option value="Galio">Galio</option>
				                        <option value="Gangplank">Gangplank</option>
				                        <option value="Garen">Garen</option>
				                        <option value="Gnar">Gnar</option>
				                        <option value="Gragas">Gragas</option>
				                        <option value="Graves">Graves</option>
				                        <option value="Hecarim">Hecarim</option>
				                        <option value="Heimerdinger">Heimerdinger</option>
				                        <option value="Illaoi">Illaoi</option>
				                        <option value="Irelia">Irelia</option>
				                        <option value="Ivern">Ivern</option>
				                        <option value="Janna">Janna</option>
				                        <option value="Jarvan IV">Jarvan IV</option>
				                        <option value="Jax">Jax</option>
				                        <option value="Jayce">Jayce</option>
				                        <option value="Jhin">Jhin</option>
				                        <option value="Jinx">Jinx</option>
				                        <option value="Kai'Sa">Kai'Sa</option>
				                        <option value="Kalista">Kalista</option>
				                        <option value="Karma">Karma</option>
				                        <option value="Karthus">Karthus</option>
				                        <option value="Kassadin">Kassadin</option>
				                        <option value="Katarina">Katarina</option>
				                        <option value="Kayle">Kayle</option>
				                        <option value="Kayn">Kayn</option>
				                        <option value="Kennen">Kennen</option>
				                        <option value="Kha'Zix">Kha'Zix</option>
				                        <option value="Kindred">Kindred</option>
				                        <option value="Kled">Kled</option>
				                        <option value="Kog'Maw">Kog'Maw</option>
				                        <option value="LeBlanc">LeBlanc</option>
				                        <option value="Lee Sin">Lee Sin</option>
				                        <option value="Leona">Leona</option>
				                        <option value="Lillia">Lillia</option>
				                        <option value="Lissandra">Lissandra</option>
				                        <option value="Lucian">Lucian</option>
				                        <option value="Lulu">Lulu</option>
				                        <option value="Lux">Lux</option>
				                        <option value="Malphite">Malphite</option>
				                        <option value="Malzahar">Malzahar</option>
				                        <option value="Maokai">Maokai</option>
				                        <option value="Master Yi">Master Yi</option>
				                        <option value="Miss Fortune">Miss Fortune</option>
				                        <option value="Wukong">Wukong</option>
				                        <option value="Mordekaiser">Mordekaiser</option>
				                        <option value="Morgana">Morgana</option>
				                        <option value="Nami">Nami</option>
				                        <option value="Nasus">Nasus</option>
				                        <option value="Nautilus">Nautilus</option>
				                        <option value="Neeko">Neeko</option>
				                        <option value="Nidalee">Nidalee</option>
				                        <option value="Nocturne">Nocturne</option>
				                        <option value="Nunu">Nunu</option>
				                        <option value="Olaf">Olaf</option>
				                        <option value="Orianna">Orianna</option>
				                        <option value="Ornn">Ornn</option>
				                        <option value="Pantheon">Pantheon</option>
				                        <option value="Poppy">Poppy</option>
				                        <option value="Pyke">Pyke</option>
				                        <option value="Qiyana">Qiyana</option>
				                        <option value="Quinn">Quinn</option>
				                        <option value="Rakan">Rakan</option>
				                        <option value="Rammus">Rammus</option>
				                        <option value="Rek'Sai">Rek'Sai</option>
				                        <option value="Rell">Rell</option>
				                        <option value="Renekton">Renekton</option>
				                        <option value="Rengar">Rengar</option>
				                        <option value="Riven">Riven</option>
				                        <option value="Rumble">Rumble</option>
				                        <option value="Ryze">Ryze</option>
				                        <option value="Samira">Samira</option>
				                        <option value="Sejuani">Sejuani</option>
				                        <option value="Senna">Senna</option>
				                        <option value="Seraphine">Seraphine</option>
				                        <option value="Sett">Sett</option>
				                        <option value="Shaco">Shaco</option>
				                        <option value="Shen">Shen</option>
				                        <option value="Shyvana">Shyvana</option>
				                        <option value="Singed">Singed</option>
				                        <option value="Sion">Sion</option>
				                        <option value="Sivir">Sivir</option>
				                        <option value="Skarner">Skarner</option>
				                        <option value="Sona">Sona</option>
				                        <option value="Soraka">Soraka</option>
				                        <option value="Swain">Swain</option>
				                        <option value="Sylas">Sylas</option>
				                        <option value="Syndra">Syndra</option>
				                        <option value="Tahm Kench">Tahm Kench</option>
				                        <option value="Taliyah">Taliyah</option>
				                        <option value="Talon">Talon</option>
				                        <option value="Taric">Taric</option>
				                        <option value="Teemo">Teemo</option>
				                        <option value="Thresh">Thresh</option>
				                        <option value="Tristana">Tristana</option>
				                        <option value="Trundle">Trundle</option>
				                        <option value="Tryndamere">Tryndamere</option>
				                        <option value="Twisted Fate">Twisted Fate</option>
				                        <option value="Twitch">Twitch</option>
				                        <option value="Udyr">Udyr</option>
				                        <option value="Urgot">Urgot</option>
				                        <option value="Varus">Varus</option>
				                        <option value="Vayne">Vayne</option>
				                        <option value="Veigar">Veigar</option>
				                        <option value="Vel'Koz">Vel'Koz</option>
				                        <option value="Vi">Vi</option>
				                        <option value="Viego">Viego</option>
				                        <option value="Viktor">Viktor</option>
				                        <option value="Vladimir">Vladimir</option>
				                        <option value="Volibear">Volibear</option>
				                        <option value="Warwick">Warwick</option>
				                        <option value="Xayah">Xayah</option>
				                        <option value="Xerath">Xerath</option>
				                        <option value="Xin Zhao">Xin Zhao</option>
				                        <option value="Yasuo">Yasuo</option>
				                        <option value="Yone">Yone</option>
				                        <option value="Yorick">Yorick</option>
				                        <option value="Yuumi">Yuumi</option>
				                        <option value="Zac">Zac</option>
				                        <option value="Zed">Zed</option>
				                        <option value="Ziggs">Ziggs</option>
				                        <option value="Zilean">Zilean</option>
				                        <option value="Zoe">Zoe</option>
				                        <option value="Zyra">Zyra</option>
				                </select>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="categoryRankTitle">
										<h4>Secondary Role</h4>
										<div class="categoryRankTitle_wrapper">
											<select name="role-alt_netwin">
												<option value="None">None</option>
												<option value="Top">Top</option>
												<option value="Middle">Middle</option>
												<option value="Bottom">Bottom</option>
												<option value="Jungle">Jungle</option>
												<option value="Support">Support</option>
											</select>
										</div>
										<div class="categoryRankTitle_wrapper">
												<select name="champion-alt_netwin">
					                        <option value="none">None</option>
					                        <option value="Aatrox">Aatrox</option>
					                        <option value="Ahri">Ahri</option>
					                        <option value="Akali">Akali</option>
					                        <option value="Alistar">Alistar</option>
					                        <option value="Amumu">Amumu</option>
					                        <option value="Anivia">Anivia</option>
					                        <option value="Annie">Annie</option>
					                        <option value="Aphelios">Aphelios</option>
					                        <option value="Ashe">Ashe</option>
					                        <option value="Aurelion Sol">Aurelion Sol</option>
					                        <option value="Azir">Azir</option>
					                        <option value="Bard">Bard</option>
					                        <option value="Blitzcrank">Blitzcrank</option>
					                        <option value="Brand">Brand</option>
					                        <option value="Braum">Braum</option>
					                        <option value="Caitlyn">Caitlyn</option>
					                        <option value="Camille">Camille</option>
					                        <option value="Cassiopeia">Cassiopeia</option>
					                        <option value="Cho'Gath">Cho'Gath</option>
					                        <option value="Corki">Corki</option>
					                        <option value="Darius">Darius</option>
					                        <option value="Diana">Diana</option>
					                        <option value="Draven">Draven</option>
					                        <option value="Dr. Mundo">Dr. Mundo</option>
					                        <option value="Ekko">Ekko</option>
					                        <option value="Elise">Elise</option>
					                        <option value="Evelynn">Evelynn</option>
					                        <option value="Ezreal">Ezreal</option>
					                        <option value="Fiddlesticks">Fiddlesticks</option>
					                        <option value="Fiora">Fiora</option>
					                        <option value="Fizz">Fizz</option>
					                        <option value="Galio">Galio</option>
					                        <option value="Gangplank">Gangplank</option>
					                        <option value="Garen">Garen</option>
					                        <option value="Gnar">Gnar</option>
					                        <option value="Gragas">Gragas</option>
					                        <option value="Graves">Graves</option>
					                        <option value="Hecarim">Hecarim</option>
					                        <option value="Heimerdinger">Heimerdinger</option>
					                        <option value="Illaoi">Illaoi</option>
					                        <option value="Irelia">Irelia</option>
					                        <option value="Ivern">Ivern</option>
					                        <option value="Janna">Janna</option>
					                        <option value="Jarvan IV">Jarvan IV</option>
					                        <option value="Jax">Jax</option>
					                        <option value="Jayce">Jayce</option>
					                        <option value="Jhin">Jhin</option>
					                        <option value="Jinx">Jinx</option>
					                        <option value="Kai'Sa">Kai'Sa</option>
					                        <option value="Kalista">Kalista</option>
					                        <option value="Karma">Karma</option>
					                        <option value="Karthus">Karthus</option>
					                        <option value="Kassadin">Kassadin</option>
					                        <option value="Katarina">Katarina</option>
					                        <option value="Kayle">Kayle</option>
					                        <option value="Kayn">Kayn</option>
					                        <option value="Kennen">Kennen</option>
					                        <option value="Kha'Zix">Kha'Zix</option>
					                        <option value="Kindred">Kindred</option>
					                        <option value="Kled">Kled</option>
					                        <option value="Kog'Maw">Kog'Maw</option>
					                        <option value="LeBlanc">LeBlanc</option>
					                        <option value="Lee Sin">Lee Sin</option>
					                        <option value="Leona">Leona</option>
					                        <option value="Lillia">Lillia</option>
					                        <option value="Lissandra">Lissandra</option>
					                        <option value="Lucian">Lucian</option>
					                        <option value="Lulu">Lulu</option>
					                        <option value="Lux">Lux</option>
					                        <option value="Malphite">Malphite</option>
					                        <option value="Malzahar">Malzahar</option>
					                        <option value="Maokai">Maokai</option>
					                        <option value="Master Yi">Master Yi</option>
					                        <option value="Miss Fortune">Miss Fortune</option>
					                        <option value="Wukong">Wukong</option>
					                        <option value="Mordekaiser">Mordekaiser</option>
					                        <option value="Morgana">Morgana</option>
					                        <option value="Nami">Nami</option>
					                        <option value="Nasus">Nasus</option>
					                        <option value="Nautilus">Nautilus</option>
					                        <option value="Neeko">Neeko</option>
					                        <option value="Nidalee">Nidalee</option>
					                        <option value="Nocturne">Nocturne</option>
					                        <option value="Nunu">Nunu</option>
					                        <option value="Olaf">Olaf</option>
					                        <option value="Orianna">Orianna</option>
					                        <option value="Ornn">Ornn</option>
					                        <option value="Pantheon">Pantheon</option>
					                        <option value="Poppy">Poppy</option>
					                        <option value="Pyke">Pyke</option>
					                        <option value="Qiyana">Qiyana</option>
					                        <option value="Quinn">Quinn</option>
					                        <option value="Rakan">Rakan</option>
					                        <option value="Rammus">Rammus</option>
					                        <option value="Rek'Sai">Rek'Sai</option>
					                        <option value="Rell">Rell</option>
					                        <option value="Renekton">Renekton</option>
					                        <option value="Rengar">Rengar</option>
					                        <option value="Riven">Riven</option>
					                        <option value="Rumble">Rumble</option>
					                        <option value="Ryze">Ryze</option>
					                        <option value="Samira">Samira</option>
					                        <option value="Sejuani">Sejuani</option>
					                        <option value="Senna">Senna</option>
					                        <option value="Seraphine">Seraphine</option>
					                        <option value="Sett">Sett</option>
					                        <option value="Shaco">Shaco</option>
					                        <option value="Shen">Shen</option>
					                        <option value="Shyvana">Shyvana</option>
					                        <option value="Singed">Singed</option>
					                        <option value="Sion">Sion</option>
					                        <option value="Sivir">Sivir</option>
					                        <option value="Skarner">Skarner</option>
					                        <option value="Sona">Sona</option>
					                        <option value="Soraka">Soraka</option>
					                        <option value="Swain">Swain</option>
					                        <option value="Sylas">Sylas</option>
					                        <option value="Syndra">Syndra</option>
					                        <option value="Tahm Kench">Tahm Kench</option>
					                        <option value="Taliyah">Taliyah</option>
					                        <option value="Talon">Talon</option>
					                        <option value="Taric">Taric</option>
					                        <option value="Teemo">Teemo</option>
					                        <option value="Thresh">Thresh</option>
					                        <option value="Tristana">Tristana</option>
					                        <option value="Trundle">Trundle</option>
					                        <option value="Tryndamere">Tryndamere</option>
					                        <option value="Twisted Fate">Twisted Fate</option>
					                        <option value="Twitch">Twitch</option>
					                        <option value="Udyr">Udyr</option>
					                        <option value="Urgot">Urgot</option>
					                        <option value="Varus">Varus</option>
					                        <option value="Vayne">Vayne</option>
					                        <option value="Veigar">Veigar</option>
					                        <option value="Vel'Koz">Vel'Koz</option>
					                        <option value="Vi">Vi</option>
					                        <option value="Viego">Viego</option>
					                        <option value="Viktor">Viktor</option>
					                        <option value="Vladimir">Vladimir</option>
					                        <option value="Volibear">Volibear</option>
					                        <option value="Warwick">Warwick</option>
					                        <option value="Xayah">Xayah</option>
					                        <option value="Xerath">Xerath</option>
					                        <option value="Xin Zhao">Xin Zhao</option>
					                        <option value="Yasuo">Yasuo</option>
					                        <option value="Yone">Yone</option>
					                        <option value="Yorick">Yorick</option>
					                        <option value="Yuumi">Yuumi</option>
					                        <option value="Zac">Zac</option>
					                        <option value="Zed">Zed</option>
					                        <option value="Ziggs">Ziggs</option>
					                        <option value="Zilean">Zilean</option>
					                        <option value="Zoe">Zoe</option>
					                        <option value="Zyra">Zyra</option>
					                </select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<button type="submit" class="button accent" name="submitNetwinOrder"><span>buy boost</span></button>
								</div>
							</div>
						</form>

						<!--3 таб-->
					</div>
				</div>
			</div>
		</div>
		<div class="addBg" style="background-image:url(./images/dist/main/bg_content.jpg)"></div>
	</section>
	<section class="howItWorks sectionAnim">
		<div class="container">
			<div class="row justify-content-end">
				<div class="col-lg-6 col-md-8 col-10">
					<h2 class="sectionTitle">How it works</h2>
					<div class="howItWorks_tabs">
						<div class="howItWorks_item active">
							<h3 class="howItWorks_itemTitle"><span></span>Customize your boosting order</h3>
							<div class="howItWorks_itemBody">
								<p>
									Select one of our many LoL ELO boost types! On division boost, we ensure you reach your division no matter what, on netwins boost we make sure to play until your account reaches the needed additional wins, and on placement boost, we win as many games as we can for you to give you the perfect start to the new Season. 
								</p>
							</div>
						</div>
						<div class="howItWorks_item">
							<h3 class="howItWorks_itemTitle"><span></span>Fill in additional information </h3>
							<div class="howItWorks_itemBody">
								<p>
									Info in progress
								</p>
							</div>
						</div>
						<div class="howItWorks_item">
							<h3 class="howItWorks_itemTitle"><span></span>Chat with your Booster and relax! </h3>
							<div class="howItWorks_itemBody">
								<p>
									Info in progress
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<img src="./images/dist/main/howItWorks_champion.png" data-speed-y="4" data-offset="-200" alt="How it works" class="howItWorks_champion sectionBg">
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
	<script src='js/calc.js'></script>
</body>
</html>
