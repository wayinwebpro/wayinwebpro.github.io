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

        $user = $pst->fetch(PDO::FETCH_OBJ);
        return $user;
	}
}
?>