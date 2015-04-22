<?php

class HeaderWidget extends CWidget
{
    public function init()
    {
        // этот метод будет вызван внутри CBaseController::beginWidget()
    }
 
    public function run()
    {	
    	if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"])){
    		$settings = array("uid" => "", "sid" => "", "uname" => "");
    		$this->render('header', array("settings" => $settings));
    		return;
    	}

    	$user = User::model()->find("id = :id", array(":id" => $_COOKIE["uid"]));

    	if($user["nickname"] != null)
    		$settings = array("uid" => $_COOKIE["uid"], "sid" => $_COOKIE["sid"], "uname" => $user["nickname"]);
    	else
    		$settings = array("uid" => $_COOKIE["uid"], "sid" => $_COOKIE["sid"], "uname" => $user["mail"]);


    	$this->render('header', array("settings" => $settings));
        // этот метод будет вызван внутри CBaseController::endWidget()
    }
}

?>