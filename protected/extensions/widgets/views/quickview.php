<?php $imgUrl = Yii::app()->request->baseUrl; ?>
<div class="pp-quick">
	<div class="pp-title" id="qvModel">
		Платье красивое вместе с сумкой на меху
	</div>
	<div class="pp-close">
		<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
	</div>
	<div class="pp-main-image">
		<img src="https://api.fnkr.net/testimg/290x520/00CED1/FFF/?text=product" id="qvMainImg">
	<div class="pp-social">
		<?php
			echo "<img src='".$imgUrl."/images/ok.png' class='social-btn' alt=''>";
			echo "<img src='".$imgUrl."/images/vk.jpg' class='social-btn' alt=''>";
		?>
	</div>
	</div>
	<div class="pp-properties">
		<div id="qvPrice">83 809 руб.</div>
		<div class="pp-property">Материал: 
			<div id="qvContent"></div>
		</div>
		<div class="pp-property">
			Размеры:
		</div>
		<div class="pp-size" id="qvSizes"></div>
		<div class="pp-property" id="qvColors">Другие цвета:</div>
		<div class="pp-colors"></div>
		<div class="pp-images" id="qvImages">
		</div>
		<div class="pp-actions">
			<div class="pp-action">
				<button type="button" id="toCartBtn" class="btn btn-warning btn-sm">
					Добавить в корзину
				</button>
			</div>
			<div class="pp-action">
				<button type="button" id="toListBtn" class="btn btn-info btn-sm">
					Добавить в лист ожидания
				</button>
			</div>
		</div>
	</div>
</div>