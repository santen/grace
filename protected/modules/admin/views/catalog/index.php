<div class="row">
	<div class="col-lg-6">
		<?php /* @var $this Controller */ 

		$this->widget('application.extensions.widgets.BreadcrumbsWidget', array("id" => $cat));
		?>
	</div>
</div>
<div class="leftside-bar">
	<ul class="nav nav-pills nav-stacked">
		<?php			
			foreach($categories as $key => $category){
				if($category["id"] == $cat)
					echo "<li role='presentation' class='active' id='cat_".$category["id"]."'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => $category["id"]))."'>".$category["name"]."</a></li>";
				else
					echo "<li role='presentation' id='cat_".$category["id"]."'><a href='".CHtml::normalizeUrl(array('catalog/category', 'cat' => $category["id"]))."'>".$category["name"]."</a></li>";
			}			
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
				<input type="text" class="form-control" id="" name="category" placeholder="Кросовки">
			</div>
			<div class="form-group">
				<label for="">Название таблицы:</label>
				<input type="text" class="form-control" id="" name="tablename" placeholder="Только английские буквы">
			</div>
			<div class="form-group">
				<label for="">Родительская категория:</label>
				<select name="parent" id="inputDivision" class="form-control" required="required">
					<option value="0"></option>
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

<div class="pp-product">
	<div class="pp-body">
		<?php $this->beginWidget('CActiveForm', array('id'=>'prod_form',
													  'action' => CHtml::normalizeUrl(array('catalog/addprod')))); ?>
			<legend>Добавление товара</legend>
			<div class="steps">
				<ul class="pagination">
					<li id="step1" class="active"><a href="#">1</a></li>
					<li><a href="#">&raquo;</a></li>
					<li id="step2"><a href="#">2</a></li>
					<li><a href="#">&raquo;</a></li>
					<li id="step3"><a href="#">3</a></li>
				</ul>
			</div>			
			
			<div id="step1_form">
				<div class="form-group">
					<label for="">Раздел:</label>
					<select name="division" id="division" class="form-control" required="required">
						<option value="0"></option>
						<option value="1">Для мужчин</option>
						<option value="2">Для женщин</option>
						<option value="3">Для детей</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Выберите категорию:</label>
					<select name="category" id="category" class="form-control" required="required">
						<option value="0"></option>
					</select>
				</div>
			</div>
			
			<div id="step2_form">
				<div class="form-group">
					<label for="">Модель:</label>
					<input type="text" class="form-control" id="model" name="model">
				</div>
				<div class="form-group">
					<label for="">Цена:</label>
					<input type="text" class="form-control" id="price" name="price" placeholder="549.00">
				</div>				
			</div>
			
			<div class="btn-group" role="group" aria-label="...">
				<button type="submit" class="btn btn-warning" id="addprodbtn">Добавить</button>
				<button type="button" class="btn btn-success" id="okbtn">Ok</button>
				<button type="button" class="btn btn-default" id="cnclbtn">Отмена</button>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>