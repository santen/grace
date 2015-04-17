<?php

class CatalogController extends Controller
{
	private $imgUrl;

	public function actionIndex($cid)
	{
		$query = Yii::app()->db->createCommand();

		$query->select("*");
		$query->from("product");
		$query->where("category_id = :cid", array("cid" => $cid));
		$products = $query->queryAll();

		$this->layout = "catalog";
		$this->render("index", array("products" => $products));
	}	

	public function actionCategories($id)
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, tablename");
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

	public function actionProductAjax($id){
		$query = Yii::app()->db->createCommand();

		$query->select("category_id as cid, name as model, 
						description as descr, main_img as mainImg, 
						price, artikul, id");
		$query->from("product");		
		$query->where("id = :id", array(":id" => $id));

		$product = $query->queryRow();
		$query->reset();

		$product = array_merge($product, array("content" => $this->getContent($product["id"]),
											   "sizes" => $this->getSizes($product["id"]),
											   "colors" => $this->getUnions($product["id"]),
											   "images" => $this->getImages($product["id"]),
											   "key" => md5($product["id"].$product["cid"])));

		$product["mainImg"] = $this->imgUrl.$product["mainImg"];

		$this->renderPartial('productajax', array('product' => $product));
	}

	public function actionCartAjax($id){
		$query = Yii::app()->db->createCommand();

		$query->select("category_id as cid, name as model, 
						description as descr, main_img as mainImg, 
						price, artikul, id");
		$query->from("product");		
		$query->where("id = :id", array(":id" => $id));

		$product = $query->queryRow();
		$query->reset();

		$product = array_merge($product, array("content" => $this->getContent($product["id"]),
											   "sizes" => $this->getSizes($product["id"]),
											   "colors" => $this->getUnions($product["id"]),
											   "images" => $this->getImages($product["id"])));

		$product["mainImg"] = $this->imgUrl.$product["mainImg"];

		$this->renderPartial('productajax', array('product' => $product));
	}

	private function getSizes($productId){
		$query = Yii::app()->db->createCommand();

		$query->select("size.name as size, p_size.number as count, size.id as sid");
		$query->from("p_size");
		$query->join("size", "size.id = p_size.size_id");
		$query->where("product_id = :id", array(":id" => $productId));

		$sizes = $query->queryAll();
		$query->reset();

		return $sizes;
	}

	private function getContent($productId){
		$query = Yii::app()->db->createCommand();

		$query->select("content.percent as percent, material.name as material");
		$query->from("content");
		$query->join("material", "material.id = content.material_id");
		$query->where("product_id = :id", array(":id" => $productId));

		$content = $query->queryAll();
		$query->reset();

		return $content;
	}

	private function getUnions($productId){
		$query = Yii::app()->db->createCommand();

		$query->select("product2_id as productId, product.main_img as mainImg");
		$query->from("p_union");
		$query->join("product", "product.id = p_union.product2_id");
		$query->where("product1_id = :id", array(":id" => $productId));

		$pUnions = $query->queryAll();
		$query->reset();

		/*$unions = array();
		foreach($pUnions as $union)
			$union = array_merge($union, array($union["mainImg"] => $this->imgUrl.$["mainImg"]));
		*/
		return $pUnions;
	}

	private function getImages($productId){
		$query = Yii::app()->db->createCommand();

		$query->select("img");
		$query->from("p_images");
		$query->where("product_id = :id", array(":id" => $productId));

		$otherImages = $query->queryAll();
		$query->reset();

		$this->imgUrl = Yii::app()->request->baseUrl."/images/products/";
		$images = array();
		foreach($otherImages as $image){
			$image = array_merge($image, array("img" => $this->imgUrl.$image["img"]));
			array_push($images, $image);
		}

		return $images;
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