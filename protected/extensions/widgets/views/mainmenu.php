<ul class="nav nav-tabs">
	<?php
		for($i = 1; $i <= count($divisions); $i++){
			if($div == $i)
				echo "<li role='presentation' class='active'><a href='".CHtml::normalizeUrl(array('catalog/category', 'div' => $i))."'>".$divisions[$i - 1]."</a></li>";
			else
				echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('catalog/category', 'div' => $i))."'>".$divisions[$i - 1]."</a></li>";
		}
		
		$controller = Yii::app()->controller->getId();
		$active = "class='active'";
		switch($controller){
			case "order":
				echo "<li role='presentation' ".$active." id='orders'><a href='".CHtml::normalizeUrl(array('orders/index'))."'>Заказы</a></li>";
				break;
			case "list":
				echo "<li role='presentation' ".$active." id='list'><a href='".CHtml::normalizeUrl(array('list/index'))."'>Лист ожидания</a></li>";
				break;
			case "user":
				echo "<li role='presentation' ".$active." id='users'><a href='".CHtml::normalizeUrl(array('user/index'))."'>Пользователи</a></li>";
				break;
			case "questions":
				echo "<li role='presentation' ".$active." id='qa'><a href='".CHtml::normalizeUrl(array('questions/index'))."'>Q&A</a></li>";
				break;
			case "comments":
				echo "<li role='presentation' ".$active." id='comments'><a href='".CHtml::normalizeUrl(array('comments/index'))."'>Комментарии</a></li>";
				break;
		}
		
		
		
		
		
	?>
</ul>