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
	<table class="table table-hover">
		<thead>
			<tr>
					<td>Главное фото</td>
					<td>Модель</td>
					<td>Цена</td>
					<td>Краткое описание</td>
					<td>Количество/Размер/Цвет</td>
			</tr>
		</thead>
		<tbody>
				<?php
					$imageUrl = Yii::app()->request->baseUrl."/images/products/";
					foreach($products as $key => $product){
						echo "<tr>";
						echo "<td><img src='".$imageUrl."/".$product["category_id"]."/".$product["main_img"]."' width='100px'></td>";
						echo "<td>".$product["name"]."</td>";
						echo "<td>".$product["price"]."</td>";
						echo "<td>".$product["description"]."</td>";
						echo "<td>";
						foreach($product["count"] as $key => $count){
							echo $count["samples"]." - ".$count["size"]." - ".$count["color"]."<br />";
						}
						echo "</td></tr>";
					}
				?>
		</tbody>
	</table>	
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