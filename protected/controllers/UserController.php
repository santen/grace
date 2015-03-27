<?php

class UserController extends Controller
{
	public function actionIndex(){
		$this->layout = 'main';
		$this->render('index', array('var' => 'user'));
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