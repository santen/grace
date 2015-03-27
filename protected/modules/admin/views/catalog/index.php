<?php /* @var $this Controller */ ?>

<div class="leftside-bar">
	<ul class="nav nav-pills nav-stacked">
		<?php
			echo "<li role='presentation' id='cat_1'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => 1))."'>Сумки</a></li>";
			echo "<li role='presentation' id='cat_2'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => 2))."'>Платья</a></li>";
			echo "<li role='presentation' id='cat_3'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => 3))."'>Обувь</a></li>";
		?>
	</ul>
</div>
<div class="catalog-body">
	
</div>
<div class="pp-category">
	<div class="pp-body">
		<?php $this->beginWidget('CActiveForm', array('id'=>'cat_form',
													  'action' => CHtml::normalizeUrl(array('catalog/addcat')))); ?>
			<legend>Создание категории товаров</legend>
			<div class="form-group">
				<label for="">Название:</label>
				<input type="text" class="form-control" id="" name="mail" placeholder="Кросовки">
			</div>
			<div class="form-group">
				<label for="">Название таблицы:</label>
				<input type="text" class="form-control" id="" name="mail" placeholder="Только английские буквы">
			</div>
			<div class="form-group">
				<label for="">Родительская категория:</label>
				<select name="division" id="inputDivision" class="form-control" required="required">
					<?php
						foreach($categories as $key => $category){
							if($category["id"] == $cat)
								echo "<option value='".$category["id"]."' selected>".$category["name"]."</option>";
							else
								echo "<option value='".$category["id"]."'>".$category["name"]."</option>";
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Раздел:</label>
				<select name="division" id="inputDivision" class="form-control" required="required">
					<option value="1">Для мужчин</option>
					<option value="2">Для женщин</option>
					<option value="3">Для детей</option>
				</select>
			</div>
			
			<div class="btn-group" role="group" aria-label="...">
				<button type="submit" class="btn btn-warning">Добавить</button>
				<button type="button" class="btn btn-default" id="cnclcat">Отмена</button>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>