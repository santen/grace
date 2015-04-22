<?php
define("BAD_CART", "-3");
define("OK_CART", "1");
define("BAD_PRODUCT", "-1");
define("OK_PRODUCT", "1");
define("UNAUTH_USER", "-2");
define("VALID_USER", "1");
define("STATUS_OK", "1");
define("STATUS_ERROR", "0");

class OrderController extends Controller
{
	public function actionIndex()
	{
		$user = User::model()->find("id = :id", array(":id" => $id));
		if($user["is_full"] == 1)
			$this->render('index');
		else
			$this->redirect(array('user/settings'));
	}

	public function actionCartAjax(){
		if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"])){
			$response = array("status" => UNAUTH_USER);
			$this->renderPartial("cartajax", array("response" => $response));
			return;
		}
		$uid = $_COOKIE["uid"];
		$sid = $_COOKIE["sid"];

		$cart = json_decode($_POST["cart"], true);		

		if($this->isValidUser($uid, $sid) == UNAUTH_USER){
			$response = array("status" => UNAUTH_USER);
			$this->renderPartial("cartajax", array("response" => $response));
			return;
		}

		if($this->isValidCart($cart["sizes"]) == BAD_CART){
			$response = array("status" => BAD_CART);
			$this->renderPartial("cartajax", array("response" => $response));
			return;
		}

		if($this->isValidProduct($cart) == BAD_PRODUCT){
			$response = array("status" => BAD_PRODUCT);
			$this->renderPartial("cartajax", array("response" => $response));
			return;
		}

		$order = $this->getOrder($uid);
		if($order == null)
			$orderId = $this->createOrder($uid);
		else
			$orderId = $order["id"];


		$sql = "insert into o_content (order_id, category_id, product_id, size_id) values(:oid, :cid, :pid, :sid)";
		$query = Yii::app()->db->createCommand();
		for($i = 0; $i < count($cart["sizes"]); $i++){
			if($cart["sizes"][$i] != 0){
				$query->insert("o_content", array("order_id" => $orderId,
												  "product_id" => $cart["id"],
												  "category_id" => $cart["cid"],
												  "size_id" => $cart["sizes"][$i]));
				$query->execute();
				$query->reset();
			}
		}
		
		if($orderId > 0)
			$response = array("status" => STATUS_OK);
		else
			$response = array("status" => STATUS_ERROR);

		$response = array_merge($response, array("goods" => count($cart["sizes"])));
		$this->renderPartial("cartajax", array("response" => $response));
	}

	private function isValidUser($uid, $sid){
		$query = Yii::app()->db->createCommand();

		$query->select("*");
		$query->from("user");
		$query->where("id = :id", array(":id" => $uid));
		$user = $query->queryRow();
		$query->reset();

		if($sid != md5($uid.$user["mail"]))
			return UNAUTH_USER;
		else
			return VALID_USER;
	}

	private function isValidCart($sizes){

		$zeros = 0;
		for($i = 0; $i < count($sizes); $i++)
			if($sizes[$i] == 0)
				$zeros++;

		if($zeros == count($sizes))
			return BAD_CART;
		else
			return OK_CART;
	}

	private function isValidProduct($cart){
		$query = Yii::app()->db->createCommand();

		$query->select("*");
		$query->from("product");
		$query->where("id = :id", array(":id" => $cart["id"]));
		$product = $query->queryRow();
		$query->reset();

		if($cart["key"] != md5($product["id"].$product["category_id"]))
			return BAD_PRODUCT;
		else
			return OK_PRODUCT;
	}

	private function getOrder($uid){
		$query = Yii::app()->db->createCommand();
		
		$query->select("*");
		$query->from("uorder");
		$query->where("user_id = :uid and status_id = 1", array(":uid" => $uid));
		$order = $query->queryRow();
		$query->reset();

		return $order;
	}

	private function createOrder($uid){
		$sql = "insert into uorder (cdate, user_id, sum) values (now(), :uid, 0)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":uid", $uid);
		$query->execute();
		$query->reset();

		return Yii::app()->db->getLastInsertID();
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