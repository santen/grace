<?php

class LoginWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$this->render('login');
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>