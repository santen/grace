<?php

class ProductWidget extends CWidget
{
	public function init()
	{
		
	}
 
	public function run()
	{
		$this->render('addproduct');
		// этот метод будет вызван внутри CBaseController::endWidget()
	}
}

?>