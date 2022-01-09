<?
require_once 'model/Database.php'; 
require_once 'model/Order.php'; 

$dbcon = Database::getDb();
$newPrice = new Order();

$from_rank_NetWin = $_POST['chooseCurrentRank_NetWin'];

$price = $newPrice->getPriceByRangeNetWin($dbcon, $from_rank_NetWin);

if (isset($price->price)){
	echo $price->price;
	// var_dump($price->price);
}
else{
	echo "Try to choose another rank range!";
}


?>