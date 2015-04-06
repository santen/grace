<?php

class SeasonWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$query = Yii::app()->db->createCommand();

		$query->select("id, name");
		$query->from("season");

		$this->render('seasons', array('seasons' => $query->queryAll()));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>