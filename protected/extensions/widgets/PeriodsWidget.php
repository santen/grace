<?php

class PeriodsWidget extends CWidget
{
	public $period;
	public function init()
	{
		
	}
 
	public function run()
	{
		$today = date_create();
		$yesterday = date_sub($today, new DateInterval("P1D"));
		$beforeYesterday = date_sub($today, new DateInterval("P2D"));
		$oneWeek = date_sub($today, new DateInterval("P7D"));
		$twoWeeks = date_sub($today, new DateInterval("P14D"));

		$periods = array();
		array_push($periods, "Сегодня");
		array_push($periods, "Вчера");
		array_push($periods, "Позавчера");
		array_push($periods, "За неделю");
		array_push($periods, "За 2 недели");

		$this->render('periods', array('periods' => $periods, "current" => $this->period));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>