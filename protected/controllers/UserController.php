<?php

class UserController extends Controller
{
	public function actionIndex($id){
		if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"])){
			$this->layout = 'main';
			$this->render("404");
		}

		if(!isGoodUser($_COOKIE["uid"], $_COOKIE["sid"])){
			$this->layout = 'main';
			$this->render("404");
		}

		$user = User::model()->find("id = :id", array(":id" => $id));		
		
		$this->layout = 'profile';
		$this->render("index", array("user" => $user));
	}

	public function actionAdd(){
		$currentDate = date("Y-m-d");

		$sql = "insert into user(mail, passwd, cdate) values(:mail, :passwd, :cdate)";
		$query = Yii::app()->db->createCommand($sql);

		$query->bindParam(":mail", $_POST["mail"], PDO::PARAM_STR);
		$query->bindParam(":passwd", md5($_POST["passwd1"]), PDO::PARAM_STR);
		$query->bindParam(":cdate", $currentDate, PDO::PARAM_STR);

		$query->execute();

		$userId = Yii::app()->db->getLastInsertID();

		$this->layout = 'profile';
		$this->render('index');
	}

	public function actionAuth(){
		$mail = $_POST["mail"];
		$passwd = md5($_POST["passwd"]);

		$user = User::model->find("mail = :mail and passwd = :passwd", array(":mail" => $mail, ":passwd" => $passwd));
		if(count($user) != 0){
			setcookie("uid", $user["id"]);
			setcookie("sid", md5($user["mail"]));
		}

		$this->layout = "profile";
		$this->render("index", array("user" => $user));
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
		if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"]))
			return false;

		$user = User::model()->find("id = :id", array(":id" => $uid))
		if(md5($user["mail"]) != $_COOKIE["sid"]){
			return false;
		}
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