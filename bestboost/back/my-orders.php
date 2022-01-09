<?
$page_title = "My orders";
include 'header.php';
require_once 'model/Order.php'; 
$dbcon = Database::getDb();
$o = new Order();
$user_id = $_SESSION['id'];
$order_list = $o->selectAllOrdersByUser($dbcon, $user_id);
$order_list_net_win = $o->selectAllOrdersNetWinByUser($dbcon, $user_id);
?>
<div class="row">
				<div class="col-12 g-0">
					<div class="heading_title">
						<h1>Orders</h1>
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
					<li><span>Orders</span></li>
				</ul>
			</div>
		</div>
	</div>
	<section class="order orderList">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="orderTitle">Order list</h2>
					<h3 style='margin-bottom:30px;'>Division Orders</h3>
					<!-- -------------------------------------------------- -->
					<?php foreach ($order_list as $order_list): ?>
						<div class="orderList_item">
						<div class="orderList_heading">
							<img src="./images/dist/icons/lol-logo.png" alt="lol logo" class="orderList_logo">
							<div class="orderList_short">
								<div class="orderParam_wrapper">
									<span class="param">Customer:</span>
									<span class="value"><? echo $order_list->first_name . ' ' . $order_list->last_name ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Price:</span>
									<span class="value">$<? echo $order_list->total_amount ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Type:</span>
									<span class="value"><? echo $order_list->type ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Duo:</span>
									<span class="value"><? echo $order_list->duo_boost ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">From:</span>
									<span class="value"><? echo $order_list->current_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">To:</span>
									<span class="value"><? echo $order_list->desired_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Server:</span>
									<span class="value"><? echo $order_list->server ?></span>
								</div>
							</div>
							<button class="button main more"></button>
						</div>
						<div class="orderList_full">
							<div class="orderList_fullWrapper">
								<div class="orderParam_wrapper">
									<span class="param">Id:</span>
									<span class="value"><? echo $order_list->id ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Name:</span>
									<span class="value"><? echo $order_list->first_name . ' ' . $order_list->last_name ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">User email:</span>
									<span class="value"><a href="mailto:<?echo $order_list->email?>"><? echo $order_list->email ?></a></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Server:</span>
									<span class="value"><? echo $order_list->server ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Price:</span>
									<span class="value"><? echo $order_list->total_amount ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Type:</span>
									<span class="value"><? echo $order_list->type ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Duo:</span>
									<span class="value"><? echo $order_list->duo_boost ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Current division:</span>
									<span class="value"><? echo $order_list->current_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Desired division:</span>
									<span class="value"><? echo $order_list->desired_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Roles/Champions</span>
									<span class="value"><? echo $order_list->roles_champions ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Twitch stream</span>
									<span class="value"><? echo $order_list->twitch_stream ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">High priority</span>
									<span class="value"><? echo $order_list->h_priority ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Express order</span>
									<span class="value"><? echo $order_list->express_order ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Primary role:</span>
									<span class="value"><? echo $order_list->primary_role ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Primary champion:</span>
									<span class="value"><? echo $order_list->primary_champion ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Secondary role:</span>
									<span class="value"><? echo $order_list->secondary_role ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Secondary champion:</span>
									<span class="value"><? echo $order_list->secondary_champion ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Status:</span>
									<span class="value"><? echo $order_list->status ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Date:</span>
									<span class="value"><? echo $order_list->date ?></span>
								</div>
							</div>
							<!-- В комменте кнопка взять заказ (потенциально для админки бустеров, но можно иначе использовать)-->
							<!-- <button class="button accent"><span>Take An Order</span></button> -->
						</div>
					</div>
					<?php endforeach ?>
					<!-- --------------------------------------------------------- -->
					<h3 style='margin:50px 0 30px 0;'>Netwin Orders</h3>
					<!-- -------------------------------------------------- -->
					<?php foreach ($order_list_net_win as $order_list_net_win): ?>
						<div class="orderList_item">
						<div class="orderList_heading">
							<img src="./images/dist/icons/lol-logo.png" alt="lol logo" class="orderList_logo">
							<div class="orderList_short">
								<div class="orderParam_wrapper">
									<span class="param">Customer:</span>
									<span class="value"><? echo $order_list_net_win->first_name . ' ' . $order_list_net_win->last_name ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Price:</span>
									<span class="value">$<? echo $order_list_net_win->total_amount ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Type:</span>
									<span class="value"><? echo $order_list_net_win->type ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Duo:</span>
									<span class="value"><? echo $order_list_net_win->duo_boost ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">From:</span>
									<span class="value"><? echo $order_list_net_win->current_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Games:</span>
									<span class="value"><? echo $order_list_net_win->number_games ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Server:</span>
									<span class="value"><? echo $order_list_net_win->server ?></span>
								</div>
							</div>
							<button class="button main more"></button>
						</div>
						<div class="orderList_full">
							<div class="orderList_fullWrapper">
								<div class="orderParam_wrapper">
									<span class="param">Id:</span>
									<span class="value"><? echo $order_list_net_win->id ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Name:</span>
									<span class="value"><? echo $order_list_net_win->first_name . ' ' . $order_list_net_win->last_name ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">User email:</span>
									<span class="value"><a href="mailto:<?echo $order_list->email?>"><? echo $order_list_net_win->email ?></a></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Server:</span>
									<span class="value"><? echo $order_list_net_win->server ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Price:</span>
									<span class="value"><? echo $order_list_net_win->total_amount ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Type:</span>
									<span class="value"><? echo $order_list_net_win->type ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Duo:</span>
									<span class="value"><? echo $order_list_net_win->duo_boost ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Current division:</span>
									<span class="value"><? echo $order_list_net_win->current_rank ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Number games:</span>
									<span class="value"><? echo $order_list_net_win->number_games ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Roles/Champions</span>
									<span class="value"><? echo $order_list_net_win->roles_champions ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Twitch stream</span>
									<span class="value"><? echo $order_list_net_win->twitch_stream ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">High priority</span>
									<span class="value"><? echo $order_list_net_win->h_priority ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Express order</span>
									<span class="value"><? echo $order_list_net_win->express_order ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Primary role:</span>
									<span class="value"><? echo $order_list_net_win->primary_role ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Primary champion:</span>
									<span class="value"><? echo $order_list_net_win->primary_champion ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Secondary role:</span>
									<span class="value"><? echo $order_list_net_win->secondary_role ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Secondary champion:</span>
									<span class="value"><? echo $order_list_net_win->secondary_champion ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Status:</span>
									<span class="value"><? echo $order_list_net_win->status ?></span>
								</div>
								<div class="orderParam_wrapper">
									<span class="param">Date:</span>
									<span class="value"><? echo $order_list_net_win->date ?></span>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>
					<!-- --------------------------------------------------------- -->
				</div>
			</div>
		</div>
	</section>
</main>
<?
include 'footer.php';
?>