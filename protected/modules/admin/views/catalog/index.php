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
	<?php
		$imageUrl = Yii::app()->request->baseUrl."/images/products/";
		foreach($products as $key => $product){
			echo "<div class='row'>";
			echo "<div class='col-lg-2'><img src='".$imageUrl."/".$product["category_id"]."/".$product["img"]."' width='100px'></div>";
			echo "<div class='col-lg-3'>".$product["model"]."</div>";
			echo "<div class='col-lg-1'>".$product["price"]."</div>";
			echo "<div class='col-lg-3'>".$product["description"]."</div>";
			echo "<div class='col-lg-3'></div>";
			echo "</div>";
		}
	?>
</div>
<div class="pp-modal pp-category">
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

<div class="pp-modal pp-entity-double" id="pp_product">
	<div class="pp-body">
		<?php $this->beginWidget('CActiveForm', array('id'=>'prod_form',
													  'action' => CHtml::normalizeUrl(array('catalog/addprod')))); ?>
			<legend>Добавление товара</legend>
			<div class="steps">
				<div class="step-active" id="step1">1</div>
				<div class="step-arrow"></div>
				<div class="step" id="step2">2</div>
				<div class="step-arrow"></div>
				<div class="step" id="step3">3</div>
				<div class="step-arrow"></div>
				<div class="step" id="step4">4</div>
			</div>
			
			<div class="step-form" id="step1_form">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Выберите категорию:</label>
							<select name="category" id="category" class="form-control" required="required">
								<option value="0"></option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Модель:</label>
							<input type="text" name="model" id="model" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Цена:</label>
							<input type="text" name="model" id="model" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Артикул:</label>
							<input type="text" name="model" id="model" class="form-control" required="required">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label for="">Основное изображение:</label>
							<button type="button" class="btn btn-default">Добавить изображение</button>
						</div>
					</div>
					<div class="col-sm-6">					
					</div>
				</div>
			</div>
			
			<div id="step2_form">
				<div class="form-group">
					<label for="">Краткое описание:</label>
					<textarea name="brief" id="brief" class="form-control"></textarea>	
				</div>
				<div class="form-inline">
					<div class="form-group">
						<label for="">Состав:</label>
						<input type="text" name="matpercent" id="matpercent" class="form-control" placeholder="47%">
						<input type="text" name="material" id="material" class="form-control" placeholder="материал">
						<button type="button" class="btn btn-default btn-sm">Добавить</button>
					</div>
				</div>				
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-7">
						<select name="content" id="content" class="form-control" size="5" multiple="">
							<option value=""></option>
						</select>
					</div>
				</div>				
			</div>

			<div id="step3_form">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">Размеры:</label>
						<input type="text" name="sizecount" id="sizecount" class="form-control" placeholder="Количество">
						<select name="" id="input" class="form-control">
							<option value="0">Размер</option>
						</select>
						<input type="text" name="color" id="color" class="form-control" placeholder="Цвет">
						<div class="colors-list"></div>
						<button type="button" class="btn btn-default btn-sm">Добавить</button>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="">&nbsp;</label>
						<select name="" id="input" class="form-control" size="7" multiple="">
							<option value="0">Размеры</option>
						</select>
					</div>
				</div>
				<div class="col-sm-12" id="size_statusbar">
					<div id="current-color"></div><div id="current-data">Количество: 12<br />Размер: 52</div>
				</div>
			</div>

			<div id="step4_form">
				<div class="form-group">
					<label for="">Изображения:</label>
					<input type="file" id="prodimages">
					<button type="button" class="btn btn-default btn-sm">Добавить изображение</button>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
					<div class="col-sm-2">
						<div class="prod-img"></div>
					</div>
				</div>
			</div>
			
			<div class="product-buttons">
				<div class="btn-group" role="group" aria-label="...">
					<button type="submit" class="btn btn-warning" id="addprodbtn">Добавить</button>
					<button type="button" class="btn btn-success" id="okbtn">Ok</button>
					<button type="button" class="btn btn-default" id="cnclbtn">Отмена</button>
				</div>
			</div>
		<?php $this->endWidget(); ?>
	</div>
</div>