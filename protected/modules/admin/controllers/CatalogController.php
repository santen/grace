<?php


class CatalogController extends Controller
{
	public function actionIndex()
	{
		$this->layout = 'admin';
		$this->render('index');
	}

	public function actionCategory($id){
		$categories = Category::model()->findAll();

		$query = Yii::app()->db->createCommand();
		$query->select("tablename");
		$query->from("category");
		$query->where("id=:id", array(":id" => $id));
		$category = $query->queryRow();
		$query->reset();

		$query->select("*");
		$query->from("property");
		$query->where("category_id=:category", array(":category" => 1));
		$products = $query->queryAll();
		$query->reset();

		$this->layout = 'admin';
		$this->render('index', array("cat" => $id, "categories" => $categories, "products" => $products));
	}

	public function actionCategories(){
		$this->render('index');
	}

	public function actionAddCat(){

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