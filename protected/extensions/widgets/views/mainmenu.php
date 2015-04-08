<ul class="nav nav-tabs">
	<?php
		for($i = 1; $i <= count($divisions); $i++){
			if($div == $i)
				echo "<li role='presentation' class='active'><a href='".CHtml::normalizeUrl(array('catalog/category', 'div' => $i))."'>".$divisions[$i - 1]."</a></li>";
			else
				echo "<li role='presentation'><a href='".CHtml::normalizeUrl(array('catalog/category', 'div' => $i))."'>".$divisions[$i - 1]."</a></li>";
		}
		
		echo "<li role='presentation' id='orders'><a href='".CHtml::normalizeUrl(array('orders/index'))."'>Заказы</a></li>";
		echo "<li role='presentation' id='list'><a href='".CHtml::normalizeUrl(array('orders/index'))."'>Лист ожидания</a></li>";
		echo "<li role='presentation' id='users'><a href='".CHtml::normalizeUrl(array('user/index'))."'>Пользователи</a></li>";
		echo "<li role='presentation' id='qa'><a href='".CHtml::normalizeUrl(array('questions/index'))."'>Q&A</a></li>";
		echo "<li role='presentation' id='comments'><a href='".CHtml::normalizeUrl(array('comments/index'))."'>Комментарии</a></li>";
	?>
</ul>