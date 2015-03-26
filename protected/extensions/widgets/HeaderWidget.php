<?php

class HeaderWidget extends CWidget
{
    public function init()
    {
        // этот метод будет вызван внутри CBaseController::beginWidget()
    }
 
    public function run()
    {
    	$this->render('header');
        // этот метод будет вызван внутри CBaseController::endWidget()
    }
}

?>