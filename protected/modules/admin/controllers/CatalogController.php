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

		$products = array();
		$query->select("*");
		$query->from("dress");
		$query->where("category_id = :category", array(":category" => $cat));
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

	public function actionSubcategoriesAjax($cat){
		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("category");
		$query->where("parent_id = :parent", array(":parent" => $cat));
		$query->order("id");
		$categories = $query->queryAll();
		$query->reset();

		$this->renderPartial("ajaxSubcategories", array("categories" => $categories));
	}

	public function actionSizeAjax(){
		$size = json_decode($_POST["size"], true);

		$sql = "insert into size (name, standard) values (:val, :std)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":val", $size["val"]);
		$query->bindParam(":std", $size["std"]);
		$query->execute();
		$query->reset();

		$sizeId = Yii::app()->db->getLastInsertID();
		if($sizeId > 0)
			$status = 1;
		else
			$status = 0;

		$size = array_merge($size, array("status" => $status, "id" => $sizeId));
		$this->renderPartial("ajaxSize", array("size" => $size));
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
		if((strlen($_POST["model"]) == 0) || ($_POST["category"] == 0) || (strlen($_POST["price"]) == 0))
			$this->redirect(array('admin/catalog/category'));

		$category = Category::model()->find("id = :id", array(":id" => $_POST["category"]));		

		$sql = "insert into ".$category["tablename"]." (model, category_id, price, cdate) values (:model, :category, :price, now())";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":model", $_POST["model"]);
		$query->bindParam(":category", $_POST["category"]);		
		$query->bindParam(":price", $_POST["price"]);
		$query->execute();

		$this->redirect(array('catalog/category', "cat" => $_POST["category"]));
	}

	private function getParent($id){
		return Category::model()->find("parent_id = :id", array(":id" => $id));
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