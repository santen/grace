<?php

class BreadcrumbsWidget extends CWidget
{
	public $id;

	public function init(){
		//$this->id = $id;
	}

	public function run()
	{
		$categories = array();
		$query = Yii::app()->db->createCommand();

		$query->select("id, parent_id, name");
		$query->from("category");
		$query->where("id = :id", array(":id" => $this->id));
		$category = $query->queryRow();

		array_push($categories, array("id" => $category["id"], "name" => $category["name"]));

		if($category["parent_id"] != 0)
			array_push($categories, $this->getParent($category["parent_id"], $categories));

		$this->render('breadcrumbs', array('categories' => $categories));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}

	private function getParent($parentId, $categories){
		$query = Yii::app()->db->createCommand();

		$query->select("id, parent_id, name");
		$query->from("category");
		$query->where("id = :id", array(":id" => $parentId));
		$category = $query->queryRow();

		array_push($categories, array("id" => $category["id"], "name" => $category["name"]));

		if($category["parent_id"] != 0){
			return $this->getParent($category["parent_id"], $categories);
		}

		//array_merge($categories, $categories);
		return $categories;
	}
}

?>