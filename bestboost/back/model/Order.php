<?
class Order
{
	public function getPriceByRange($dbcon, $from_rank, $to_rank)
	{
		$sql = "SELECT price FROM Pricing
				WHERE from_rank = :from_rank AND to_rank = :to_rank";
		$pst = $dbcon->prepare($sql);
		$pst->bindParam(':from_rank', $from_rank);
		$pst->bindParam(':to_rank', $to_rank);
        $pst->execute();

        $order = $pst->fetch(PDO::FETCH_OBJ);
        return $order;
	}

	public function addOrder($dbcon, $type, $current_rank, $desired_rank, $server, $duo_boost, $roles_champions, $twitch_stream, $h_priority, $express_order, $primary_role, $primary_champion, $secondary_role, $secondary_champion, $total_amount, $user_id, $status)
	{
		$sql = "INSERT INTO Orders (type, current_rank, desired_rank, server, duo_boost, roles_champions, twitch_stream, h_priority, express_order, primary_role, primary_champion, secondary_role, secondary_champion, total_amount, user_id, status, date)
			VALUES (:type, :current_rank, :desired_rank, :server, :duo_boost, :roles_champions, :twitch_stream, :h_priority, :express_order, :primary_role, :primary_champion, :secondary_role, :secondary_champion, :total_amount, :user_id, :status, NOW())";

			$pst = $dbcon->prepare($sql);
			$pst->bindParam(':type', $type);
			$pst->bindParam(':current_rank', $current_rank);
			$pst->bindParam(':desired_rank', $desired_rank);
			$pst->bindParam(':server', $server);
			$pst->bindParam(':duo_boost', $duo_boost);
			$pst->bindParam(':roles_champions', $roles_champions);
			$pst->bindParam(':twitch_stream', $twitch_stream);
			$pst->bindParam(':h_priority', $h_priority);
			$pst->bindParam(':express_order', $express_order);
			$pst->bindParam(':primary_role', $primary_role);
			$pst->bindParam(':primary_champion', $primary_champion);
			$pst->bindParam(':secondary_role', $secondary_role);
			$pst->bindParam(':secondary_champion', $secondary_champion);
			$pst->bindParam(':total_amount', $total_amount);
			$pst->bindParam(':user_id', $user_id);
			$pst->bindParam(':status', $status);

			$order = $pst->execute();
			return $order;
	}

	public function selectAllOrders($dbcon){
		$sql = "SELECT * FROM Orders
				INNER JOIN Users
				ON Orders.user_id = Users.id;";

		$pst = $dbcon->prepare($sql);
		$pst->execute();

		$order = $pst->fetchAll(PDO::FETCH_OBJ);
		return $order;

	}

		public function selectAllOrdersByUser($dbcon, $user_id){
		$sql = "SELECT * FROM Orders
				INNER JOIN Users
				ON Orders.user_id = Users.id
				WHERE user_id = :user_id;";

		$pst = $dbcon->prepare($sql);
		$pst->bindParam(':user_id', $user_id);
		$pst->execute();

		$order = $pst->fetchAll(PDO::FETCH_OBJ);
		return $order;

	}
}
?>