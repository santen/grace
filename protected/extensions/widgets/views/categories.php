<div class="categories-bar">
	<?php foreach ($categories as $category => $value) {
		echo "<a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => $value["id"]))."'>".$value["name"]."</a><br />";
	}
	?>
</div>