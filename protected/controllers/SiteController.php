<?php

class SiteController extends Controller
{	
	public function actionIndex()
	{	
		$this->layout = "main";
		$this->render('index');
	}

	private function isAuthorized(){
		if(!isset($_COOKIE["uid"]) || !isset($_COOKIE["sid"])){
			$vid = time();

			
			setcookie("vid", $vid);
			setcookie("sid", 0);
		}
	}
}