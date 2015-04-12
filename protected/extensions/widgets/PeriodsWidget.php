<?php

class PeriodsWidget extends CWidget
{
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
		$periods = array_merge($periods, array("Сегодня" => date_format($today, "d.m.Y")));
		$periods = array_merge($periods, array("Вчера" => date_format($yesterday, "d.m.Y")));
		$periods = array_merge($periods, array("Позавчера" => date_format($beforeYesterday, "d.m.Y")));
		$periods = array_merge($periods, array("За неделю" => date_format($oneWeek, "d.m.Y")));
		$periods = array_merge($periods, array("За 2 недели" => date_format($twoWeeks, "d.m.Y")));

		$this->render('periods', array('periods' => $periods));
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>