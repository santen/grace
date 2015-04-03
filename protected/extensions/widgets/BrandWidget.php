<?php

class BrandWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, name");
		$query->from("brands");		

		$this->render('brands', array('brands' => $query->queryAll()));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>