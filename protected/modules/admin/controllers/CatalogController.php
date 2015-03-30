<?php
define("DIVISIONS_COUNT", 3);

class CatalogController extends Controller
{
	public function actionIndex()
	{
		$this->layout = 'admin';
		$this->render('index');
	}

	public function actionCategory($cat = 0){
		$categories = Category::model()->findAll();

		$query = Yii::app()->db->createCommand();
		$query->select("tablename");
		$query->from("category");
		$query->where("id=:id", array(":id" => $cat));
		$category = $query->queryRow();
		$query->reset();

		$query->select("*");
		$query->from("property");
		$query->where("category_id=:category", array(":category" => 1));
		$products = $query->queryAll();
		$query->reset();

		$this->layout = 'admin';
		$this->render('index', array("cat" => $cat, "categories" => $categories, "products" => $products));
	}

	public function actionCategoriesAjax($div){
		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("category");
		$query->where("division = :division", array(":division" => $div));
		$categories = $query->queryAll();
		$query->reset();

		//$categories = Category::model()->findAll();
		//$categories = array("id" => 1, "name" => "обedm", "div" => $div);

		$this->renderPartial("ajaxCategory", array("categories" => $categories));
	}

	public function actionAddCat(){
		$sql = "insert into category (name, parent_id, division, tablename, cdate) values (:name, :parent, :division, :tablename, now())";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":name", $_POST["category"]);
		$query->bindParam(":parent", $_POST["parent"]);
		$query->bindParam(":tablename", $_POST["tablename"]);
		$query->bindParam(":division", $_POST["division"]);
		$query->execute();

		$categoryId = Yii::app()->db->getLastInsertID();
		$this->redirect(array('catalog/category', "id" => $categoryId));
	}

	public function actionAddProd(){
		$category = Category::model()->find("id = :id", array(":id" => $_POST["category"]));		

		$sql = "insert into ".$category["tablename"]." (model, price, img, cdate) values (:name, :parent, :division, :tablename, now())";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":name", $_POST["category"]);
		$query->bindParam(":parent", $_POST["parent"]);
		$query->bindParam(":tablename", $_POST["tablename"]);
		$query->bindParam(":division", $_POST["division"]);
		$query->execute();

		$categoryId = Yii::app()->db->getLastInsertID();

		$this->redirect(array('catalog/category', "id" => $categoryId));
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