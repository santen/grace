<div class="catalog-layout">
	<?php
		$imgUrl = Yii::app()->request->baseUrl."/images/products/";

		echo "<div class='row'>";
		foreach($products as $product){
			echo "<div class='col-lg-3'>";
			echo "<div class='product-cell'>";
			echo "<div class='quick-view-action' id='qv_".$product["id"]."'>
					Быстрый просмотр
				  </div>";
			echo "<div class='product-image'>
					<img src='".$imgUrl.$product["main_img"]."' width='120px' alt=''>
				  </div>";
			echo "<div class='product-name'><a href='#'>".$product["name"]."</a></div>";
			echo "<div class='product-price'>".$product["price"]."</div>";
			echo "</div></div>";
		}
		echo "</div>";
	?>
</div>