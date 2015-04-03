<?php

class MaterialWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, name");
		$query->from("material");		

		$this->render('materials', array('materials' => $query->queryAll()));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>