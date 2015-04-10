<?php

class ProductWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$categories = Category::model()->findAll();

		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("material");

		$materials = $query->queryAll();

		$this->render('addproduct', array("categories" => $categories, "materials" => $materials));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>