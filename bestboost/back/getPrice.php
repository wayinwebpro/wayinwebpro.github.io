<?
require_once 'model/Database.php'; 
require_once 'model/Order.php'; 

$dbcon = Database::getDb();
$newPrice = new Order();

$from_rank = $_POST['currentRank'];
$to_rank = $_POST['desiredRank'];

$price = $newPrice->getPriceByRange($dbcon, $from_rank, $to_rank);

if (isset($price->price)){
	echo $price->price;
	// var_dump($price->price);
}
else{
	echo "Try to choose another rank range!";
}


?>