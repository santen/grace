<?php

class ColorWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, name");
		$query->from("color");		

		$this->render('color', array('colors' => $query->queryAll()));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>