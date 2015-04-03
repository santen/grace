<?php

class SizeWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, name, standard");
		$query->from("size");
		$query->order("standard");

		$this->render('sizes', array('sizes' => $query->queryAll()));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>