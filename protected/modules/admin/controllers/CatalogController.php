<?php
define("DIVISIONS_COUNT", 3);
define("COLOR_IMAGES", Yii::app()->request->baseUrl."/images/colors/");

Yii::import('system.web');

class CatalogController extends Controller
{
	protected $division = 0;

	public function actionIndex($div){
		$this->division = $div;

		$this->layout = 'admin';
		$this->render('index');
	}

	public function actionCategory($cat = 0, $div){
		$this->division = $div;

		$categories = Category::model()->findAll("parent_id = 0 and division = :div", array(":div" => $div));
		
		$query = Yii::app()->db->createCommand();
		$query->select("tablename");
		$query->from("category");
		$query->where("id = :id", array(":id" => $cat));
		$category = $query->queryRow();
		$query->reset();

		$products = array();
		$query->select("*");
		$query->from("product");
		//$query->join('p_color', 'product.id=p_color.product_id');
		//$query->join('p_size', 'product.id=p_size.product_id');
		$query->where("category_id = :category", array(":category" => $cat));
		$products = $query->queryAll();
		$query->reset();

		for($i = 0; $i < count($products); $i++)
			$products[$i] = array_merge($products[$i], array("count" => $this->getCountProducts($products[$i]["id"])));

		$this->layout = 'admin';
		$this->render('index', array("cat" => $cat, "categories" => $categories, "products" => $products));
	}

	public function actionCategoriesAjax($div){
		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("category");
		//$query->where("division = :division", array(":division" => $div));
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

	public function actionAddSeasonAjax(){
		$season = json_decode($_POST["season"], true);

		$sql = "insert into season (name) values (:name)";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":name", $season["name"]);
		$query->execute();
		$query->reset();

		$seasonId = Yii::app()->db->getLastInsertID();
		if($seasonId > 0)
			$status = 1;
		else
			$status = 0;

		$season = array_merge($season, array("status" => $status, "seasonid" => $seasonId));
		$this->renderPartial("ajaxSeason", array("season" => $season));
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
		$mainImg = $this->saveMainImg($_FILES["pMainImg"]);

		$category = Category::model()->find("id = :id", array(":id" => $_POST["pCategory"]));		

		$sql = "insert into product (name, category_id, price, artikul, main_img, cdate) values (:model, :category, :price, :artikul, :mainimg, now())";
		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(":model", $_POST["pModel"]);
		$query->bindParam(":category", $_POST["pCategory"]);
		$query->bindParam(":price", $_POST["pPrice"]);
		$query->bindParam(":artikul", $_POST["pArtikul"]);
		$query->bindParam(":mainimg", $mainImg);
		$query->execute();
		$query->reset();

		$productId = Yii::app()->db->getLastInsertID();

		$product = json_decode($_POST["newProduct"], true);		
		$this->addContent($productId, $product["content"]);
		$this->addSizes($productId, $product["sizes"]);
		
		$this->addProductImages($productId, $_FILES["pImages"]);

		$query = Yii::app()->db->createCommand();
		$query->select("*");
		$query->from("product");
		$query->where("id = :id", array(":id" => $productId));
		$product = $query->queryRow();
		$query->reset();

		$this->layout = 'admin';
		$this->render('product', array("product" => $product));
	}

	private function getMaterial($material){
		$query = Yii::app()->db->createCommand();
		$query->select("*");		
		$query->from("material");
		$query->where("name = :material", array(":material" => $material));
		$materialObj = $query->queryRow();		
		$query->reset();

		return $materialObj;
	}

	private function addContent($productId, $content){
		$sql = "insert into content (product_id, percent, material_id) values (:product, :percent, :material)";

		for($i = 0; $i < count($content); $i++){
			$cont = explode("-", $content[$i]);
			$percent = $cont[0];
			$material = $cont[1];
			
			$query = Yii::app()->db->createCommand($sql);
			$query->bindParam(":product", $productId);
			$query->bindParam(":percent", $percent);
			$query->bindParam(":material", $material);
			$query->execute();
			$query->reset();
		}
	}

	private function addSizes($productId, $sizes){
		$sql = "insert into p_size (product_id, size_id, number) values (:product, :size, :number)";

		for($i = 0; $i < count($sizes); $i++){
			$size = explode("-", $sizes[$i]);
			$count = $size[0];
			$sizeId = $size[1];			
			
			$query = Yii::app()->db->createCommand($sql);
			$query->bindParam(":product", $productId);
			$query->bindParam(":size", $sizeId);
			$query->bindParam(":number", $count);
			$query->execute();
			$query->reset();
		}
	}

	private function saveMainImg($img){
		$mainImg = $img["name"];
		$extension = $this->getExtension($mainImg);

		if($this->isValidImage($extension)){
			$prodImgDir = "images/products/";
			$prodMainImg = time().".".$extension;
			$prodImgPath = $prodImgDir.$prodMainImg;

			$file = new CUploadedFile($mainImg, $img["tmp_name"], "image/".$extension, $img["size"], 0);
			$file->saveAs($prodImgPath);
		}

		return $prodMainImg;
	}

	private function addProductImages($productId, $images){
		$prodImgDir = "images/products/";

		for($i = 0; $i < count($images); $i++){
			$prodImg = $images["name"][$i];
			$extension = $this->getExtension($prodImg);

			//if($this->isValidImage($extension)){				
				$prodImg = time().".".$extension;
				$prodImgPath = $prodImgDir.$prodImg;

				$file = new CUploadedFile($prodImg, $images["tmp_name"][$i], "image/".$extension, $images["size"][$i], 0);
				$file->saveAs($prodImgPath);

				$sql = "insert into p_images (product_id, img) values (:product, :img)";
				$query = Yii::app()->db->createCommand($sql);
				$query->bindParam(":product", $productId);
				$query->bindParam(":img", $prodImg);
				$query->execute();
				$query->reset();
			//}
		}
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

	private function getCountProducts($productId){
		$query = Yii::app()->db->createCommand();
		$query->select("size.name as size, color.name as color, p_count.samples");
		$query->from("p_count");		
		$query->join("size", "p_count.size_id = size.id");
		$query->join("color", "p_count.color_id = color.id");
		$query->where("product_id = :id", array(":id" => $productId));
		$count = $query->queryAll();
		$query->reset();

		return $count;
	}

	public function getDivision(){
		return $this->division;
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