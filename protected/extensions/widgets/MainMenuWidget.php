<?php

class MainMenuWidget extends CWidget
{
	public $div;

	public function init()
	{
		
	}
 
	public function run()
	{
		$divisions = array("Для мужчин" => "catalog", "Для женщин" => "catalog", 
						   "Для детей" => "catalog", "Аксессуары" => "catalog",
						   "Заказы" => "order", "Лист ожидания" => "list",
						   "Пользователи" => "user", "Комментарии" => "comment",
						   "Вопросы" => "question");
		$controller = Yii::app()->controller->getId();

		$this->render('mainmenu', array("div" => $this->div, "divisions" => $divisions, "controller" => $controller));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>