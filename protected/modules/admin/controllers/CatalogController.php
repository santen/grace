<?php
define("DIVISIONS_COUNT", 3);
define("COLOR_IMAGES", Yii::app()->request->baseUrl."/images/colors/");

Yii::import('system.web');

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

		$size = array_merge($size, array("status" => $status, "sizeid" => $sizeId));
		$this->renderPartial("ajaxSize", array("size" => $size));
	}

	public function actionMaterialAjax(){
		$material = json_decode($_POST["material"], true);

		$sql = "insert into material (name) values (:name)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":name", $material["name"]);
		$query->execute();
		$query->reset();

		$materialId = Yii::app()->db->getLastInsertID();
		if($materialId > 0)
			$status = 1;
		else
			$status = 0;

		$material = array_merge($material, array("status" => $status, "materialid" => $materialId));
		$this->renderPartial("ajaxMaterial", array("material" => $material));
	}

	public function actionBrandAjax(){
		$brand = json_decode($_POST["brand"], true);

		$sql = "insert into brands (name) values (:name)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":name", $brand["name"]);
		$query->execute();
		$query->reset();

		$brandId = Yii::app()->db->getLastInsertID();
		if($brandId > 0)
			$status = 1;
		else
			$status = 0;

		$brand = array_merge($brand, array("status" => $status, "brandid" => $brandId));
		$this->renderPartial("ajaxBrand", array("brand" => $brand));
	}

	public function actionAddColorAjax(){
		$colorName = $_POST["color_name"];
		$fileColor = $_FILES["fcolorimg"]["name"];
		$extension = $this->getExtension($fileColor);

		$status = 0;
		$colorId = 0;

		if($this->isValidImage($extension)){
			$colorDir = "images/colors/";
			$fileColor = time().".".$extension;
			$filePath = $colorDir.$fileColor;
			

			$file = new CUploadedFile($fileColor, $_FILES["fcolorimg"]["tmp_name"], "image/".$extension, $_FILES["fcolorimg"]["size"], 0);
			$file->saveAs($filePath);

			$sql = "insert into color (name, img) values (:name, :img)";
			$query = Yii::app()->db->createCommand($sql);
			$query->bindParam(":name", $colorName);
			$query->bindParam(":img", $fileColor);
			$query->execute();
			$query->reset();

			$colorId = Yii::app()->db->getLastInsertID();
			if($colorId > 0)
				$status = 1;
		}

		$colorUrl = COLOR_IMAGES.$filePath;
		$colorAdded = array("colorid" => $colorId, 
							"name" => $colorName, 
							"img" => $colorUrl, 
							"status" => $status);
		$this->renderPartial("ajaxColor", array("color" => $colorAdded));
	}

	public function actionGetColorAjax($id){		
		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("color");
		$query->where("id = :id", array(":id" => $id));
		$color = $query->queryRow();

		$color["img"] = COLOR_IMAGES.$color["img"];

		$this->renderPartial("ajaxColor", array("color" => $color));
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

	private function getExtension($filename){
		$extension = explode(".", $filename)[1];

		return $extension;
	}

	private function isValidImage($extension){
		$validFormats = array("jpg", "png", "gif", "bmp","jpeg");

		if(in_array($extension, $validFormats))
			return true;
		else
			return false;
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