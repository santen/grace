<?php

class OrderController extends Controller
{
	public function actionIndex()
	{
		$currentDate = getdate();
		$currentDate = $currentDate["year"]."-".$currentDate["month"]."-".$currentDate["mday"];

		$orders = $this->getOrders($currentDate);
		$statuses = $this->getOrderStatuses();

		$this->layout = 'order';
		$this->render('index', array("orders" => $orders, "statuses" => $statuses));
	}

	public function actionOrder($id){
		$query = Yii::app()->db->createCommand();

		$query->select("*");
		$query->from("order_content");
		$query->where("order_id = :id", array(":id" => $id));
		$order = $query->queryAll();
		$query->reset();

		$products = $this->getProducts($order);

		$this->layout = 'order';
		$this->render('content', array("order" => $order, "products" => $products));
	}

	public function actionOrders($p){
		$orders = $this->getOrders($this->getInterval($p));

		$this->layout = "order";
		$this->render("orders", array("orders" => $orders, "period" => $p));
	}

	private function getOrders($date){
		$query = Yii::app()->db->createCommand();
		$query->select("uorder.id as oid, user.id as uid, uorder.cdate as odate,
						nickname, avatar, mail,
						is_visitor, status_id, change_status as ch_status,
						status, user_comment,
						sum, method_id");
		$query->from("uorder");
		$query->join("user", "uorder.user_id = user.id");
		$query->join("o_status ostatus", "uorder.status_id = ostatus.id");
		$query->where("uorder.cdate >= :date and status_id < 5", array(":date" => $date));
		$orders = $query->queryAll();
		$query->reset();

		return $orders;
	}

	private function getInterval($period){
		switch ($period) {
			case 1:
				return date_format(date_create(), "Y-m-d");
			case 2:
				$yesterday = date_create();
				date_sub($yesterday, new DateInterval("P1D"));
				return date_format($yesterday, "Y-m-d");
			case 3:
				$beforeYesterday = date_create();
				date_sub($beforeYesterday, new DateInterval("P2D"));
				return date_format($beforeYesterday, "Y-m-d");
			case 4:
				$weekAgo = date_create();
				date_sub($weekAgo, new DateInterval("P7D"));
				return date_format($weekAgo, "Y-m-d");
			default:
				$weeksAgo = date_create();
				date_sub($weeksAgo, new DateInterval("P14D"));
				return date_format($weeksAgo, "Y-m-d");
		}
	}

	private function getProducts($order){
		$products = array();

		for($i = 0; $i < count($order); $i++){
			$productId = $order[$i]["product_id"];

			$query->select("*");
			$query->from("product");
			$query->where("id = :id", array(":id" => $productId));
			array_push($products, $query->queryRow());
			$query->reset();
		}

		return $products;
	}

	private function getOrderStatuses(){
		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("order_status");
		$statuses = $query->queryAll();
		$query->reset();

		return $statuses;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}