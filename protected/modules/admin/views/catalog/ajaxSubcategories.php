<div class="subcategories">
	<ul class="nav nav-pills nav-stacked">
		<?php
			foreach ($categories as $key => $category) {
				echo "<li role='presentation' class='active' id='cat_".$category["id"]."'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => $category["id"]))."'>".$category["name"]."</a></li>";
			}				
		?>
	</ul>
</div>