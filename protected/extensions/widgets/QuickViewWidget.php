<?php

class QuickViewWidget extends CWidget
{
	
	public function init()
	{
		
	}
 
	public function run()
	{
		$this->render('quickview');
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>