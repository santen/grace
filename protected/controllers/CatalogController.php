<?php

class CatalogController extends Controller
{
	public function actionIndex()
	{

		$this->render('index');
	}	

	public function actionCategories($id)
	{
		$query = Yii::app()->db->createCommand();

		$->select("id, tablename");
		$query->from("category");
		$query->where("id=:id or parent_id=:parent", array(":id" => $id, ":parent" => $id));
		$categories = $query->queryAll();
		$query->reset();

		$products = array();
		foreach ($categories as $key => $category) {
			$query->select("id, name, price");
			$query->from($category["tablename"]);			
			array_push($products, $query->queryAll());

			$query->reset();
		}


		$this->render('category', array('categoryId' => $id, "products" => $products));
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