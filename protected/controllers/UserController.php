<?php
define("USER_OK", "1");

class UserController extends Controller
{
	public $layout = "profile";
	public function actionIndex($uid){
		$user = User::model()->find("id = :id", array(":id" => $uid));
		
		if($user != null)
			$this->render("index", array("user" => $user));
		else
			$this->render("404");
	}

	public function actionAccount(){
		if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"])){
			$this->render("404");
			return;
		}

		$uid = $_COOKIE["uid"];
		$sid = $_COOKIE["sid"];
		
		$user = User::model()->find("id = :id", array(":id" => $uid));
		
		if(md5($uid.$user["mail"]) != $sid){
			clearUser();
			$this->render("404");
			return;
		}
		
		$this->render("account", array("user" => $user));
	}

	public function actionAddAjax(){
		$currentDate = date("Y-m-d");

		$user = json_decode($_POST["user"], true);

		$sql = "insert into user(mail, passwd, cdate) values(:mail, :passwd, :cdate)";
		$query = Yii::app()->db->createCommand($sql);

		$query->bindParam(":mail", $user["mail"]);
		$query->bindParam(":passwd", md5($user["pass"]));
		$query->bindParam(":cdate", $currentDate);

		$query->execute();

		$userId = Yii::app()->db->getLastInsertID();

		setcookie("uid", $userId);
		setcookie("sid", md5($userId.$user["mail"]));
		$route = "index.php?r=user/account";

		$response = array("uid" => $userId, "route" => $route, "status" => USER_OK);
		$this->renderPartial('userajax', array("response" => $response));
	}

	public function actionAuthAjax(){
		$user = json_decode($_POST["user"], true);

		$user = User::model()->find("mail = :mail and passwd = :passwd", array(":mail" => $user["mail"], ":passwd" => md5($user["pass"])));
		if(count($user) != 0){
			setcookie("uid", $user["id"]);
			setcookie("sid", md5($user["id"].$user["mail"]));
		}

		$route = "index.php?r=user/account";
		$response = array("uid" => $user["id"], "route" => $route, "status" => USER_OK);
		$this->renderPartial("userajax", array("response" => $response));
	}

	public function actionSettings($id){
		$user = User::model()->find("id = :id", array(":id" => $id));

		$this->render("settings", array("user" => $user));
	}

	public function actionPreorder(){

	}

	public function actionComments(){

	}

	public function actionQuestions(){

	}

	public function actionCart(){

	}

	private function isGoodUser($uid, $sid){
		$user = User::model()->find("id = :id", array(":id" => $uid));
		if(md5($uid.$user["mail"]) != $sid)
			return false;

		return true;
	}

	private function clearUser(){
		setcookie("uid");
		setcookie("sid");
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