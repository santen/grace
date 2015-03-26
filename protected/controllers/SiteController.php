<?php

class SiteController extends Controller
{	
	public function actionIndex()
	{	
		$this->layout = "main";
		$this->render('index');
	}
}