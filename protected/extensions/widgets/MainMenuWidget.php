<?php

class MainMenuWidget extends CWidget
{
	public $div;

	public function init()
	{
		
	}
 
	public function run()
	{
		$divisions = array("Для мужчин", "Для женщин", "Для детей", "Аксессуары");

		$this->render('mainmenu', array("div" => $this->div, "divisions" => $divisions));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>