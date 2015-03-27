<?php

class CategoriesWidget extends CWidget
{
    public function init()
    {
    	
    }
 
    public function run()
    {    	
    	$query = Yii::app()->db->createCommand();

    	$query->select("id, name, parent_id");
    	$query->from("category");
    	$query->where("parent_id=:parent", array(":parent" => 0));    	        

        $this->render('categories', array('categories' => $query->queryAll()));
        // этот метод будет вызван внутри CBaseController::endWidget()
    }
}

?>